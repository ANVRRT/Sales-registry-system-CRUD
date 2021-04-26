<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once("../includes/dbh.inc.php");
    include("../includes/header.php");
    ?>
    <link rel="stylesheet" href="../css/stylesForms.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <script src="../js/reportes/html2pdf.bundle.min.js"></script>
    <script src="../js/reportes/conversionPDF.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div>

            <?php
            include("../includes/sidebar.php");
            require_once("../includes/functions_catalogos.php");
            require_once("../includes/functions_reportes.php");
            ?>


        </div>
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
                <!-- <div class="container-fluid">

					
                    Page Heading
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

                </div> -->
                <div class="container-fluid">
                    <?php

                    if ((roles($_SESSION["rol"], array("ADM","AGE","CST","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"], array("pr_ordenes")))) {

                    ?>
                    <!-- Page Heading -->
                    <h1 >Reporte de Todas las Ordenes de Venta</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <table style="width: 50%;"><tr>
                                <td style="width: 40%;"><h4 class="m-0 font-weight-bold text-primary">Ordenes de venta</h4></td>
                                <td style="width: 60%;"><input type="button" style="background: blue; color: white; border-radius: 15px; border:0px; width: 150px; height:30px;" value="Generar PDF" onclick="generatePDF_AO()"></td>
                            </tr></table>
                        </div>

                        <div class="card-header py-3">
                        <div class="table-responsive">
                            <table width="100%" cellspacing="10" cellpadding="10">
                                <caption style="caption-side:top">
                                <h4 class="m-0 font-weight-bold text-primary" style="text-align: center;">Filtrar</h4>
                                </caption>

                                <tr style="background: #0b56bf;">
                                    <td  style="text-align: center;"><h5 style ="color:white; font-weight:bold;">Fecha de Orden</h5></td>
                                    <td  style="text-align: center;"><h5 style ="color:white; font-weight:bold;">Orden Baan</h5></td>
                                    <td  style="text-align: center;"><h5 style ="color:white; font-weight:bold;">Cliente</h5></td>
                                    <td  style="text-align: center;"><h5 style ="color:white; font-weight:bold;">Articulo</h5></td>
                                </tr>

                                <tr>
                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Fecha Inicial</h6>
                                        <input class="campo__field" type="date" id="fechaInicial" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                    </td>

                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Baan Inicial</h6>
                                        <input class="campo__field" type="text" id="baanInicial" list="baan" placeholder="Baan Inicial" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                        <?php
                                            $reg = dispOrdenBaan($conn,$_SESSION["idCompania"]);
                                            
                                            echo "<datalist id='baan'>";
                                            while($row = mysqli_fetch_assoc($reg))
                                            {
                                                echo "<option>".$row["ordenBaan"]."</option>";
                                            }
                                            echo "</datalist>";
                                        ?>
                                    </td>

                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Cliente Inicial</h6>
                                        <input class="campo__field" type="text" name="clienteInicial" id="clienteInicial" list="clientes" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                        <?php
                                            $reg = dispClientes($conn,$_SESSION["idCompania"]);
                                            
                                            echo "<datalist id='clientes'>";
                                            while($row = mysqli_fetch_assoc($reg))
                                            {
                                                if($row["estatus"]==1){
                                                    echo "<option>".$row["idCliente"]."</option>";
                                                }
                                            }
                                            echo "</datalist>";
                                        ?>
                                    </td>

                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Articulo Inicial</h6>
                                        <input class="campo__field" type="text" name="articuloInicial" id="articuloInicial" list="articulos" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                        <?php
                                            $reg = dispArticuloVendido($conn,$_SESSION["idCompania"]);
                                            
                                            echo "<datalist id='articulos'>";
                                            while($row = mysqli_fetch_assoc($reg))
                                            {
                                                if($row["estatus"]==1){
                                                    echo "<option>".$row["idArticulo"]."</option>";
                                                }
                                            }
                                            echo "</datalist>";
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Fecha Final</h6>
                                        <input class="campo__field" type="date" id="fechaFinal" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                    </td>

                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Baan Final</h6>
                                        <input class="campo__field" type="text" id="baanFinal" placeholder="Baan Final" list="baan" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                    </td>

                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Cliente Final</h6>
                                        <input class="campo__field" type="text" name="clienteFinal" id="clienteFinal" list="clientes" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                    </td>

                                    <td>
                                        <h6 class="m-0 font-weight-bold text-primary">Articulo Final</h6>
                                        <input class="campo__field" type="text" name="articuloFinal" id="articuloFinal" list="articulos" onblur="AjaxFunction8('dispAllOrdenesByFiltro','fechaInicial','fechaFinal','baanInicial','baanFinal','clienteInicial','clienteFinal','articuloInicial','articuloFinal','tableOrders')">
                                    </td>
                                </tr>
                            </table><br><br>
                        </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" id = "tableDIV">
                            <table class="table table-bordered" id="allOrdersTable" width="100%" cellspacing="0">
                                    <caption style="caption-side:top">
                                        <p align="center" style="font-weight:bold;">Reporte de Ordenes de Venta</p>
                                    </caption>
                                    <thead>
                                        <tr align="center">
                                            <th>Orden</th>
                                            <th>Orden Baan</th>
                                            <th>Cliente</th>
                                            <th>Nombre Cliente</th>
                                            <th>Direccion de Entrega</th>                                            
                                            <th>Fecha Orden</th>
                                            <th>Fecha Solicitud</th>
                                            <th>Fecha Entrega</th>
                                            <th>Estatus</th>
                                            <th>FAC</th>
                                            <th>CXC</th>
                                            <th>PRE</th>
                                            <th>CST</th>
                                            <th>ING</th>
                                            <th>PLN</th>
                                            <th>REP</th>
                                            <th>FEC</th>
                                            <th>Articulo</th>
                                            <th>Cantidad</th>
                                            <th>Unidad de Venta </th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id = "tableOrders">
                                    <?php
                                        //Getting authorised data from server at functions_reportes
                                        $reg = dispAllOrders($conn,$_SESSION["idCompania"]);

                                        while($orders = mysqli_fetch_assoc($reg))
                                        {
                                            //Order Info
                                            $idOrden       = $orders["idOrden"];
                                            $ordBaan       = $orders["ordenBaan"];
                                            $idCliente     = $orders["idCliente"];
                                            $nombreCliente = $orders["nombreCliente"];
                                            $dirEnt        = $orders["dirEnt"];
                                            $fechaOrden    = $orders["fechaOrden"];
                                            $fechaSol      = $orders["fechaSolicitud"];
                                            $fechaEnt      = $orders["fechaEntrega"];
                                            $estatus       = $orders["estatus"];
                                            $idArticulo    = $orders["idArticulo"];
                                            $cantidad      = $orders["cantidad"];
                                            $udVta         = $orders["udVta"];
                                            $precio        = $orders["precio"];
                                            
                                            $fac     =  $orders["vFacturas"];
                                            $cxc     =  $orders["vCxC"];
                                            $pre     =  $orders["vPrecios"];
                                            $cst     =  $orders["vCostos"];
                                            $ing     =  $orders["vIng"];
                                            $pln     =  $orders["vPlaneacion"];
                                            $servCli =  $orders["vServCli"];
                                            $rep     =  $orders["vREP"];
                                            $fec     =  $orders["vFEC"];

                                            $total         = $orders["total"];
                                            $observaciones = $orders["descripcion"];

                                            //Checkboxes
                                            $facCheck = "";
                                            $cxcCheck = "";
                                            $preCheck = "";
                                            $cstCheck = "";
                                            $ingCheck = "";
                                            $plnCheck = "";
                                            $sClCheck = "";
                                            $repCheck = "";
                                            $fecCheck = "";


                                            if($fac == '1'){$facCheck = "checked";}
                                            if($cxc == '1'){$cxcCheck = "checked";}
                                            if($pre == '1'){$preCheck = "checked";}
                                            if($cst == '1'){$cstCheck = "checked";}
                                            if($ing == '1'){$ingCheck = "checked";}
                                            if($pln == '1'){$plnCheck = "checked";}
                                            if($servCli == '1'){$sClCheck = "checked";}
                                            if($rep == '1'){$repCheck = "checked";}
                                            if($fec == '1'){$fecCheck = "checked";}

                                            //Creating table
                                            echo "<tr>";
                                            echo "<td> $idOrden </td>";
                                            echo "<td> $ordBaan </td>";
                                            echo "<td> $idCliente </td>";
                                            echo "<td> $nombreCliente </td>";
                                            echo "<td> $dirEnt </td>";
                                            echo "<td> $fechaOrden </td>";
                                            echo "<td> $fechaSol </td>";
                                            echo "<td> $fechaEnt </td>";
                                            echo "<td> $estatus </td>";
                                            
                                            echo "<td> <input  type='checkbox' name='fac_".$idOrden."'  id='fac_".$idOrden."' ".$facCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='cxc_".$idOrden."'  id='cxc_".$idOrden."' ".$cxcCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='pre_".$idOrden."'  id='pre_".$idOrden."' ".$preCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='cst_".$idOrden."'  id='cst_".$idOrden."' ".$cstCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='ing_".$idOrden."'  id='ing_".$idOrden."' ".$ingCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='pln_".$idOrden."'  id='pln_".$idOrden."' ".$plnCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='rep_".$idOrden."'  id='rep_".$idOrden."' ".$repCheck." disabled> </td>";
                                            echo "<td> <input  type='checkbox' name='fec_".$idOrden."'  id='fec_".$idOrden."' ".$fecCheck." disabled> </td>";

                                            echo "<td> $idArticulo </td>";
                                            echo "<td> $cantidad </td>";
                                            echo "<td> $udVta </td>";
                                            echo "<td> $precio </td>";
                                            echo "<td> $total </td>";
                                            echo "<td> $observaciones </td>";
                                            echo "</tr>";
                                        }

                                        
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                    }else{
                        include("404.php");
                    }
                    
                    ?>

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

</body>

</html>