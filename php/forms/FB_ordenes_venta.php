
<div class="fix-margin">
    <h1 class="h1-mine">Busqueda de Ordenes de Venta</h1>

    <form class="formulario" autocomplete="off" action="A_ordenes_base.php" method="GET">
        <div class="campo">
            <label class="campo__label" for="cliente">Cliente</label>
            <input class="campo__field" type="text" id="idCliente" list="clientes" onblur="AjaxFunction('dispOrdenByCliente','idCliente','idOrdenlist')">
            <?php
				$reg = dispClientes($conn,$_SESSION["idCompania"]);
				
				echo "<datalist id='clientes'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					if($row["estatus"]==1){
						echo "<option>".$row["idCliente"]."</option>";
					}
				}
				echo "</datalist>";
			?>
        </div>

        <div class="campo">
            <label class="campo__label" for="orden">Orden</label>
            <input class="campo__field" type="text" name="idOrden" id="idOrden" maxlength="10" list="idOrdenlist" required>
			<datalist id="idOrdenlist" >
			</datalist>
        </div>

        <!--<div class="campo">
            <label class="campo__label" for="ord">Ord Baan</label>
            <input class="campo__field" type="text" id="ord">
        </div>-->

        


        <div class="campo__3--button">
            <input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
            <input class="campo__field button--blue" type="submit" value="Buscar">
        </div>
    </form>
</div>