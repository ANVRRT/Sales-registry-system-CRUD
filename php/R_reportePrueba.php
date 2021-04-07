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
        <script src="../js/html2pdf.bundle.min.js"></script>
        <script src="../js/conversionPDF.js"></script>
        <script src="../js/conversionPDF2.js"></script>
        <title>Document</title>
    </head>
    <body>
    <button id="btnPdf">Descargar reporte</button>
    <button onclick="generatePDF()">Download as PDF</button>
        <div id="canvas-holder" name="grafica">
            <canvas id="myPieChart" width="300" height="300"></canvas>
        </div>

        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            /*Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Direct", "Referral", "Social"],
                datasets: [{
                data: [55, 30, 15],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                },
                legend: {
                display: false
                },
                cutoutPercentage: 80,
            },
            });*/
            

            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
            type: 'doughnut',
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
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: true,
                caretPadding: 10,
                },
                legend: {
                display: true
                },
                cutoutPercentage: 80,
            },
            });

            
        </script>
    </body>
</html>