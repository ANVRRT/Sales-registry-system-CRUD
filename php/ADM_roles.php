<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once("../includes/dbh.inc.php");
    include("../includes/header.php");
    ?>
    <link rel="stylesheet" href="../css/stylesForms.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div>

            <?php
            include("../includes/sidebar.php");
            require_once("../includes/functions_admin.php");

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
                            include("forms/FADM_roles.php");
                            if (isset($_POST["ADM_roles"])) {
                                $reg = dispRoles($conn, $_SESSION["idCompania"]);
                                echo "<div class='card shadow mb-4'>
                                            <div class='card-header py-3'>
                                                <h6 class='m-0 font-weight-bold text-primary'>Listado de Permisos</h6>
                                            </div>
                                            <div class='card-body'>
                                                <div class='table-responsive'>
                                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                                        <thead>
                                                            <tr align='center'>
                                                                <th>Compania</th>
                                                                <th>Rol</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>";
                                while ($row = mysqli_fetch_assoc($reg)) {
                                    echo "  
                                    <tr>
                                        <td align='center'>" . $row["idCompania"] . "</td>
                                        <td align='center'>" . $row["rol"] . "</td>
                                    </tr>";
                                }

                                echo " 
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>";
                            }
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "success") {
                                    echo "<p style='color: black;'> ¡Rol dado de alta exitosamente! </p>";
                                }
                                if ($_GET["error"] == "success2") {
                                    echo "<p style='color: black;'> ¡Rol dado de baja exitosamente! </p>";
                                }
                                if ($_GET["error"] == "sqlerror") {
                                    echo "<p style='color: black;'> ¡Algo salió mal! </p>";
                                }
                            }
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