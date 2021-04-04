<?php
require_once("dbh.inc.php");

if(isset($_POST["A_artE"])){
    createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
}
if(isset($_POST["B_artE"])){ 
    deleteArtExistente($conn,$_POST["idArticulo"]);
}
if(isset($_POST["A_agente"])){ //AGENTE
    createAgente($conn,$_POST["idRepresentante"],$_POST["nomRepresentante"],$_POST["idCompania"]);
}
if(isset($_POST["B_agente"])){ 
    deleteAgente($conn,$_POST["idRepresentante"]);
}
// if(isset($_POST["A_artE"])){ //ALMACEN
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
if(isset($_POST["A_artV"])){ //ARTCLIENTEVendido
    createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["stock"],$_POST["codAviso"],$_POST["udVta"]);
}
if(isset($_POST["B_artV"])){ 
    deleteArtVendido($conn,$_POST["folio"]);
}
// if(isset($_POST["A_artE"])){ //BloqueoCliente
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
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
if(isset($_POST["A_Compania"])){ //Compañia
    createCompania($conn,$_POST["idCompania"],$_POST["nombre"]);
}
if(isset($_POST["B_Compania"])){
    deleteCompania($conn,$_POST["idCompania"]);
}
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

function createArtVendido($conn,$folio,$idArticulo,$idCompania,$idCliente,$stock,$codAviso,$udVta){
    $sql = "INSERT INTO ArticuloVendido VALUES(?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"isssdss",$folio,$idArticulo,$idCompania,$idCliente,$stock,$codAviso,$udVta);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloVendido.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloVendido.php?error=sqlerror");
        exit();
    }
}
function deleteArtVendido($conn,$folio){
    $sql = "DELETE FROM ArticuloVendido WHERE folio = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$folio);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloVendido.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_articuloVendido.php?error=sqlerror");
        exit();
    }
}

function createAgente($conn,$idRepresentante,$nomRepresentante,$idCompania){
    $sql = "INSERT INTO Agente VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$idRepresentante,$nomRepresentante,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_agente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_agente.php?error=sqlerror");
        exit();
    }
}
function deleteAgente($conn,$idRepresentante){
    $sql = "DELETE FROM Agente WHERE idRepresentante = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idRepresentante);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_agente.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_agente.php?error=sqlerror");
        exit();
    }
}
function createCompania($conn, $idCompania, $nombre){
    $sql = "INSERT INTO Compania VALUES(?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $idCompania, $nombre);
    
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_compania.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_compania.php?error=sqlerror");
        exit();
    }
}

function deleteCompania($conn, $idCompania){
    $sql = "DELETE FROM Compania WHERE idCompania = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $idCompania);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_compania.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_compania.php?error=sqlerror");
        exit();
    }
}

?>