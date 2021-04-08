
<div class="fix-margin">
	<form method="POST" action="../php/C_inventario.php" style="overflow: hidden">
		<table width="100%">
			<tr>
				<td width="50%"><h1 class="h1-mine" style="margin-top:1.6rem">Inventario</h1></td>
				<td><input class="campo__field button--blue" type="submit" value="Consultar los inventarios" name="C_inventario" style="margin-top:0rem"></td>
			</tr>
		</table>
	</form>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
		<label class="campo__label" for="idAlmacen">ID Almacen</label>
			<input class="campo__field" type="text" id="idAlmacen" name="idAlmacen" list="almacen">
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
			<label class="campo__label" for="idArticulo">Id Articulo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos" required>
			<?php
				$reg = dispArticulos($conn, $_SESSION["idCompania"]);

				echo "<datalist id='articulos'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					// echo $row["idArticulo"]."<br>";
					echo "<option>".$row["idArticulo"]."</option>";

				}

				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="stockInventario">Stock</label>
			<input class="campo__field" type="number" name="stock" id="stock">
		</div>
		

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_inventario" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_inventario" type="submit" value="Alta">
		</div>
	</form>
</div>