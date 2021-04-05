<div class="fix-margin">
	<h1 class="h1-mine">Capturar Direccion de entrega</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php">
		<div class="campo">
			<label class="campo__label" for="idCompania">Id Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCliente">Id Cliente</label>
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

		<div class="campo">
			<label class="campo__label" for="dirEnt">Dir Ent</label>
			<input class="campo__field" type="text" name="dirEnt" id="dirEnt" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="nombreentrega">Nombre Entrega</label>
			<input class="campo__field" type="text" name="nombreEntrega" id="nombreEntrega">
		</div>

		<div class="campo">
			<label class="campo__label" for="direccion">Dirección</label>
			<input class="campo__field" type="text" name="direccion" id="direccion">
		</div>

		<div class="campo">
			<label class="campo__label" for="municipio">Municipio</label>
			<input class="campo__field" type="text" name="municipio" id="municipio">
		</div>

		<div class="campo">
			<label class="campo__label" for="estado">Estado</label>
			<input class="campo__field" type="text" name="estado" id="estado">
		</div>

		<div class="campo">
			<label class="campo__label" for="telefono">Teléfono</label>
			<input class="campo__field" type="text" name="telefono" id="telefono">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="observacion-orden">Observaciones de la Orden</label>
			<input  type="text" class="campo__field" name="observaciones" id="observaciones">
		</div>

		<div class="campo">
			<label class="campo__label" for="codpost">Código Postal</label>
			<input class="campo__field" type="text" name="codpost" id="codpost">
		</div>

		<div class="campo">
			<label class="campo__label" for="codruta">Código de ruta</label>
			<input class="campo__field" type="text" name="codruta" id="codruta">
		</div>

		<div class="campo">
			<label class="campo__label" for="pais">País</label>
			<input class="campo__field" type="text" name="pais" id="pais">
		</div>

		<div class="campo">
			<label class="campo__label" for="rfc">RFC</label>
			<input class="campo__field" type="text" name="rfc" id="rfc">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="B_dirEnt" value="Baja">
			<input class="campo__field button--blue" type="submit" name="A_dirEnt"value="Alta">
		</div>
	</form>
</div>