<div style="height:100%;">
	<div >
		<h1>Artículo</h1>
		<form class="formulario">
			<div class="campo">
				<label class="campo__label" for="compania">Compañía</label>
				<input class="campo__field" type="text" id="compania">
			</div>

			<div class="campo">
				<label class="campo__label" for="articulo">Artículo</label>
				<input class="campo__field" type="text" id="articulo">
			</div>

			<div class="campo__text">
				<label class="campo__label" for="descripcion">Descripción</label>
				<textarea class="campo__field campo__field--textarea" id="descripcion"></textarea>
			</div>

			<div class="campo">
				<label class="campo__label" for="unidad">Unidad de Venta</label>
				<input class="campo__field" type="number" id="unidad">
			</div>

			<div class="campo">
				<label class="campo__label" for="clave">Clave de Acceso</label>
				<input class="campo__field" type="text" id="clave">
			</div>

			<div class="campo">
				<label class="campo__label" for="costo">Costo Estándar</label>
				<input class="campo__field" type="number" id="costo">
			</div>

			<div class="campo campo--button">
				<input class="campo__field button--red grd" type="reset" value="Limpiar">
				<input class="campo__field button--blue" type="submit" value="Alta">
				<input class="campo__field button--blue" type="submit" value="Baja">
			</div>
		</form>
	</div>	
</div>