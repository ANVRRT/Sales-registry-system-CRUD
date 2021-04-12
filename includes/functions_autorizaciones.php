<?php
require_once("dbh.inc.php");

if(isset($_GET["A_CXC"])){
    A_CXC($conn,$_GET["idOrden"],$_GET["idCliente"]);
}
if(isset($_GET["A_CST"])){
    A_CST($conn,$_GET["idOrden"],$_GET["idCliente"]);
}
if(isset($_GET["A_ING"])){
    A_ING($conn,$_GET["idOrden"],$_GET["idCliente"]);
}

if(isset($_GET["MA_VTA"])){
    // location.href="../includes/functions_autorizaciones.php?A_VTA=1&idOrden="+orden+"&folio="+folio+"&articulo="+articulo+"&cantidad="+cantidad+"&precio="+precio+"&fsolicitud="+fsolicitud+"&fentrega="+fentrega;
    // echo "HOLA";
    // echo "FolioRO".$_GET["folioRO"]."Orden: ".$_GET["idOrden"]." Folio: ".$_GET["folio"]." Artículo: ".$_GET["articulo"]." Cantidad: ".$_GET["cantidad"]." Precio: ".$_GET["precio"]." FSolicitud: ".$_GET["fsolicitud"]." FEntrega:".$_GET["fentrega"];
    
    MA_VTA($conn,$_GET["idOrden"],$_GET["folioRO"],$_GET["cantidad"],$_GET["precio"],$_GET["fsolicitud"],$_GET["fentrega"]);

}
if(isset($_GET["A_VTA"])){
    A_VTA($conn,$_GET["idOrden"],$_GET["idCliente"]);
}


// if(isset($_POST["A_VTA"])){
//     // echo $_POST["PO_ORD"]."<br>".$_POST["PO_ART"]."<br>".$_POST["PO_CANT"]."<br>".$_POST["PO_PRECIO"]."<br>".$_POST["PO_FCOMPRA"]."<br>".$_POST["PO_FCLIENTE"];
//     A_Venta($conn,$_POST["PO_ORD"],$_POST["PO_ART"],$_POST["PO_CANT"],$_POST["PO_PRECIO"],$_POST["PO_FCOMPRA"],$_POST["PO_FCLIENTE"]);
// }

// function A_Venta($conn,$idOrden,$idArticulo,$cantidad,$precio,$fechaSolicitud,$fechaEntrega){
//     $sql= "UPDATE Cliente SET bloqueo= 1 WHERE idCliente= ?";

//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt,$sql))
//     {
//         header("location: ../php/index.php?error=stmtfailed");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt,"i",$id);
//     if(mysqli_stmt_execute($stmt))
//     {
//         mysqli_stmt_close($stmt);
//         header("location: ../php/C_bloqueoCliente.php?error=success");
//         exit();
//     }
//     else{
//         mysqli_stmt_close($stmt);
//         header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
//         exit();
//     }
// }

function A_CXC($conn,$idOrden,$idCliente){
    $sql= "UPDATE Orden SET vCxC= 1, tCXC = ? WHERE idOrden = ? AND idCliente= ?";
    $date = date('Y-m-d');

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$date,$idOrden,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_base.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_detalle.php?error=sqlerror");
        exit();
    }
}

function A_CST($conn,$idOrden,$idCliente){
    $sql= "UPDATE Orden SET vCostos= 1, tCST = ? WHERE idOrden = ? AND idCliente= ?";
    $date = date('Y-m-d');

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$date,$idOrden,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_base.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
        exit();
    }
}

function A_ING($conn,$idOrden,$idCliente){
    $sql= "UPDATE Orden SET vIng= 1, tING = ? WHERE idOrden = ? AND idCliente= ?";
    $date = date('Y-m-d');

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$date,$idOrden,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_base.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
        exit();
    }
}

function A_VTA($conn,$idOrden,$idCliente){
    $sql= "UPDATE Orden SET vPrecios= 1, tPRE = ? WHERE idOrden = ? AND idCliente= ?";
    $date = date('Y-m-d');

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$date,$idOrden,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_base.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
        exit();
    }
}
// MA_VTA($conn,$_GET["idOrden"],$_GET["folio"],$_GET["articulo"],$_GET["cantidad"],$_GET["precio"],$_GET["fsolicitud"],$_GET["fentrega"])
function MA_VTA($conn,$idOrden,$folioRO,$cantidad,$precio,$fsolicitud,$fentrega){
    $Orden = getOrden($conn,$idOrden);
    $ROrden = getReporteOrden($conn,$folioRO);
    $totalO = $Orden["total"];
    $totalRO = $ROrden["total"];
    $AtotalO = $totalO - $totalRO;
    $NtotalRO = $cantidad * $precio;
    $NtotalO = $AtotalO + $NtotalRO;

    $sql= "UPDATE ReporteOrden SET cantidad = ?, precio = ?, fechaSolicitud = ?, fechaEntrega = ?, total = ? WHERE folioRO = ?";
    //Cantidad, precio FSolicitud, FEntrega
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ddssdi",$cantidad,$precio,$fsolicitud,$fentrega,$NtotalRO,$folioRO);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        updatetOrden($conn,$idOrden,$NtotalO);
        
        header("location: ../php/A_ordenes_detalle.php?idOrden=$idOrden/$totalO/$totalRO/$NtotalO/$NtotalRO");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_detalle.php?error=$NtotalRO");
        exit();
    }
}

function getOrden($conn,$idOrden){
    $sql="SELECT * FROM Orden WHERE idOrden = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $idOrden);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }


    mysqli_stmt_close($stmt);

}

function getReporteOrden($conn,$folioRO){
    $sql="SELECT * FROM ReporteOrden WHERE folioRO = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $folioRO);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }


    mysqli_stmt_close($stmt);

}

function updatetOrden($conn,$idOrden,$total){
    $sql= "UPDATE Orden SET total = ? WHERE idOrden = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ds",$total, $idOrden);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}
?>