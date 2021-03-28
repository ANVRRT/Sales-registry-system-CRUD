<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../includes/header.php");
    ?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include("../includes/sidebar.php");
        ?>

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
                    <h1 class="h3 mb-2 text-gray-800">Ordenes de Venta en Proceso</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de Ordenes de Venta en Proceso</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Orden</th>
                                            <th>Cliente</th>
                                            <th>Nombre</th>
                                            <th>Fec.Ord.</th>
                                            <th>Articulo</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Fec.Sol.</th>
                                            <th>Fact</th>
                                            <th>CXC</th>
                                            <th>Precios</th>
                                            <th>Costeo</th>
                                            <th>ING</th>
                                            <th>Motivo ING</th>
                                            <th>PLN</th>
                                            <th>Serv.Cli.</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Orden</th>
                                            <th>Cliente</th>
                                            <th>Nombre</th>
                                            <th>Fec.Ord.</th>
                                            <th>Articulo</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Fec.Sol.</th>
                                            <th>Fact</th>
                                            <th>CXC</th>
                                            <th>Precios</th>
                                            <th>Costeo</th>
                                            <th>ING</th>
                                            <th>Motivo ING</th>
                                            <th>PLN</th>
                                            <th>Serv.Cli.</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                   		<tr align="center">
                                            <td>47568</td>
                                            <td>001032</td>
                                            <td>Articulos Decorativos y Soluciones</td>
                                            <td>KS290018856</td>
                                            <td>A-3 KRAFT</td>
                                            <td>3.000</td>
                                            <td>3400.000</td>
                                            <td>25-Ene-2021</td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="button" value="Cancelar Orden" class="btn btn-primary"> <br><br>
                                            	<input type="button" value="Borrar Orden" class="btn btn-primary">
                                            </td>

                                        </tr>
                                        <tr align="center">
                                            <td>47568</td>
                                            <td>001032</td>
                                            <td>Articulos Decorativos y Soluciones</td>
                                            <td>KS290018856</td>
                                            <td>A-3 KRAFT</td>
                                            <td>3.000</td>
                                            <td>3400.000</td>
                                            <td>25-Ene-2021</td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="button" value="Cancelar Orden" class="btn btn-primary"> <br><br>
                                            	<input type="button" value="Borrar Orden" class="btn btn-primary">
                                            </td>

                                        </tr>
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
                        <span>Copyright &copy; Your Website 2020</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
