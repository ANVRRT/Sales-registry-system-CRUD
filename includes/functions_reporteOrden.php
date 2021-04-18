<?php
require_once("dbh.inc.php");
if (!isset($_SESSION["idUsuario"])) {
    session_start();
}

function fetchUdVta($conn, $idOrden) {
    $sql="SELECT * FROM ReporteOrden WHERE idOrden = ? AND fechaEntrega IS NOT NULL;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $idOrden);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);

    mysqli_stmt_close($stmt);

    $sql2="SELECT * FROM ArticuloVendido WHERE folio = ?;";
    
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2,$sql2))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt2,"i", $row["folio"]);
    mysqli_stmt_execute($stmt2);
    $articuloVendido = mysqli_stmt_get_result($stmt2);

    return $articuloVendido;
}

function fetchAddress($conn, $idOrden) {
    $sql1="SELECT * FROM Orden WHERE idOrden = ?";
    
    $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1,$sql1))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt1,"i", $idOrden);
    mysqli_stmt_execute($stmt1);
    $dirEnt = mysqli_stmt_get_result($stmt1);

    $row = mysqli_fetch_assoc($dirEnt);
    // dirEnt y idCliente
    mysqli_stmt_close($stmt1);

    $sql2="SELECT * FROM DirEnt WHERE dirEnt = ? AND idCliente = ?";

    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2,$sql2))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt2,"ss", $row["dirEnt"], $row["idCliente"]);
    mysqli_stmt_execute($stmt2);
    $direccionFull = mysqli_stmt_get_result($stmt2);

    return $direccionFull;

}

function fetchCount($conn, $idOrden) {
    $sql="SELECT COUNT(idOrden) FROM Orden WHERE idOrden = ? AND vREP = 1";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $idOrden);
    mysqli_stmt_execute($stmt);
    $consecutivo = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);


    return $consecutivo;

}

function fetchReporteOrden($conn, $idOrden){
    $sql="SELECT * FROM ReporteOrden WHERE idOrden = ? AND fechaEntrega IS NOT NULL;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $idOrden);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    /*
    $myObj->identificadorOrden = $resultData["idOrden"];
    $myObj->identificadorCliente = $resultData["idCliente"];
    $myObj->numeroConsecutivo = $consecutivo;
    $myObj->fecha = date("Ymd");
    $myObj->folio = $resultData["folio"];
    $myObj->moneda = $resultData["moneda"];
    $myObj->dirEnt = $resultData["dirEnt"];
    $myObj->fecha = $resultData["fechaEntrega"];
    $myObj->descripcion = $resultData["descripcion"];
    $myObj->idArticulo = $resultData["idArticulo"];
    $myObj->cantidad = $resultData["cantidad"];
    $myObj->precio = $resultData["precio"];

    $myJSON = json_encode($myObj);
    */
    
    mysqli_stmt_close($stmt);

    return $resultData;
}
?>