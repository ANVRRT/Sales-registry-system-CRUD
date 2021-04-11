<div class="fix-margin">
	<h1 class="h1-mine">Artículo Vendido</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="folio">Folio</label>
			<input class="campo__field" name="folio" type="number" id="folio" min="0" max="99999999999"required>
		</div>

		<div class="campo">
			<label class="campo__label" for="idArticulo">ID Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos" required>
			<?php

				$reg = dispArticulos($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='articulos'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					if($row["estatus"]==1){
						echo "<option>".$row["idArticulo"]."</option>";
					}

				}
				
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">Compañía</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="cliente"> id Cliente</label>
			<input class="campo__field" type="text" name="idCliente" id="idCliente" list="cliente" maxlength="10" required>
			<?php
				
				$reg = dispClientes($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='cliente'>";
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
			<label class="campo__label" for="stock">Stock</label>
			<input class="campo__field" name="stock" type="number" id="stock">
		</div>

		<div class="campo">
			<label class="campo__label" for="codAviso">Código Aviso</label>
			<input class="campo__field" name="codAviso" type="text" id="codAviso" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="udVta">Unidad de venta</label>
			<input class="campo__field" name="udVta" type="text" id="udVta">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_artV" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_artV" type="submit" value="Alta">
		</div>
	</form>

	<form method="POST" action="../php/C_articuloVendido.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_articuloVendido">
		</div>
	</form>
</div>