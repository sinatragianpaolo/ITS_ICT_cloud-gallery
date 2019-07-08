<?php
    require 'vendor/autoload.php';
    use League\Plates\Engine;
    $templates = new Engine('template');
    echo $templates->render('contenuto');