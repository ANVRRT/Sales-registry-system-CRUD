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

//Parametros Funciones
if(isset($_POST["A_parametros"])){ 
    createParametros($conn,$_POST["nameServer"],$_POST["nameUser"],$_POST["namePassword"],$_POST["namePort"],$_POST["idCompania"],$_POST["nameState"]);
}
if(isset($_POST["B_parametros"])){ 
    deleteParametros($conn,$_POST["nameServer"],$_POST["nameUser"]);
}
if(isset($_POST["U_parametros"])){ 
    updateParametros($conn,$_POST["nameServer"],$_POST["nameUser"],$_POST["namePassword"],$_POST["namePort"],$_POST["idCompania"],$_POST["nameState"]);
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
    $sql = "INSERT INTO Permiso VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if($permiso == "po_autorizarOrdenCXC"){
        $descripcion = "Autorizar Orden CXC";
    }
    if($permiso == "po_autorizarOrdenVTA"){
        $descripcion = "Autorizar Orden VTA";
    }
    if($permiso == "po_autorizarOrdenCST"){
        $descripcion = "Autorizar Orden CST";
    }
    if($permiso == "po_autorizarOrdenING"){
        $descripcion = "Autorizar Orden ING";
    }
    if($permiso == "po_autorizarOrdenPLN"){
        $descripcion = "Autorizar Orden PLN";
    }
    if($permiso == "po_autorizarOrdenADM"){
        $descripcion = "Autorizar Orden ADM";
    }

    if($permiso == "po_capturar"){
        $descripcion = "Capturar orden";
    }
    if($permiso == "po_modificar"){
        $descripcion = "Modificar orden";
    }
    if($permiso == "po_estatus"){
        $descripcion = "Estatus de ordenes";
    }
    if($permiso == "po_proceso"){
        $descripcion = "Ordenes en proceso";
    }
    if($permiso == "po_procesadas"){
        $descripcion = "Ordenes procesadas";
    }

    if($permiso == "padm_permisos"){
        $descripcion = "Administración Permisos";
    }
    if($permiso == "padm_roles"){
        $descripcion = "Administración Roles";
    }
    if($permiso == "padm_usuarios"){
        $descripcion = "Administración Usuarios";
    }
    if($permiso == "padm_registro"){
        $descripcion = "Creación de usuarios";
    }

    if($permiso == "psadm"){
        $descripcion = "Permiso Super Admin";
    }

    if($permiso == "pb_artCliente"){
        $descripcion = "Busqueda Artículo Cliente";
    }
    if($permiso == "pb_ordenVenta"){
        $descripcion = "Busqueda Orden Venta";
    }

    if($permiso == "pc_compania"){
        $descripcion = "Catálogo Compania";
    }
    if($permiso == "pc_inventario"){
        $descripcion = "Catálogo Inventario";
    }
    if($permiso == "pc_almacen"){
        $descripcion = "Catálogo Almacen";
    }
    if($permiso == "pc_clientes"){
        $descripcion = "Agregar Cliente";
    }
    if($permiso == "pc_agente"){
        $descripcion = "Catálogo Agente";
    }
    if($permiso == "pc_artExistente"){
        $descripcion = "Catálogo Artículo Existente";
    }
    if($permiso == "pc_artVendido"){
        $descripcion = "Catálogo Artículo Vendido";
    }
    if($permiso == "pc_dirEnt"){
        $descripcion = "Catálogo Dirección Entregada";
    }
    if($permiso == "pc_listPrecios"){
        $descripcion = "Catálogo Lista Precios";
    }
    if($permiso == "pc_factura"){
        $descripcion = "Catálogo Factura";
    }
    if($permiso == "pc_cantEntregada"){
        $descripcion = "Catálogo Cantidad Entregada";
    }
    if($permiso == "pc_bloq_Cliente"){
        $descripcion = "Catálogo Bloqueo Cliente";
    }
    if($permiso == "pc_archivos"){
        $descripcion = "Subir Archivos";
    }

    if($permiso == "pr_tiempoDepto"){
        $descripcion = "Reporte Tiempo Departamento";
    }
    if($permiso == "pr_ordenes"){
        $descripcion = "Reporte de todas las ordenes";
    }
    if($permiso == "pr_reportes"){
        $descripcion = "Reportes completos";
    }

    
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssss",$idUsuario,$permiso,$idCompania,$descripcion);
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


function createParametros($conn,$Server,$User,$Password,$Port,$Compania,$State){
    if(empty($Port)) {
        $Port = null;
    }
    $sql = "INSERT INTO Parametro VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssssi",$Server,$User,$Password,$Port,$Compania,$State);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_parametros.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_parametros.php?error=sqlerror");
        exit();
    }
}

function deleteParametros($conn,$Server,$User){
    $sql = "DELETE FROM Parametro WHERE servidor = ? AND idUsuario = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$Server,$User);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_parametros.php?error=success2");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_parametros.php?error=sqlerror");
        exit();
    }
}

function updateParametros($conn,$Server,$User,$Password,$Port,$Compania,$State){
    if(empty($Port)) {
        $Port = null;
    }
    $sql = "UPDATE Parametro SET servidor = ?, idUsuario = ?, contrasena = ?, puerto = ?, idCompania = ?, activo = ? WHERE servidor = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssssis",$Server,$User,$Password,$Port,$Compania,$State,$Server);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_parametros.php?error=success3");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/ADM_parametros.php?error=sqlerror");
        exit();
    }
}

function dispParametros($conn, $idCompania){
    $sql="SELECT * FROM Parametro WHERE idCompania = ?";

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
?>