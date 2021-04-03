

<div class="formulario">
	<h1 class="h1-mine">Facturas</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php">

		<div class="campo">
			<label class="campo__label" for="idCliente">ID Cliente</label>
			<input class="campo__field" type="text" name="idCliente" id="idCliente" list="clientes" required>
			<?php
				require_once("../includes/dbh.inc.php");
				require_once("../includes/functions_catalogos.php");
				$reg = dispClientes($conn);
				
				echo "<datalist id='clientes'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idCliente"]."</option>";
					$idCompany = $row["idCompania"];

				}
				
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">Compañia</label>
			<?php
				$idCliente = "<script>document.writeln(document.getElementById('idCliente').innerHTML);</script>";
				if($idCliente != "")
				{
					//$idCompany = getIDCompany($conn, $idCliente);
					echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='$idCompany' readonly>";	
				}
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idOrden">ID Orden</label>
			<input class="campo__field" type="text" name="idOrden" maxlength="10" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="idPosicion">Folio</label>
			<input class="campo__field" type="text" name="idFolio" maxlength="11" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="idEntrega">Entrega</label>
			<input class="campo__field" type="text" name="entrega" maxlength="11" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="tipoTrans">Tipo de Transaccion</label>
			<input class="campo__field" type="text" name="tipoTrans" maxlength="4" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="numFac">Número de Factura</label>
			<input class="campo__field" type="text" name="numFac" maxlength="10" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaFac">Fecha de Facturacion</label>
			<input class="campo__field" type="date" name="fechaFac" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="articulo">Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos" required>
			<?php
				require_once("../includes/dbh.inc.php");
				require_once("../includes/functions_catalogos.php");
				$reg = dispArticulos($conn, $idCompany);
				
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
			<input class="campo__field button--blue" type="submit" value="Baja" name ="B_Facs_Baja">
			<input class="campo__field button--blue" type="submit" value="Alta" name ="B_Facs_Alta">
		</div>
	</form>
</div>