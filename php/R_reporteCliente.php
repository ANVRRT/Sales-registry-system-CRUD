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

        <title>Reporte por cliente</title>
    </head>
    <br>
  <body>
    <button class="btn btn-primary" onclick="generatePDF('reporte_venta_de_cliente.pdf')">Descargar reporte de venta de cliente</button>
    <button class="btn btn-success" onclick="generarCSV('reporte_venta_de_cliente')">CSV</button>
    <button class="btn btn-primary" onclick="generatePDFR('reporte_ventas_por_cliente.pdf')">Descargar reporte de # de ventas por cliente</button>
    <button class="btn btn-success" onclick="csvCliente()">CSV</button>

    <br><br>
      <div class="input-group input-group-lg">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-lg">Filtros adicionales</span>
          <button class="btn btn-outline-secondary" onclick="filtroTabla('cliente')">Aplicar filtro</button>
        </div>
        <input type="text" id="F_cliente" onkeyup="filtroCliente()" placeholder="Por ID de cliente" name="cliente" title="Ingresa un ID de cliente" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        <input type="text" id="F_rep" onkeyup="filtroRepresentante()" placeholder="Por ID de representante" name="rep" title="Ingresa un ID de representante" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        <input type="text" id="F_articulo" onkeyup="filtroArticulo()" placeholder="Por ID de artículo" name="art" title="Ingresa un ID de art" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        <input type="text" id="F_factura" onkeyup="filtroFactura()" placeholder="Por fecha de factura" name="fac" title="Ingresa fecha de factura" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        <input type="text" id="F_forden" onkeyup="filtroOrden()" placeholder="Por fecha de orden" name="ord" title="Ingresa fecha de orden" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
      </div>
    <br><br>
      
      <div class="reportes" id="repoDoc">
        <div class="container mb-5 mt-3">
          <table class="table table-bordered mydataTable" style="width: 100%" id="dataTable">
            <thead>
              <th>IdArt</th>
              <th>IdCliente</th>
              <th>IdComp</th>
              <th>Fecha de factura</th>
              <th>ID Representante_agente</th>
              <th>U Venta</th>
              <th>Divisa</th>
              <th>Fecha de orden</th>
              <th>IdOrden</th>
              <th>Cantidad</th>
              <th>Total</th>
            </thead>
            <tbody>
              <?php reporteBase($conn,$_SESSION["idCompania"])?>
            </tbody>
          </table>
        </div>

        <div id="canvas-holder" name="grafica">
            <canvas id="myBarChart" width="100" height="600"></canvas>
        </div>
      </div>

        <script>
          var json=lecturaTabla();
          console.log(json);
          // Map json values back to label array
          var labels = json.map(function (e) {
              return e.idcliente;
          });
          console.log(labels);
          // Map json values back to values array
          var values = json.map(function (e) {
              return e.total;
          });
          console.log(values);

          //var reporte=grafica(labels,parseInt(values),"N ventas");
          var reporte=BuildChart(labels,values,"Ventas de Cliente","horizontalBar");
          //reporte=BuildChart(labels, values, "prueba");

        </script>

        <script>
          $('.mydataTable').DataTable({
            //searching: false
            responsive: true
          });
        </script>

        <br>
      
      <div class="reportesR" id="repoDocR">
        <div class="container mb-5 mt-3">
          <table class="table table-bordered mydataTableR" style="width: 100%" id="dataTableR">
            <thead>
              <th>Num de ventas</th>
              <th>IdCliente</th>
              <th>Nombre</th>
            </thead>
            <tbody>
              <?php clienteR($conn,$_SESSION["idCompania"])?>
            </tbody>
          </table>
        </div>

        <div id="canvas-holderR" name="grafica">
          <canvas id="myBarChartR" width="100" height="600"></canvas>
        </div>
      </div>

      <script>
          var rjson=lecturaTablaR();
          console.log(rjson);
          // Map json values back to label array
          var rlabels = rjson.map(function (e) {
              return e.idcliente;
          });
          console.log(rlabels);
          // Map json values back to values array
          var rvalues = rjson.map(function (e) {
              return e.numdeventas;
          });
          console.log(rvalues);

          //var reporte=grafica(labels,parseInt(values),"N ventas");
          var reporte=BuildChartR(rlabels,rvalues,"# de ventas","bar");
          //reporte=BuildChart(labels, values, "prueba");

        </script>
        
        <script>
          $('.mydataTableR').DataTable({
            //searching: false
            responsive: true
          });
        </script>
  </body>
</html>