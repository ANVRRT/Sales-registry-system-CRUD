<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include("../includes/header.php");

    ?>

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/catalogos/pop-out-window-return.js"></script>

    <!-- <link href="../js/catalogos/pop-out-window-return.js" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/estilo-ventana-emergente.css">

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
                    <h1 class="h3 mb-2 text-gray-800">Autorización Ordenes de Venta (VTA)</h1>
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
                                                <!-- <th>Rep</th> -->
                                                <!-- <th>Cambios</th> -->
                                                <th>Orden de compra</th>
                                                <!-- <th>Stock</th> -->
                                                <th>Nota</th>
                                                <th>Actualización</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $row["idOrden"] = "47842456";
                                            $row["idArticulo"] = "KS290019078";
                                            $row["cantidad"] = "45";
                                            $row["precio"] = "3,5000";
                                            $row["fechaSolicitud"] = "29-01-2021";
                                            $row["fechaEntrega"] = "09-02-2021";
                                            echo "<tr >";
                                            echo "<td>115048</td>";
                                            echo "<td>UNILEVER MANUFAC.</td>";
                                            echo "<td id='" . $row["idOrden"] . "'>47842456</td>";
                                            echo "<td>29/ene/2021</td>";
                                            echo "<td id='" . $row["idArticulo"] . "_" . $row["idOrden"] . "'>KS290019078</td>";
                                            echo "<td>67570548 CC GEN</td>";
                                            echo "<td>09/feb/2021</td>";
                                            echo "<td id='" . $row["cantidad"] . "_" . $row["idOrden"] . "'>450</td>";
                                            echo "<td id='" . $row["precio"] . "_" . $row["idOrden"] . "'>3,5000</td>";
                                            echo "<td>MXP</td>";
                                            echo "<td id='" . $row["fechaSolicitud"] . "_" . $row["idOrden"] . "'>29/ene/2021</td>";
                                            echo "<td id='" . $row["fechaEntrega"] . "_" . $row["idOrden"] . "'>09/feb/2021</td>";
                                            echo "<td align='center'><input  type='checkbox' name='PREC'></td>";
                                            // <!-- <td align="center"><input  type="checkbox" name="Rep"></td> -->
                                            // <!-- <td>sin cambios</td> -->
                                            echo "<td>4504113782</td>";
                                            // <!-- <td>0</td> -->
                                            echo "<td id='nota'></td>";
                                            echo "<td align='center'>";
                                            echo "<input type='button' class='btn btn-primary'  data-toggle='modal' data-target='#ventana' value='Actualizar Orden' onClick='returnDataIntoPOW(document.getElementById(\"" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["idArticulo"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["cantidad"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["precio"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["fechaSolicitud"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["fechaEntrega"] . "_" . $row["idOrden"] . "\").innerHTML);'> ";
                                            // <!--<button onClick="abrir()" id="btn-abrir-popup" type="button" class="btn btn-primary">Actualizar orden</button>-->
                                            echo "</td>";
                                            echo "</tr>";
                                            ?>
                                            <?php
                                            $row["idOrden"] = "001";
                                            $row["idArticulo"] = "KS001";
                                            $row["cantidad"] = "10";
                                            $row["precio"] = "10";
                                            $row["fechaSolicitud"] = "2021-02-04";
                                            $row["fechaEntrega"] = "2021-01-01";
                                            echo "<tr >";
                                            echo "<td>115048</td>";
                                            echo "<td>UNILEVER MANUFAC.</td>";
                                            echo "<td id='" . $row["idOrden"] . "'>" . $row["idOrden"] . "</td>";
                                            echo "<td>29/ene/2021</td>";
                                            echo "<td id='" . $row["idArticulo"] . "_" . $row["idOrden"] . "'>" . $row["idArticulo"] . "</td>";
                                            echo "<td>67570548 CC GEN</td>";
                                            echo "<td>09/feb/2021</td>";
                                            echo "<td id='" . $row["cantidad"] . "_" . $row["idOrden"] . "'>" . $row["cantidad"] . "</td>";
                                            echo "<td id='" . $row["precio"] . "_" . $row["idOrden"] . "'>" . $row["precio"] . "</td>";
                                            echo "<td>MXP</td>";
                                            echo "<td id='" . $row["fechaSolicitud"] . "_" . $row["idOrden"] . "'>" . $row["fechaSolicitud"] . "</td>";
                                            echo "<td id='" . $row["fechaEntrega"] . "_" . $row["idOrden"] . "'>" . $row["fechaEntrega"] . "</td>";
                                            echo "<td align='center'><input  type='checkbox' name='PREC'></td>";
                                            // <!-- <td align="center"><input  type="checkbox" name="Rep"></td> -->
                                            // <!-- <td>sin cambios</td> -->
                                            echo "<td>4504113782</td>";
                                            // <!-- <td>0</td> -->
                                            echo "<td id='nota'></td>";
                                            echo "<td align='center'>";
                                            echo "<input type='button' class='btn btn-primary'  data-toggle='modal' data-target='#ventana' value='Actualizar Orden' onClick='returnDataIntoPOW(document.getElementById(\"" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["idArticulo"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["cantidad"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["precio"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["fechaSolicitud"] . "_" . $row["idOrden"] . "\").innerHTML,document.getElementById(\"" . $row["fechaEntrega"] . "_" . $row["idOrden"] . "\").innerHTML);'> ";
                                            // <!--<button onClick="abrir()" id="btn-abrir-popup" type="button" class="btn btn-primary">Actualizar orden</button>-->
                                            echo "</td>";
                                            echo "</tr>";
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
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
    <div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <table width="100%">
                        <form name="f_popup" method="POST" action="../includes/functions_autorizaciones.php">
                            <div class="modal-header">
                                <h5 class="titlePop" align="center">¿Estas seguro que deseas Actualizar la orden
                                    <input style="text-align: center;" class="titleorden" name="PO_ORD" id="PO_ORD" size="12%" readonly> del articulo
                                    <input style="text-align: center;" class="titleorden" name="PO_ART" id="PO_ART" size="12%" readonly>?
                                </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div>
                                <tr align="center">
                                    <td>
                                        <p class="textPop">Cantidad</p>
                                        <!--<input class="bloquePop" name="cant" size="10" type="text" placeholder="25.00"  disabled>-->

                                        <input class="bloquePop" type="text" name="PO_CANT" id="PO_CANT" size="12%">

                                    </td>
                                    <td>
                                        <p class="textPop">Precio</p>
                                        <input type="text" name="PO_PRECIO" id="PO_PRECIO" size="10" class="bloquePop">

                                    </td>
                                </tr>

                                <tr align="center">
                                    <td>
                                        <p class="textPop">fecha O.C</p><input class="bloquePop" size="10" type="date" name="PO_FCOMPRA" id="PO_FCOMPRA">
                                    </td>
                                    <td>
                                        <p class="textPop">Fecha Cliente</p><input class="bloquePop" size="10" type="date" name="PO_FCLIENTE" id="PO_FCLIENTE">
                                    </td>
                                </tr>

                            </div>
                            <div>
                                <tr>
                                    <td style="text-align: center;"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></td>
                                    <td style="text-align: center;"><input type="submit" name="A_VTA" class="btn btn-primary" value="Actualizar"></td>
                                    
                                    <!-- <input class="campo__field button--blue" name="A_almacen" type="submit" value="Alta"> -->

                                </tr>

                            </div>
                        </form>
                    </table>


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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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