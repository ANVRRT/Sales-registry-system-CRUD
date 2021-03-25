<?php

if (isset($_POST["submit"])){
    $idUsuario = $_POST["idUsuario"];
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $repcontrasena = $_POST["repcontrasena"];
    echo "Funciona";
    header("location: ../php/login.php");

}
else{
    header("location: ../php/register.php");
}

?>