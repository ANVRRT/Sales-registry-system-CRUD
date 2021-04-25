<div class="fixed-margin">
	<h1 class="h1-mine">Facturas</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCliente">ID Cliente</label>
			<input class="campo__field" type="text" name="idCliente" id="idCliente" list="clientes" onblur="AjaxFunction('dispOrdenByCliente','idCliente','idOrdenlist')" required>
			<?php
				$reg = dispClientes($conn,$_SESSION["idCompania"]);
				
				echo "<datalist id='clientes'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					if($row["estatus"]==1){
						echo "<option value = '".$row["idCliente"]."'>".$row["nombreCliente"]."</option>";
						// echo "<option>".$row["idCliente"]."</option>";
					}
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
			<input class="campo__field" type="text" name="idOrden" id="idOrden" maxlength="10" list="idOrdenlist" onblur="AjaxFunction('dispFolioAVbyOrden','idOrden','folioList')"required>
			<datalist id="idOrdenlist" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="folio">Folio</label>
			<input class="campo__field" type="text" name="folio" id="folio" list="folioList" onblur="AjaxFunction2('dispArtbyfolio','idOrden','folio','artList')">
			<datalist id="folioList" >
			</datalist>
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
			<label class="campo__label" for="numFac">Número de Factura*</label>
			<input class="campo__field" type="number" name="numFac" min="0" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaFac">Fecha de Facturacion</label>
			<input class="campo__field" type="date" name="fechaFac">
		</div>

		<div class="campo">
			<label class="campo__label" for="articulo">Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="artList" required>
			<datalist id="artList" >
			</datalist>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja" name ="B_Facs">
			<input class="campo__field button--blue" type="submit" value="Alta" name ="A_Facs">
		</div>
		<div class="campo__3--button">
		<input style="background-color:#E2CD01" class="campo__field button--blue" type="submit" value="Actualizar" name="U_factura">
		</div>
	</form>

	<form method="POST" action="../php/C_factura.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_factura">
		</div>
	</form>
</div>