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
            require_once("../includes/functions_catalogos.php");
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
                            if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_factura")))) {
                                include("forms/FC_factura.php");
                            }else{
                                include("404.php");
                            }
                            if (isset($_POST["C_factura"])) {
                                $idCompania = $_SESSION["idCompania"];
                                $reg = dispFactura($conn, $idCompania);
                                echo "<br><br><div class='card shadow mb-4'>
                                            <div class='card-header py-3'>
                                                <h6 class='m-0 font-weight-bold text-primary'>Listado de Facturas</h6>
                                            </div>
                                            <div class='card-body'>
                                                <div class='table-responsive'>
                                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                                        <thead>
                                                            <tr align='center'>
                                                                <th>ID Compañía</th>
                                                                <th>Núm. de Factura</th><!---->
                                                                <th>ID Orden</th><!---->
                                                                <th>ID Artículo</th>
                                                                <th>ID Cliente</th>
                                                                <th>Folio</th>
                                                                <th>Entrega</th>
                                                                <th>Tipo de Transacción</th>
                                                                <th>Fecha de facturación</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>";
                                while ($row = mysqli_fetch_assoc($reg)) {
                                    if ($row["estatus"] == 1) {
                                        echo "  <tr>
                                                                        <td align='center'>" . $row["idCompania"] . "</td>
                                                                        <td align='center'>" . $row["numFact"] . "</td>
                                                                        <td align='center'>" . $row["idOrden"] . "</td>
                                                                        <td align='center'>" . $row["idArticulo"] . "</td>
                                                                        <td align='center'>" . $row["idCliente"] . "</td>
                                                                        <td align='center'>" . $row["folio"] . "</td>
                                                                        <td align='center'>" . $row["entrega"] . "</td>
                                                                        <td align='center'>" . $row["tipoTrans"] . "</td>
                                                                        <td align='center'>" . $row["fechaFac"] . "</td>
                                                                    </tr>";
                                    }
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
                                    echo "<p style='color: black;'> ¡Operación exitosa! </p>";
                                }
                                if ($_GET["error"] == "sqlerror") {
                                    echo "<p style='color: black;'> ¡Algo ocurrio mal! </p>";
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