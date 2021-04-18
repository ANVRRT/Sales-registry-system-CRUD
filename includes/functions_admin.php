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
if(isset($_GET["B_Usuario"])){
    //Función de permiso
    deleteUsuario($conn,$_GET["idUsuario"]);
}
if(isset($_POST["A_Rol"])){
    //Función de Rol
    // updateRol($conn,$_POST["idUsuario"],$_POST["idCompania"],$_POST["rolN"]);
    createRol($conn,$_POST["idCompania"],$_POST["rol"]);
}
if(isset($_POST["B_Rol"])){
    //Función de Rol
    // updateRol($conn,$_POST["idUsuario"],$_POST["idCompania"],$_POST["rolN"]);
    deleteRol($conn,$_POST["idCompania"],$_POST["rol"]);
}
if(isset($_POST["U_Rol"])){
    //Función de Rol
    updateRol($conn,$_POST["idUsuario"],$_POST["idCompania"],$_POST["rolN"]);
}
if(isset($_POST["A_CompADM"])){
    //Función de Rol
    setCompaniaADM($_POST["idCompaniaN"]);
}
if(isset($_GET["listado"])){
    $entrada = $_GET["entrada"];
    if($_GET["listado"] == "dispRolActual"){
        dispRolActual($conn,$entrada);
    }

}
function dispUsuarios($conn,$idCompania){
    $sql="SELECT * FROM Usuario WHERE idCompania = '$idCompania' ;";

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
    exit();
}

function dispRoles($conn,$idCompania){
    $sql="SELECT * FROM Rol WHERE idCompania = '$idCompania'";

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
    exit();
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
    exit();
}
function dispRolActual($conn, $entrada){
    $sql="SELECT * FROM Usuario WHERE idUsuario=?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $entrada);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($resultData))
    {
        echo $row["rol"];
        // echo "<option>".$row["idLista"]."</option>";


    }
    mysqli_stmt_close($stmt);
    exit();
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

function deleteUsuario($conn,$idUsuario){
    $sql = "DELETE FROM Usuario WHERE idUsuario = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$idUsuario);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_roles.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_roles.php?error=sqlerror");
        exit();
    }
}

function createRol($conn,$idCompania,$rol){
    $sql = "INSERT INTO Rol VALUES(?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$idCompania,$rol);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_roles.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_roles.php?error=sqlerror");
        exit();
    }
}
function deleteRol($conn,$idCompania,$rol){
    $sql = "DELETE FROM Rol WHERE idCompania = ? AND rol = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$idCompania,$rol);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_roles.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_roles.php?error=sqlerror");
        exit();
    }
}
function updateRol($conn,$idUsuario,$idCompania,$rol){
    $sql = "UPDATE Usuario SET rol = ? WHERE idCompania = ? AND idUsuario = ?";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$rol,$idCompania,$idUsuario);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_usuarios.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_usuarios.php?error=sqlerror");
        exit();
    }
}

function setCompaniaADM($idCompania){

    $_SESSION["idCompania"] = $idCompania;
    header("location: ../php/ADM_sadmin.php?error=success/".$_SESSION["idCompania"]);

    exit();
}

?>