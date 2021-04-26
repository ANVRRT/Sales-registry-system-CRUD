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

        <title>Pedido VS Surtido</title>
    </head>
    <br>
  <body>
    <button class="btn btn-primary" onclick="generatePDFGra('reporte_pedido_surtido.pdf')">Descargar reporte de Pedido VS Surtido</button>

    <br><br>

    <div>       
            <table class="table">
                <thead>
                <tr>
                    <th>IdOrden</th>
                    <th>IdCompañia</th>
                    <th>Folio</th>
                    <th>Factura</th>
                    <th>Cantidad</th>
                    <th>Entregado</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php
                $reporte=pvs2R($conn, $_SESSION["idCompania"]);
                $cantidad = 0;
                $entregado = 0;

                while($row2 = mysqli_fetch_assoc($reporte)){
                    $cantidad = $cantidad + $row2["cantidad"];
                    $entregado = $entregado + $row2["entregado"];
                    //echo "<td> fila";
                    echo "<tr>";
                    echo "<td>".$row2["idOrden"]."</td>";
                    echo "<td>".$row2["idCompania"]."</td>";
                    echo "<td>".$row2["folio"]."</td>";
                    echo "<td>".$row2["numFact"]."</td>";
                    echo "<td>".$row2["cantidad"]."</td>";
                    echo "<td>".$row2["entregado"]."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


        <div id="canvas-holder" name="grafica">
            <canvas id="myPieChart" width="100" height="600"></canvas>
        </div>
<?php
echo"<script>
var reporte=myPieChart('Pedido', 'Surtido',$cantidad, $entregado);
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