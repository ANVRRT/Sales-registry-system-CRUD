<?php
    session_start();
    session_unset();
    session_destroy();

    header("location: ../php/login.php");
    exit();


?>