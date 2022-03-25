<?php
    $host="localhost";
    $dbname="login";
    $user = "root";
    $pass = "";
    
    try {
        $pdo=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>