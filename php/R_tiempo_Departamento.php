<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once("../includes/dbh.inc.php");
    include("../includes/header.php");
    ?>
    <link rel="stylesheet" href="../css/stylesForms.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles-capOrden.css">
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

                    if ((roles($_SESSION["rol"], array("ADM","PLN","DIR"))) || (permissions($_SESSION["permisos"], array("pr_tiempoDepto")))) {
                    ?>
                    <!-- Page Heading -->
                    <h1 >Reporte de Tiempo Promedio por Departamento</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ordenes de venta con todas las autorizaciones</h6>
                            <input type="button" style="background: blue; color: white; border-radius: 15px; border:0px; width: 150px; height:30px;" value="Generar PDF" onclick="generatePDF_TD()">
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Filtrar por Fecha de Orden</h6>

                            <h5>Fecha Inicial</h5>
                            <input type="date" id="fechaInicial" onblur="AjaxFunction2('dispOrdenesByFechas','fechaInicial','fechaFinal','tableBodyFechas')">
                            <h5>Fecha Final</h5>
                            <input type="date" id="fechaFinal" onblur="AjaxFunction2('dispOrdenesByFechas','fechaInicial','fechaFinal','tableBodyFechas')">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="fechasTabla" width="100%" cellspacing="0">
                                    <caption style="caption-side:top">
                                        <p align="center" style="font-weight:bold;">Reporte de Tiempo Promedio por Departamento</p>
                                    </caption>
                                    <thead>
                                        <tr align="center">
                                            <th>Orden</th>
                                            <th>Cliente</th>
                                            <th>Nombre Cliente</th>                                            
                                            <th>Fecha Orden</th>
                                            <th>FAC</th>
                                            <th>CXC</th>
                                            <th>PRE</th>
                                            <th>CST</th>
                                            <th>ING</th>
                                            <th>PLN</th>
                                            <th>FEC</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id = "tableBodyFechas">
                                    <?php
                                        //Getting authorised data from server at functions_reportes
                                        $reg = dispOrdenes($conn,$_SESSION["idCompania"]);

                                        while($orders = mysqli_fetch_assoc($reg))
                                        {
                                            //Order Info
                                            $noOrden       = $orders["idOrden"];
                                            $idCliente     = $orders["idCliente"];
                                            $nombreCliente = $orders["nombreCliente"];
                                            $fechaOrden    = $orders["fechaOrden"];

                                            $tFacB = $orders["tFac"];
                                            $tFecB = $orders["tFEC"];
                                            


                                            //Validacion Fac y FEC
                                            if(tiempoPorDepartamento($tFacB,$fechaOrden)<=0)
                                            {
                                                $tFacB = $fechaOrden;
                                            }
                                            if(tiempoPorDepartamento($tFecB,$fechaOrden)<=0)
                                            {
                                                $tFecB = $fechaOrden;
                                            }

                                            //Tiempo por departamento
                                            $fac =  tiempoPorDepartamento($tFacB,$fechaOrden);
                                            $cxc =  tiempoPorDepartamento($orders["tCXC"],$fechaOrden);
                                            $pre =  tiempoPorDepartamento($orders["tPRE"],$fechaOrden);
                                            $cst =  tiempoPorDepartamento($orders["tCST"],$fechaOrden);
                                            $ing =  tiempoPorDepartamento($orders["tING"],$fechaOrden);
                                            $pln =  tiempoPorDepartamento($orders["tPLN"],$fechaOrden);
                                            $fec =  tiempoPorDepartamento($tFecB,$fechaOrden);

                                            $total = $orders["total"];

                                            //Creating table
                                            echo "<tr>";
                                            echo "<td> $noOrden </td>";
                                            echo "<td> $idCliente </td>";
                                            echo "<td> $nombreCliente </td>";
                                            echo "<td> $fechaOrden </td>";
                                            echo "<td> $fac </td>";
                                            echo "<td> $cxc </td>";
                                            echo "<td> $pre </td>";
                                            echo "<td> $cst </td>";
                                            echo "<td> $ing </td>";
                                            echo "<td> $pln </td>";
                                            echo "<td> $fec </td>";
                                            echo "<td> $total </td>";
                                            echo "</tr>";

                                        }

                                        
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    else{
                        include("404.php");
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!--<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Cartones Corrugados 2020</span>
                    </div>
                </div>
            </footer>-->
            <?php
                include("../includes/bottom.php");
            ?>
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