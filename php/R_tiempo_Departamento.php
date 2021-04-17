<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include("../includes/header.php");
    require_once("../includes/dbh.inc.php");
    ?>

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesForms.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <script src="../js/reportes/html2pdf.bundle.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("../includes/sidebar.php");
        require_once("../includes/functions_catalogos.php");
        require_once("../includes/functions_reportes.php");


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
                    <h1 class="h3 mb-2 text-gray-800">Reporte de Promedio de Tiempo por Departamento</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ordenes de venta con todas las autorizaciones</h6>
                            <input type="button" style="background: blue; color: white; border-radius: 15px; border:0px; width: 150px; height:30px;" value="Generar PDF" onclick="generatePDF_TD()">
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Fitrar por Fecha de Orden</h6>

                            <h5>Fecha Inicial</h5>
                            <input type="date" id="fechaInicial" onblur="AjaxFunction2('dispOrdenesByFechas','fechaInicial','fechaFinal','tableBodyFechas')">
                            <h5>Fecha Final</h5>
                            <input type="date" id="fechaFinal" onblur="AjaxFunction2('dispOrdenesByFechas','fechaInicial','fechaFinal','tableBodyFechas')">
                            
                            <script>
                                function generatePDF_TD() {
                                    const element = document.getElementById("fechasTabla");
                                    
                                    html2pdf()
                                    .set({
                                        margin: 1,
                                        filename: 'ReporteTiempoDepartamento.pdf',
                                        image: {
                                            type: 'jpeg',
                                            quality: 0.98
                                        },
                                        html2canvas: {
                                            scale: 2, // A mayor escala, mejores gráficos, pero más peso
                                            letterRendering: true,
                                        },
                                        jsPDF: {
                                            unit: "in",
                                            format: "a3",
                                            orientation: 'landscape' // landscape o portrait
                                        }
                                    })
                                    .from(element)
                                    .save();
}
                            </script>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="fechasTabla" width="100%" cellspacing="0">
                                    <caption style="caption-side:top">
                                        <p align="center" style="font-weight:bold;">Reporte de Tiempo por Departamento</p>
                                    </caption>
                                    <thead>
                                        <tr align="center">
                                            <th>Orden</th>
                                            <th>Cliente</th>
                                            <th>Nombre Cliente</th>                                            
                                            <th>Fecha Orden</th>
                                            <th>FAC</th>
                                            <th>CXC</th>
                                            <th>PRE</th>
                                            <th>CST</th>
                                            <th>ING</th>
                                            <th>PLN</th>
                                            <th>FEC</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id = "tableBodyFechas">
                                    <?php
                                        //Getting authorised data from server at functions_reportes
                                        dispOrdenes($conn,$_SESSION["idCompania"]);

                                        
                                    ?>
                                    </tbody>
                                </table>
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
