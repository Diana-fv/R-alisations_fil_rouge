<?php
    function database(){
        $database= new PDO('mysql:host=localhost;dbname=supermam', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $database->exec("set names utf8");
        return $database;
    }

    define('BASE_PATH', '/supermam/');