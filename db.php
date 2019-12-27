<?php
    session_start();
    
    include "constants.php";

    $servername = "localhost";
    $database = "stagiairemarkup";
    $dsn = "mysql:host=$servername;dbname=$database";
    $username = "root";
    $password = "";
    $connection = null;

    try {
        $connection = new PDO($dsn, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "Connection failed" .$e->getMessage();
    }

?>