<div class="fix-margin">
	<h1 class="h1-mine">Capturar Almacen</h1>

	<form class="formulario">
		<div class="campo">
			<label class="campo__label" for="idAlmace">ID Almacen</label>
			<input class="campo__field" type="text" id="idAlmace">
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<input class="campo__field" type="text" id="idCompania">
		</div>

		<div class="campo">
			<label class="campo__label" for="compra">Orden de Compra</label>
			<input class="campo__field" type="text" id="compra">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="desc">Descripción</label>
			<textarea class="campo__field campo__field--textarea" id="desc"></textarea>
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja">
			<input class="campo__field button--blue" type="submit" value="Alta">
		</div>
	</form>
</div>