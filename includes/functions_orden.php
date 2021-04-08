<?php
    require_once("dbh.inc.php");

    if(isset($_POST["A_Orden"]) || isset($_POST["A_articulo"])){
        $banderaOrden=prepararOrden($conn,$_POST["idOrden"]);
        $total=$_POST["precio"]*$_POST["cantidad"];
        $estatus=0;
        if(strlen($_POST["folio"])>0){
            $banderaFolio=prepararFolio($conn,$_POST["folio"]);
            if(!$banderaFolio){
                createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"]);
            }
            
        }
        else{
            createArtVendido($conn,'default',$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"]);
        }
        
        if(!$banderaOrden){
            createOrden($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$estatus,$_POST["idOrden"],$_POST["fechaSol"],null,null,null,null,null,null,null,$total,0,0,0,0,0,0,0,0,0); 
        }
       
        $reg=preparaReporte($conn,$_POST["idCliente"]);
        createReporte($conn,$_POST["idOrden"],$_POST["idCompania"],'default',$_POST["numFact"],null,$_POST["idCliente"],$reg->nombreCliente,$_POST["dirEnt"],$_POST["idArticulo"],$_POST["idOrden"],$_POST["cantidad"],$_POST["precio"],
        $_POST["observaciones"],$_POST["fechaSol"],null,0,0,0,$total,null, $reg->divisa,null);
    }

    function prepararFolio($conn,$folio){
        $query = "SELECT * FROM ArticuloVendido WHERE folio= $folio";
        $sql= mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if($reg==mysqli_fetch_array($sql)){
            return false;
        }
        else{
            return true;
            
        }
    }

    function prepararOrden($conn,$idOrden){
        $query = "SELECT * FROM Orden WHERE idOrden= $idOrden";
        $sql= mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if($reg==mysqli_fetch_array($sql)){
            return false;
        }
        else{
            return true;
            
        }
    }

    function preparaReporte($conn,$idCliente){
        $query = "SELECT * FROM Cliente WHERE idCliente= $idCliente";
        $sql= mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if($reg==mysqli_fetch_array($sql)){
            #echo "No se encontró el registro";
            exit();
        }
        else{
            return $reg;
            
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
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_Capturar.php?error=sqlerror");
            exit();
        }
    }

    function createOrden($conn,$idOrden,$idCompania,$idCliente,$dirEnt,$estatus,$ordenCompra,$fechaOrden,$tFac,$tCXC,$tPRE,$tCST,$tING,$tPLN,$tFEC,$total,$vFacturas,$vCXC,$vPrecios,$vCostos,$vIng,$vPLaneacion,$vServCli,$vREP,$vFEC){
        $sql = "INSERT INTO Orden VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt,"ssssiissssssssdiiiiiiiii",$idOrden,$idCompania,$idCliente,$dirEnt,$estatus,$ordenCompra,$fechaOrden,$tFac,$tCXC,$tPRE,$tCST,$tING,$tPLN,$tFEC,$total,$vFacturas,$vCXC,$vPrecios,$vCostos,$vIng,$vPLaneacion,$vServCli,$vREP,$vFEC);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_capturar.php?error=sqlerror2");
            exit();
        }

    }

    function createReporte($conn,$idOrden,$idCompania,$folio,$numFact,$ordenBaan,$idCliente,$nombreCliente,$dirEnt,$idArticulo,$ordenCompra,$cantidad,$precio,$descripcion,$fechaSolicitud,$fechaEntrega,$producido,$entregado,$acumulado,$total,$costo,$moneda,$nota){
        $sql = "INSERT INTO ReporteOrden VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt,"ssiiissssiddssdiiiddss",$idOrden,$idCompania,$folio,$numFact,$ordenBaan,$idCliente,$nombreCliente,$dirEnt,$idArticulo,$ordenCompra,$cantidad,$precio,$descripcion,$fechaSolicitud,$fechaEntrega,$producido,$entregado,$acumulado,$total,$costo,$moneda,$nota);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            header("location: ../php/O_capturar.php?error=success");
            exit();
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_capturar.php?error=sqlerror3");
            exit();
        }
    }
?>