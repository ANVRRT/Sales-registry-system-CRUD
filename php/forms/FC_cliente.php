
<div class="fix-margin">
	<h1 class="h1-mine">Administración de clientes</h1>

	<form class="formulario">
		<div class="campo">
			<label class="campo__label" for="cliente"> id Cliente</label>
			<input class="campo__field" type="text" id="cliente">
		</div>

		<div class="campo">
			<label class="campo__label" for="nomCliente">Nombre del cliente</label>
			<input class="campo__field" type="text" id="nomCliente">
		</div>

		<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<input class="campo__field" type="text" id="compania">
		</div>
		<div class="campo">
			<label class="campo__label" for="idRepresentante">Representante</label>
			<input class="campo__field" type="text" id="idRepresentante">
		</div>
	
		<div class="campo">
			<label class="campo__label" for="listPrecios">Lista de precios a utilizar</label>
			<input class="campo__field" type="number" id="listPrecios">
		</div>

		<div class="campo">
			<label class="campo__label" for="idAlmacen">Almacen</label>
			<input class="campo__field" type="text" id="idAlmacen">
		</div>

		<div class="campo">
			<label class="campo__label" for="bloqueo">Bloqueo</label>
			<input class="campo__field" type="checkbox" id="bloqueo">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="analista">Analista</label>
			<textarea class="campo__field campo__field--textarea" id="analista"></textarea>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="divisa">Divisa</label>
			<textarea class="campo__field campo__field--textarea" id="divisa"></textarea>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="lim_credito">Límite de crédito</label>
			<textarea class="campo__field campo__field--textarea" id="lim_credito"></textarea>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="saldoOrden">Saldo orden</label>
			<textarea class="campo__field campo__field--textarea" id="saldoOrden"></textarea>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="saldoFact">Saldo factura</label>
			<textarea class="campo__field campo__field--textarea" id="saldoFact"></textarea>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja">
			<input class="campo__field button--blue" type="submit" value="Alta">
		</div>
	</form>
</div>