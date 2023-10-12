<?php


function connectDB()
{
    $database = 'database';
    $host = 'localhost';
    $login = 'root';
    $password = '';

    try {

        $db = new PDO("mysql:host=" . $host . ";dbname=" . $database, $login, $password);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $db;
}
