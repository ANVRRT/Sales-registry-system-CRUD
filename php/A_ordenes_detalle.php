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
        require_once("../includes/functions_orden.php");


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
                                            echo "<th>Nombre</th>";
                                            echo "<th>Fecha Orden</th>";
                                            echo "<th>Fecha Entrega</th>";
                                            echo "<th>Folio Artículo</th>";
                                            echo "<th>Artículo</th>";
                                            echo "<th>Descripción</th>";
                                            echo "<th>Cantidad</th>";
                                            
                                            // echo "<th>Compañia</th>";
                                            // echo "<th>Cliente</th>";
                                            // echo "<th>Dirección Entrega</th>";
                                            // echo "<th>Estatus</th>";
                                            // echo "<th>Num. Orden compra</th>";
                                            // echo "<th>Fecha Orden</th>";

                                            //Común
                                            //Cliente, Nombre, Orden, Artículo, descripción, fechaOrden, cantidad, fechaEntrega



                                            //ING
                                            //vcxc, vprec,
                                            //ving,vcst,vrep,vPLN,costo,

                                            //CST
                                            //Precio,vCXC, numFact, ordenCompra

                                            //CXC
                                            //precio,vcxc, numfact, ordenCompra

                                            //VTA
                                            //precio, moneda, fechaOrdenCompra, fechaCliente
                                            //VPREC, vrep, ordenCompra, nota

                                            //PLN
                                            // vPLN, nota, !maquina, acumulado.
                                            //Ya puestos en ADM: Precio CXC
                                            if($_SESSION["rol"]=="ADM"){
                                                echo "<th>Precio</th>";
                                                echo "<th>Costo</th>";
                                                echo "<th>Acumulado</th>";
                                                echo "<th>Núm. Factura</th>";
                                                echo "<th>Orden Compra</th>";
                                                echo "<th>Moneda</th>";
                                                echo "<th>Fecha O.C.</th>";
                                                echo "<th>Fecha Cliente</th>";
                                                echo "<th>vCxC</th>";
                                                echo "<th>vPREC</th>";
                                                echo "<th>vING</th>";
                                                echo "<th>vCST</th>";
                                                echo "<th>vPLN</th>";
                                                echo "<th>vREP</th>";
                                                echo "<th>Nota</th>";
                                                echo "<th>Opciones</th>";

                                            }
                                                
                                            // if($_SESSION["rol"]=="FAC"){
                                            //     echo "Los TH van aquí"
                                            // }
                                            
                                            //CXC
                                            //precio,vcxc, numfact, ordenCompra
                                            if($_SESSION["rol"]=="CXC"){

                                                echo "<th>Precio</th>";
                                                echo "<th>Núm. Factura</th>";
                                                echo "<th>vCxC</th>";
                                                echo "<th>Orden Compra</th>";
                                            }
                                            //VTA
                                            //precio, moneda, fechaOrdenCompra, fechaCliente
                                            //VPREC, vrep, ordenCompra, nota
                                            if($_SESSION["rol"]=="VTA"){

                                                echo "<th>Precio</th>";
                                                echo "<th>Moneda</th>";
                                                echo "<th>Fecha O.C.</th>";
                                                echo "<th>Fecha Cliente</th>";
                                                echo "<th>vPREC</th>";
                                                echo "<th>vREP</th>";
                                                echo "<th>Orden Compra</th>";
                                                echo "<th>Nota</th>";

                                                echo "<th>Opciones</th>";
                                            }
                                            
                                            //CST
                                            //Precio,vCXC, numFact, ordenCompra
                                            if($_SESSION["rol"]=="CST"){
                                                echo "<th>Precio</th>";
                                                echo "<th>Núm. Factura</th>";
                                                echo "<th>vCxC</th>";
                                                echo "<th>Orden Compra</th>";

                                                echo "<th>Opciones</th>";
                                            }
                                            //ING
                                            //vcxc, vprec,
                                            //ving,vcst,vrep,vPLN,costo,
                                            if($_SESSION["rol"]=="ING"){

                                                echo "<th>Costo</th>";
                                                echo "<th>vCxC</th>";
                                                echo "<th>vPREC</th>";
                                                echo "<th>vING</th>";
                                                echo "<th>vCST</th>";
                                                echo "<th>vPLN</th>";
                                                echo "<th>vREP</th>";

                                                echo "<th>Opciones</th>";
                                            }
                                            //PLN
                                            // vPLN, nota, !maquina, acumulado.
                                            //Ya puestos en ADM: Precio CXC
                                            if($_SESSION["rol"]=="PLN"){
                                                echo "<th>Acumulado</th>";

                                                echo "<th>vPLN</th>";
                                                echo "<th>Nota</th>";
                                                echo "<th>Opciones</th>";
                                            }
                                            // if($_SESSION["rol"]=="FEC"){
                                            //     echo "Los TH van aquí"

                                            // }

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

                                        
                                        $reg = dispReporteOrdenByOrden($conn,$_GET["idOrden"],$_SESSION["idCompania"]);
                                        $reg2 = dispOrdenByOrden($conn,$_GET["idOrden"],$_SESSION["idCompania"]);
                                        $row = mysqli_fetch_assoc($reg2);
                                        
                                        while ($row2 = mysqli_fetch_assoc($reg)) {
                                            // echo "<option>" . $row["idRepresentante"] . "</option>";
                                            $estatus = "";
                                            $vFacturas_chked = "";
                                            $vCXC_chked = "";
                                            $vPrecios_chked = "";
                                            $vCostos_chked = "";
                                            $vIng_chked = "";
                                            $vPlaneacion_chked = "";
                                            $vServCli_chked = "";
                                            $vREP_chked = "";
                                            $vFEC_chked = "";
                                            if($row["estatus"]=="1"){
                                                $estatus = "checked";
                                            }
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
                                            echo "<tr>";
                                            echo "<td id='idOrden_".$row2["folio"]."' style='text-align: center;'>". $row["idOrden"] ."</td>";
                                            echo "<td id='compania_".$row2["folio"]."' style='text-align: center;'>". $row["idCompania"] ."</td>";
                                            echo "<td id='idCliente_".$row2["folio"]."' style='text-align: center;'>". $row["idCliente"] ."</td>";
                                            echo "<td id='nombreCliente_".$row2["folio"]."' style='text-align: center;'>". $row2["nombreCliente"] ."</td>";
                                            echo "<td style='text-align: center;'><input  type='date' name='fechaOrden' id='fechaOrden_".$row2["folio"]."' value='".$row["fechaOrden"]."' readonly></td>";
                                            echo "<td style='text-align: center;'><input  type='date' name='fechaOrden' id='fechaOrden_".$row2["folio"]."' value='".$row2["fechaEntrega"]."' readonly></td>";
                                            echo "<td id='folioArticulo_".$row2["folio"]."' style='text-align: center;'>". $row2["folio"] ."</td>";
                                            echo "<td id='idArticulo_".$row2["folio"]."' style='text-align: center;'>". $row2["idArticulo"] ."</td>";
                                            echo "<td id='descripcion_".$row2["folio"]."' style='text-align: center;'>". $row2["descripcion"] ."</td>";
                                            echo "<td id='cantidad_".$row2["folio"]."' style='text-align: center;'>". $row2["cantidad"] ."</td>";
                                            

                                            if($_SESSION["rol"]=="ADM"){

                                                // echo "<th>Precio</th>";
                                                echo "<td id='precio_".$row2["folio"]."' style='text-align: center;'>". $row2["precio"] ."</td>";
                                                // echo "<th>Costo</th>";
                                                echo "<td id='costo_".$row2["folio"]."' style='text-align: center;'>". $row2["costo"] ."</td>";
                                                // echo "<th>Acumulado</th>";
                                                echo "<td id='acumulado_".$row2["folio"]."' style='text-align: center;'>". $row2["acumulado"] ."</td>";
                                                // echo "<th>Núm. Factura</th>";
                                                echo "<td id='numFact_".$row2["folio"]."' style='text-align: center;'>". $row2["numFact"] ."</td>";
                                                // echo "<th>Orden Compra</th>";
                                                echo "<td id='ordenCompra_".$row2["folio"]."' style='text-align: center;'>". $row2["ordenCompra"] ."</td>";
                                                // echo "<th>Moneda</th>";
                                                echo "<td id='moneda_".$row2["folio"]."' style='text-align: center;'>". $row2["moneda"] ."</td>";
                                                // echo "<th>Fecha O.C.</th>";
                                                echo "<td id='fechaOC_".$row2["folio"]."' style='text-align: center;'>". $row2["fechaSolicitud"] ."</td>";
                                                // echo "<th>Fecha Cliente</th>";
                                                echo "<td id='fechaEnt_".$row2["folio"]."' style='text-align: center;'>". $row2["fechaEntrega"] ."</td>";
                                                // echo "<th>vCxC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vCxC_".$row2["folio"]."'        id='vCxC_".$row2["folio"]."' ".$vCXC_chked." disabled></td>";
                                                // echo "<th>vPREC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row2["folio"]."'    id='vPrecios_".$row2["folio"]."' ".$vPrecios_chked." disabled></td>";
                                                // echo "<th>vING</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vIng_".$row2["folio"]."'        id='vIng_".$row2["folio"]."' ".$vIng_chked." disabled></td>";
                                                // echo "<th>vCST</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vCST_".$row2["folio"]."'        id='vCostos_".$row2["folio"]."' ".$vCostos_chked." disabled></td>";
                                                // echo "<th>vPLN</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vPLN_".$row2["folio"]."'        id='vPLN_".$row2["folio"]."' ".$vPlaneacion_chked." disabled></td>";
                                                // echo "<th>vREP</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vREP_".$row2["folio"]."'        id='vREP_".$row2["folio"]."' ".$vREP_chked." disabled></td>";
                                                // echo "<th>Nota</th>";
                                                echo "<td id='nota_".$row2["folio"]."' style='text-align: center;'>". $row2["nota"] ."</td>";
                                                echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'></td>";

                                                
                                            }
                                                
                                            // if($_SESSION["rol"]=="FAC"){
                                            //     echo "AQUÍ VAN LOS TD";
                                            // }
                                            if($_SESSION["rol"]=="CXC"){
                                                // echo "<th>Precio</th>";
                                                echo "<td id='precio_".$row2["folio"]."' style='text-align: center;'>". $row2["precio"] ."</td>";
                                                // echo "<th>Núm. Factura</th>";
                                                echo "<td id='numFact_".$row2["folio"]."' style='text-align: center;'>". $row2["numFact"] ."</td>";
                                                // echo "<th>vCxC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vCxC_".$row2["folio"]."'        id='vCxC_".$row2["folio"]."' ".$vCXC_chked." disabled></td>";
                                                // echo "<th>Orden Compra</th>";
                                                echo "<td id='ordenCompra_".$row2["folio"]."' style='text-align: center;'>". $row2["ordenCompra"] ."</td>";
                                                // echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'></td>";
                                            }

                                            if($_SESSION["rol"]=="VTA"){
                                                // echo "<th>Precio</th>";
                                                echo "<td id='precio_".$row2["folio"]."' style='text-align: center;'>". $row2["precio"] ."</td>";
                                                // echo "<th>Moneda</th>";
                                                echo "<td id='moneda_".$row2["folio"]."' style='text-align: center;'>". $row2["moneda"] ."</td>";
                                                // echo "<th>Fecha O.C.</th>";
                                                echo "<td id='fechaOC_".$row2["folio"]."' style='text-align: center;'>". $row2["fechaSolicitud"] ."</td>";
                                                // echo "<th>Fecha Cliente</th>";
                                                echo "<td id='fechaEnt_".$row2["folio"]."' style='text-align: center;'>". $row2["fechaEntrega"] ."</td>";
                                                // echo "<th>vPREC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row2["folio"]."'    id='vPrecios_".$row2["folio"]."' ".$vPrecios_chked." disabled></td>";
                                                // echo "<th>vREP</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vREP_".$row2["folio"]."'        id='vREP_".$row2["folio"]."' ".$vREP_chked." disabled></td>";
                                                // echo "<th>Orden Compra</th>";
                                                echo "<td id='ordenCompra_".$row2["folio"]."' style='text-align: center;'>". $row2["ordenCompra"] ."</td>";
                                                // echo "<th>Nota</th>";
                                                echo "<td id='nota_".$row2["folio"]."' style='text-align: center;'>". $row2["nota"] ."</td>";
                                                echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'></td>";
                                            }
                                            if($_SESSION["rol"]=="CST"){
                                                // echo "<th>Precio</th>";
                                                echo "<td id='precio_".$row2["folio"]."' style='text-align: center;'>". $row2["precio"] ."</td>";
                                                // echo "<th>Núm. Factura</th>";
                                                echo "<td id='numFact_".$row2["folio"]."' style='text-align: center;'>". $row2["numFact"] ."</td>";
                                                // echo "<th>vCxC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vCxC_".$row2["folio"]."'        id='vCxC_".$row2["folio"]."' ".$vCXC_chked." disabled></td>";
                                                // echo "<th>Orden Compra</th>";
                                                echo "<td id='ordenCompra_".$row2["folio"]."' style='text-align: center;'>". $row2["ordenCompra"] ."</td>";

                                                echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'></td>";
                                            }
                                            if($_SESSION["rol"]=="ING"){
                                                // echo "<th>Costo</th>";
                                                echo "<td id='costo_".$row2["folio"]."' style='text-align: center;'>". $row2["costo"] ."</td>";
                                                // echo "<th>vCxC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vCxC_".$row2["folio"]."'        id='vCxC_".$row2["folio"]."' ".$vCXC_chked." disabled></td>";
                                                // echo "<th>vPREC</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vPrecios_".$row2["folio"]."'    id='vPrecios_".$row2["folio"]."' ".$vPrecios_chked." disabled></td>";
                                                // echo "<th>vING</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vIng_".$row2["folio"]."'        id='vIng_".$row2["folio"]."' ".$vIng_chked." disabled></td>";
                                                // echo "<th>vCST</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vCST_".$row2["folio"]."'        id='vCostos_".$row2["folio"]."' ".$vCostos_chked." disabled></td>";
                                                // echo "<th>vPLN</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vPLN_".$row2["folio"]."'        id='vPLN_".$row2["folio"]."' ".$vPlaneacion_chked." disabled></td>";
                                                // echo "<th>vREP</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vREP_".$row2["folio"]."'        id='vREP_".$row2["folio"]."' ".$vREP_chked." disabled></td>";
                                                
                                                echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'></td>";
                                            }
                                            if($_SESSION["rol"]=="PLN"){
                                                // echo "<th>Acumulado</th>";
                                                echo "<td id='acumulado_".$row2["folio"]."' style='text-align: center;'>". $row2["acumulado"] ."</td>";
                                                // echo "<th>vPLN</th>";
                                                echo "<td align='center'><input  type='checkbox' name='vPLN_".$row2["folio"]."'        id='vPLN_".$row2["folio"]."' ".$vPlaneacion_chked." disabled></td>";
                                                // echo "<th>Nota</th>";
                                                echo "<td id='nota_".$row2["folio"]."' style='text-align: center;'>". $row2["nota"] ."</td>";
                                                echo "<td align='center'><input name='autorizar' type='button' value='Autorizar orden' class='btn btn-primary' onClick='orden_detalle(document.getElementById(\"idOrden_" . $row["idOrden"] . "\").innerHTML)'></td>";
                                            }
                                            // if($_SESSION["rol"]=="FEC"){
                                            //     echo "<td align='center'><input  type='checkbox' name='vFEC_".$row["idOrden"]."'        id='vFEC_".$row["idOrden"]."' ".$vFEC_chked." disabled></td>";
                                            // }

                                            // echo "<td align='center'><input  type='checkbox' name='vREP_".$row["idOrden"]."'        id='vREP_".$row["idOrden"]."' ".$vREP_chked." disabled></td>";

                                            echo "</tr>";
                                        }

                                        
                                        
                                        ?>
                                        <!-- echo "<th>Orden</th>";
                                        echo "<th>Compañia</th>";
                                        echo "<th>Cliente</th>";
                                        echo "<th>Dirección Entrega</th>";
                                        echo "<th>Estatus</th>";
                                        echo "<th>Num. Orden compra</th>";
                                        echo "<th>Fecha Orden</th>"; -->
                                        <!-- <td>2021/04/02</td>
                                        <td>2021/04/01</td>
                                        <td>2021/04/05</td>
                                        <td>2021/04/04</td>
                                        <td>2021/03/31</td>
                                        <td>2021/04/02</td>
                                        <td>2021/04/02</td> -->
                                        <!-- <td>3</td> -->
                                        <!-- <td align="center"><input  type="checkbox" name="vFacturas"   id="vFacturas"></td>
                                        <td align="center"><input  type="checkbox" name="vCxC"        id="vCxC" ></td>
                                        <td align="center"><input  type="checkbox" name="vPrecios"    id="vPrecios"></td>
                                        <td align="center"><input  type="checkbox" name="vCostos"     id="vCostos" ></td>
                                        <td align="center"><input  type="checkbox" name="vIng"        id="vIng"></td>
                                        <td align="center"><input  type="checkbox" name="vPlaneacion" id="vPlaneacion"></td>
                                        <td align="center"><input  type="checkbox" name="vServCli"    id="vServCli" ></td>
                                        <td align="center"><input  type="checkbox" name="vREP"        id="vREP"></td>
                                        <td align="center"><input  type="checkbox" name="vFEC"        id="vFEC"></td> -->



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