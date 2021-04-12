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
                                            
                                            echo "<th>Orden</th>";
                                            echo "<th>Compañia</th>";
                                            echo "<th>Cliente</th>";
                                            echo "<th>Dirección Entrega</th>";
                                            echo "<th>Estatus</th>";
                                            echo "<th>Num. Orden compra</th>";
                                            echo "<th>Fecha Orden</th>";

                                            if($_SESSION["rol"]=="ADM"){
                                                echo "<th>vFac</th>";
                                                echo "<th>vCxC</th>";
                                                echo "<th>vPREC</th>";
                                                echo "<th>vCST</th>";
                                                echo "<th>vING</th>";
                                                echo "<th>vPLN</th>";
                                                echo "<th>vFEC</th>";
                                            }
                                                
                                            if($_SESSION["rol"]=="FAC"){
                                                echo "<th>vFac</th>";
                                            }
                                            if($_SESSION["rol"]=="CXC"){

                                                echo "<th>vCxC</th>";
                                            }

                                            if($_SESSION["rol"]=="VTA"){

                                                echo "<th>vPREC</th>";
                                            }
                                            if($_SESSION["rol"]=="CST"){

                                                echo "<th>vCST</th>";
                                            }
                                            if($_SESSION["rol"]=="ING"){

                                                echo "<th>vING</th>";
                                            }
                                            if($_SESSION["rol"]=="PLN"){

                                                echo "<th>vPLN</th>";
                                            }
                                            if($_SESSION["rol"]=="FEC"){
                                                echo "<th>vFEC</th>";

                                            }
                                            // echo "<th>vServCli</th>";
                                            // echo "<th>vREP</th>";
                                            echo "<th>Opciones</th>";


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


                                        $reg = dispOrden($conn, $_SESSION["idCompania"]);

                                        
                                        while ($row = mysqli_fetch_assoc($reg)) {
                                            $skey = true;
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
                                                // case "FAC":
                                                //     if($row["vFacturas"]=="1"){
                                                //         $skey = false;
                                                //     }
                                                //     break;
                                                case "CXC":
                                                    if($row["vCxC"]=="1"){
                                                        $skey = false;
                                                    }
                                                    break;
                                                case "VTA":
                                                    if($row["vPrecios"]=="1"){
                                                        $skey = false;
                                                    }
                                                    
                                                    break;

                                                case "CST":
                                                    if($row["vCostos"]=="1"){
                                                        $skey = false;
                                                    }
                                                    
                                                    break;

                                                case "ING":
                                                    if($row["vIng"]=="1"){
                                                        $skey = false;
                                                    }
                                                    
                                                    break;

                                                case "PLN":
                                                    if($row["vPlaneacion"]=="1"){
                                                        $skey = false;
                                                    }
                                                    break;

                                                // case "FEC":
                                                //     if($row["vFEC"]=="1"){
                                                //         $skey = false;;
                                                //     }
                                                    
                                                //     break;
                                            }
                                            if(($row["estatus"]==0) && $skey){
                                                // echo "<option>" . $row["idRepresentante"] . "</option>";
                                                
                                                
                                                
                                                echo "<tr>";
                                                echo "<td id='idOrden_".$row["idOrden"]."' style='text-align: center;'>". $row["idOrden"] ."</td>";
                                                echo "<td id='compania_".$row["idOrden"]."' style='text-align: center;'>". $row["idCompania"] ."</td>";
                                                echo "<td id='idCliente_".$row["idOrden"]."' style='text-align: center;'>". $row["idCliente"] ."</td>";
                                                echo "<td id='dirEnt_".$row["idOrden"]."' style='text-align: center;'>". $row["dirEnt"] ."</td>";
                                                echo "<td style='text-align: center;'><input  type='checkbox' name='estatus' id='estatus_".$row["idOrden"]."' disabled></td>";
                                                echo "<td id='ordCompra_".$row["idOrden"]."' style='text-align: center;'>". $row["ordenCompra"] ."</td>";
                                                echo "<td style='text-align: center;'><input  type='date' name='fechaOrden' id='fechaOrden_".$row["idOrden"]."' value='".$row["fechaOrden"]."' readonly></td>";

                                                if($_SESSION["rol"]=="ADM"){
                                                    echo "<td align='center'><input  type='checkbox' name='vFacturas_".$row["idOrden"]."'   id='vFacturas_".$row["idOrden"]."' ".$vFacturas_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vCxC_".$row["idOrden"]."'        id='vCxC_".$row["idOrden"]."' ".$vCXC_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row["idOrden"]."'    id='vPrecios_".$row["idOrden"]."' ".$vPrecios_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vCST_".$row["idOrden"]."'        id='vCostos_".$row["idOrden"]."' ".$vCostos_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vIng_".$row["idOrden"]."'        id='vIng_".$row["idOrden"]."' ".$vIng_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vPLN_".$row["idOrden"]."'        id='vPLN_".$row["idOrden"]."' ".$vPlaneacion_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vFEC_".$row["idOrden"]."'        id='vFEC_".$row["idOrden"]."' ".$vFEC_chked." disabled></td>";
                                                    echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary'>
                                                    <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                    onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'></td>";
                                                }
                                                    
                                                // if($_SESSION["rol"]=="FAC"){
                                                //     echo "<td align='center'><input  type='checkbox' name='vFacturas_".$row["idOrden"]."'   id='vFacturas_".$row["idOrden"]."' ".$vFacturas_chked." disabled></td>";
                                                //     echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary'>
                                                //     <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                //     onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'></td>";
                                                // }
                                                if($_SESSION["rol"]=="CXC"){
                                                    echo "<td align='center'><input  type='checkbox' name='vCxC_".$row["idOrden"]."'        id='vCxC_".$row["idOrden"]."' ".$vCXC_chked." disabled></td>";
                                                    echo "<td align='center'>
                                                    <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                    onClick='autorizacion_cxc(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                    <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                    onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                    </td>";
                                                }

                                                if($_SESSION["rol"]=="VTA"){
                                                    echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row["idOrden"]."'    id='vPrecios_".$row["idOrden"]."' ".$vPrecios_chked." disabled></td>";
                                                    echo "<td align='center'>
                                                    <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                    onClick='autorizacion_vta(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                    <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                    onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                    </td>";
                                                }
                                                if($_SESSION["rol"]=="CST"){
                                                    echo "<td align='center'><input  type='checkbox' name='vCST_".$row["idOrden"]."'        id='vCostos_".$row["idOrden"]."' ".$vCostos_chked." disabled></td>";
                                                    echo "<td align='center'>
                                                    <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                    onClick='autorizacion_cst(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                    <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                    onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                    </td>";
                                                }
                                                if($_SESSION["rol"]=="ING"){
                                                    echo "<td align='center'><input  type='checkbox' name='vIng_".$row["idOrden"]."'        id='vIng_".$row["idOrden"]."' ".$vIng_chked." disabled></td>";
                                                    echo "<td align='center'>
                                                    <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                    onClick='autorizacion_ing(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                    <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                    onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'>
                                                    </td>";
                                                }
                                                if($_SESSION["rol"]=="PLN"){
                                                    echo "<td align='center'><input  type='checkbox' name='vPLN_".$row["idOrden"]."'        id='vPLN_".$row["idOrden"]."' ".$vPlaneacion_chked." disabled></td>";
                                                    echo "<td align='center'>
                                                    <input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' 
                                                    onClick='autorizacion_pln(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$row["idCliente"].")'>
                                                    <input style='margin-top: 5px;' name='detalle' type='button' value='Ver detalle' class='btn btn-primary' 
                                                    onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML,".$_SESSION["idCompania"].")'></td>";
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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