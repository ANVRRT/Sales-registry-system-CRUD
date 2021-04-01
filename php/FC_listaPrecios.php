<div class="fix-margin">
	<h1 class="h1-mine">Administración de listas de precios</h1>

	<form class="formulario">
		<div class="campo">
			<label class="campo__label" for="cliente"> id Lista de precios</label>
			<input class="campo__field" type="text" id="cliente">
		</div>

		<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<input class="campo__field" type="text" id="compania">
		</div>
		<div class="campo">
			<label class="campo__label" for="articulo">Artículo</label>
			<input class="campo__field" type="text" id="articulo">
		</div>
	
		<div class="campo">
			<label class="campo__label" for="descuento">Descuento</label>
			<input class="campo__field" type="number" id="descuento">
		</div>

		<div class="campo">
			<label class="campo__label" for="precio">Precio</label>
			<input class="campo__field" type="text" id="precio">
		</div>

		<div class="campo">
			<label class="campo__label" for="cantOlmp">Cantidad Olmp</label>
			<input class="campo__field" type="text" id="cantOlmp">
		</div>

		<div class="campo">
			<label class="campo__label" for="nivelDscto">Nivel de descuento</label>
			<input class="campo__field" type="checkbox" id="nivelDscto">
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaCaducidad">Fecha de caducidad</label>
			<input class="campo__field" type="date" id="fechaCaducidad"></input>
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaInicio">Fecha de inicio</label>
			<input class="campo__field" type="date"id="fechaInicio"></input>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="impDesc">ImpDesc</label>
			<textarea class="campo__field campo__field--textarea" type="text" id="impDesc"></textarea>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja">
			<input class="campo__field button--blue" type="submit" value="Alta">
		</div>
	</form>
</div>