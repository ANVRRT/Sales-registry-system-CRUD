<?php
require_once("dbh.inc.php");

function Clientes($conn){
    $sql="SELECT * FROM Cliente WHERE bloqueo=0 AND estatus=1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
    header("location: ../php/index.php?error=stmtfailed");
    exit();
    }
    //mysqli_stmt_bind_param($stmt,"is", $estado, $compania);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    //echo"\n############################################################\n";
    //$test=mysqli_fetch_assoc($resultData);

    return $resultData;
    mysqli_stmt_close($stmt);
}

function reporteArticulo($conn){
    //$sql="SELECT * FROM ArticuloExistente";
    $sql="SELECT * FROM((Factura JOIN ArticuloVendido ON Factura.idCliente=ArticuloVendido.idCliente) JOIN Cliente ON Cliente.idCliente=Factura.idCliente) JOIN ArticuloExistente ON ArticuloExistente.idArticulo=Factura.idArticulo WHERE bloqueo=0 AND ArticuloExistente.estatus=1 AND Factura.folio=ArticuloVendido.folio AND Factura.estatus=1 AND ArticuloVendido.estatus=1 AND Cliente.estatus=1";
    //$sql="SELECT * FROM(Factura JOIN ArticuloVendido ON Factura.idCliente=ArticuloVendido.idCliente) JOIN Cliente ON Cliente.idCliente=Factura.idCliente WHERE bloqueo=0 AND Factura.folio=ArticuloVendido.folio AND Factura.estatus=1 AND ArticuloVendido.estatus=1 AND Cliente.estatus=1";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
    header("location: ../php/index.php?error=stmtfailed");
    exit();
    }
    //mysqli_stmt_bind_param($stmt,"is", $estado, $compania);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $reporte=mysqli_fetch_assoc($resultData);

    $clienteDisponible=Clientes($conn);
    $rep=1;
    $cliente=mysqli_fetch_assoc($clienteDisponible);

    if($reporte["idCliente"]==$cliente["idCliente"]){
        $rep=$rep+1;
    }
    
    echo "<tr>";
    echo "<td>".$reporte["idArticulo"]."</td>";
    echo "<td>".$reporte["idCliente"]."</td>";
    echo "<td>".$reporte["idCompania"]."</td>";
    echo "<td>".$reporte["fechaFac"]."</td>";
    echo "<td>".$reporte["idRepresentante"]."</td>";
    echo "<td>".$reporte["udVta"]."</td>";
    echo "<td>".$reporte["divisa"]."</td>";
    echo "<td>".$reporte["descripcion"]."</td>";
    echo "<td>".$rep."</td>";
    echo "</tr>";
    //echo "<td>".$reporte["idCliente"]."</td><td>".strval($rep)."</td>";
    while($reporte=mysqli_fetch_assoc($resultData)){

        //echo "<br>".$value . "<br>";
        while($cliente=mysqli_fetch_assoc($clienteDisponible)){
            if($reporte["idCliente"]==$cliente["idCliente"]){
                $rep=$rep+1;
            }
        }
        //echo "<td>".$test["idCliente"]."</td><td>".strval($rep)."</td>";
        echo "<tr>";
        echo "<td>".$reporte["idArticulo"]."</td>";
        echo "<td>".$reporte["idCliente"]."</td>";
        echo "<td>".$reporte["idCompania"]."</td>";
        echo "<td>".$reporte["fechaFac"]."</td>";
        echo "<td>".$reporte["idRepresentante"]."</td>";
        echo "<td>".$reporte["udVta"]."</td>";
        echo "<td>".$reporte["divisa"]."</td>";
        echo "<td>".$reporte["descripcion"]."</td>";
        echo "<td>".$rep."</td>";
        echo "</tr>";
        $rep=0;
    }
    //mysqli_stmt_close($stmt);
    //return $resultData;
}
//reporteArticulo($conn);
?>