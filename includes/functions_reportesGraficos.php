<?php
require_once("dbh.inc.php");

function reporteArticulo($conn){
    //$sql="SELECT * FROM ArticuloExistente";
    //$sql="SELECT * FROM ArticuloExistente JOIN Cliente ON Orden.idCliente = Cliente.idCliente WHERE vFacturas = 1 AND vCxC = 1 AND vPrecios = 1 AND vCostos = 1 AND vIng = 1 AND vPlaneacion = 1 AND vServCli = 1 AND vREP = 1 AND vFEC = 1 AND Orden.idCompania = ? ";

    $sql="SELECT * FROM Factura,ArticuloExistente WHERE ArticuloExistente.idArticulo=Factura.idArticulo";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
    header("location: ../php/index.php?error=stmtfailed");
    exit();
    }
    //mysqli_stmt_bind_param($stmt,"is", $estado, $compania);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    //return $resultData;
}
?>