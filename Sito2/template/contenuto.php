<?php 
    $this->layout('template', ['title' => 'Login']) 
?>
<form name="login" action="./login.php" method="POST">
    Email: <input type="text" name="email"/><br>
    Password: <input type="text" name="password"/><br>
    <input type="submit" value="invia"/>
</form>