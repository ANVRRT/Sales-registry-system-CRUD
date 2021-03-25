<?php

if (isset($_POST["submit"])){
    $idUsuario = $_POST["idUsuario"];
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $repcontrasena = $_POST["repcontrasena"];
    echo "Funciona";
}
else{
    header("location: ../register.php");
}

?>