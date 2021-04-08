
<div class="fix-margin">
	<form method="POST" action="../php/C_cantidadE.php" style="overflow: hidden">
		<table width="100%">
			<tr>
				<td width="800px"><h1 class="h1-mine" style="margin-top:1.6rem">Cantidad Entregada</h1></td>
				<td><input class="campo__field button--blue" type="submit" value="Consultar el listado de Cantidad Entregada" name="C_cantidadE" style="margin-top:0rem"></td>
			</tr>
		</table>
	</form>

	<form class="formulario" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="id_com">ID Compañia</label>
			<input class="campo__field" type="text" id="id_com">
		</div>

		<div class="campo">
			<label class="campo__label" for="id_or">ID Orden</label>
			<input class="campo__field" type="text" id="id_or">
		</div>

		<div class="campo">
			<label class="campo__label" for="folio">Folio</label>
			<input class="campo__field" type="text" id="folio">
		</div>

		<div class="campo">
			<label class="campo__label" for="posicion">Posición</label>
			<input class="campo__field" type="text" id="posicion">
		</div>
	
		<div class="campo">
			<label class="campo__label" for="fechaMov">Fecha Movimiento</label>
			<input class="campo__field" type="date" id="fechaMov">
		</div>

		<div class="campo">
			<label class="campo__label" for="hora">Hora</label>
			<input class="campo__field" type="text" id="hora">
		</div>

		<div class="campo">
			<label class="campo__label" for="secuencia">Secuencia</label>
			<input class="campo__field" type="text" id="secuencia">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="tipoReg">Tipo Registro</label>
			<input class="campo__field" type="text" id="tipoReg">

		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="cant">Cantidad</label>
			<input class="campo__field" type="text" id="cant">

		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="idArticulo">ID Articulo</label>
			<input class="campo__field" type="text" id="idArticulo">

		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja">
			<input class="campo__field button--blue" type="submit" value="Alta">
		</div>
	</form>
</div>