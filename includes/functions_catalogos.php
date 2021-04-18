<?php
require_once("dbh.inc.php");


if (!isset($_SESSION["idUsuario"])) {
    session_start();
}
//ARTICULO EXISTENTE FUNCTIONS
if(isset($_POST["A_artE"])){
    createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
}
if(isset($_POST["B_artE"])){ 
    deleteArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["U_artExistente"])){
    updateArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
}
//AGENTE FUNCTIONS
if(isset($_POST["A_agente"])){ 
    createAgente($conn,$_POST["idRepresentante"],$_POST["nomRepresentante"],$_POST["idCompania"]);
}
if(isset($_POST["B_agente"])){ 
    deleteAgente($conn,$_POST["idRepresentante"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["U_agente"])){ 
    updateAgente($conn,$_POST["idRepresentante"],$_POST["nomRepresentante"],$_POST["idCompania"]);
}
//ALMACEN FUNCTIONS
if(isset($_POST["A_almacen"])){ 
    createAlmacen($conn,$_POST["idAlmacen"],$_POST["descripcion"],$_POST["idCompania"]);
}
if(isset($_POST["B_almacen"])){
    deleteAlmacen($conn,$_POST["idAlmacen"],$_SESSION["idUsuario"],$_SESSION["idCompania"]);
}
if(isset($_POST["U_almacen"])){ //ALMACEN
    updateAlmacen($conn,$_POST["idAlmacen"],$_POST["descripcion"],$_POST["idCompania"]);
}
//ARTCLIENTE VENDIDO FUNCTIONS
if(isset($_POST["A_artV"])){ 
    if(strlen($_POST["folio"])>0){
        createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["stock"],$_POST["codAviso"],$_POST["udVta"]);
    }
    else{
        createArtVendido($conn,'default',$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["stock"],$_POST["codAviso"],$_POST["udVta"]);
    }
    
}
if(isset($_POST["B_artV"])){ 
    deleteArtVendido($conn,$_POST["folio"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["funcion"])){
    if($_POST["funcion"]=="updateArtV"){
        if(strlen($_POST["codAviso"])>0){
            $msg=updateArtVCod($conn,$_POST["codAviso"],$_POST["folio"],$_POST["artV"],$_POST["idCliente"]);
            die($msg);
        }
        if(strlen($_POST["udVta"])>0){
            $msg=updateArtVUni($conn,$_POST["udVta"],$_POST["folio"],$_POST["artV"],$_POST["idCliente"]);
            die($msg);
        }
    }
}
//BLOQUEO DE CLIENTE FUNCTIONS
if(isset($_REQUEST['estadoB'])==2){
    bClient($conn, $_GET['idB']);
    //echo($_REQUEST['idB']);
}
if(isset($_REQUEST['estadoD'])==1){
    dClient($conn, $_REQUEST['idD']);
    //echo($_REQUEST['idD']);
}
//CANTIDAD ENTREGADA FUNCTIONS
if(isset($_POST["A_CantE"])){ 
    if($_POST["tipoReg"]==1){
        createCantEnt($conn,$_POST["idCompania"],$_POST["idOrden"],$_POST["folio"],$_POST["fechaMov"],$_POST["hora"],$_POST["secuencia"],$_POST["tipoReg"],$_POST["cantidad"],
        $_POST["idArticulo"],$_POST["posicion"],1,null);
        updateReOrden($conn,$_POST["idOrden"],$_POST["folio"],$_POST["cantidad"]);
    }
    else{
        createCantEnt($conn,$_POST["idCompania"],$_POST["idOrden"],$_POST["folio"],$_POST["fechaMov"],$_POST["hora"],$_POST["secuencia"],$_POST["tipoReg"],null,
        $_POST["idArticulo"],$_POST["posicion"],1,null);
    }
}
if(isset($_POST["B_CantE"])){
    bajaCantEnt($conn,$_POST["idOrden"],$_POST["folio"],$_SESSION["idUsuario"]);
    updateReOrdenBaja($conn,$_POST["idOrden"],$_POST["folio"],$_POST["cantidad"]);
}
//CLIENTE FUNCTIONS
if(isset($_POST["A_cliente"])){ 
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
if(isset($_POST["funcion"])){
    if($_POST["funcion"]=="updateCliente"){
        if(strlen($_POST["listaPrecios"])>0){
            $msg= updateClienteLP($conn,$_POST["listaPrecios"],$_POST["idCliente"]);
            die($msg);
        }
        if(strlen($_POST["nombreCliente"])>0){
            $msg= updateClientenomCli($conn,$_POST["nombreCliente"],$_POST["idCliente"]);
            die($msg);
        }
        if(strlen($_POST["estatusCliente"])>0){
            $msg= updateClienteEstatus($conn,$_POST["estatusCliente"],$_POST["idCliente"]);
            die($msg);
        }
        if(strlen($_POST["idAnalista"])>0){
            $msg= updateClienteRepre($conn,$_POST["idAnalista"],$_POST["idCliente"]);
            die($msg);
        }
        if(strlen($_POST["limCredito"])>0){
            $msg= updateClientelimCredi($conn,$_POST["limCredito"],$_POST["idCliente"]);
            die($msg);
        }
        
        
    }
    
}
//DIRECCION ENTREGA FUNCTIONS
if(isset($_POST["A_dirEnt"])){ //DirEnt
    createDirEnt($conn,$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$_POST["nombreEntrega"],$_POST["direccion"],$_POST["municipio"],$_POST["estado"],$_POST["telefono"],$_POST["observaciones"],$_POST["codpost"],$_POST["codruta"],$_POST["pais"],$_POST["rfc"]);
}
if(isset($_POST["B_dirEnt"])){
    deleteDirEnt($conn,$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$_SESSION["idUsuario"]);
}
if(isset($_POST["U_dirEnt"])){
    updateDirEnt($conn,$_POST["codruta"],$_POST["idCliente"],$_POST["dirEnt"]);
}
//COMPANIA FUNCTIONS
if(isset($_POST["A_Compania"])){ 
    createCompania($conn,$_POST["idCompania"],$_POST["nombre"]);
}
if(isset($_POST["B_Compania"])){
    deleteCompania($conn,$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["U_compania"])){
    updateCompania($conn,$_POST["idCompania"],$_POST["nombre"]);
}
//FACTURA FUNCTIONS
if(isset($_POST["A_Facs"])){ 
    createFactura($conn,$_POST["numFac"],$_POST["idCompania"],$_POST["idOrden"],$_POST["idArticulo"],$_POST["idCliente"],$_POST["idFolio"],$_POST["entrega"],$_POST["tipoTrans"],$_POST["fechaFac"]);
    updateReOrdenFact($conn,$_POST["idOrden"],$_POST["numFac"],$_POST["idFolio"]);
}
if(isset($_POST["B_Facs"])){
    deleteFactura($conn,$_POST["numFac"],$_POST["idCompania"],$_SESSION["idUsuario"]);
    updateReOrdenFact($conn,$_POST["idOrden"],null,$_POST["idFolio"]);
}
//INVENTARIO FUNCTIONS
if(isset($_POST["A_inventario"])){ 
    createInventario($conn,$_POST["idCompania"],$_POST["idAlmacen"],$_POST["idArticulo"],$_POST["stock"]);
}
if(isset($_POST["B_inventario"])){
    deleteInventario($conn,$_POST["idArticulo"],$_POST["idCompania"],$_SESSION["idUsuario"]);
}
if(isset($_POST["U_inventario"])){ 
    updateInventario($conn,$_POST["idCompania"],$_POST["idAlmacen"],$_POST["idArticulo"],$_POST["stock"]);
}
//LISTA PRECIOS FUNCTIONS
if(isset($_POST["A_listPrecios"])){ 
     createListPrecios($conn,$_POST["idCompania"],$_POST["idLista"],$_POST["idArticulo"],$_POST["descuento"],$_POST["precio"],
     $_POST["cantOlmp"],$_POST["nivelDscto"],$_POST["fechaCaducidad"],$_POST["fechaInicio"],$_POST["impDesc"],'1',null);
}
if(isset($_POST["B_listPrecios"])){
     deleteListPrecios($conn,$_POST["idLista"],$_POST["idCompania"],$_POST["idArticulo"],$_POST["nivelDscto"],$_SESSION["idUsuario"]);
}
if(isset($_POST["U_listaPrecios"])){
    updateListPrecios($conn,$_POST["idLista"],$_POST["idArticulo"],$_POST["descuento"],$_POST["precio"],$_POST["nivelDscto"],$_POST["impDesc"]);
}
//LISTADOS AJAX
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
    if($_GET["listado"] == "dispArtByList"){
        dispArtByList($conn,$entrada);
    }
    if($_GET["listado"] == "dispFolioByOrden"){
        dispFolioByOrden($conn,$entrada);
    }
    if($_GET["listado"] == "dispArticuloRO"){
        dispArticuloRO($conn,$entrada);
    }
    if($_GET["listado"] == "dispFolio"){
        $entrada2 = $_GET["entrada2"];
        dispFolio($conn,$entrada,$entrada2);
    }
    if($_GET["listado"] == "dispPrecio"){
        $entrada2 = $_GET["entrada2"];
        dispPrecio($conn,$entrada,$entrada2);
    }
    if($_GET["listado"] == "dispOrdenesByFechas"){
        $finicial = $_GET["entrada"];
        $ffinal = $_GET["entrada2"];
        dispOrdenesByFechas($conn,$_SESSION["idCompania"],$finicial,$ffinal);
    }
    
}


function buscarArticuloCliente($conn, $idCliente, $idCompania){
    $sql="SELECT ArticuloVendido.idArticulo, ArticuloExistente.descripcion, ArticuloVendido.folio, ArticuloVendido.stock, ArticuloVendido.udVta, ArticuloVendido.codAviso FROM ArticuloVendido, ArticuloExistente WHERE ArticuloVendido.idCliente=? AND ArticuloVendido.idArticulo = ArticuloExistente.idArticulo AND ArticuloExistente.idCompania=?";

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
    exit();
}

function dispCompania($conn){
    $sql="SELECT * FROM Compania WHERE estatus = 1";

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

function dispInventario($conn, $idCompania){
    $sql="SELECT * FROM Inventario WHERE idCompania = ? AND estatus = 1";

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

function dispArticuloVendido($conn, $idCompania){
    $sql="SELECT * FROM ArticuloVendido WHERE idCompania = ? AND estatus = 1";
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

function dispOrden($conn, $idCompania){
    $sql="SELECT * FROM Orden WHERE idCompania = ? AND estatusDB = 1";
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

function dispDirEnt($conn, $idCompania){
    $sql="SELECT * FROM DirEnt WHERE idCompania = ? AND estatus = 1";

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

function dispFactura($conn, $idCompania){
    $sql="SELECT * FROM Factura WHERE idCompania = ? AND estatus = 1";

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

function dispCantidadE($conn, $idCompania){
    $sql="SELECT * FROM CantEntregada WHERE idCompania = ? AND estatus = 1";

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

function dispArticulos($conn, $idCompania){
    $sql="SELECT * FROM ArticuloExistente WHERE idCompania = ? AND estatus = 1";

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
function dispRepresentante($conn, $idCompania){
    $sql="SELECT * FROM Agente WHERE idCompania = ? AND estatus = 1";

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

function dispListaPrecioCompleta($conn, $idCompania){
    $sql="SELECT * FROM ListaPrecio WHERE idCompania = ? AND estatus = 1";

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
    exit();
}
function dispListaPreciosByCliente($conn, $entrada){
    $sql="SELECT * FROM Cliente WHERE idCliente=? AND estatus = 1";
    
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
    $sql="SELECT * FROM Orden WHERE idCliente=? AND estatusDB = 1";
    
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
    $sql="SELECT * FROM DirEnt WHERE idCliente=? AND estatus = 1";
    
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
    exit();
}

function dispArtByList($conn, $entrada){
    $sql="SELECT DISTINCT * FROM ListaPrecio WHERE idLista=? AND estatus = 1";
    
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
        echo "<option>".$row["idArticulo"]."</option>";

    }
    mysqli_stmt_close($stmt);
    
    exit();
}

function dispFolioByOrden($conn,$entrada){
    $sql="SELECT  * FROM ReporteOrden WHERE idOrden=? AND estatus = 1";
    
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
        echo "<option>".$row["folioRO"]."</option>";

    }
    mysqli_stmt_close($stmt);
    exit();
}
function dispArticuloRO($conn,$entrada){
    $sql="SELECT  * FROM ReporteOrden WHERE folioRO=? AND estatus = 1";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $entrada);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($resultData))
    {
        echo "<option>".$row["idArticulo"]."</option>";

    }
    mysqli_stmt_close($stmt);
    exit();
}
function dispFolio($conn, $entrada,$entrada2){
    $sql="SELECT * FROM ArticuloVendido WHERE idCliente=? AND idArticulo=? AND estatus = 1";
    
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
    exit();
}

function dispPrecio($conn, $entrada,$entrada2){
    $sql="SELECT * FROM ListaPrecio WHERE idLista=? AND idArticulo=? AND estatus = 1";
    
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
    exit();
}


function dispAlmacen($conn, $idCompania){
    $sql="SELECT * FROM Almacen WHERE idCompania = ? AND estatus = 1";

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
function dispClientes($conn, $idCompania)
{
    $sql="SELECT * FROM Cliente WHERE idCompania=? AND estatus = 1";

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
    exit();
}

function dispFolios($conn, $idCliente)
{
    $sql="SELECT folio FROM ArticuloVendido WHERE idCliente=? AND estatus = 1";

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
    exit();
}
//ARTICULO EXISTENTE METHODS
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

// updateArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
function updateArtExistente($conn,$idArticulo,$idCompania,$descripcion,$costo){
    // $sql = "INSERT INTO ArticuloExistente VALUES(?,?,?,?,?,?);";
    $sql = "UPDATE ArticuloExistente SET descripcion = ?, costosEstandar = ? WHERE idArticulo = ? AND idCompania = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sdss",$descripcion,$costo,$idArticulo,$idCompania);
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
//ARTICULO VENDIDO METHODS
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
    mysqli_stmt_bind_param($stmt,"isssi",$estatus,$idUsuario,$idArticulo,$idCompania,$folio);
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
//updateArtVCod
function updateArtVCod($conn,$codAviso,$folio,$idArticulo,$idCliente){
    $sql = "UPDATE ArticuloVendido SET codAviso= ? WHERE folio = ? AND idArticulo = ? AND idCliente = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"siss",$codAviso,$folio,$idArticulo,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        $msg="Actualizado exitosamente";
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}
function updateArtVUni($conn,$udVta,$folio,$idArticulo,$idCliente){
    $sql = "UPDATE ArticuloVendido SET udVta= ? WHERE folio = ? AND idArticulo = ? AND idCliente = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"siss",$udVta,$folio,$idArticulo,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        $msg="Actualizado exitosamente";
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}
//AGENTE METHODS
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
// updateAgente($conn,$_POST["idRepresentante"],$_POST["nomRepresentante"],$_POST["idCompania"]);
function updateAgente($conn,$idRepresentante,$nomRepresentante,$idCompania){
    // $sql = "INSERT INTO Agente VALUES(?,?,?,?,?);";
    $sql = "UPDATE Agente SET nomRepresentante = ? WHERE idRepresentante = ? AND idCompania = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$nomRepresentante,$idRepresentante,$idCompania);
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
//COMPANIA METHODS
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

function updateCompania($conn, $idCompania, $nombre){
    $sql = "UPDATE Compania SET nombre = ? WHERE idCompania = ? AND estatus = 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $nombre, $idCompania);
    
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
//CANTIDAD ENTREGADA METHODS
function createCantEnt($conn,$idCompania,$idOrden,$folio,$fechaMov,$hora,$secuencia,$tipoReg,$cantidad,$idArticulo,$posicion,$estatus,$idBaja){
    
    
    $sql = "INSERT INTO CantEntregada VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siissiidsiis",$idCompania,$idOrden,$folio,$fechaMov,$hora,$secuencia,$tipoReg,$cantidad,$idArticulo,$posicion,$estatus,$idBaja);
    
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        if(($tipoReg==2)||($tipoReg==3)){
            header("location: ../php/C_cantidadE.php?error=success");
            exit();
        }
        
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cantidadE.php?error=sqlerror");
        exit();
    }
    
}

function updateReOrden($conn,$idOrden,$folio,$cantidad){
    $sql = "UPDATE ReporteOrden SET entregado = ?, acumulado = ? WHERE idOrden = ? AND folioRO = ?;";
    $reg= especificacionesOrden($conn,$idOrden,$folio);
    if(is_null($reg->acumulado) && is_null($reg->entregado)){
        $entregado=$cantidad;
        $acumulado=$cantidad;
    }
    else{
        $entregado=$reg->entregado + $cantidad;
        $acumulado=$reg->acumulado + $cantidad;
    }

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iiii", $entregado, $acumulado, $idOrden,$folio);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        updateOrdenRO($conn,$idOrden,$acumulado);
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cantidadE.php?error=sqlerror2");
        exit();
    }
}
function updateReOrdenBaja($conn,$idOrden,$folio,$cantidad){
    $sql = "UPDATE ReporteOrden SET entregado = ?, acumulado = ? WHERE idOrden = ? AND folioRO = ?;";
    $reg= especificacionesOrden($conn,$idOrden,$folio);
    if(is_null($reg->acumulado) && is_null($reg->entregado)){
        $entregado=$cantidad;
        $acumulado=$cantidad;
    }
    else{
        $entregado=$reg->entregado - $cantidad;
        $acumulado=$reg->acumulado - $cantidad;
    }

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iiii", $entregado, $acumulado, $idOrden,$folio);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        updateOrdenRO($conn,$idOrden,$acumulado);
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cantidadE.php?error=sqlerror2");
        exit();
    }
}

function updateOrdenRO($conn,$idOrden,$acumulado){
    $sql = "UPDATE ReporteOrden SET acumulado = ? WHERE idOrden = ?;";
    
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $acumulado, $idOrden,);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cantidadE.php?error=success;");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cantidadE.php?error=sqlerror");
        exit();
    }
}

function updateReOrdenFact($conn,$idOrden,$numFac,$folio){
    $sql = "UPDATE ReporteOrden SET numFact = ? WHERE idOrden = ? AND folioRO = ?;";
    $stmt = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iii", $numFac, $idOrden, $folio);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_factura.php?error=success;");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_factura.php?error=sqlerror");
        exit();
    }
}

function especificacionesOrden($conn,$idOrden,$folio){
    $query = "SELECT * FROM ReporteOrden WHERE idOrden = $idOrden AND folioRO = $folio";
    $sql= mysqli_query($conn,$query);
    $reg=mysqli_fetch_object($sql);
    if($reg==mysqli_fetch_array($sql)){
        echo "No se encontró el registro";
        header("location: ../php/C_cantidadE.php?error=erroresp");
        exit();
    }
    else{
        
        return $reg;
        
    }
}
function bajaCantEnt($conn,$idOrden,$folio,$idUsuario){
    $sql = "UPDATE CantEntregada SET estatus = ?, idBaja = ? WHERE idOrden = ? AND folio = ?;";
    $estatus=0;
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isii",$estatus,$idUsuario,$idOrden, $folio);

    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_cantidadE.php?error=sqlerror");
        exit();
    }
}
//CLIENTE METHODS

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

function updateClienteLP($conn,$listaPrecios,$idCliente){
    $sql = "UPDATE Cliente SET idLista = ? WHERE idCliente = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$listaPrecios,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        $msg="Actualizado exitosamente";
        
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}

function updateClientenomCli($conn,$nomCliente,$idCliente){
    $sql = "UPDATE Cliente SET nombreCliente = ? WHERE idCliente = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$nomCliente,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        
        $msg="Actualizado exitosamente";
        
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}

function updateClienteEstatus($conn,$estatusCliente,$idCliente){
    $sql = "UPDATE Cliente SET estatusCliente = ? WHERE idCliente = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$estatusCliente,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        
        $msg="Actualizado exitosamente";
        
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}
function updateClienteRepre($conn,$idAnalista,$idCliente){
    $sql = "UPDATE Cliente SET analista = ?, idRepresentante = ? WHERE idCliente = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss",$idAnalista,$idAnalista,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        
        $msg="Actualizado exitosamente";
        
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}

function updateClientelimCredi($conn,$limCredito,$idCliente){
    $sql = "UPDATE Cliente SET limCredito = ? WHERE idCliente = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$limCredito,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        
        $msg="Actualizado exitosamente";
        
    }
    else{
        mysqli_stmt_close($stmt);
        $msg="Error al actualizar";
    }
    return $msg;
}

//ALMACEN METHODS
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
// updateAlmacen($conn,$_POST["idAlmacen"],$_POST["descripcion"],$_POST["idCompania"]);
function updateAlmacen($conn,$idAlmacen,$descripcion,$idCompania){
    // $sql = "INSERT INTO Almacen VALUES(?,?,?,?,?);";
    $sql = "UPDATE Almacen SET descripcion = ? WHERE idAlmacen = ? AND idCompania = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$descripcion,$idAlmacen,$idCompania);
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
//INVENTARIO METHODS
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

function updateInventario($conn,$idCompania,$idAlmacen,$idArticulo,$stock){
    $sql = "UPDATE Inventario SET idArticulo = ?, idAlmacen = ?, stock = ? WHERE idArticulo = ? AND idCompania = ? AND idAlmacen = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssdsss",$idArticulo,$idAlmacen,$stock,$idArticulo,$idCompania,$idAlmacen);
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
//FACTURA METHODS
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
//BLOQUEO METHODS
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

//LISTA PRECIOS METHODS
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
function updateListPrecios($conn,$idLista,$idArticulo,$descuento,$precio,$nivelDscto,$impDesc){
    $sql = "UPDATE ListaPrecio SET descuento = ?, precio = ?, nivelDscto = ?, impDesc = ? WHERE idLista = ? AND idArticulo = ? AND estatus = ?;";
    $estatus = 1;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ddidssi",$descuento,$precio,$nivelDscto,$impDesc,$idLista,$idArticulo,$estatus);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/C_listaPrecios.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_listaPrecios.php?error=sqlerror");
        exit();
    }
}
//DIRECCION ENTREGA METHODS
function createDirEnt($conn,$idCompania,$idCliente,$dirEnt,$nombreEntrega,$direccion,$municipio,$estado,$telefono,$observaciones,$codpost,$codruta,$pais,$rfc){
    $sql = "INSERT INTO DirEnt VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    $estatus = '1';
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
//updateDirEnt($conn,$_POST["codruta"],$_POST["idCliente"],$_POST["dirEnt"]);

function updateDirEnt($conn,$codruta,$idCliente,$dirEnt){
    $sql = "UPDATE DirEnt SET codRuta = ? WHERE idCliente = ? AND dirEnt = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$codruta,$idCliente,$dirEnt);
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
function dispOrdenByID($conn, $idOrden){
    $sql="SELECT * FROM Orden WHERE idOrden=? AND estatusDB = 1";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $idOrden);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    return $resultData;
    mysqli_stmt_close($stmt);
    exit();
}

function tiempoPorDepartamento($fechaDepartamento, $fechaInicial)
{
    return (strtotime($fechaDepartamento) - strtotime($fechaInicial)) / 86400; //Días
}

function dispOrdenesByFechas($conn,$idCompania,$fechaInicial,$fechaFinal){

    if(strlen($fechaFinal)<1)
    {
        date_default_timezone_set('UTC');
        $fechaFinal = date("Y-m-d");
    }
    
    $sql = "SELECT * FROM Orden JOIN Cliente ON Orden.idCliente = Cliente.idCliente WHERE Orden.estatus = 1 AND Orden.idCompania = ? AND fechaOrden >= ? AND fechaOrden <= ? ORDER BY fechaOrden";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sss", $idCompania,$fechaInicial,$fechaFinal);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    while($orders = mysqli_fetch_assoc($resultData))
    {
        //Order Info
        $noOrden       = $orders["idOrden"];
        $idCliente     = $orders["idCliente"];
        $nombreCliente = $orders["nombreCliente"];
        $fechaOrden    = $orders["fechaOrden"];

        //Tiempo por departamento
        $fac =  tiempoPorDepartamento($orders["tFac"],$fechaOrden);
        $cxc =  tiempoPorDepartamento($orders["tCXC"],$fechaOrden);
        $pre =  tiempoPorDepartamento($orders["tPRE"],$fechaOrden);
        $cst =  tiempoPorDepartamento($orders["tCST"],$fechaOrden);
        $ing =  tiempoPorDepartamento($orders["tING"],$fechaOrden);
        $pln =  tiempoPorDepartamento($orders["tPLN"],$fechaOrden);
        $fec =  tiempoPorDepartamento($orders["tFEC"],$fechaOrden);

        $total = $orders["total"];

        //Creating table
        echo "<tr>";
        echo "<td> $noOrden </td>";
        echo "<td> $idCliente </td>";
        echo "<td> $nombreCliente </td>";
        echo "<td> $fechaOrden </td>";
        echo "<td> $fac </td>";
        echo "<td> $cxc </td>";
        echo "<td> $pre </td>";
        echo "<td> $cst </td>";
        echo "<td> $ing </td>";
        echo "<td> $pln </td>";
        echo "<td> $fec </td>";
        echo "<td> $total </td>";
        echo "</tr>";

    }
    mysqli_stmt_close($stmt);
    exit();
}
?>
