
<div style="height:100%;">
	<div >
		<h1>Administración de clientes</h1>
		<form class="formulario">
			<div class="campo">
				<label class="campo__label" for="cliente"> id Cliente</label>
				<input class="campo__field" type="text" id="idCliente">
			</div>

			<div class="campo">
				<label class="campo__label" for="entrega">Nombre del cliente</label>
				<input class="campo__field" type="text" id="nomCliente">
			</div>

			<div class="campo">
				<label class="campo__label" for="compra">Compañía</label>
				<input class="campo__field" type="text" id="idCompania">
			</div>
			<div class="campo">
				<label class="campo__label" for="compra">Representante</label>
				<input class="campo__field" type="text" id="idRepresentante">
			</div>
		
			<div class="campo">
				<label class="campo__label" for="cantidad">Lista de precios a utilizar</label>
				<input class="campo__field" type="number" id="listPrecios">
			</div>

			<div class="campo">
				<label class="campo__label" for="precio">Almacen</label>
				<input class="campo__field" type="text" id="idAlmacen">
			</div>

			<div class="campo">
				<label class="campo__label" for="fecha-sol">Bloqueo</label>
				<input class="campo__field" type="checkbox" id="bloqueo">
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Analista</label>
				<textarea class="campo__field campo__field--textarea" id="analista"></textarea>
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Divisa</label>
				<textarea class="campo__field campo__field--textarea" id="divisa"></textarea>
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Límite de crédito</label>
				<textarea class="campo__field campo__field--textarea" id="lim_credito"></textarea>
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Saldo orden</label>
				<textarea class="campo__field campo__field--textarea" id="saldoOrden"></textarea>
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Saldo factura</label>
				<textarea class="campo__field campo__field--textarea" id="saldoFact"></textarea>
			</div>

			<div class="campo campo--button">
<<<<<<< HEAD
				<input class="campo__field button--blue" type="submit" value="Alta de cliente">
				<input class="campo__field button--blue" type="submit" value="Baja de cliente">
                <input class="campo__field button--red grd" type="reset" value="Limpiar formulario">
=======
				<input class="campo__field button--red grd" type="reset" value="Limpiar">
				<input class="campo__field button--red grd" type="reset" value="Alta">
				<input class="campo__field button--blue" type="submit" value="Baja">
>>>>>>> f164b6c26c68440d137b9deba74e07c0f3bb4645
			</div>
		</form>
	</div>	
</div>