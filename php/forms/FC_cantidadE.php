<div class="fix-margin">
	<h1 class="h1-mine">Cantidad Entregada</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
	<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<?php
			
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="id_or">ID Orden</label>
			<input class="campo__field" type="text"  name="idOrden"id="idOrden" list="ordenes" onblur="AjaxFunction('dispFolioByOrden','idOrden','folioList')" required>
			<?php
				
				$reg = dispOrden($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='ordenes'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idOrden"]."</option>";

				}
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="folio">Folio</label>
			<input class="campo__field" type="text" name="folio" id="folio" list="folioList" onblur="AjaxFunction('dispArticuloRO','folio','articuloList')" required>
			<datalist id="folioList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="posicion">Posición</label>
			<input class="campo__field" type="number" name="posicion" id="posicion" min="1" required>
		</div>
	
		<div class="campo">
			<label class="campo__label" for="fechaMov">Fecha Movimiento</label>
			<input class="campo__field" type="date" name="fechaMov" id="fechaMov" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="hora">Hora</label>
			<input class="campo__field" type="time" name="hora" id="hora" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="secuencia">Secuencia</label>
			<input class="campo__field" type="number" name="secuencia" id="secuencia" min="1"required >
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="tipoReg">Tipo Registro</label>
			<input class="campo__field" type="number" name="tipoReg" id="tipoReg" min="1" max="3" required>

		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="cant">Cantidad</label>
			<input class="campo__field" type="number" name="cantidad" id="cantidad">

		</div>

		<div class="campo">
			<label class="campo__label" for="folio">Id Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articuloList">
			<datalist id="articuloList" >
			</datalist>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_CantE" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_CantE" type="submit" value="Alta">
		</div>
		<div class="campo__3--button">
		<input style="background-color:#E2CD01" class="campo__field button--blue" type="button" value="Actualizar" name="U_cantEnt" onclick="updateCantEnt()">
		</div>
	</form>

	<form method="POST" action="../php/C_cantidadE.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_cantidadE">
		</div>
	</form>
</div>