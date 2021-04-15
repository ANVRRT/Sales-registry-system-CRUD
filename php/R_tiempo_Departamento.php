<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include("../includes/header.php");
    require_once("../includes/dbh.inc.php");
    require_once("../includes/functions_reportes.php");
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
                    <h1 class="h3 mb-2 text-gray-800">Reporte de Promedio de Tiempo por Departamento</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ordenes de venta con todas las autorizaciones</h6>
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Fitrar por Fecha de Orden</h6>

                            <h5>Fecha Inicial</h5>
                            <input type="date" id="fechaInicial">
                            <h5>Fecha Final</h5>
                            <input type="date" id="fechaFinal" onblur="AjaxFunction2('dispOrdenesByFechas','fechaInicial','fechaFinal','tableBodyFechas')">
                            

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="fechasTabla" width="100%" cellspacing="0">
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
                                        dispOrdenes($conn,$_SESSION["idCompania"]);

                                        
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
