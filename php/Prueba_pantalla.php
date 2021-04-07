<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../includes/header.php");
    ?>
    <link rel="stylesheet" href="../css/styles-capOrden.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <script type="text/javascript" src="../js/catalogos/AJAX-input-fill.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div>

            <?php
            include("../includes/sidebar.php");
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
                    <div class="col-lg-12">
                        <div class="card-body">
                            <?php
                            // $encontrado = false;
                            // if (($_SESSION["rol"]) != "CXC") {
                            //     if(isset($_SESSION["permisos"])){
                            //         foreach($_SESSION["permisos"] as $permiso){
                            //             if($permiso == "pc_agente"){
                            //                 $encontrado = true;
                            //             }
                            //         }
                            //     }
                            //     if ($encontro == false){
                            //         include("permission!assigned.php");
                            //     }
                            //     else{
                            //         include("FC_agente.php");
                            //     }       
                            // }
                            // else{
                            //     include("FC_agente.php");
                            // }
                            include("prueba.php");
                            ?>
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


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>