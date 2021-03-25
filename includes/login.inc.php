<?php

if (isset($_POST["submit"])){
    header("location: ../php/index.php");

}
else{
    // print($_POST["submit"]);
    header("location: ../php/register.php");
}

?>