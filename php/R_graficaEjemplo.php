<?php
require_once("../includes/dbh.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="../js/reportes/html2pdf.bundle.min.js"></script>
        <script src="../js/reportes/conversionPDF.js"></script>
        <title>Document</title>
    </head>
    <body>
    <button onclick="generatePDF()">Descargar reporte</button>

        <div id="canvas-holder" name="grafica">
            <canvas id="myBarChart" width="100" height="600"></canvas>
        </div>

        <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

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
      indexAxis: 'y',
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
          maxBarThickness: 10
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
      }
    },
  }
});
        </script>
    </body>
</html>