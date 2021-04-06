<div class="formulario">
	<h1 class="h1-mine">Facturas</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php">

		<div class="campo">
			<label class="campo__label" for="idCliente">ID Cliente</label>
			<input class="campo__field" type="text" name="idCliente" id="idCliente" list="clientes" onblur="AjaxFunction('dispOrdenByCliente',document.getElementById('idCliente').value,document.getElementById('idOrdenlist'))">
			<?php
				$reg = dispClientes($conn,$_SESSION["idCompania"]);
				
				echo "<datalist id='clientes'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idCliente"]."</option>";
				}
				
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idOrden">ID Orden</label>
			<input class="campo__field" type="text" name="idOrden" id="idOrden" maxlength="10" list="idOrdenlist">
			<datalist id="idOrdenlist" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="idFolio">Folio</label>
			<input class="campo__field" type="text" name="idFolio" maxlength="11" >
		</div>

		<div class="campo">
			<label class="campo__label" for="idEntrega">Entrega</label>
			<input class="campo__field" type="text" name="entrega" maxlength="11">
		</div>

		<div class="campo">
			<label class="campo__label" for="tipoTrans">Tipo de Transaccion</label>
			<input class="campo__field" type="text" name="tipoTrans" maxlength="4">
		</div>

		<div class="campo">
			<label class="campo__label" for="numFac">Número de Factura</label>
			<input class="campo__field" type="text" name="numFac" maxlength="10" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaFac">Fecha de Facturacion</label>
			<input class="campo__field" type="date" name="fechaFac">
		</div>

		<div class="campo">
			<label class="campo__label" for="articulo">Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos">
			<?php
				$reg = dispArticulos($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='articulos'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idArticulo"]."</option>";

				}
				
				echo "</datalist>";
			?>
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja" name ="B_Facs">
			<input class="campo__field button--blue" type="submit" value="Alta" name ="A_Facs">
		</div>
	</form>
</div>