<?php
    session_start();

    $host = 'localhost';
    $dbname = 'kp-plotting-dosbing';
    $username = 'root';
    $password = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;", 
                   $username, $password,
                   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    header("Access-Control-Allow-Origin: *");
    $con = mysqli_connect($host, $username, $password, $dbname) or die ('could not connect to database');
?>