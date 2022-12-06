<?php

$hostname = "localhost";
$database = "desarrollo_aplicaciones";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    }
    
    $urlweb = "http://localhost:8080/Proyect_Web/proyecto_web/";
?>