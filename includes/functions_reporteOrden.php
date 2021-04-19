<?php
require_once("dbh.inc.php");
if (!isset($_SESSION["idUsuario"])) {
    session_start();
}

function fetchRep($conn, $idOrden) {
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

    $sql2="SELECT * FROM Cliente WHERE idCliente = ?;";
    
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2,$sql2))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt2,"i", $row["idCliente"]);
    mysqli_stmt_execute($stmt2);
    $representante = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt2));

    return $representante;
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

function fetchUdVtaFol($conn,$folio){
    $sql="SELECT * FROM ArticuloVendido WHERE folio = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i", $folio);
    mysqli_stmt_execute($stmt);
    $articuloVendido = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ;
    

    return $articuloVendido["udVta"];
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

function generateTxtERP($conn,$idOrden){

    $result = fetchReporteOrden($conn,$idOrden);
    $consecutivo = fetchCount($conn, $idOrden);
    $direccionFull = fetchAddress($conn, $idOrden);
    $articuloVendido = fetchUdVta($conn, $idOrden);
    $representante = fetchRep($conn, $idOrden);

    $myresult = mysqli_fetch_assoc($result);
    
    $myrepresentante = $representante["idRepresentante"];
    $myidCompania = $representante["idCompania"];

    $myordenR = $myresult["idOrden"];
    $myorden = mb_strtoupper(uniqid($myordenR));

    $sql = "UPDATE ReporteOrden SET ordenBaan = ? WHERE idOrden = ?;";
    
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $myorden, $idOrden);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $mycliente = $myresult["idCliente"];
    $myfolio = $myresult["idOrden"];
    $myOrdenCompra = "";
    $mydirEnt = $myresult["dirEnt"];
    $myfechaEntrega = $myresult["fechaEntrega"];

    $myfechaFull = explode('-', $myfechaEntrega);

    $myyear = $myfechaFull[0];
    $mymonth = $myfechaFull[1];
    $myday = $myfechaFull[2];

    $mydescripcion = $myresult["descripcion"];
    $myidArticulo = $myresult["idArticulo"];
    $mycantidad = $myresult["cantidad"];
    $myprecio = $myresult["precio"];
    $mymoneda = $myresult["moneda"];
    $mynombreCliente = $myresult["nombreCliente"];

    $myconsecutivo = mysqli_fetch_assoc($consecutivo);
        
    $mycount = $myconsecutivo["COUNT(idOrden)"] +1;
    $folloupcount = $myconsecutivo["COUNT(idOrden)"] +2;

    $mydireccionFull = mysqli_fetch_assoc($direccionFull);
    
    $mydireccion = $mydireccionFull["direccion"];
    $mymunicipio = $mydireccionFull["municipio"];
    $mycodPost = $mydireccionFull["codPost"];

    $myarticuloVendido = mysqli_fetch_assoc($articuloVendido);

    $myudVta = $myarticuloVendido["udVta"];
    $txtnameOrden = "PV-$idOrden-$mycliente-$myrepresentante-$myidCompania.txt";
    $myfile = fopen("../txtBaan/$txtnameOrden", "w") or die ("Unable to open file!");
    $lineENV = 'ENV' . '|' . $myorden . '|WWWapps|WWW|ORDER||' . "\n";
    $lineHDR = 'HDR' . '|' . $myorden . '|' . $mycliente . '|' . 'PDA' . '-' . $mycount . '-' . $mycliente . '|' . $myfolio . '|' . date("Ymd") . '||'.$myOrdenCompra.'|MOD|'.$mymoneda.'|MEX||0' . "\n";
    $lineHAD1 = 'HAD' . '|' . $myorden . '|' . 'DEL' . '|||' . $mynombreCliente . '||' . $mydireccion . '||' . $mymunicipio . '||' . $mycodPost . '|MEXICO|MEX||' . "\n";
    $lineHAD2 = 'HAD' . '|' . $myorden . '|' . 'INV' . '|||' . $mynombreCliente . '||' . $mydireccion . '||' . $mymunicipio . '||' . $mycodPost . '|MEXICO|MEX||' . "\n";
    $lineHTX = 'HTX' . '|' . $myorden . '|(Fecha de Entrega: ' . $myday . '/' . $mymonth . '/' . $myyear . ') ' . $mydescripcion  . "\n";
    $lineLIN1 = 'LIN' . '|' . $myorden . '|' . $mycount . '|' . $myidArticulo . '|ZZ|' . $mycantidad . '|' . $myudVta . '|' . $myyear . $mymonth . $myday . '|0|' . $myprecio . '||' . "\t" . $myidArticulo . "\n";
    // $lineLIN2 = 'LIN' . '|' . $myorden . '|' . $folloupcount . '|' . $myidArticulo . '|ZZ|' . $mycantidad . '|' . $myudVta . '|' . $myyear . $mymonth . $myday . '|0|' . $myprecio . '||' . "\t" . $myidArticulo . "\n";

    fwrite($myfile, $lineENV);
    fwrite($myfile, $lineHDR);
    fwrite($myfile, $lineHAD1);
    fwrite($myfile, $lineHAD2);
    fwrite($myfile, $lineHTX);
    fwrite($myfile, $lineLIN1);
    while($row = mysqli_fetch_assoc($result)){
    
        $mycount = $mycount+1;
        $myidArticulo = $row["idArticulo"];
        $mycantidad = $row["cantidad"];
        
        $myudVta = fetchUdVtaFol($conn,$row["folio"]);
        $myfechaEntrega = $row["fechaEntrega"];
        $myfechaFull = explode('-', $myfechaEntrega);
        $myyear = $myfechaFull[0];
        $mymonth = $myfechaFull[1];
        $myday = $myfechaFull[2];
        $myprecio = $row["precio"];
        $myidArticulo = $row["idArticulo"];

        $lineLIN = 'LIN' . '|' . $myorden . '|' . $mycount . '|' . $myidArticulo . '|ZZ|' . $mycantidad . '|' . $myudVta . '|' . $myyear . $mymonth . $myday . '|0|' . $myprecio . '||' . "\t" . $myidArticulo . "\n";
        
        fwrite($myfile, $lineLIN);                                        
    }
    // fwrite($myfile, $lineLIN2);
    fclose($myfile);

    
}
?>