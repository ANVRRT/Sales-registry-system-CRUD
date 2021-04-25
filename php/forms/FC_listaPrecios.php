

<div class="fix-margin">
	<h1 class="h1-mine">Listas de Precios</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
				date_default_timezone_set('America/Mexico_City');
				$minDate = date("Y-m-d");
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="cliente"> Id Lista de precios</label>
			<input class="campo__field" type="text" name="idLista" id="idLista" list="listaPrecio"required>
			<?php
				
				$reg = dispListaPrecios($conn, $_SESSION["idCompania"]);
				echo "<datalist id='listaPrecio'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idLista"]."</option>";
					
				}
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idArticulo">Id Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos" required>
			<?php
				
				$reg = dispArticulos($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='articulos'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					if($row["estatus"]==1){
						echo "<option value='".$row["idArticulo"]."'>".$row["descripcion"]."</option>";
						// echo "<option>".$row["idArticulo"]."</option>";
					}
				}
				echo "</datalist>";
			?>
		</div>
	
		<div class="campo">
			<label class="campo__label" for="descuento">Descuento*</label>
			<input class="campo__field" type="number" name="descuento" id="descuento" min="0" max="100" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="precio">Precio*</label>
			<input class="campo__field" type="text" name="precio" id="precio" onblur="Jdescuento()" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="cantOlmp">Cantidad Olmp</label>
			<input class="campo__field" type="text" name="cantOlmp" id="cantOlmp">
		</div>

		<div class="campo">
			<label class="campo__label" for="nivelDscto">Nivel de descuento*</label>
			<input class="campo__field" type="number" name="nivelDscto" id="nivelDscto" required>
			
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaCaducidad">Fecha de caducidad</label>
			<?php

				echo "<input class='campo__field' type='date' name='fechaCaducidad' id='fechaCaducidad' min='$minDate'></input>";
			?>
			
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaInicio">Fecha de inicio</label>
			<?php

				echo "<input class='campo__field' type='date' name='fechaInicio' id='fechaInicio' min='$minDate'></input>";
			?>
			
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="impDesc">Importe de Descuento</label>
			<input class="campo__field" type="number" name="impDesc" id="impDesc" readonly>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_listPrecios" type="submit" value="Baja">
			<input class="campo__field button--blue"  name="A_listPrecios" type="submit" value="Alta">
		</div>
		<div class="campo__3--button">
		<input style="background-color:#E2CD01" class="campo__field button--blue" type="submit" value="Actualizar" name="U_listaPrecios">
		</div>
	</form>

	<form method="POST" action="../php/C_listaPrecios.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_listaPrecios">
		</div>
	</form>
</div>


