<div class="fix-margin">
	<h1 class="h1-mine">Administración de listas de precios</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php">
		<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="cliente"> Id Lista de precios</label>
			<input class="campo__field" type="text" name="idLista" id="idLista" required>
		</div>

		
		<div class="campo">
			<label class="campo__label" for="idArticulo">Id Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos" required>
			<?php
				require_once("../includes/dbh.inc.php");

				require_once("../includes/functions_catalogos.php");
				$reg = dispArticulos($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='articulos'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idArticulo"]."</option>";

				}
				
				echo "</datalist>";
			?>
		</div>
	
		<div class="campo">
			<label class="campo__label" for="descuento">Descuento</label>
			<input class="campo__field" type="number" name="descuento" id="descuento" min="0" max="100">
		</div>

		<div class="campo">
			<label class="campo__label" for="precio">Precio</label>
			<input class="campo__field" type="text" name="precio" id="precio">
		</div>

		<div class="campo">
			<label class="campo__label" for="cantOlmp">Cantidad Olmp</label>
			<input class="campo__field" type="text" name="cantOlmp" id="cantOlmp">
		</div>

		<div class="campo">
			<label class="campo__label" for="nivelDscto">Nivel de descuento</label>
			<input class="campo__field" type="number" name="nivelDscto" id="nivelDscto" required>
			
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaCaducidad">Fecha de caducidad</label>
			<input class="campo__field" type="date" name="fechaCaducidad" id="fechaCaducidad"></input>
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaInicio">Fecha de inicio</label>
			<input class="campo__field" type="date" name="fechaInicio" id="fechaInicio"></input>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="impDesc">ImpDesc</label>
			<input class="campo__field" type="number" name="impDesc" id="impDesc">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_listPrecios" type="submit" value="Baja">
			<input class="campo__field button--blue"  name="A_listPrecios" type="submit" value="Alta">
		</div>
	</form>
</div>