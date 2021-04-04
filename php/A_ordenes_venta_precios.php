<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include("../includes/header.php");
    ?>

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" href="../css/estilo-ventana-emergente.css">
    <script type="text/javascript" src="../js/popup.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    
    

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
                    <h1 class="h3 mb-2 text-gray-800">Autorización de Fechas definitivas</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ordenes de venta Precios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="f_precios">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>Cliente</th>
                                            <th>Nombre</th>
                                            <th>Orden</th>
                                            <th>Fecha Orden</th>
                                            <th>Artículo</th>
                                            <th>Descripción</th>
                                            <th>Fecha Entrega</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Moneda</th>
                                            <th>Fecha O.C.</th>
                                            <th>Fecha Cliente</th>
                                            <th>PREC</th>
                                            <th>Rep</th>
                                            <th>Cambios</th>
                                            <th>Orden de compra</th>
                                            <th>Stock</th>
                                            <th>Nota</th>
                                            <th>Autorización</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr >
                                            <td>115048</td>
                                            <td>UNILEVER MANUFAC.</td>
                                            <td><input class="datosVerificar" type="text" id="t_orden"  size="12%" value="47842456"    disabled></td>
                                            <td>29/ene/2021</td>
                                            <td><input class="datosVerificar" type="text" id="t_art"    size="12%" value="KS290019078" disabled></td>
                                            <td>67570548 CC GEN</td>
                                            <td>09/feb/2021</td>
                                            <td><input class="datosVerificar" type="text" id="t_cant"   size="12%" value="450"         disabled></td>
                                            <td><input class="datosVerificar" type="text" id="t_pre"    size="12%" value="3,5000"      disabled></td>
                                            <td>MXP</td>
                                            <td><input class="datosVerificar" type="text" id="t_fec1"   size="12%" value="29/ene/2021" disabled></td>
                                            <td><input class="datosVerificar" type="text" id="t_fec1"   size="12%" value="09/feb/2021" disabled></td>
                                            <td align="center"><input  type="checkbox" name="PREC"></td>
                                            <td align="center"><input  type="checkbox" name="Rep"></td>
                                            <td>sin cambios</td>
                                            <td>4504113782</td>
                                            <td>0</td>
                                            <td></td>
                                            <td align="center">
                                                <input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#ventana" value="Autorizar Orden"> 
                                                <!--<button onClick="abrir()" id="btn-abrir-popup" type="button" class="btn btn-primary">Autorizar orden</button>-->
                                                
                                                
                                            </td>
                                            
                                            
                                        </tr>
                                    </tbody>
                                </table></form>
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
    <script>
        dataup('t_cant','ta3');
    </script>
    <!-- End of Page Wrapper -->
    <div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="titlePop" align="center">¿Estas seguro que deseas Autorizar la orden 
                        <input class="titleorden" id=ta1 size="12%" disabled/> del articulo 
                        <input class="titleorden" id=ta2 size="12%" disabled/>?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <table width="100%">
                <form name="f_popup">
                    <div>
                        <tr align="center" >
                            <td><p class="textPop">Cantidad</p>
                                <!--<input class="bloquePop" name="cant" size="10" type="text" placeholder="25.00"  disabled>-->
                                
                                <input class="bloquePop" type="text" id="ta3" size="12%" disabled>     

                            </td>
                            <td><p class="textPop">Precio</p>
                            <input type="text" id="dos"  size="10" class="bloquePop" disabled>
                               
                            </td>
                        </tr>
                        
                        <tr align="center">
                            <td><p class="textPop">fecha O.C</p><input     class="bloquePop" name="fec_OC"   size="10" type="text" placeholder="29/ene/2021" disabled></td>
                            <td><p class="textPop">Fecha Cliente</p><input class="bloquePop" name="fec_Clie" size="10" type="text" placeholder="09/feb/2021" disabled></td>
                        </tr>
                        
                    </div>
                </form></table>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>    
                    <input type="submit" class="btn btn-primary" value="Autorizar">
                    
                </div>
            </div>
        </div>
    </div>
    


   <!--<div class="ventana" id="ventana">
        <a onClick="cerrar()" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
        <h4 size="5">¿Estas seguro que deseas Autorizar la orden 115048 del articulo KS290019078?</h4>
        
        
    </div>


     <div class="overlay" id="overlay">
			<div class="popup" id="popup">

				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>¿Estas seguro que deseas Autorizar la orden 115048 del articulo KS290019078? </h3>
				<form action="">
					<div class="contenedor-inputs">
						<input type="text" placeholder="25.00" disabled>
						<input type="text" placeholder="3500" disabled>
                        <input type="text" placeholder="29/ene/2021" disabled>
                        <input type="text" placeholder="09/feb/2021" disabled>
					</div>

                    <div>
                        <input class="btn btn-secondary" type="button" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-primary" value="Autorizar">
                    </div>
				</form>
			</div>
		</div>
	</div>

	<script src="../js/popup.js"></script>-->


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