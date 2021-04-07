<?php
require_once("../includes/dbh.inc.php");
?>
###clave de todo
<?php
$pag=include("forms/FB_articuloCliente.php");
echo "$pag";
?>
###
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="../js/html2pdf.bundle.min.js"></script>
        <script src="../js/conversionPDF.js"></script>
        <title>Document</title>
    </head>
    <body>
    <button id="btnPdf">Descargar reporte</button>
    <button onclick="generatePDF()">Download as PDF</button>

        <div id="canvas-holder" name="grafica">
            <canvas id="myBarChart" width="100" height="600"></canvas>
        </div>

        <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [
        <?php
                        $sql="SELECT * FROM ArticuloExistente";
                        //$sql="SELECT * FROM Factura,ArticuloExistente WHERE ArticuloExistente.idArticulo=Factura.idArticulo";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql))
                        {
                            header("location: ../php/index.php?error=stmtfailed");
                            exit();
                        }
                        //mysqli_stmt_bind_param($stmt,"is", $estado, $compania);
                        mysqli_stmt_execute($stmt);

                        $resultData = mysqli_stmt_get_result($stmt);
                        mysqli_stmt_close($stmt);
                        //return $resultData;
                        while($row = mysqli_fetch_assoc($resultData))
                        {
                        ?>
                            '<?php echo $row["descripcion"];?>',
                        <?php
                        }
                        ?>
    ],
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [
        <?php
                        $sql="SELECT * FROM ArticuloExistente";
                        //$sql="SELECT * FROM Factura,ArticuloExistente WHERE ArticuloExistente.idArticulo=Factura.idArticulo";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql))
                        {
                            header("location: ../php/index.php?error=stmtfailed");
                            exit();
                        }
                        //mysqli_stmt_bind_param($stmt,"is", $estado, $compania);
                        mysqli_stmt_execute($stmt);

                        $resultData = mysqli_stmt_get_result($stmt);
                        mysqli_stmt_close($stmt);
                        //return $resultData;
                        while($row = mysqli_fetch_assoc($resultData))
                        {
                        ?>
                            '<?php echo $row["idArticulo"];?>',
                        <?php
                        }
                        ?>
      ],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 10,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      datasets:[{
          maxBarThickness: 1
      }]
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
        </script>
    </body>
</html>