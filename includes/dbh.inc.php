<?php

$serverName = "remotemysql.com";
$dBUsername = "06FXDnB5jA";
$dBPassword = "DJXdInY3zr";
$dBName = "06FXDnB5jA";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("La conexión a fallado: ".mysqli_connect_error());
}

?>