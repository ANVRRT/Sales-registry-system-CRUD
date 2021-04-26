<?php
    require_once("dbh.inc.php");
    if(isset($_GET["D_Orden"])){
        cancelOrder($conn,$_GET["idOrden"],$_GET["idUser"]);
        // echo $_GET["idOrden"];
        // echo $_GET["idUser"];
    }
    //ALTA ORDENES
    if(isset($_POST["A_Orden"]) || isset($_POST["A_articulo"])){
        $banderaOrden=prepararOrden($conn,$_POST["idOrden"]);
        $total=$_POST["precio"]*$_POST["cantidad"];
        $reg=preparaReporte($conn,$_POST["idCliente"]);
        $estatus=0;
        $costo=obtenerCosto($conn,$_POST["idArticulo"]);
        $act=creditoActual($conn,$_POST["idCliente"]);
       
        $revCst=$total+$act;
        $date = date('Y-m-d');
        if($reg->bloqueo!=1){

            if(strlen($_POST["folio"])>0){
                $banderaFolio=prepararFolio($conn,$_POST["folio"]);
                if(!$banderaFolio){
                    createArtVendido($conn,$_POST["folio"],$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"],'1',null);
                }
                if(!$banderaOrden){
                    createOrden($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$estatus,$_POST["idOrden"],$_POST["fechaSol"],$date,null,null,null,null,null,$date,$total,1,0,0,0,0,0,0,0,1,'1',null);   
                }
                else{
                    $totalOrden=consultaTotal($conn,$_POST["idOrden"]);
                    $newTotal= $totalOrden + $total;
                    updateOrden($conn,$_POST["idOrden"],$newTotal);
                }
                createReporte($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["folio"],'default',null,null,$_POST["idCliente"],$reg->nombreCliente,$_POST["dirEnt"],$_POST["idArticulo"],$_POST["idOrden"],$_POST["cantidad"],$_POST["precio"],
                $_POST["observaciones"],$_POST["fechaSol"],null,0,0,0,$total,$costo, $reg->divisa,null,'1',null);
                
            }
            else{
                createArtVendido($conn,'default',$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"],'1',null);
                
                if(!$banderaOrden){
                    createOrden($conn,$_POST["idOrden"],$_POST["idCompania"],$_POST["idCliente"],$_POST["dirEnt"],$estatus,$_POST["idOrden"],$_POST["fechaSol"],$date,null,null,null,null,null,$date,$total,1,0,0,0,0,0,0,0,1,'1',null);            }
                else{
                    $totalOrden=consultaTotal($conn,$_POST["idOrden"]);
                    $newTotal= $totalOrden + $total;
                    updateOrden($conn,$_POST["idOrden"],$newTotal);
                }
                $regArt=consultarFolio($conn,$_POST["idArticulo"],$_POST["idCompania"],$_POST["idCliente"],$_POST["cantidad"],$_POST["codAviso"],$_POST["udVta"]);
                createReporte($conn,$_POST["idOrden"],$_POST["idCompania"],$regArt->folio,'default',null,null,$_POST["idCliente"],$reg->nombreCliente,$_POST["dirEnt"],$_POST["idArticulo"],$_POST["idOrden"],$_POST["cantidad"],$_POST["precio"],
                $_POST["observaciones"],$_POST["fechaSol"],null,0,0,0,$total,$costo, $reg->divisa,null,'1',null);
                
            }
            
            if($revCst > $reg->limCredito){
                die("Error saldo");
            }
            else{
                die("Success saldo");
            }
        }
        else{
            die("Error cliente");

        }
        
    }
    //ACTUALIZACION ORDENES
    if(isset($_POST["U_Orden"])){
        $reg=getValuesOrden($conn,$_POST["idOrden"]);
        
        if(strlen($_POST["dirEnt"])>0){
            updateDirEnt($conn,$_POST["dirEnt"],$_POST["idOrden"]);
        }
        if(strlen($_POST["fechaSol"])>0){
            updateFecha($conn,$_POST["fechaSol"],$_POST["idOrden"]);
        }
        
        if(isset($_POST["vFac"])){
            if($_POST["vFac"]!= $reg->vFacturas){
                $date = date('Y-m-d');
                updateFacturas($conn,$_POST["vFac"],$date,$_POST["idOrden"]);
            }
              
        }
        else{
            $vFac=0;
            if($vFac != $reg->vFacturas){
                
                updateFacturas($conn,$vFac,null,$_POST["idOrden"]);
            }
        }

        if(isset($_POST["vCxC"])){
            if($_POST["vCxC"]!= $reg->vCxC){
                $date = date('Y-m-d');
                updateCxC($conn,$_POST["vCxC"],$date,$_POST["idOrden"]);
            }
              
        }
        else{
            $vCxC=0;
            if($vCxC != $reg->vCxC){
                
                updateCxC($conn,$vCxC,null,$_POST["idOrden"]);
            }
        }

        if(isset($_POST["vVta"])){
            if($_POST["vVta"]!= $reg->vPrecios){
                $date = date('Y-m-d');
                updatevPrecios($conn,$_POST["vVta"],$date,$_POST["idOrden"]);
            }
              
        }
        else{
            $vVta=0;
            if($vVta != $reg->vPrecios){
                
                updatevPrecios($conn,$vVta,null,$_POST["idOrden"]);
            }
        }

        if(isset($_POST["vCst"])){
            if($_POST["vCst"]!= $reg->vCostos){
                $date = date('Y-m-d');
                updatevCostos($conn,$_POST["vCst"],$date,$_POST["idOrden"]);
            }
              
        }
        else{
            $vCst=0;
            if($vCst != $reg->vCostos){
                
                updatevCostos($conn,$vCst,null,$_POST["idOrden"]);
            }
        }

        if(isset($_POST["vIng"])){
            if($_POST["vIng"]!= $reg->vIng){
                $date = date('Y-m-d');
                updatevIng($conn,$_POST["vIng"],$date,$_POST["idOrden"]);
            }
              
        }
        else{
            $vIng=0;
            if($vIng != $reg->vIng){
                
                updatevIng($conn,$vIng,null,$_POST["idOrden"]);
            }
        }

        if(isset($_POST["vFEC"])){
            if($_POST["vFEC"]!= $reg->vFEC){
                $date = date('Y-m-d');
                updatevFEC($conn,$_POST["vFEC"],$date,$_POST["idOrden"]);
            }
              
        }
        else{
            $vFEC=0;
            if($vFEC != $reg->vFEC){
                
                updatevFEC($conn,$vFEC,null,$_POST["idOrden"]);
            }
        }
        header("location: ../php/O_actualizar.php?error=success");
        exit();
    }
    //ACTUALIZAR ORDENES
    function updateDirEnt($conn,$dirEnt,$idOrden){
        $sql = "UPDATE Orden SET dirEnt = ? WHERE idOrden=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss",$dirEnt,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function updateFecha($conn,$fechaSol,$idOrden){
        $sql = "UPDATE Orden SET fechaOrden = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss",$fechaSol,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function updateFacturas($conn,$vFacturas,$tFac,$idOrden){
        $sql = "UPDATE Orden SET vFacturas = ?, tFac = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$vFacturas,$tFac,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function updateCxC($conn,$vCxC,$tCXC,$idOrden){
        $sql = "UPDATE Orden SET vCxC = ?, tCXC = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$vCxC,$tCXC,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function updatevPrecios($conn,$vPrecios,$tPRE,$idOrden){
        $sql = "UPDATE Orden SET vPrecios = ?, tPRE = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$vPrecios,$tPRE,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }

    function updatevCostos($conn,$vCostos,$tCST,$idOrden){
        $sql = "UPDATE Orden SET vCostos = ?, tCST = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$vCostos,$tCST,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function updatevIng($conn,$vIng,$tING,$idOrden){
        $sql = "UPDATE Orden SET vIng = ?, tING = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$vIng,$tING,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function updatevFEC($conn,$vFEC,$tFEC,$idOrden){
        $sql = "UPDATE Orden SET vFEC = ?, tFEC = ? WHERE idOrden = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$vFEC,$tFEC,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/O_actualizar.php?error=sqlerror");
            exit();
        }
    }
    function getValuesOrden($conn,$idOrden){
        $query = "SELECT * FROM Orden WHERE idOrden= $idOrden";
        $sql= mysqli_query($conn,$query);
        $reg=mysqli_fetch_object($sql);
        if($reg==mysqli_fetch_array($sql)){
            return false;
        }
        else{
            return $reg;
            
        }
    }
    //ALTA ORDENES

    function creditoActual($conn,$idCliente){
        $query = "SELECT SUM(total) AS sum FROM Orden WHERE idCliente = $idCliente";
        $sql= mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($sql); 
        $sum = $row['sum'];
        return $sum;
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
            die("Error Art");
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
            die("Error Orden");
            
        }

    }

    function createReporte($conn,$idOrden,$idCompania,$folio,$folioRO,$numFact,$ordenBaan,$idCliente,$nombreCliente,$dirEnt,$idArticulo,$ordenCompra,$cantidad,$precio,$descripcion,$fechaSolicitud,$fechaEntrega,$producido,$entregado,$acumulado,$total,$costo,$moneda,$nota,$estatus,$idBaja){
        $sql = "INSERT INTO ReporteOrden VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt,"isiiiissssiddsssiiiddssis",$idOrden,$idCompania,$folio,$folioRO,$numFact,$ordenBaan,$idCliente,$nombreCliente,$dirEnt,$idArticulo,$ordenCompra,$cantidad,$precio,$descripcion,$fechaSolicitud,$fechaEntrega,$producido,$entregado,$acumulado,$total,$costo,$moneda,$nota,$estatus,$idBaja);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
        }
        else{
            mysqli_stmt_close($stmt);
            die("Error Reporte");
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

    function cancelOrder($conn,$idOrden,$idBaja){
        $sql = "UPDATE Orden SET estatusDB = ?, idBaja = ? WHERE idOrden=?;";
        $stmt = mysqli_stmt_init($conn);
        $estatus=0;
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "iss",$estatus,$idBaja,$idOrden);

        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_close($stmt);
            $sql = "UPDATE ReporteOrden SET estatus = ?, idBaja = ? WHERE idOrden=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../php/index.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "iss",$estatus,$idBaja,$idOrden);
            if(mysqli_stmt_execute($stmt))
            {
                header("location: ../php/O_venta_proceso.php?error=success");

            }
            
        }
        else{
            mysqli_stmt_close($stmt);
            header("location: ../php/index.php?error=stmtfailed");
            exit();
        }
    }
?>