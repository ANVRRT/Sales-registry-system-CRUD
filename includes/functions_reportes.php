<?php
require_once("dbh.inc.php");


function dispOrdenes($conn, $idCompania){
    $sql = "SELECT * FROM Orden JOIN Cliente ON Orden.idCliente = Cliente.idCliente WHERE Orden.estatus = 1 AND Orden.idCompania = ? ORDER BY fechaOrden";

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

function dispAllOrders($conn, $idCompania){
    $sql =  "SELECT * FROM Orden JOIN ReporteOrden ON Orden.idOrden = ReporteOrden.idOrden JOIN ArticuloVendido ON ReporteOrden.folio = ArticuloVendido.folio WHERE Orden.idCompania = ? ORDER BY Orden.idOrden";

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