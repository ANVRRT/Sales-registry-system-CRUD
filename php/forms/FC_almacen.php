<div class="fix-margin">
	<h1 class="h1-mine">Almacen</h1>

	<form class="formulario"  method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idAlmacen">ID Almacen</label>
			<input class="campo__field" type="text" id="idAlmacen" name="idAlmacen" list="almacen" required>
			<?php
				
				$reg = dispAlmacen($conn, $_SESSION["idCompania"]);

				echo "<datalist id='almacen'>";
				
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idAlmacen"]."</option>";

				}

				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="descripcion">Descripción</label>
			<textarea class="campo__field campo__field--textarea" name="descripcion" id="descripcion"></textarea>
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_almacen" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_almacen" type="submit" value="Alta">
		</div>
	</form>

	<form method="POST" action="../php/C_almacen.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar todo" name="C_almacen">
		</div>
	</form>
</div>