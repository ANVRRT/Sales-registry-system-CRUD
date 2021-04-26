<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="../js/reportes/html2pdf.bundle.min.js"></script>
        <script src="../js/reportes/conversionPDF.js"></script>
        <script src="../js/reportes/functions_charts_reportes.js"></script>

        <link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap4.min.css">

        <title>Reporte de estatus de Órdenes</title>
    </head>
    <br>
  <body>
    <button class="btn btn-primary" onclick="generatePDFGra('reporte_estatus_de_ordenes.pdf')">Descargar reporte de Estatus de Órdenes</button>

    <br><br>

    <div>       
            <table class="table">
                <thead>
                <tr>
                    <th>Órdenes en proceso</th>
                    <th>Órdenes procesadas</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <table class="table table-bordered mydataTable2" id="dataTable2">
                        <thead>
                            <th>IdOrden</th>
                            <th>IdCompañía</th>
                            <th>IdCliente</th>
                            <th>Dirección de entrega</th>
                            <th>OrdenCompra</th>
                            <th>FechaOrden</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php 
                                $resultData=psR($conn,$_SESSION["idCompania"],0);
                                
                                if($reporte=mysqli_fetch_assoc($resultData)){
                                    echo "<tr>";
                                    echo "<td>".$reporte["idOrden"]."</td>";
                                    echo "<td>".$reporte["idCompania"]."</td>";
                                    echo "<td>".$reporte["idCliente"]."</td>";
                                    echo "<td>".$reporte["dirEnt"]."</td>";
                                    echo "<td>".$reporte["ordenCompra"]."</td>";
                                    echo "<td>".$reporte["fechaOrden"]."</td>";
                                    echo "<td>".$reporte["total"]."</td>";
                                    echo "</tr>";
                                }
                                while($reporte=mysqli_fetch_assoc($resultData)){
                            
                                    echo "<tr>";
                                    echo "<td>".$reporte["idOrden"]."</td>";
                                    echo "<td>".$reporte["idCompania"]."</td>";
                                    echo "<td>".$reporte["idCliente"]."</td>";
                                    echo "<td>".$reporte["dirEnt"]."</td>";
                                    echo "<td>".$reporte["ordenCompra"]."</td>";
                                    echo "<td>".$reporte["fechaOrden"]."</td>";
                                    echo "<td>".$reporte["total"]."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        </table>
                    </td>
                    <td>
                        <table class="table table-bordered mydataTableR" id="dataTableR">
                        <thead>
                            <th>IdOrden</th>
                            <th>IdCompañía</th>
                            <th>IdCliente</th>
                            <th>Dirección de entrega</th>
                            <th>OrdenCompra</th>
                            <th>FechaOrden</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php 
                            $resultData=psR($conn,$_SESSION["idCompania"],1);
                                
                                if($reporte=mysqli_fetch_assoc($resultData)){
                                    echo "<tr>";
                                    echo "<td>".$reporte["idOrden"]."</td>";
                                    echo "<td>".$reporte["idCompania"]."</td>";
                                    echo "<td>".$reporte["idCliente"]."</td>";
                                    echo "<td>".$reporte["dirEnt"]."</td>";
                                    echo "<td>".$reporte["ordenCompra"]."</td>";
                                    echo "<td>".$reporte["fechaOrden"]."</td>";
                                    echo "<td>".$reporte["total"]."</td>";
                                    echo "</tr>";
                                }
                                while($reporte=mysqli_fetch_assoc($resultData)){
                            
                                    echo "<tr>";
                                    echo "<td>".$reporte["idOrden"]."</td>";
                                    echo "<td>".$reporte["idCompania"]."</td>";
                                    echo "<td>".$reporte["idCliente"]."</td>";
                                    echo "<td>".$reporte["dirEnt"]."</td>";
                                    echo "<td>".$reporte["ordenCompra"]."</td>";
                                    echo "<td>".$reporte["fechaOrden"]."</td>";
                                    echo "<td>".$reporte["total"]."</td>";
                                    echo "</tr>";
                                }

                            ?>
                        </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div id="canvas-holder" name="grafica">
            <canvas id="myPieChart" width="100" height="600"></canvas>
        </div>
    <?php $conteoEP=conteoOrdenes($conn,$_SESSION["idCompania"],0);
    //echo $conteoEP;
    ?>
    <?php $conteoP=conteoOrdenes($conn,$_SESSION["idCompania"],1);
    //echo $conteoP;
    ?>
<?php
echo"<script>
var reporte=myPieChart('Órdenes en proceso', 'Órdenes procesadas',$conteoEP, $conteoP);
</script>"

?>

        <script>
          $('.mydataTableR').DataTable({
            //searching: false
            responsive: true
          });
          $('.mydataTable2').DataTable({
            //searching: false
            responsive: true
          });
        </script>
  </body>
</html>