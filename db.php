<?php
    session_start();

    $servername = "localhost";
    $database = "stagiairemarkup";
    $dsn = "mysql:host=$servername;dbname=$database";
    $username = "root";
    $password = "";
    $connection = null;

    try {
        $connection = new PDO($dsn, $username, $password);

    }catch(PDOException $e){
        echo "Connection failed" .$e->getMessage();
    }

?>