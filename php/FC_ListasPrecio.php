
<div style="height:100%;">
	<div >
		<h1>Administración de listas de precios</h1>
		<form class="formulario">
			<div class="campo">
				<label class="campo__label" for="cliente"> id Lista de precios</label>
				<input class="campo__field" type="text" id="idLista">
			</div>

			<div class="campo">
				<label class="campo__label" for="compra">Compañía</label>
				<input class="campo__field" type="text" id="idCompania">
			</div>
			<div class="campo">
				<label class="campo__label" for="compra">Artículo</label>
				<input class="campo__field" type="text" id="idArticulo">
			</div>
		
			<div class="campo">
				<label class="campo__label" for="cantidad">Descuento</label>
				<input class="campo__field" type="number" id="descuento">
			</div>

			<div class="campo">
				<label class="campo__label" for="precio">Precio</label>
				<input class="campo__field" type="text" id="precio">
			</div>

            <div class="campo">
				<label class="campo__label" for="precio">Cantidad Olmp</label>
				<input class="campo__field" type="text" id="cantOlmp">
			</div>

			<div class="campo">
				<label class="campo__label" for="fecha-sol">Nivel de descuento</label>
				<input class="campo__field" type="checkbox" id="nivelDscto">
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Fecha de caducidad</label>
				<textarea class="campo__field campo__field--textarea" type="date"id="fechaCaducidad"></textarea>
			</div>

            <div class="campo__text">
				<label class="campo__label" for="observacion-orden">Fecha de inicio</label>
				<textarea class="campo__field campo__field--textarea" type="date"id="fechaInicio"></textarea>
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">ImpDesc</label>
				<textarea class="campo__field campo__field--textarea" type="text" id="impDesc"></textarea>
			</div>

			<div class="campo campo--button">
				<input class="campo__field button--blue" type="submit" value="Alta de cliente">
				<input class="campo__field button--blue" type="submit" value="Baja de cliente">
                <input class="campo__field button--red grd" type="reset" value="Limpiar formulario">
			</div>
		</form>
	</div>	
</div>