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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
		<div >
			
			<?php
				include("../includes/sidebar.php");
                require_once("../includes/functions_catalogos.php");
                require_once("../includes/functions_reporteOrden.php");
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
                            <div class="fix-margin">
                                <h1 class="h1-mine">Generar texto</h1>

                                <!--<form class="formulario" autocomplete="off" action="../includes/generate_json.php" method="GET">-->
                                <form class="formulario" method="post"  autocomplete="off">

                                    <div class="campo">
                                    <div class="campo">
                                    <label class="campo__label" for="id_or">ID Orden</label>
                                    <input class="campo__field" type="text"  name="idOrden"id="idOrden" list="ordenes" onblur="AjaxFunction('dispFolioByOrden','idOrden','folioList')" required>
                                    <?php
                                        $reg = dispOrdenERP($conn, $_SESSION["idCompania"]);
                                            
                                        echo "<datalist id='ordenes'>";
                                        while($row = mysqli_fetch_assoc($reg))
                                        {
                                            echo "<option>".$row["idOrden"]."</option>";
    
                                        }
                                        echo "</datalist>";
                                    ?>

                                    

                                    </div>
                                </form>

                                <?php
                                    
                                    echo '<style> a:hover {text-decoration: none} </style>';
                                    echo '<div style = "text-align: center;"> <a style = "display:block; color: white;" class="campo__field button--blue" href="../txtBaan/ReporteOrden.txt" download="ReporteOrden.txt">Descargar Archivo</a> </div>';

                                ?>

                                
                                
                                

                                
                            </div>
                        </div>
                    </div>
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>