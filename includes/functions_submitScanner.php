<?php
    require_once("dbh.inc.php");


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


    function test() {
        echo $_FILES['uploadFile']['name'];
        echo $_FILES['uploadFile']['tmp_name'];
        echo $_FILES['uploadFile']['size'];
        echo $_FILES['uploadFile']['type'];
    }

?>