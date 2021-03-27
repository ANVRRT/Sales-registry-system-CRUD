
<div class="formulario">
	<h1 class="h1-mine">Facturas</h1>

	<form class="formulario">
		<div class="campo">
			<label class="campo__label" for="idCompania">Compañia</label>
			<input class="campo__field" type="text" id="idCompania">
		</div>

		<div class="campo">
			<label class="campo__label" for="idCliente">ID Cliente</label>
			<input class="campo__field" type="text" id="idCliente">
		</div>

		<div class="campo">
			<label class="campo__label" for="idOrden">ID Orden</label>
			<input class="campo__field" type="text" id="idOrden">
		</div>

		<div class="campo">
			<label class="campo__label" for="idPosicion">ID Posicion</label>
			<input class="campo__field" type="text" id="idPosicion">
		</div>

		<div class="campo">
			<label class="campo__label" for="idEntrega">Entrega</label>
			<input class="campo__field" type="text" id="idEntrega">
		</div>

		<div class="campo">
			<label class="campo__label" for="tipoTrans">Tipo de Transaccion</label>
			<input class="campo__field" type="text" id="tipoTrans">
		</div>

		<div class="campo">
			<label class="campo__label" for="numFac">Número de Factura</label>
			<input class="campo__field" type="text" id="numFac">
		</div>

		<div class="campo">
			<label class="campo__label" for="fechaFac">Fecha de Facturacion</label>
			<input class="campo__field" type="date" id="fechaFac">
		</div>

		<div class="campo">
			<div class="campo__icon">
				<label class="campo__label" for="articulo">Artículo</label>
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus campo__icon--icon" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
					<circle cx="12" cy="12" r="9" />
					<line x1="9" y1="12" x2="15" y2="12" />
					<line x1="12" y1="9" x2="12" y2="15" />
				</svg>
			</div>
			<input class="campo__field" type="text" id="articulo">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="observacion-fac">Observaciones Facturacion</label>
			<textarea class="campo__field campo__field--textarea" id="observacion-fac"></textarea>
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja">
			<input class="campo__field button--blue" type="submit" value="Alta">
		</div>
	</form>
</div>