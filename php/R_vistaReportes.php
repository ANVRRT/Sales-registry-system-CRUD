<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("../includes/header.php");
        require_once("../includes/dbh.inc.php");
        require_once("../includes/functions_reportesGraficos.php");
    ?>
    <!--<link rel="stylesheet" href="../css/styles-capOrden.css"> -->
    <link rel="stylesheet" href="../css/normalize.css">
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
                    <?php
                    if ((roles($_SESSION["rol"], array("ADM","DIR"))) || (permissions($_SESSION["permisos"], array("pr_reportes")))) {

                    ?>
                    <div class="col-lg-12">
                        <div class="card-body">
                            <?php
                                include("forms/FR_seleccionReporte.php");
                            	if(isset($_POST["Generar"])){
                                    $op=$_POST["tipoReporte"];
                                    if($op=="VUV"){
                                        echo"<h2 align='center'>Ventas por Unidad de Venta</h2>";
                                        include("R_reporteUV.php");
                                    }else if($op=="VA"){
                                        echo"<h2 align='center'>Ventas por Artículo</h2>";
                            		    include("R_reporteArticulo.php");
                                    }else if($op=="VC"){
                                        echo"<h2 align='center'>Ventas por Cliente</h2>";
                            		    include("R_reporteCliente.php");
                                    }else if($op=="VR"){
                                        echo"<h2 align='center'>Ventas por Representante</h2>";
                            		    include("R_reporteRepresentante.php");
                                    }else if($op=="VMA"){
                                        echo"<h2 align='center'>Ventas por Fecha</h2>";
                            		    include("R_reporteMA.php");
                                    }
                            	}
                            ?>
                        </div>
                    </div>
                    <?php
                    }else{
                        include("404.php");
                    }
                    ?>
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