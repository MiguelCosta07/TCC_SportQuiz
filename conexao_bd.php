<?php

$host = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$database = "sportquiz"; 


$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>



