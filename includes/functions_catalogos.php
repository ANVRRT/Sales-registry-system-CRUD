<?php
require_once("dbh.inc.php");
if (!isset($_SESSION["idUsuario"])) {
    session_start();
}

if(isset($_POST["A_artE"])){
    createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
}
if(isset($_POST["B_artE"])){ 
    deleteArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_agente"])){ //AGENTE
    createAgente($conn,$_POST["idRepresentante"],$_POST["nomRepresentante"],$_POST["idCompania"]);
}
if(isset($_POST["B_agente"])){ 
    deleteAgente($conn,$_POST["idRepresentante"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_almacen"])){ //ALMACEN
    createAlmacen($conn,$_POST["idAlmacen"],$_POST["descripcion"],$_POST["idCompania"]);
}
if(isset($_POST["B_almacen"])){
    deleteAlmacen($conn,$_POST["idAlmacen"],$_SESSION["idUsuario"],$_SESSION["idCompania"]);
}
if(isset($_POST["A_artV"])){ //ARTCLIENTEVendido
    createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["stock"],$_POST["codAviso"],$_POST["udVta"]);
}
if(isset($_POST["B_artV"])){ 
    deleteArtVendido($conn,$_POST["folio"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
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
if(isset($_POST["A_cliente"])){ //Cliente
    if(isset($_POST["bloqueo"])){
        createCliente($conn,$_POST["idCliente"],$_POST["idCompania"],$_POST["idRepresentante"], $_POST["listaPrecios"],$_POST["idAlmacen"],$_POST["nomCliente"],
        $_POST["estatus"],$_POST["idAnalista"],$_POST["divisa"],$_POST["limCredito"],$_POST["saldoOrden"],$_POST["saldoFactura"],$_POST["bloqueo"],'1',null);
    }
    else{
        $bloqueo=0;
        createCliente($conn,$_POST["idCliente"],$_POST["idCompania"],$_POST["idRepresentante"], $_POST["listaPrecios"],$_POST["idAlmacen"],$_POST["nomCliente"],
        $_POST["estatus"],$_POST["idAnalista"],$_POST["divisa"],$_POST["limCredito"],$_POST["saldoOrden"],$_POST["saldoFactura"],$bloqueo,'1',null);
    }
}
if(isset($_POST["B_cliente"])){
   deleteCliente($conn,$_POST["idCliente"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_dirEnt"])){ //DirEnt
    createDirEnt($conn,$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$_POST["nombreEntrega"],$_POST["direccion"],$_POST["municipio"],$_POST["estado"],$_POST["telefono"],$_POST["observaciones"],$_POST["codpost"],$_POST["codruta"],$_POST["pais"],$_POST["rfc"]);
}
if(isset($_POST["B_dirEnt"])){
    deleteDirEnt($conn,$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_Compania"])){ //Compañia
    createCompania($conn,$_POST["idCompania"],$_POST["nombre"]);
}
if(isset($_POST["B_Compania"])){
    deleteCompania($conn,$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_Facs"])){ //Factura
    createFactura($conn,$_POST["numFac"],$_POST["idCompania"],$_POST["idOrden"],$_POST["idArticulo"],$_POST["idCliente"],$_POST["idFolio"],$_POST["entrega"],$_POST["tipoTrans"],$_POST["fechaFac"]);
}
if(isset($_POST["B_Facs"])){
    deleteFactura($conn,$_POST["numFac"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_inventario"])){ //Inventario
    createInventario($conn,$_POST["idCompania"],$_POST["idAlmacen"],$_POST["idArticulo"],$_POST["stock"]);
}
if(isset($_POST["B_inventario"])){
    deleteInventario($conn,$_POST["idArticulo"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["A_listPrecios"])){ //Lista Precios
     createListPrecios($conn,$_POST["idCompania"],$_POST["idLista"],$_POST["idArticulo"],$_POST["descuento"],$_POST["precio"],
     $_POST["cantOlmp"],$_POST["nivelDscto"],$_POST["fechaCaducidad"],$_POST["fechaInicio"],$_POST["impDesc"],'1',null);
}
if(isset($_POST["B_listPrecios"])){
     deleteListPrecios($conn,$_POST["idLista"],$_POST["idCompania"],$_POST["idArticulo"],$_POST["nivelDscto"],$_SESSION["idUsuario"]);
}
// if(isset($_POST["A_artE"])){ //ADM Permisos
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }if(isset($_POST["A_artE"])){ //EXTRA Plantilla?
//     createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
// }
// if(isset($_POST["B_artE"])){
//     deleteArtExistente($conn,$_POST["idArticulo"]);
// }
if(isset($_GET["listado"])){
    $entrada = $_GET["entrada"];
    if($_GET["listado"] == "dispListaPreciosByCliente"){
        dispListaPreciosByCliente($conn,$entrada);
    }
    if($_GET["listado"] == "dispOrdenByCliente"){

        dispOrdenByCliente($conn,$entrada);
    }
    if($_GET["listado"] == "dispDirEntByCLiente"){
        dispDirEntByCLiente($conn,$entrada);
    }
    if($_GET["listado"] == "dispFolio"){
        $entrada2 = $_GET["entrada2"];
        dispFolio($conn,$entrada,$entrada2);
    }
    if($_GET["listado"] == "dispPrecio"){
        $entrada2 = $_GET["entrada2"];
        dispPrecio($conn,$entrada,$entrada2);
    }

}


function buscarArticuloCliente($conn, $idCliente, $idCompania){
    $sql="SELECT ArticuloVendido.idArticulo, ArticuloExistente.descripcion FROM ArticuloVendido, ArticuloExistente WHERE ArticuloVendido.idCliente=? AND ArticuloVendido.idArticulo = ArticuloExistente.idArticulo AND ArticuloExistente.idCompania=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $idCliente, $idCompania);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;


    mysqli_stmt_close($stmt);
}


function dispCompania($conn){
    $sql="SELECT * FROM Compania";

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

function dispInventario($conn, $idCompania){
    $sql="SELECT * FROM Inventario WHERE idCompania = ?";

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

function dispArticuloVendido($conn, $idCompania){
    $sql="SELECT * FROM ArticuloVendido WHERE idCompania = ?";
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

function dispOrden($conn, $idCompania){
    $sql="SELECT * FROM Orden WHERE idCompania = ?";
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

function dispDirEnt($conn, $idCompania){
    $sql="SELECT * FROM DirEnt WHERE idCompania = ?";

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

function dispFactura($conn, $idCompania){
    $sql="SELECT * FROM Factura WHERE idCompania = ?";

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

function dispCantidadE($conn, $idCompania){
    $sql="SELECT * FROM CantEntregada WHERE idCompania = ?";

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
    return $resultData;


    mysqli_stmt_close($stmt);
}
function dispRepresentante($conn, $idCompania){
    $sql="SELECT * FROM Agente WHERE idCompania = ?";

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

function dispListaPrecioCompleta($conn, $idCompania){
    $sql="SELECT * FROM ListaPrecio WHERE idCompania = ?";

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

function dispListaPrecios($conn, $idCompania){
    $sql="SELECT DISTINCT idLista FROM ListaPrecio WHERE idCompania = ? AND estatus = ?";
    $estatus = 1;
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"si", $idCompania,$estatus);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;


    mysqli_stmt_close($stmt);
}
function dispListaPreciosByCliente($conn, $entrada){
    $sql="SELECT * FROM Cliente WHERE idCliente=?";
    
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
        echo "<option>".$row["idLista"]."</option>";

    }
    mysqli_stmt_close($stmt);
    exit();

}
function dispOrdenByCliente($conn, $entrada){
    $sql="SELECT * FROM Orden WHERE idCliente=?";
    
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
        echo "<option>".$row["idOrden"]."</option>";

    }
    mysqli_stmt_close($stmt);
    exit();
}

function dispDirEntByCLiente($conn, $entrada){
    $sql="SELECT * FROM DirEnt WHERE idCliente=?";
    
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
        echo "<option>".$row["dirEnt"]."</option>";

    }
    mysqli_stmt_close($stmt);
}

function dispFolio($conn, $entrada,$entrada2){
    $sql="SELECT * FROM ArticuloVendido WHERE idCliente=? AND idArticulo=?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $entrada,$entrada2);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($resultData))
    {
        echo "<option>".$row["folio"]."</option>";

    }
    mysqli_stmt_close($stmt);
}

function dispPrecio($conn, $entrada,$entrada2){
    $sql="SELECT * FROM ListaPrecio WHERE idLista=? AND idArticulo=?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $entrada,$entrada2);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($resultData))
    {
        echo "<option>".$row["precio"]."</option>";

    }
    mysqli_stmt_close($stmt);
}


function dispAlmacen($conn, $idCompania){
    $sql="SELECT * FROM Almacen WHERE idCompania = ?";

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
function dispClientes($conn, $idCompania)
{
    $sql="SELECT * FROM Cliente WHERE idCompania=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $idCompania);
    mysqli_stmt_execute($stmt);
  
    $resultData = mysqli_stmt_get_result($stmt);
  
    return $resultData;

    mysqli_stmt_close($stmt);
}


function dispFolios($conn, $idCliente)
{
    $sql="SELECT folio FROM ArticuloVendido WHERE idCliente=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $idCliente);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
  
    return $resultData;

    mysqli_stmt_close($stmt);
}

function createArtExistente($conn,$idArticulo,$idCompania,$descripcion,$costo){
    $sql = "INSERT INTO ArticuloExistente VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = "1";
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssdis",$idArticulo,$idCompania,$descripcion,$costo,$estatus,$idBaja);
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
function deleteArtExistente($conn,$idArticulo,$idCompania,$idUsuario){
    $sql = "UPDATE ArticuloExistente SET estatus = ?, idBaja = ? WHERE idArticulo = ? AND idCompania = ?;";
    $estatus = 0;
    // $sql = "DELETE FROM ArticuloExistente WHERE idArticulo = ? AND idCompania = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$estatus,$idUsuario,$idArticulo,$idCompania);
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
    $sql = "INSERT INTO ArticuloVendido VALUES(?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = "1";
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"isssdssis",$folio,$idArticulo,$idCompania,$idCliente,$stock,$codAviso,$udVta,$estatus,$idBaja);
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
function deleteArtVendido($conn,$folio,$idCompania,$idUsuario){
    $sql = "UPDATE ArticuloVendido SET estatus = ?, idBaja = ? WHERE idArticulo = ? AND idCompania = ? AND folio = ?;";
    $estatus = 0;
    // $sql = "DELETE FROM ArticuloVendido WHERE folio = ? AND idCompania = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$estatus,$idUsuario,$idArticulo,$idCompania,$folio);
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
    $sql = "INSERT INTO Agente VALUES(?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = "1";
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssis",$idRepresentante,$nomRepresentante,$idCompania,$estatus,$idBaja);
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
function deleteAgente($conn,$idRepresentante,$idCompania,$idUsuario){
    $sql = "UPDATE Agente SET estatus = ?, idBaja = ? WHERE idRepresentante = ? AND idCompania = ?";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"isss",$estatus,$idUsuario,$idRepresentante,$idCompania);
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
    $sql = "INSERT INTO Compania VALUES(?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    $estatus = "1";
    $iBaja = null;
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssis", $idCompania, $nombre, $estatus, $idBaja);
    
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

function deleteCompania($conn, $idCompania, $idUsuario){
    $sql = "UPDATE Compania SET estatus = ?, idBaja = ? WHERE idCompania = ?;";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iss", $estatus, $idUsuario, $idCompania);

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
function createCliente($conn,$idCliente,$idCompania,$idRepresentante,$listaPrecios,$idAlmacen,$nomCliente,$estatusCliente,$idAnalista,$divisa,$limCredito,$saldoOrden,$saldoFactura,$bloqueo,$estatus,$idBaja)
{
    $sql = "INSERT INTO Cliente VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssssissiddiis",$idCliente,$idCompania,$idRepresentante,$listaPrecios,$idAlmacen,$nomCliente,$estatusCliente,$idAnalista,$divisa,$limCredito,$saldoOrden,$saldoFactura,$bloqueo,$estatus,$idBaja);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cliente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cliente.php?error=sqlerror");
        exit();
    }
}
function deleteCliente($conn,$idCliente,$idCompania,$idUsuario){
    $sql = "UPDATE Cliente SET estatus = ?, idBaja = ? WHERE idCliente = ? AND idCompania = ?;";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"isss",$estatus,$idUsuario,$idCliente,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cliente.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cliente.php?error=sqlerror");
        exit();
    }
}

function createAlmacen($conn,$idAlmacen,$descripcion,$idCompania){
    $sql = "INSERT INTO Almacen VALUES(?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = "1";
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssis",$idAlmacen,$descripcion,$idCompania,$estatus,$idBaja);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_almacen.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_almacen.php?error=sqlerror");
        exit();
    }
}
function deleteAlmacen($conn,$idAlmacen,$idUsuario,$idCompania){
    $sql = "UPDATE Almacen SET estatus = ?, idBaja = ? WHERE idAlmacen = ? AND idCompania = ?";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"isss",$estatus,$idUsuario,$idAlmacen,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_almacen.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_almacen.php?error=sqlerror");
        exit();
    }
}
function createInventario($conn,$idCompania,$idAlmacen,$idArticulo,$stock){
    $sql = "INSERT INTO Inventario VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = 1;
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssdis",$idCompania,$idAlmacen,$idArticulo,$stock,$estatus,$idBaja);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_inventario.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_inventario.php?error=sqlerror");
        exit();
    }
}

function deleteInventario($conn,$idArticulo,$idCompania,$idUsuario){
    $sql = "UPDATE Inventario SET estatus = ?, idBaja = ? WHERE idArticulo = ? AND idCompania = ?;";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"isss",$estatus,$idUsuario,$idArticulo,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_inventario.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_inventario.php?error=sqlerror");
        exit();
    }
}
function createFactura($conn,$numFact,$idCompania,$idOrden,$idArticulo,$idCliente,$folio,$entrega,$tipoTrans,$fechaFac)
{
    $sql = "INSERT INTO Factura VALUES(?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = 1;
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssssiissis",$numFact,$idCompania,$idOrden,$idArticulo,$idCliente,$folio,$entrega,$tipoTrans,$fechaFac,$estatus,$idBaja);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_factura.php?error=success");
        exit();
    }
    else{
        //echo mysqli_error($conn);
        mysqli_stmt_close($stmt);
        header("location: ../php/C_factura.php?error=sqlerror");
        exit();
    }
}

function deleteFactura($conn,$numFact,$idCompania,$idUsuario){
    $sql = "UPDATE Factura SET estatus = ?, idBaja = ? WHERE numFact = ? AND idCompania = ?;";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"isss",$estatus,$idUsuario,$numFact,$idCompania);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_factura.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_factura.php?error=sqlerror");
        exit();
    }

}

function disClients($conn, $estado, $compania, $estatus){
    $sql="SELECT * FROM Cliente WHERE estatus = ? AND bloqueo = ? AND idCompania = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"iis", $estatus, $estado, $compania);
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
function createListPrecios($conn,$idCompania,$idLista,$idArticulo,$descuento,$precio,$cantOlmp,$nivelDscto,$fechaCaducidad,$fechaInicio,$impDesc,$estatus,$idBaja){
    $sql = "INSERT INTO ListaPrecio VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssidiissdis",$idCompania,$idLista,$idArticulo,$descuento,$precio,$cantOlmp,$nivelDscto,$fechaCaducidad,$fechaInicio,$impDesc,$estatus,$idBaja);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_ListaPrecios.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_ListaPrecios.php?error=sqlerror");
        exit();
    }
}

function deleteListPrecios($conn, $idLista,$idCompania,$idArticulo,$nivelDscto,$idUsuario){
    $sql = "UPDATE ListaPrecio SET estatus = ?, idBaja = ? WHERE idLista = ? AND  idCompania = ? AND idArticulo = ? AND nivelDscto = ?;";
    $stmt = mysqli_stmt_init($conn);
    $estatus=0;
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "issssi",$estatus,$idUsuario, $idLista,$idCompania,$idArticulo,$nivelDscto);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_ListaPrecios.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_ListaPrecios.php?error=sqlerror");
        exit();
    }
}

function createDirEnt($conn,$idCompania,$idCliente,$dirEnt,$nombreEntrega,$direccion,$municipio,$estado,$telefono,$observaciones,$codpost,$codruta,$pais,$rfc){
    $sql = "INSERT INTO DirEnt VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = 1;
    $idBaja = null;
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssssssssssssis",$idCompania,$idCliente,$dirEnt,$nombreEntrega,$direccion,$municipio,$estado,$telefono,$observaciones,$codpost,$codruta,$pais,$rfc,$estatus,$idBaja);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_dirEnt.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_dirEnt.php?error=sqlerror");
        exit();
    }
}
function deleteDirEnt($conn,$idCompania,$idCliente,$dirEnt,$idUsuario){
    $sql = "UPDATE DirEnt SET estatus = ?, idBaja = ? WHERE idCompania = ? AND idCliente = ? AND dirEnt = ?";
    $estatus = 0;
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "issss",$estatus,$idUsuario,$idCompania,$idCliente,$dirEnt);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_dirEnt.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_dirEnt.php?error=sqlerror");
        exit();
    }

    
    
}
?>
