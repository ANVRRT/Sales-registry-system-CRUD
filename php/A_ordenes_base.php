<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include("../includes/header.php");
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
                                            <th>Orden</th>
                                            <th>Compañia</th>
                                            <th>Cliente</th>
                                            <th>Dirección Entrega</th>
                                            <th>Estatus</th>
                                            <th>Num. Orden compra</th>
                                            <th>Fecha Orden</th>
                                            <th>tFac</th>
                                            <th>tCxC</th>
                                            <th>tPRE</th>
                                            <th>tCST</th>
                                            <th>tING</th>
                                            <th>tPLN</th>
                                            <th>tFEC</th>
                                            <th>Total</th>
                                            <th>vFac</th>
                                            <th>vCxC</th>
                                            <th>vPRE</th>
                                            <th>vCST</th>
                                            <th>vING</th>
                                            <th>vPLN</th>
                                            <th>vServCli</th>
                                            <th>vREP</th>
                                            <th>vFEC</th>
                                            <th>Autorización</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr >
                                            <td>0001</td>
                                            <td>CC001</td>
                                            <td>A01</td>
                                            <td>01 Ags</td>
                                            <td align="center"><input  type="checkbox" name="estatus" id="estatus"></td>
                                            <td>0001</td>
                                            <td>2021/04/05</td>
                                            <td>2021/04/02</td>
                                            <td>2021/04/01</td>
                                            <td>2021/04/05</td>
                                            <td>2021/04/04</td>
                                            <td>2021/03/31</td>
                                            <td>2021/04/02</td>
                                            <td>2021/04/02</td>
                                            <td>3</td>
                                            <td align="center"><input  type="checkbox" name="vFacturas"   id="vFacturas"></td>
                                            <td align="center"><input  type="checkbox" name="vCxC"        id="vCxC" ></td>
                                            <td align="center"><input  type="checkbox" name="vPrecios"    id="vPrecios"></td>
                                            <td align="center"><input  type="checkbox" name="vCostos"     id="vCostos" ></td>
                                            <td align="center"><input  type="checkbox" name="vIng"        id="vIng"></td>
                                            <td align="center"><input  type="checkbox" name="vPlaneacion" id="vPlaneacion"></td>
                                            <td align="center"><input  type="checkbox" name="vServCli"    id="vServCli" ></td>
                                            <td align="center"><input  type="checkbox" name="vREP"        id="vREP"></td>
                                            <td align="center"><input  type="checkbox" name="vFEC"        id="vFEC"></td>
                                            <td align="center"><input name="autorizar" type="button" value="Autorizar orden" class="btn btn-primary"></td>
                                            
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