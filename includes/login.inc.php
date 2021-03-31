<?php

if (isset($_POST["submit"])){
    // header("location: ../php/index.php");
    $idUsuario = $_POST["idUsuario"];
    $contrasena = $_POST["password"];

    require_once("dbh.inc.php");
    require_once("functions.inc.php");

    // if (invalididU($idUsuario) !== false)
    // {
    //     header("location: ../php/login.php?error=invalididU");
    //     exit();
    // }
    loginUser($conn,$idUsuario,$contrasena);

}
else{
    // print($_POST["submit"]);
    header("location: ../php/login.php");
    exit();
}

?>