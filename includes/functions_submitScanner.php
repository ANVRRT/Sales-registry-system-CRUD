<?php
    require_once("dbh.inc.php");

    function execAgente($conn, $idRepresentante, $nomRepresentante, $idCompania, $estatus, $idBaja){
        $sql = "INSERT INTO Agente(idRepresentante, nomRepresentante, idCompania, estatus, idBaja) VALUES('$idRepresentante', '$nomRepresentante', '$idCompania', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function execAlmacen($conn, $idAlmacen, $descripcion, $idCompania, $estatus, $idBaja){
        $sql = "INSERT INTO Almacen(idAlmacen, descripcion, idCompania, estatus, idBaja) VALUES('$idAlmacen', '$descripcion', '$idCompania', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function execArtExistente($conn, $idArticulo, $idCompania, $descripcion, $costosEstandar, $estatus, $idBaja){
        $sql = "INSERT INTO Almacen(idArticulo, idCompania, descripcion, costosEstandar, estatus, idBaja) VALUES('$idArticulo', '$idCompania', '$descripcion', '$costosEstandar', $estatus, '$idBaja')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


    function FilerReader($conn, $typeM) {
        $getPathFile = "";
        switch ($typeM) {
            case "agente":
                $getPathFile = "uploadFileAgente";
                break;
            case "almacen":
                $getPathFile = "uploadFileAlmacen";
                break;

            case "artExistente":
                $getPathFile = "uploadFileArtExistente";
                break;
        }

        if (($_FILES[$getPathFile]['name']!="")){
            //File size limiter
            if ($_FILES["uploadFileAgente"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }

            else {
                // Where the file is going to be stored
                $target_dir = "uploadedFiles/";
                $file = $_FILES[$getPathFile]['name'];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $temp_name = $_FILES[$getPathFile]['tmp_name'];
                $path_filename_ext = $target_dir.$filename.".".$ext;
                
                if (file_exists($path_filename_ext)) {
                    echo "Sorry, file already exists.";
                }
                else {
                    move_uploaded_file($temp_name,$path_filename_ext);
                    //operation
                    $data = file($path_filename_ext, FILE_SKIP_EMPTY_LINES);

                    for ($i = 0; $i<count($data); $i++) {
                        $mscData = explode("||", $data[$i]);

                        for ($j = 0; $j<count($mscData); $j++) {
                            $mscData[$j] = trim($mscData[$j]);
                        }
                        
                        switch ($typeM){
                            case "agente":
                                execAgente($conn, $mscData[0], $mscData[1], $mscData[2], intval($mscData[3]), $mscData[4]);
                                break;

                            case "almacen":
                                execAlmacen($conn, $mscData[0], $mscData[1], $mscData[2], intval($mscData[3]), $mscData[4]);
                                break;

                            case "artExistente":
                                execAlmacen($conn, $mscData[0], $mscData[1], $mscData[2], $mscData[3], intval($mscData[4]), $mscData[5]);
                                break;
                        }
                    }
                }
            }
        }
    }

?>