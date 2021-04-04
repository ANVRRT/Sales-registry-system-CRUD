<?php
require_once("dbh.inc.php");

if(isset($_POST["A_artE"])){
    createArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["descripcion"],$_POST["costo"]);
}
if(isset($_POST["B_artE"])){ 
    deleteArtExistente($conn,$_POST["idArticulo"],$_POST["idCompania"]);
}
if(isset($_POST["A_agente"])){ //AGENTE
    createAgente($conn,$_POST["idRepresentante"],$_POST["nomRepresentante"],$_POST["idCompania"]);
}
if(isset($_POST["B_agente"])){ 
    deleteAgente($conn,$_POST["idRepresentante"]);
}
if(isset($_POST["A_almacen"])){ //ALMACEN
    createAlmacen($conn,$_POST["idAlmacen"],$_POST["descripcion"],$_POST["idCompania"]);
}
if(isset($_POST["B_almacen"])){
    deleteAlmacen($conn,$_POST["idAlmacen"]);
}
if(isset($_POST["A_artV"])){ //ARTCLIENTEVendido
    createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["stock"],$_POST["codAviso"],$_POST["udVta"]);
}
if(isset($_POST["B_artV"])){ 
    deleteArtVendido($conn,$_POST["folio"]);
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
        $_POST["estatus"],$_POST["idAnalista"],$_POST["divisa"],$_POST["limCredito"],$_POST["saldoOrden"],$_POST["saldoFactura"],$_POST["bloqueo"]);
    }
    else{
        $bloqueo=0;
        createCliente($conn,$_POST["idCliente"],$_POST["idCompania"],$_POST["idRepresentante"], $_POST["listaPrecios"],$_POST["idAlmacen"],$_POST["nomCliente"],
        $_POST["estatus"],$_POST["idAnalista"],$_POST["divisa"],$_POST["limCredito"],$_POST["saldoOrden"],$_POST["saldoFactura"],$bloqueo);
    }
}
if(isset($_POST["B_cliente"])){
   deleteCliente($conn,$_POST["idCliente"]);
}
if(isset($_POST["A_Compania"])){ //Compañia
    createCompania($conn,$_POST["idCompania"],$_POST["nombre"]);
}
if(isset($_POST["B_Compania"])){
    deleteCompania($conn,$_POST["idCompania"]);
}
if(isset($_REQUEST['estadoB'])==2){//BLOQUEO CLIENTE
    bClient($conn, $_GET['idB']);
    //echo($_REQUEST['idB']);
}
if(isset($_REQUEST['estadoD'])==1){
    dClient($conn, $_REQUEST['idD']);
    //echo($_REQUEST['idD']);
}
if(isset($_POST["A_Facs"])){ //Factura
    createFactura($conn,$_POST["numFac"],$_POST["idCompania"],$_POST["idOrden"],$_POST["idArticulo"],$_POST["idCliente"],$_POST["idFolio"],$_POST["entrega"],$_POST["tipoTrans"],$_POST["fechaFac"]);
}
if(isset($_POST["B_Facs"])){
    deleteFactura($conn,$_POST["numFac"]);
}
if(isset($_POST["A_inventario"])){ //Inventario
    createInventario($conn,$_POST["idCompania"],$_POST["idAlmacen"],$_POST["idArticulo"],$_POST["stock"]);
}
if(isset($_POST["B_inventario"])){
    deleteInventario($conn,$_POST["idArticulo"]);
}
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
// }if(isset($_POST["A_artE"])){ //EXTRA Plantilla?
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
    if(mysqli_fetch_assoc($resultData))
    {
        return $resultData;
    }
    else{
        $result = "No hay agentes existentes para esta compania";
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function dispListaPrecios($conn, $idCompania){
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
    if(mysqli_fetch_assoc($resultData))
    {
        return $resultData;
    }
    else{
        $result = "No hay lista de precios existentes para esta compania";
        return $result;
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
    if(mysqli_fetch_assoc($resultData))
    {
        return $resultData;
    }
    else{
        $result = "No hay almacenes existentes para esta compania";
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
function deleteArtExistente($conn,$idArticulo, $idCompania){
    $sql = "DELETE FROM ArticuloExistente WHERE idArticulo = ? AND idCompania = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$idArticulo, $idCompania);
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
function createCliente($conn,$idCliente,$idCompania,$idRepresentante,$listaPrecios,$idAlmacen,$nomCliente,$estatus,$idAnalista,$divisa,$limCredito,$saldoOrden,$saldoFactura,$bloqueo)
{
    $sql = "INSERT INTO Cliente VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssssissiddi",$idCliente,$idCompania,$idRepresentante,$listaPrecios,$idAlmacen,$nomCliente,$estatus,$idAnalista,$divisa,$limCredito,$saldoOrden,$saldoFactura,$bloqueo);
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
function deleteCliente($conn,$idCliente){
    $sql = "DELETE FROM Cliente WHERE idCliente = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idCliente);
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
    $sql = "INSERT INTO Almacen VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$idAlmacen,$descripcion,$idCompania);
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
function deleteAlmacen($conn,$idAlmacen){
    $sql = "DELETE FROM Almacen WHERE idAlmacen = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idAlmacen);
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
function createInventario($conn,$idCompania,$idAlmacen,$idArticulo,$stock){
    $sql = "INSERT INTO Inventario VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssd",$idCompania,$idAlmacen,$idArticulo,$stock);
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

function deleteInventario($conn,$idArticulo){
    $sql = "DELETE FROM Inventario WHERE idArticulo = ?";
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
        header("location: ../php/C_inventario.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_inventario.php?error=sqlerror");
        exit();
    }
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
    if(mysqli_fetch_assoc($resultData))
    {
        return $resultData;
    }
    else{
        $result = "No hay clientes existentes";
        return $result;
    }

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
    if(mysqli_fetch_assoc($resultData))
    {
        return $resultData;
    }
    else{
        $result = "No hay clientes existentes";
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createFactura($conn,$numFact,$idCompania,$idOrden,$idArticulo,$idCliente,$folio,$entrega,$tipoTrans,$fechaFac)
{
    $sql = "INSERT INTO Factura VALUES(?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssssiiss",$numFact,$idCompania,$idOrden,$idArticulo,$idCliente,$folio,$entrega,$tipoTrans,$fechaFac);
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

function deleteFactura($conn,$numFact){
    $sql = "DELETE FROM Factura WHERE numFact = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$numFact);
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

function disClients($conn, $estado, $compania){
    $sql="SELECT * FROM Cliente WHERE bloqueo = ? AND idCompania = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"is", $estado, $compania);
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