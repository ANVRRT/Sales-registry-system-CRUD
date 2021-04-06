
<div class="fix-margin">
    <h1 class="h1-mine">Busqueda de Artículos de Cliente</h1>

    <form class="formulario" style="min-height:18rem" method="POST" action="../php/BC_articuloCliente.php">

        <div class="campo">
            <label class="campo__label" for="idCliente">Cliente</label>
            <input class="campo__field" type="text"  name="idCliente" id="idCliente" list="cliente" required>
            <?php
                require_once("../includes/dbh.inc.php");

                require_once("../includes/functions_catalogos.php");
                $reg = dispClientes($conn, $_SESSION["idCompania"]);
                
                echo "<datalist id='cliente'>";
                while($row = mysqli_fetch_assoc($reg))
                {
                    echo "<option>".$row["idCliente"]."</option>";

                }
                
                echo "</datalist>";
            ?>
        </div>

        <div class="campo__3--button">
            <input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
            <input class="campo__field button--blue" type="submit" value="Buscar" name="Buscar_articuloCliente">
        </div>
    </form>
</div>