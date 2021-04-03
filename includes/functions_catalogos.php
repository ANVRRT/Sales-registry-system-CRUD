<?php
require_once("dbh.inc.php");

if(isset($_POST["A_artE"])){
    createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
}
if(isset($_POST["B_artE"])){ 
    deleteArtExistente($conn,$_POST["idArticulo"]);
}
// if(isset($_POST["A_artE"])){ //AGENTE
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){ 
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }if(isset($_POST["A_artE"])){ //ALMACEN
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //ARTCLIENTEVendido
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){ 
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
if(isset($_REQUEST['estadoB'])==2){//BLOQUEO CLIENTE
    bClient($conn, $_GET['idB']);
    //echo($_REQUEST['idB']);
}
if(isset($_REQUEST['estadoD'])==1){
    dClient($conn, $_REQUEST['idD']);
    //echo($_REQUEST['idD']);
}
// if(isset($_POST["A_artE"])){ //CantEnt
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //Cliente
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //Compañia
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //DirEnt
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //Factura
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //Inventario
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //Lista Precios
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
// if(isset($_POST["A_artE"])){ //ADM Permisos
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }if(isset($_POST["A_artE"])){
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }


function dispArticulos($conn, $idCompania){
    $sql="SELECT * FROM ArticuloExistente WHERE idCompania = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $idCompania);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if(mysqli_fetch_assoc($resultData))
    {
        return $resultData;
    }
    else{
        $result = "No hay artículos existentes para esta";
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createArtExistente($conn,$idArticulo,$idCompania,$descripcion,$costo){
    $sql = "INSERT INTO ArticuloExistente VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssd",$idArticulo,$idCompania,$descripcion,$costo);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloExistente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloExistente.php?error=sqlerror");
        exit();
    }
}
function deleteArtExistente($conn,$idArticulo){
    $sql = "DELETE FROM ArticuloExistente WHERE idArticulo = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idArticulo);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloExistente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloExistente.php?error=sqlerror");
        exit();
    }
}

function disClients($conn, $estado){
    $sql="SELECT * FROM Cliente WHERE bloqueo = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $estado);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;

    mysqli_stmt_close($stmt);
}

function bClient($conn, $id){
    $sql= "UPDATE Cliente SET bloqueo= 1 WHERE idCliente= ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$id);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
        exit();
    }
}

function dClient($conn, $id){
    $sql= "UPDATE Cliente SET bloqueo= 0 WHERE idCliente= ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$id);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
        exit();
    }
}
?>