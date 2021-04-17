<?php
    require_once("dbh.inc.php");

    function execAgente($conn, $idRepresentante, $nomRepresentante, $idCompania, $estatus, $idBaja){
        $sql = "INSERT INTO Agente(idRepresentante, nomRepresentante, idCompania, estatus, idBaja) VALUES('$idRepresentante', '$nomRepresentante', '$idCompania', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "Agente($idRepresentante, $nomRepresentante, $idCompania, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execAlmacen($conn, $idAlmacen, $descripcion, $idCompania, $estatus, $idBaja){
        $sql = "INSERT INTO Almacen(idAlmacen, descripcion, idCompania, estatus, idBaja) VALUES('$idAlmacen', '$descripcion', '$idCompania', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "Almacen($idAlmacen, $descripcion, $idCompania, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execArtExistente($conn, $idArticulo, $idCompania, $descripcion, $costosEstandar, $estatus, $idBaja){
        $sql = "INSERT INTO ArticuloExistente(idArticulo, idCompania, descripcion, costosEstandar, estatus, idBaja) VALUES('$idArticulo', '$idCompania', '$descripcion', $costosEstandar, $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "ArticuloExistente($idArticulo, $idCompania, $descripcion, $costosEstandar, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execArtVendido($conn, $folio, $idArticulo, $idCompania, $idCliente, $stock, $codAviso, $udVTA, $estatus, $idBaja){
        $sql = "INSERT INTO ArticuloVendido(folio, idArticulo, idCompania, idCliente, stock, codAviso, udVTA, estatus, idBaja) VALUES($folio, '$idArticulo', '$idCompania', '$idCliente', $stock, '$codAviso', '$udVTA', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "ArticuloVendido($folio, $idArticulo, $idCompania, $idCliente, $stock, $codAviso, $udVTA, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execCantEntregada($conn, $idCompania, $idOrden, $folio, $fechaMov, $hora, $secuencia, $tipoReg, $cantidad, $idArticulo, $posicion, $estatus, $idBaja){
        $sql = "INSERT INTO CantEntregada(idCompania, idOrden, folio, fechaMov, hora, secuencia, tipoReg, cantidad, idArticulo, posicion, estatus, idBaja) VALUES('$idCompania', $idOrden, $folio, '$fechaMov', '$hora', $secuencia, $tipoReg, $cantidad, '$idArticulo', $posicion, $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "CantEntregada($idCompania, $idOrden, $folio, $fechaMov, $hora, $secuencia, $tipoReg, $cantidad, $idArticulo, $posicion, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }
    
    function execCliente($conn, $idCliente, $idCompania, $idRepresentante, $idLista, $idAlmacen, $nombreCliente, $estatusCliente, $analista, $divisa, $limCredito, $saldoOrden, $saldoFactura, $bloqueo, $estatus, $idBaja){
        $sql = "INSERT INTO Cliente(idCliente, idCompania, idRepresentante, idLista, idAlmacen, nombreCliente, estatusCliente, analista, divisa, limCredito, saldoOrden, saldoFactura, bloqueo, estatus, idBaja) VALUES('$idCliente', '$idCompania', '$idRepresentante', '$idLista', '$idAlmacen', '$nombreCliente', $estatusCliente, '$analista', '$divisa', $limCredito, $saldoOrden, $saldoFactura, $bloqueo, $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "Cliente($idCliente, $idCompania, $idRepresentante, $idLista, $idAlmacen, $nombreCliente, $estatusCliente, $analista, $divisa, $limCredito, $saldoOrden, $saldoFactura, $bloqueo, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execCompania($conn, $idCompania, $nombre, $estatus, $idBaja){
        $sql = "INSERT INTO Compania(idCompania, nombre, estatus, idBaja) VALUES('$idCompania', '$nombre', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "Compania($idCompania, $nombre, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execDirEntrega($conn, $idCompania, $idCliente, $dirEnt, $nombreEntrega, $direccion, $municipio, $estado, $telefono, $observaciones, $codPost, $pais, $rfc, $estatus, $idBaja){
        $sql = "INSERT INTO DirEnt(idCompania, idCliente, dirEnt, nombreEntrega, direccion, municipio, estado, telefono, observaciones, codPost, pais, rfc, estatus, idBaja) VALUES('$idCompania', '$idCliente', '$dirEnt', '$nombreEntrega', '$direccion', '$municipio', '$estado', '$telefono', '$observaciones', '$codPost', '$pais', '$rfc', '$estatus', '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "DirEnt($idCompania, $idCliente, $dirEnt, $nombreEntrega, $direccion, $municipio, $estado, $telefono, $observaciones, $codPost, $pais, $rfc, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execFactura($conn, $numFact, $idCompania, $idOrden, $idArticulo, $idCliente, $folio, $entrega, $tipoTrans, $fechaFac, $estatus, $idBaja){
        $sql = "INSERT INTO Factura(numFact, idCompania, idOrden, idArticulo, idCliente, folio, entrega, tipoTrans, fechaFac, estatus, idBaja) VALUES($numFact, '$idCompania', $idOrden, '$idArticulo', '$idCliente', $folio, $entrega, '$tipoTrans', '$fechaFac', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "Factura($numFact, $idCompania, $idOrden, $idArticulo, $idCliente, $folio, $entrega, $tipoTrans, $fechaFac, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execInventario($conn, $idCompania, $idAlmacen, $idArticulo, $stock, $estatus, $idBaja){
        $sql = "INSERT INTO Inventario(idCompania, idAlmacen, idArticulo, stock, estatus, idBaja) VALUES('$idCompania', '$idAlmacen', '$idArticulo', $stock, $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "Inventario($idCompania, $idAlmacen, $idArticulo, $stock, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }

    function execListPrecios($conn, $idCompania, $idLista, $idArticulo, $descuento, $precio, $cantOlmp, $nivelDscto, $fechaCaducidad, $fehcaInicio, $impDesc, $estatus, $idBaja){
        $sql = "INSERT INTO ListaPrecio(idCompania, idLista, idArticulo, descuento, precio, cantOlmp, nivelDscto, fechaCaducidad, fehcaInicio, impDesc, estatus, idBaja) VALUES('$idCompania', '$idLista', '$idArticulo', $descuento, $precio, $cantOlmp, $nivelDscto, '$fechaCaducidad', '$fehcaInicio', $impDesc, $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            $infoQuery = "ListaPrecio($idCompania, $idLista, $idArticulo, $descuento, $precio, $cantOlmp, $nivelDscto, $fechaCaducidad, $fehcaInicio, $impDesc, $estatus, $idBaja)";
            return array(true, $infoQuery);
        } 
        else {
            return array(false, strval(mysqli_error($conn)));
        }
    }


    function FilerReader($conn) {
        $getPathFiles = ["uploadFileAgente", "uploadFileAlmacen", "uploadFileArtExistente", "uploadFileArtVendido", "uploadFileCantEntregada", "uploadFileCliente", "uploadFileCompania", "uploadFileDirEntrega", "uploadFileFactura", "uploadFileInventario"];
        $GLOBALnoErrorFlag =        ["NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL"];
        $GLOBALstrCombinedArrays =  ["NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL"];

        for($z = 0; $z<3; $z++) {
            if (($_FILES[$getPathFiles[$z]]['name']!="")){
                //File size limiter
                if ($_FILES[$getPathFiles[$z]]['size'] > 500000) {
                    echo "Sorry, your file is too large.";
                    return array(false, "Size");
                }
                else {
                    $noErrorFlag = "true";
                    $arrayReturnInfoFail = [];
                    $arrayReturnInfoPass = [];
                    // Where the file is going to be stored
                    $target_dir = "uploadedFiles/";
                    $file = $_FILES[$getPathFiles[$z]]['name'];
                    $path = pathinfo($file);
                    $filename = $path['filename'];
                    $ext = $path['extension'];
                    $temp_name = $_FILES[$getPathFiles[$z]]['tmp_name'];
                    $path_filename_ext = $target_dir.$filename.".".$ext;
                    
                    move_uploaded_file($temp_name,$path_filename_ext);
                    //operation
                    $data = file($path_filename_ext, FILE_SKIP_EMPTY_LINES);

                    for ($i = 0; $i<count($data); $i++) {
                        $mscData = explode("||", $data[$i]);

                        for ($j = 0; $j<count($mscData); $j++) {
                            $mscData[$j] = trim($mscData[$j]);
                        }
                        
                        switch ($getPathFiles[$z]){
                            case "uploadFileAgente":
                                $tmpReturn = execAgente($conn, $mscData[0], $mscData[1], $mscData[2], intval($mscData[3]), $mscData[4]);
                                break;

                            case "uploadFileAlmacen":
                                $tmpReturn = execAlmacen($conn, $mscData[0], $mscData[1], $mscData[2], intval($mscData[3]), $mscData[4]);
                                break;

                            case "uploadFileArtExistente":
                                $tmpReturn = execArtExistente($conn, $mscData[0], $mscData[1], $mscData[2], doubleval($mscData[3]), intval($mscData[4]), $mscData[5]);
                                break;

                            case "uploadFileArtVendido":
                                $tmpReturn = execArtVendido($conn, intval($mscData[0]), $mscData[1], $mscData[2], $mscData[3], doubleval($mscData[4]), $mscData[5], $mscData[6], intval($mscData[7]), $mscData[8]);
                                break;

                            case "uploadFileCantEntregada":
                                $tmpReturn = execCantEntregada($conn, $mscData[0], intval($mscData[1]), intval($mscData[2]), $mscData[3], $mscData[4], intval($mscData[5]), intval($mscData[6]), doubleval($mscData[7]), $mscData[8], intval($mscData[9]), intval($mscData[10]), $mscData[11]);
                                break;
                        
                            case "uploadFileCliente":
                                //$tmpReturn = execCliente($conn, $mscData[0], $mscData[1], $mscData[2], $mscData[3], $mscData[4], $mscData[5], $mscData[6], $mscData[7], $mscData[8], $mscData[9], $mscData[10], $mscData[11], $mscData[12], $mscData[13], $mscData[14]);
                                $tmpReturn = execCliente($conn, $mscData[0], $mscData[1], $mscData[2], $mscData[3], $mscData[4], $mscData[5], intval($mscData[6]), $mscData[7], $mscData[8], intval($mscData[9]), doubleval($mscData[10]), doubleval($mscData[11]), intval($mscData[12]), intval($mscData[13]), $mscData[14]);
                                break;

                            case "uploadFileCompania":
                                $tmpReturn = execCompania($conn,  $mscData[0], $mscData[1], intval($mscData[2]), $mscData[3]);
                                break;

                            case "uploadFileDirEntrega":
                                $tmpReturn = execDirEntrega($conn, $mscData[0], $mscData[1], $mscData[2], $mscData[3], $mscData[4], $mscData[5], $mscData[6], $mscData[7], $mscData[8], $mscData[9], $mscData[10], $mscData[11], $mscData[12], intval($mscData[13]), $mscData[14]);
                                break;
                            
                            case "uploadFileFactura":
                                $tmpReturn = execFactura($conn, intval($mscData[0]), $mscData[1], intval($mscData[2]), $mscData[3], $mscData[4], intval($mscData[5]), intval($mscData[6]), $mscData[7], $mscData[8], intval($mscData[9]), $mscData[10]);
                                break;

                            case "uploadFileInventario":
                                $tmpReturn = execInventario($conn, $mscData[0], $mscData[1], $mscData[2], doubleval($mscData[3]), intval($mscData[4]), $mscData[5]);
                                break;

                            case "uploadFileListPrecios";
                                $tmpReturn = execListPrecios($conn, $mscData[0], $mscData[1], $mscData[2], floatval($mscData[3]), doubleval($mscData[4]), intval($mscData[5]), $mscData[6], $mscData[7], $mscData[8], doubleval($mscData[9]), intval($mscData[10]), $mscData[11]);
                                break;
                        }
                        
                        if($tmpReturn[0] == false) {
                            $noErrorFlag = "false";
                            array_push($arrayReturnInfoFail, $tmpReturn[1]);
                        }
                        else {
                            array_push($arrayReturnInfoPass, $tmpReturn[1]);
                        }
                    }
                    unlink($path_filename_ext);
                    $strArrayReturnInfoFail = "";
                    $strArrayReturnInfoPass = "";
                    if(!empty($arrayReturnInfoFail)) {$strArrayReturnInfoFail = join("<br>", $arrayReturnInfoFail);}
                    if(!empty($arrayReturnInfoPass)) {$strArrayReturnInfoPass = join("<br>", $arrayReturnInfoPass);}

                    //transform text
                    $strCombinedArrays = "empty";
                    if(!empty($strArrayReturnInfoPass) && !empty($strArrayReturnInfoFail)) {
                        $strCombinedArrays = "Operaciones exitosas:" ."<br><br>" .$strArrayReturnInfoPass ."<br><br>" ."Operaciones fallidas:" ."<br><br>" .$strArrayReturnInfoFail;
                    }
                    else {
                        if(empty($strArrayReturnInfoPass)) {
                            $strCombinedArrays = "Operaciones fallidas:" ."<br>" .$strArrayReturnInfoFail;
                        }
                        else {
                            if(empty($strArrayReturnInfoFail)) {
                                $strCombinedArrays = "Operaciones exitosas:" ."<br>" .$strArrayReturnInfoPass;
                            }
                        }
                    }
                    $GLOBALnoErrorFlag[$z] =  $noErrorFlag;
                    $GLOBALstrCombinedArrays[$z] = $strCombinedArrays;
                }
            }
        }
        return array($GLOBALnoErrorFlag, $GLOBALstrCombinedArrays);

    }
?>