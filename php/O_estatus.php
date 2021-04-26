<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include("../includes/header.php");
        require_once("../includes/dbh.inc.php");
    ?>
    <link rel="stylesheet" href="../css/stylesForms.css">
    <link rel="stylesheet" href="../css/normalize.css">
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

                                if ((roles($_SESSION["rol"], array("ADM","AGE","CXC","PLN","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"], array("po_estatus")))) {
                                    include("forms/FO_estatus.php");
                                }else{
                                    include("404.php");
                                }


                            	if(isset($_POST["Buscar"])){
                            		//$idCliente=$_POST["idCliente"];
                            		$idCompania=$_SESSION["idCompania"];
                            		$reg = dispOrden($conn, $idCompania);
                            		
                                    echo "<div class='table-responsive'>
                                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                                     <thead>
                                                        <tr align='center'>";
                                    echo "<th>Orden</th>";
                                    echo "<th>Compañia</th>";
                                    echo "<th>Cliente</th>";
                                    echo "<th>Dirección Entrega</th>";
                                    echo "<th>Estatus</th>";
                                    echo "<th>Num. Orden compra</th>";
                                    echo "<th>Fecha Orden</th>";
                                    echo "<th>vFac</th>";
                                    echo "<th>vCxC</th>";
                                    echo "<th>vPRE</th>";
                                    echo "<th>vCST</th>";
                                    echo "<th>vING</th>";
                                    echo "<th>vPLN</th>";
                                    echo "<th>vFEC</th>";
                                    echo "<th>vServCli</th>";
                                    echo "<th>vREP</th>
                                        </tr>
                                        </thead>

                                        <tbody>";

                                    


                                    if ($_POST["estatus"] == "Todas"){
                                        while ($row=mysqli_fetch_assoc($reg)){
                                                $vEstatus_chked = "";
                                                $vFacturas_chked = "";
                                                $vCXC_chked = "";
                                                $vPrecios_chked = "";
                                                $vCostos_chked = "";
                                                $vIng_chked = "";
                                                $vPlaneacion_chked = "";
                                                $vServCli_chked = "";
                                                $vREP_chked = "";
                                                $vFEC_chked = "";
                                                
                                                if($row["vFacturas"]=="1"){
                                                    $vFacturas_chked = "checked";
                                                }
                                                if($row["vCxC"]=="1"){
                                                    $vCXC_chked = "checked";
                                                }
                                                if($row["vPrecios"]=="1"){
                                                    $vPrecios_chked = "checked";
                                                }
                                                if($row["vCostos"]=="1"){
                                                    $vCostos_chked = "checked";
                                                }
                                                if($row["vIng"]=="1"){
                                                    $vIng_chked = "checked";
                                                }
                                                if($row["vPlaneacion"]=="1"){
                                                    $vPlaneacion_chked = "checked";
                                                }
                                                if($row["vServCli"]=="1"){
                                                    $vServCli_chked = "checked";
                                                }
                                                if($row["vREP"]=="1"){
                                                    $vREP_chked = "checked";
                                                }
                                                if($row["vFEC"]=="1"){
                                                    $vFEC_chked = "checked";
                                                }
                                                if($row["estatus"]=="1"){
                                                        $vEstatus_chked = "checked";
                                                }
                                                echo "<tr>";
                                                echo "<td id='idOrden' style='text-align: center;'>". $row["idOrden"] ."</td>";
                                                echo "<td id='compania' style='text-align: center;'>". $row["idCompania"] ."</td>";
                                                echo "<td id='idCliente' style='text-align: center;'>". $row["idCliente"] ."</td>";
                                                echo "<td id='dirEnt' style='text-align: center;'>". $row["dirEnt"] ."</td>";
                                                echo "<td align='center'><input  type='checkbox' name='estatus'        id='estatus' ".$vEstatus_chked." disabled></td>";
                                                echo "<td id='ordCompra' style='text-align: center;'>". $row["ordenCompra"] ."</td>";
                                                echo "<td style='text-align: center;'><input  type='date' name='fechaOrden' id='fechaOrden' value='".$row["fechaOrden"]."' readonly></td>";

                                                echo "<td align='center'><input  type='checkbox' name='vFacturas'   id='vFacturas' ".$vFacturas_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vCxC'        id='vCxC' ".$vCXC_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vPrecios'    id='vPrecios' ".$vPrecios_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vCST'        id='vCostos' ".$vCostos_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vIng'        id='vIng' ".$vIng_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vPLN'        id='vPLN' ".$vPlaneacion_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vFEC'        id='vFEC' ".$vFEC_chked." disabled></td>";
                                                
                                                echo "<td align='center'><input  type='checkbox' name='vServCli'    id='vServCli' ".$vServCli_chked." disabled></td>";
                                                echo "<td align='center'><input  type='checkbox' name='vREP'        id='vREP' ".$vREP_chked." disabled></td>";

                                                echo "</tr>";
                                                        }
                                                    }
                                    else{
                                        
                                        if ($_POST["estatus"] == "En proceso"){
                                            $estat = "0";
                                        }
                                        else{
                                            $estat = "1";
                                        }

    					                while ($row=mysqli_fetch_assoc($reg)){
    					                       if($row["estatus"]==$estat){
                                                    $vEstatus_chked = "";
                                                    $vFacturas_chked = "";
                                                    $vCXC_chked = "";
                                                    $vPrecios_chked = "";
                                                    $vCostos_chked = "";
                                                    $vIng_chked = "";
                                                    $vPlaneacion_chked = "";
                                                    $vServCli_chked = "";
                                                    $vREP_chked = "";
                                                    $vFEC_chked = "";
                                                    
                                                    if($row["vFacturas"]=="1"){
                                                        $vFacturas_chked = "checked";
                                                    }
                                                    if($row["vCxC"]=="1"){
                                                        $vCXC_chked = "checked";
                                                    }
                                                    if($row["vPrecios"]=="1"){
                                                        $vPrecios_chked = "checked";
                                                    }
                                                    if($row["vCostos"]=="1"){
                                                        $vCostos_chked = "checked";
                                                    }
                                                    if($row["vIng"]=="1"){
                                                        $vIng_chked = "checked";
                                                    }
                                                    if($row["vPlaneacion"]=="1"){
                                                        $vPlaneacion_chked = "checked";
                                                    }
                                                    if($row["vServCli"]=="1"){
                                                        $vServCli_chked = "checked";
                                                    }
                                                    if($row["vREP"]=="1"){
                                                        $vREP_chked = "checked";
                                                    }
                                                    if($row["vFEC"]=="1"){
                                                        $vFEC_chked = "checked";
                                                    }
                                                    if($row["estatus"]=="1"){
                                                        $vEstatus_chked = "checked";
                                                    }
                                                    echo "<tr>";
                                                    echo "<td id='idOrden' style='text-align: center;'>". $row["idOrden"] ."</td>";
                                                    echo "<td id='compania' style='text-align: center;'>". $row["idCompania"] ."</td>";
                                                    echo "<td id='idCliente' style='text-align: center;'>". $row["idCliente"] ."</td>";
                                                    echo "<td id='dirEnt' style='text-align: center;'>". $row["dirEnt"] ."</td>";
                                                    echo "<td align='center'><input  type='checkbox' name='estatus'        id='estatus' ".$vEstatus_chked." disabled></td>";
                                                    echo "<td id='ordCompra' style='text-align: center;'>". $row["ordenCompra"] ."</td>";
                                                    echo "<td style='text-align: center;'><input  type='date' name='fechaOrden' id='fechaOrden' value='".$row["fechaOrden"]."' readonly></td>";

                                                    echo "<td align='center'><input  type='checkbox' name='vFacturas'   id='vFacturas' ".$vFacturas_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vCxC'        id='vCxC' ".$vCXC_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vPrecios'    id='vPrecios' ".$vPrecios_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vCST'        id='vCostos' ".$vCostos_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vIng'        id='vIng' ".$vIng_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vPLN'        id='vPLN' ".$vPlaneacion_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vFEC'        id='vFEC' ".$vFEC_chked." disabled></td>";
                                                    
                                                    echo "<td align='center'><input  type='checkbox' name='vServCli'    id='vServCli' ".$vServCli_chked." disabled></td>";
                                                    echo "<td align='center'><input  type='checkbox' name='vREP'        id='vREP' ".$vREP_chked." disabled></td>";

                                                    echo "</tr>";
    					                                    }
                                                        }
                                                    }


									echo " 
					                                        
					                                    </tbody>
					                                </table>
					                            </div>
					                        </div>
					                    </div>";
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