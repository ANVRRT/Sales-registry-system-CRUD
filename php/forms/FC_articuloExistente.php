<div class="fix-margin">
	<h1 class="h1-mine">Artículo Existente</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">Compañía</label>

			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>

			
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

		<div class="campo campo__text">
			<label class="campo__label" for="descripcion">Descripción*</label>
			<textarea class="campo__field campo__field--textarea" name="descripcion" id="descripcion" required></textarea>
		</div>

		<div class="campo">
			<label class="campo__label" for="unidad">Costo estándar*</label>
			<input class="campo__field" type="number" name="costo" id="costo" required>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_artE" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_artE" type="submit" value="Alta">
		</div>
		<div class="campo__3--button">
		<input style="background-color:#E2CD01" class="campo__field button--blue" type="submit" value="Actualizar" name="U_artExistente">
		</div>
	</form>

	<form method="POST" action="../php/C_articuloExistente.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_articuloExistente">
		</div>
	</form>
</div>