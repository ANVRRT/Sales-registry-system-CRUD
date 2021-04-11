<?php
require_once("dbh.inc.php");

if(isset($_GET["A_CXC"])){
    A_CXC($conn,$_GET["idOrden"],$_GET["idCliente"]);
}



// if(isset($_POST["A_VTA"])){
//     // echo $_POST["PO_ORD"]."<br>".$_POST["PO_ART"]."<br>".$_POST["PO_CANT"]."<br>".$_POST["PO_PRECIO"]."<br>".$_POST["PO_FCOMPRA"]."<br>".$_POST["PO_FCLIENTE"];
//     A_Venta($conn,$_POST["PO_ORD"],$_POST["PO_ART"],$_POST["PO_CANT"],$_POST["PO_PRECIO"],$_POST["PO_FCOMPRA"],$_POST["PO_FCLIENTE"]);
// }

// function A_Venta($conn,$idOrden,$idArticulo,$cantidad,$precio,$fechaSolicitud,$fechaEntrega){
//     $sql= "UPDATE Cliente SET bloqueo= 1 WHERE idCliente= ?";

//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt,$sql))
//     {
//         header("location: ../php/index.php?error=stmtfailed");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt,"i",$id);
//     if(mysqli_stmt_execute($stmt))
//     {
//         mysqli_stmt_close($stmt);
//         header("location: ../php/C_bloqueoCliente.php?error=success");
//         exit();
//     }
//     else{
//         mysqli_stmt_close($stmt);
//         header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
//         exit();
//     }
// }

function A_CXC($conn,$idOrden,$idCliente){
    $sql= "UPDATE Orden SET vCxC= 1 WHERE idOrden = ? AND idCliente= ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$idOrden,$idCliente);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/A_ordenes_base.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/C_bloqueoCliente.php?error=sqlerror");
        exit();
    }
}

?>