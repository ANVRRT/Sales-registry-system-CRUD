<?php

if (isset($_POST["submit"])){
    $idUsuario = $_POST["idUsuario"];
    $idCompania = $_POST["idCompania"];
    $rol = $_POST["rol"];
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $repcontrasena = $_POST["repcontrasena"];
    echo "Funciona";
    header("location: ../php/login.php");

    require_once("dbh.inc.php");
    require_once("functions.inc.php");


    if (invalididU($idUsuario) !== false)
    {
        header("location: ../php/register.php?error=invalididU");
        exit();
    }
    if (pswrdMatch($contrasena, $repcontrasena) !== false)
    {
        header("location: ../php/register.php?error=pswrd!match");
        exit();
    }
    if (iduExists($conn, $idUsuario) !== false)
    {
        header("location: ../php/register.php?error=usrtaken");
        exit();
    }
    if (idcompExists($conn, $idCompania) !== true)
    {
        header("location: ../php/register.php?error=comp!exist");
        exit();
    }
    // if (rolExists($conn, $rol, $idCompania) !== true)
    // {
    //     header("location: ../php/register.php?error=rol!exist");
    //     exit();
    // }

    createUser($conn, $idUsuario, $idCompania, $rol, $nombre, $contrasena);
}
else{
    header("location: ../php/register.php");
    exit();
}


?>