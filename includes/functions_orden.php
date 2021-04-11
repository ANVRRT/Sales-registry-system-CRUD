<?php
    require_once("dbh.inc.php");

    if(isset($_POST["A_Orden"]) || isset($_POST["A_articulo"])){
        $banderaOrden=prepararOrden($conn,$_POST["idOrden"]);
        $total=$_POST["precio"]*$_POST["cantidad"];
        $reg=preparaReporte($conn,$_POST["idCliente"]);
        $estatus=0;
        $costo=obtenerCosto($conn,$_POST["idArticulo"]);
        
        if(strlen($_POST["folio"])>0){
            $banderaFolio=prepararFolio($conn,$_POST["folio"]);
            if(!$banderaFolio){
                createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"],'1',null);
            }
            if(!$banderaOrden){
                createOrden($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$estatus,$_POST["idOrden"],$_POST["fechaSol"],'1',null,null,null,null,null,'1',$total,0,0,0,0,0,0,0,0,0,'1',null); 
            }
            else{
                $totalOrden=consultaTotal($conn,$_POST["idOrden"]);
                $newTotal= $totalOrden + $total;
                updateOrden($conn,$_POST["idOrden"],$newTotal);
            }
            createReporte($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["folio"],null,null,$_POST["idCliente"],$reg->nombreCliente,$_POST["dirEnt"],$_POST["idArticulo"],$_POST["idOrden"],$_POST["cantidad"],$_POST["precio"],
            $_POST["observaciones"],$_POST["fechaSol"],null,0,0,0,$total,$costo, $reg->divisa,null,'1',null);
              
        }
        else{
            createArtVendido($conn,'default',$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"],'1',null);
            
            if(!$banderaOrden){
                createOrden($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$estatus,$_POST["idOrden"],$_POST["fechaSol"],'1',null,null,null,null,null,'1',$total,0,0,0,0,0,0,0,0,0,'1',null); 
            }
            else{
                $totalOrden=consultaTotal($conn,$_POST["idOrden"]);
                $newTotal= $totalOrden - $total;
                updateOrden($conn,$_POST["idOrden"],$newTotal);
            }
            $regArt=consultarFolio($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"]);
            createReporte($conn,$_POST["idOrden"],$_POST["idCompania"],$regArt->folio,null,null,$_POST["idCliente"],$reg->nombreCliente,$_POST["dirEnt"],$_POST["idArticulo"],$_POST["idOrden"],$_POST["cantidad"],$_POST["precio"],
            $_POST["observaciones"],$_POST["fechaSol"],null,0,0,0,$total,$costo, $reg->divisa,null,'1',null);
            
        }
        
    }

    function obtenerCosto($conn,$idArticulo){
        $query = "SELECT * FROM ArticuloExistente WHERE idArticulo = $idArticulo";
        $sql= mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if($reg==mysqli_fetch_array($sql)){
            #echo "No se encontró el registro";
            exit();
        }
        else{
            return $reg->costosEstandar;
            
        }
    }
    function consultaTotal($conn,$idOrden){
        $query = "SELECT * FROM Orden WHERE idOrden = $idOrden";
        $sql= mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if($reg==mysqli_fetch_array($sql)){
            #echo "No se encontró el registro";
            exit();
        }
        else{
            return $reg->total;
            
        }
    }

    function consultarFolio($conn,$idArticulo,$idCompania,$idCliente,$cantidad,$codAviso,$udVta){
        $query = "SELECT * FROM ArticuloVendido WHERE idArticulo=$idArticulo AND idCompania= $idCompania AND idCliente= $idCliente AND stock= $cantidad AND codAviso= '$codAviso' AND udVta= '$udVta'";
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
    
    function createArtVendido($conn,$folio,$idArticulo,$idCompania,$idCliente,$stock,$codAviso,$udVta,$estatus,$idBaja){
        $sql = "INSERT INTO ArticuloVendido VALUES(?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt,"isssdssis",$folio,$idArticulo,$idCompania,$idCliente,$stock,$codAviso,$udVta,$estatus,$idBaja);
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

    function createOrden($conn,$idOrden,$idCompania,$idCliente,$dirEnt,$estatus,$ordenCompra,$fechaOrden,$tFac,$tCXC,$tPRE,$tCST,$tING,$tPLN,$tFEC,$total,$vFacturas,$vCXC,$vPrecios,$vCostos,$vIng,$vPLaneacion,$vServCli,$vREP,$vFEC,$estatusDB,$idBaja){
        $sql = "INSERT INTO Orden VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt,"ssssiissssssssdiiiiiiiiiis",$idOrden,$idCompania,$idCliente,$dirEnt,$estatus,$ordenCompra,$fechaOrden,$tFac,$tCXC,$tPRE,$tCST,$tING,$tPLN,$tFEC,$total,$vFacturas,$vCXC,$vPrecios,$vCostos,$vIng,$vPLaneacion,$vServCli,$vREP,$vFEC,$estatusDB,$idBaja);
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

    function createReporte($conn,$idOrden,$idCompania,$folio,$numFact,$ordenBaan,$idCliente,$nombreCliente,$dirEnt,$idArticulo,$ordenCompra,$cantidad,$precio,$descripcion,$fechaSolicitud,$fechaEntrega,$producido,$entregado,$acumulado,$total,$costo,$moneda,$nota,$estatus,$idBaja){
        $sql = "INSERT INTO ReporteOrden VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt,"ssiiissssiddssdiiiddssis",$idOrden,$idCompania,$folio,$numFact,$ordenBaan,$idCliente,$nombreCliente,$dirEnt,$idArticulo,$ordenCompra,$cantidad,$precio,$descripcion,$fechaSolicitud,$fechaEntrega,$producido,$entregado,$acumulado,$total,$costo,$moneda,$nota,$estatus,$idBaja);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            header("location: ../php/O_Capturar.php?error=succes");
            exit();
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_capturar.php?error=sqlerror3");
            exit();
        }
    }

    function updateOrden($conn,$idOrden,$total){
        $sql = "UPDATE Orden SET total = ? WHERE idOrden=?;";
        $stmt = mysqli_stmt_init($conn);
        $estatus=0;
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ds",$total,$idOrden,);

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

    function dispReporteOrdenByOrden($conn,$idOrden,$idCompania){
        $sql="SELECT * FROM ReporteOrden WHERE idCompania = ? AND idOrden = ? AND estatus= 1";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"ss", $idCompania,$idOrden);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        return $resultData;


        mysqli_stmt_close($stmt);
    }
    function dispOrdenByOrden($conn,$idOrden,$idCompania){
        $sql="SELECT * FROM Orden WHERE idCompania = ? AND idOrden = ? AND estatusDB = 1";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"ss", $idCompania,$idOrden);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        return $resultData;


        mysqli_stmt_close($stmt);
    }
?>