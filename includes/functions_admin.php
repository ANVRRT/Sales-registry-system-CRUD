<?php
require_once("dbh.inc.php");
if (!isset($_SESSION["idUsuario"])) {
    session_start();
}
if(isset($_POST["A_Permiso"])){
    //Función de permiso
    createPermiso($conn,$_POST["idUsuario"],$_POST["permiso"],$_POST["idCompania"]);
}
if(isset($_GET["B_Permiso"])){
    //Función de permiso
    deletePermiso($conn,$_GET["idUsuario"],$_GET["permiso"],$_GET["idCompania"]);
}

function dispUsuarios($conn,$idCompania){
    $sql="SELECT * FROM Usuario WHERE idCompania = $idCompania";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    //mysqli_stmt_bind_param($stmt,"s", $idCompania);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;


    mysqli_stmt_close($stmt);
}

function dispPermiso($conn, $idCompania){
    $sql="SELECT * FROM Permiso WHERE idCompania = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $idCompania);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    return $resultData;

    mysqli_stmt_close($stmt);
}

function createPermiso($conn,$idUsuario,$permiso,$idCompania){
    $sql = "INSERT INTO Permiso VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$idUsuario,$permiso,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_permisos.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_permisos.php?error=sqlerror");
        exit();
    }
}

function deletePermiso($conn,$idUsuario,$permiso,$idCompania){
    $sql = "DELETE FROM Permiso WHERE idUsuario = ? AND Permiso = ? AND idCompania = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$idUsuario,$permiso,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_permisos.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_permisos.php?error=sqlerror");
        exit();
    }
}

?>