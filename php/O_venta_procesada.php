<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../includes/header.php");
    ?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Ordenes de Venta Procesadas</title>
    

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
                    <h1 class="h3 mb-2 text-gray-800">Ordenes de Venta Procesadas</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de Ordenes de Venta Procesadas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Orden</th>
                                            <th scope="col">Fec.Ord.</th>
                                            <th scope="col">Fec.Sol.</th>
                                            <th scope="col">Fec.Ent.</th>
                                            <th scope="col">Articulo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Ord.Baan.</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Producido</th>
                                            <th scope="col">Entregado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Orden</th>
                                            <th scope="col">Fec.Ord.</th>
                                            <th scope="col">Fec.Sol.</th>
                                            <th scope="col">Fec.Ent.</th>
                                            <th scope="col">Articulo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Ord.Baan.</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Producido</th>
                                            <th scope="col">Entregado</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                   		<tr style="margin:auto">
                                            <td>792</td>
                                            <td>INDUSTRIA DE ALIMENTOS NUTRIWELL</td>
                                            <td>47843</td>
                                            <td>29-ene-2021</td>
                                            <td>19-feb-2021</td>
                                            <td>19-ene-2021</td>
                                            <td>KD420117102</td>
                                            <td>303060000 DIV.LARGA</td>
                                            <td>185956</td>
                                            <td>1.800</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr style="margin:auto">
                                            <td>792</td>
                                            <td>INDUSTRIA DE ALIMENTOS NUTRIWELL</td>
                                            <td>47843</td>
                                            <td>29-ene-2021</td>
                                            <td>19-feb-2021</td>
                                            <td>19-ene-2021</td>
                                            <td>KD420117102</td>
                                            <td>303060000 DIV.LARGA</td>
                                            <td>185956</td>
                                            <td>1.800</td>
                                            <td>0</td>
                                            <td>0</td>
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
        <em class="fas fa-angle-up"></em>
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
