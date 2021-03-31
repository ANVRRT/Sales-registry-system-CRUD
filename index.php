<?php
    session_start();
    if(isset($_SESSION["idUsuario"]))
    {
        header("location: ./php/index.php");
        exit();
    }
    else
    {
        header("location: ./php/login.php");
    }
    

?>