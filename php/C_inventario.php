<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include("../includes/header.php");
        require_once("../includes/dbh.inc.php");
	    require_once("../includes/functions_catalogos.php");
    ?>
	<link rel="stylesheet" href="../css/stylesForms.css">
	<link rel="stylesheet" href="../css/normalize.css">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
		<div >
			
			<?php
				include("../includes/sidebar.php")
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
                                include("forms/FC_inventario.php");
                                if(isset($_POST["C_inventario"])){
                                    $idCompania = $_SESSION["idCompania"];
                                    $reg = dispInventario($conn,$idCompania);
                                    echo "<div class='card shadow mb-4'>
                                            <div class='card-header py-3'>
                                                <h6 class='m-0 font-weight-bold text-primary'>Listado de Inventarios</h6>
                                            </div>
                                            <div class='card-body'>
                                                <div class='table-responsive'>
                                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                                        <thead>
                                                            <tr align='center'>
                                                                <th>ID Compañía</th>
                                                                <th>ID Almacen</th><!---->
                                                                <th>ID Artículo</th><!---->
                                                                <th>Stock</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>";
                                    while ($row=mysqli_fetch_assoc($reg)){
                                                            echo "  <tr>
                                                                        <td align='center'>".$row["idCompania"]."</td>
                                                                        <td align='center'>".$row["idAlmacen"]."</td>
                                                                        <td align='center'>".$row["idArticulo"]."</td>
                                                                        <td align='center'>".$row["stock"]."</td>
                                                                    </tr>";
                                                        }

                                    echo " 
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>";
                                }

                                if(isset($_GET["error"]))
                                {
                                    if($_GET["error"] == "success")
                                    {
                                        echo "<p style='color: black;'> ¡Artículo dado de alta exitosamente! </p>";
                                    }
                                    if($_GET["error"] == "sqlerror")
                                    {
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