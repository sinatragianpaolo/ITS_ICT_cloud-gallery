<?php
    session_start();
    session_unset();
    $dsn = 'mysql:dbname=php_esercizio;host=127.0.0.1';
    $user = 'root';
    $password = '';
    try 
    {
        $pdo = new PDO($dsn, $user, $password);
    } 
    catch (PDOException $e) 
    {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }
    
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT email, password
    FROM utenti
    WHERE email = :mail";
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':mail', $user, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if (password_verify ($pass, $result['password']))
    {
        $_SESSION['mail']=$user;
        header("location: ./home.php");
    }
    else
    {
        header("HTTP/1.1 400");
        header("location: ./index.php");
    }
   