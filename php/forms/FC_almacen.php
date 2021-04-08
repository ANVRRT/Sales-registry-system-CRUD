<div class="fix-margin">
	<form method="POST" action="../php/C_almacen.php" style="overflow: hidden">
		<table width="100%">
			<tr>
				<td width="50%"><h1 class="h1-mine" style="margin-top:1.6rem">Almacen</h1></td>
				<td><input class="campo__field button--blue" type="submit" value="Consultar los almacenes" name="C_almacen" style="margin-top:0rem"></td>
			</tr>
		</table>
	</form>

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
</div>