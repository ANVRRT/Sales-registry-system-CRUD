<?php
    require_once("../includes/dbh.inc.php");
    require_once("../includes/functions_catalogos.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bloqueo de clientes</title>
    </head>
    <body>
        <div class="fix-margin">
        <br>
            <h2>Bloqueo de clientes</h2>
            <br>
            <table style="width:100%" class="table">
                <thead class="thead-light">
                    <tr>
                        <th><label class="campo__label" >Disponibles</label></th>
                        <th><label class="campo__label" >Bloqueados</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <table style="width: 100%;">
                            <?php
                                $clientesD = disClients($conn, 1);
                                $check=mysqli_fetch_assoc($clientesD);
                                if($check){
                                    while($row = mysqli_fetch_assoc($clientesD))
                                    {
                                        echo"<tr>";
                                            echo"<td>".$row["nombreCliente"]."</td>";
                                            echo"<td>";
                                                echo"<a href='../includes/functions_catalogos.php?estado=0&idB=".$row["idCliente"]."'class='btn btn-danger'>Bloquear</a></th>";
                                            echo"</td>";
                                        echo"</tr>";
                                    }
                                }
                                else{
                                    echo"No hay clientes disponibles";
                                }
                            ?>
                            </table>
                            </td>
                            <td>
                            <table style="width: 100%;">
                            <?php
                                $clientesB = disClients($conn, 0);
                                $check=mysqli_fetch_assoc($clientesB);
                                if($check){
                                    while($row = mysqli_fetch_assoc($clientesB))
                                    {
                                        echo"<tr>";
                                            echo"<td>".$row["nombreCliente"]."</td>";
                                            echo"<td>";
                                                echo"<a href='../includes/functions_catalogos.php?estado=1&idD=".$row["idCliente"]."'class='btn btn-success'>Desbloquear</a></th>";
                                            echo"</td>";
                                        echo"</tr>";
                                    }
                                }
                                else{
                                    echo"No hay clientes bloqueados";
                                }
                            ?>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

