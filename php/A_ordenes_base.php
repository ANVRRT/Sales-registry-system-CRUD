<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include("../includes/header.php");
    require_once("../includes/dbh.inc.php");
    ?>

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("../includes/sidebar.php");
        require_once("../includes/functions_catalogos.php");


        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("../includes/topbar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Autorización de Ordenes</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ordenes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">

                                            <?php
                                            if(isset($_GET["idOrden"])){
                                                $reg = dispOrdenByID($conn,$_GET["idOrden"]);
                                                echo "ENTRA";
                                                $bToken = 1;
                                            }
                                            else{
                                                $reg = dispOrden($conn, $_SESSION["idCompania"]);
                                                $bToken = 0;
    
    
                                            }
                                            echo "<th>Orden</th>";
                                            echo "<th>Compañia</th>";
                                            echo "<th>Cliente</th>";
                                            echo "<th>Dirección Entrega</th>";
                                            echo "<th>Estatus</th>";
                                            echo "<th>Num. Orden compra</th>";
                                            echo "<th>Fecha Orden</th>";

                                            if ((roles($_SESSION["rol"], array("ADM", "DIR"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenADM")))){
                                                echo "<th>vFac</th>";
                                                echo "<th>vCxC</th>";
                                                echo "<th>vPREC</th>";
                                                echo "<th>vCST</th>";
                                                echo "<th>vING</th>";
                                                echo "<th>vPLN</th>";
                                                echo "<th>vFEC</th>";
                                            }
                                            
                                            if ((roles($_SESSION["rol"], array("FAC"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenFAC")))){
                                                echo "<th>vFac</th>";
                                            }
                                            if ((roles($_SESSION["rol"], array("CXC"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenCXC")))){

                                                echo "<th>vCxC</th>";
                                            }

                                            if ((roles($_SESSION["rol"], array("VTA"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenVTA")))){

                                                echo "<th>vPREC</th>";
                                            }
                                            if ((roles($_SESSION["rol"], array("CST"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenCST")))){

                                                echo "<th>vCST</th>";
                                            }
                                            if ((roles($_SESSION["rol"], array("ING"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenING")))){

                                                echo "<th>vING</th>";
                                            }
                                            if ((roles($_SESSION["rol"], array("PLN"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenPLN")))){

                                                echo "<th>vPLN</th>";
                                            }
                                            if ((roles($_SESSION["rol"], array("FEC"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenFEC")))){
                                                echo "<th>vFEC</th>";

                                            }
                                            // echo "<th>vServCli</th>";
                                            // echo "<th>vREP</th>";
                                            if($bToken != 1){
                                                echo "<th>Opciones</th>";
                                            }

                                            ?>
                                            <!-- <th>tFac</th>
                                            <th>tCxC</th>
                                            <th>tPRE</th>
                                            <th>tCST</th>
                                            <th>tING</th>
                                            <th>tPLN</th>
                                            <th>tFEC</th>
                                            <th>Total</th> -->




                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php



                                        
                                        while ($row = mysqli_fetch_assoc($reg)) {
                                            $skey = false;
                                            $vFacturas_chked = "";
                                            $vCXC_chked = "";
                                            $vPrecios_chked = "";
                                            $vCostos_chked = "";
                                            $vIng_chked = "";
                                            $vPlaneacion_chked = "";
                                            $vServCli_chked = "";
                                            $vREP_chked = "";
                                            $vFEC_chked = "";
                                            if($row["vFacturas"]=="1"){
                                                $vFacturas_chked = "checked";
                                            }
                                            if($row["vCxC"]=="1"){
                                                $vCXC_chked = "checked";
                                            }
                                            if($row["vPrecios"]=="1"){
                                                $vPrecios_chked = "checked";
                                            }
                                            if($row["vCostos"]=="1"){
                                                $vCostos_chked = "checked";
                                            }
                                            if($row["vIng"]=="1"){
                                                $vIng_chked = "checked";
                                            }
                                            if($row["vPlaneacion"]=="1"){
                                                $vPlaneacion_chked = "checked";
                                            }
                                            if($row["vServCli"]=="1"){
                                                $vServCli_chked = "checked";
                                            }
                                            if($row["vREP"]=="1"){
                                                $vREP_chked = "checked";
                                            }
                                            if($row["vFEC"]=="1"){
                                                $vFEC_chked = "checked";
                                            }
                                            switch($_SESSION["rol"]){
                                                case "ADM":
                                                    $skey = true;
                                                    break;
                                                case "DIR":
                                                    $skey = true;
                                                    break;
                                                // case "FAC":
                                                //     if($row["vFacturas"]=="1"){
                                                //         $skey = false;
                                                //     }
                                                //     break;
                                                case "CXC":
                                                    if(($row["vCxC"]!="1") || ($bToken == 1)){
                                                        $skey = true;
                                                    }
                                                    break;
                                                case "VTA":
                                                    if((($row["vPrecios"]!="1") && ($row["vCxC"]=="1")) || ($bToken == 1)){
                                                        $skey = true;
                                                    }
                                                    
                                                    break;

                                                case "CST":
                                                    if((($row["vCostos"]!="1") && ($row["vIng"]=="1")) || ($bToken == 1)){
                                                        $skey = true;
                                                    }
                                                    
                                                    break;

                                                case "ING":
                                                    if((($row["vIng"]!="1")  && ($row["vPrecios"]=="1")) || ($bToken == 1)){
                                                        $skey = true;
                                                    }
                                                    
                                                    break;

                                                case "PLN":
                                                    if((($row["vPlaneacion"]!="1") && ($row["vCostos"]=="1")) || ($bToken == 1)){
                                                        $skey = true;
                                                    }
                                                    break;

                                                // case "FEC":
                                                //     if($row["vFEC"]=="1"){
                                                //         $skey = false;;
                                                //     }
                                                    
                                                //     break;
                                            }
                                            if((($row["estatus"]==0) && $skey)  || ($bToken == 1)){
                                                
                                                // echo "<option>" . $row["idRepresentante"] . "</option>";
                                                
                                                
                                                
                                                echo "<tr>";
                                                echo "<td id='idOrden_".$row["idOrden"]."' style='text-align: center;'>". $row["idOrden"] ."</td>";
                                                echo "<td id='compania_".$row["idOrden"]."' style='text-align: center;'>". $row["idCompania"] ."</td>";
                                                echo "<td id='idCliente_".$row["idOrden"]."' style='text-align: center;'>". $row["idCliente"] ."</td>";
                                                echo "<td id='dirEnt_".$row["idOrden"]."' style='text-align: center;'>". $row["dirEnt"] ."</td>";
                                                echo "<td style='text-align: center;'><input  type='checkbox' name='estatus' id='estatus_".$row["idOrden"]."' disabled></td>";
                                                echo "<td id='ordCompra_".$row["idOrden"]."' style='text-align: center;'>". $row["ordenCompra"] ."</td>";
                                                echo "<td style='text-align: center;'><input  type='date' name='fechaOrden' id='fechaOrden_".$row["idOrden"]."' value='".$row["fechaOrden"]."' readonly></td>";

                                                if ((roles($_SESSION["rol"], array("ADM", "DIR"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenADM")))){
                                                    echo "<td align='center'><input  type='checkbox' name='vFacturas_".$row["idOrden"]."'   id='vFacturas_".$row["idOrden"]."' ".$vFacturas_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vCxC_".$row["idOrden"]."'        id='vCxC_".$row["idOrden"]."' ".$vCXC_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row["idOrden"]."'    id='vPrecios_".$row["idOrden"]."' ".$vPrecios_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vCST_".$row["idOrden"]."'        id='vCostos_".$row["idOrden"]."' ".$vCostos_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vIng_".$row["idOrden"]."'        id='vIng_".$row["idOrden"]."' ".$vIng_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vPLN_".$row["idOrden"]."'        id='vPLN_".$row["idOrden"]."' ".$vPlaneacion_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vFEC_".$row["idOrden"]."'        id='vFEC_".$row["idOrden"]."' ".$vFEC_chked." disabled></td>";
                                                    if($bToken != 1){
                                                        echo "<td align='center'>
                                                        <div style='column-gap: 1rem; grid-template-columns: repeat(3, 1fr); display: grid;'>
                                                        <input style='margin-top: 5px;' name='autorizar' type='button' value='Autorizar CXC' class='btn btn-primary' 
                                                        onClick='autorizacion_cxc(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='autorizar' type='button' value='Autorizar VTA' class='btn btn-primary' 
                                                        onClick='autorizacion_vta(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='autorizar' type='button' value='Autorizar CST' class='btn btn-primary' 
                                                        onClick='autorizacion_cst(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='autorizar' type='button' value='Autorizar ING' class='btn btn-primary' 
                                                        onClick='autorizacion_ing(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='autorizar' type='button' value='Autorizar PLN' class='btn btn-primary' 
                                                        onClick='autorizacion_pln(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                        onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'>
                                                        </div>
                                                        </td>";
                                                    }

                                                }
                                                    
                                                // if($_SESSION["rol"]=="FAC"){
                                                //     echo "<td align='center'><input  type='checkbox' name='vFacturas_".$row["idOrden"]."'   id='vFacturas_".$row["idOrden"]."' ".$vFacturas_chked." disabled></td>";
                                                //     echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary'>
                                                //     <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                //     onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'></td>";
                                                // }
                                                if ((roles($_SESSION["rol"], array("CXC"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenCXC")))){
                                                    echo "<td align='center'><input  type='checkbox' name='vCxC_".$row["idOrden"]."'        id='vCxC_".$row["idOrden"]."' ".$vCXC_chked." disabled></td>";
                                                    if($bToken != 1){
                                                        echo "<td align='center'>
                                                        <div style='column-gap: 1rem; grid-template-columns: repeat(2, 1fr); display: grid;'>
                                                        <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                        onClick='autorizacion_cxc(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                        onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                        </div>
                                                        </td>";
                                                    }
                                                }

                                                if ((roles($_SESSION["rol"], array("VTA"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenVTA")))){
                                                    echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row["idOrden"]."'    id='vPrecios_".$row["idOrden"]."' ".$vPrecios_chked." disabled></td>";
                                                    if($bToken != 1){

                                                        echo "<td align='center'>
                                                        <div style='column-gap: 1rem; grid-template-columns: repeat(2, 1fr); display: grid;'>
                                                        <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                        onClick='autorizacion_vta(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                        onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                        </div>
                                                        </td>";
                                                    }
                                                }
                                                if ((roles($_SESSION["rol"], array("CST"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenCST")))){
                                                    echo "<td align='center'><input  type='checkbox' name='vCST_".$row["idOrden"]."'        id='vCostos_".$row["idOrden"]."' ".$vCostos_chked." disabled></td>";
                                                    if($bToken != 1){

                                                        echo "<td align='center'>
                                                        <div style='column-gap: 1rem; grid-template-columns: repeat(2, 1fr); display: grid;'>
                                                        <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                        onClick='autorizacion_cst(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                        onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                        </div>
                                                        </td>";
                                                    }
                                                }
                                                if ((roles($_SESSION["rol"], array("ING"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenING")))){
                                                    echo "<td align='center'><input  type='checkbox' name='vIng_".$row["idOrden"]."'        id='vIng_".$row["idOrden"]."' ".$vIng_chked." disabled></td>";
                                                    if($bToken != 1){

                                                        echo "<td align='center'>
                                                        <div style='column-gap: 1rem; grid-template-columns: repeat(2, 1fr); display: grid;'>
                                                        <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                        onClick='autorizacion_ing(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                        onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                        </div>
                                                        </td>";
                                                    }
                                                }
                                                if ((roles($_SESSION["rol"], array("PLN"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenPLN")))){
                                                    echo "<td align='center'><input  type='checkbox' name='vPLN_".$row["idOrden"]."'        id='vPLN_".$row["idOrden"]."' ".$vPlaneacion_chked." disabled></td>";
                                                    if($bToken != 1){

                                                        echo "<td align='center'>
                                                        <div style='column-gap: 1rem; grid-template-columns: repeat(2, 1fr); display: grid;'>
                                                        <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                        onClick='autorizacion_pln(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                        <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                        onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'>
                                                        </div>
                                                        </td>";
                                                    }
                                                }
                                                // if($_SESSION["rol"]=="FEC"){
                                                //     echo "<td align='center'><input  type='checkbox' name='vFEC_".$row["idOrden"]."'        id='vFEC_".$row["idOrden"]."' ".$vFEC_chked." disabled></td>";
                                                //     echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary'>
                                                //     <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                //     onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'></td>";
                                                // }

                                                // echo "<td align='center'><input  type='checkbox' name='vServCli_".$row["idOrden"]."'    id='vServCli_".$row["idOrden"]."' ".$vServCli_chked." disabled></td>";
                                                // echo "<td align='center'><input  type='checkbox' name='vREP_".$row["idOrden"]."'        id='vREP_".$row["idOrden"]."' ".$vREP_chked." disabled></td>";
                                                // echo "<td align='center'><input name='detalle' type='button' value='Ver detalle' class='btn btn-primary'></td>";
                                                
                                                echo "</tr>";
                                            }
                                            
                                        }

                                        
                                        
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Cartones Corrugados 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>