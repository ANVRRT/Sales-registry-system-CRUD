<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include("../includes/header.php");
        require_once("../includes/dbh.inc.php");
        
    ?>
	<link rel="stylesheet" href="../css/stylesForms.css">
	<link rel="stylesheet" href="../css/normalize.css">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="../js/catalogos/articuloExistente.js"></script> -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
		<div >
			
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
                                if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_artExistente")))) {
                                    include("forms/FC_articuloExistente.php");
                                }else{
                                    include("404.php");
                                }
                                if(isset($_POST["C_articuloExistente"])){
                                    $idCompania = $_SESSION["idCompania"];
                                    $reg = dispArticulos($conn,$idCompania);
                                    echo "<div class='card shadow mb-4'>
                                            <div class='card-header py-3'>
                                                <h6 class='m-0 font-weight-bold text-primary'>Listado de Artículos Existentes</h6>
                                            </div>
                                            <div class='card-body'>
                                                <div class='table-responsive'>
                                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                                        <thead>
                                                            <tr align='center'>
                                                                <th>ID Compañía</th>
                                                                <th>ID Artículo</th><!---->
                                                                <th>Descripción</th><!---->
                                                                <th>Costo Estándar</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>";
                                    while ($row=mysqli_fetch_assoc($reg)){
                                                        if ($row["estatus"] == 1){
                                                                echo "  <tr>
                                                                            <td align='center'>".$row["idCompania"]."</td>
                                                                            <td align='center'>".$row["idArticulo"]."</td>
                                                                            <td align='center'>".$row["descripcion"]."</td>
                                                                            <td align='center'>".$row["costosEstandar"]."</td>
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
        <em class="fas fa-angle-up"></em>
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