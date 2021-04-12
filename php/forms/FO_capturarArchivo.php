<div class="fix-margin">
	<h1 class="h1-mine">Capturar Archivo</h1>	

	<form class="formulario" id="f_orden" method="POST" action="../php/O_capturarArchivo.php" autocomplete="off" enctype="multipart/form-data">
		<div class="campo">
			<div class="campo__icon">
				<label class="campo__label" for="agente">Agente</label>

				<div class="upload">
					<label for="uploadFileAgente" style="margin-bottom: 0">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" style="margin-top: 0.6rem;" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>
					</label>

					<input type="submit" name="submitFileAgente" style="display:none" id="submitAgente">
					<input class="campo__field" type="file" name="uploadFileAgente" id="uploadFileAgente" onchange="document.getElementById('submitAgente').click()">
				</div>
			</div>
			
			<input class="campo__field" type="text" name="agente" id="agente">
		</div>

		<div class="campo">
			<div class="campo__icon">
				<label class="campo__label" for="almacen">Almacen</label>

				<div class="upload">
					<label for="uploadFileAlmacen" style="margin-bottom: 0">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" style="margin-top: 0.6rem;" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>
					</label>

					<input type="submit" name="submitFileAlmacen" style="display:none" id="submitAlmacen">
					<input class="campo__field" type="file" name="uploadFileAlmacen" id="uploadFileAlmacen" onchange="document.getElementById('submitAlmacen').click()">
				</div>
			</div>
			
			<input class="campo__field" type="text" name="agente" id="agente">
		</div>

		<div class="campo">
			<label class="campo__label" for="almacen">Almacen</label>
			<input class="campo__field" type="text" name="almacen" id="almacen">
		</div>

		<div class="campo">
			<label class="campo__label" for="articuloExistente">Articulo Existente</label>
			<input class="campo__field" type="text" name="articuloExistente" id="articuloExistente">
		</div>

		<div class="campo">
			<label class="campo__label" for="articuloVendido">Articulo Vendido</label>
			<input class="campo__field" type="text" name="articuloVendido" id="articuloVendido">
		</div>

		<div class="campo">
			<label class="campo__label" for="bloqueoCliente">Bloqueo Cliente</label>
			<input class="campo__field" type="text" name="bloqueoCliente" id="bloqueoCliente">
		</div>

		<div class="campo">
			<label class="campo__label" for="cantidadEntregada">Cantidad Entregada</label>
			<input class="campo__field" type="text" name="cantidadEntregada" id="cantidadEntregada">
		</div>

		<div class="campo">
			<label class="campo__label" for="cliente">Cliente</label>
			<input class="campo__field" type="text" name="cliente" id="cliente">
		</div>

		<div class="campo">
			<label class="campo__label" for="compania">Compañia</label>
			<input class="campo__field" type="text" name="compania" id="compania">
		</div>

		<div class="campo">
			<label class="campo__label" for="dirEntrega">Dirección de Entrega</label>
			<input class="campo__field" type="text" name="dirEntrega" id="dirEntrega">
		</div>

		<div class="campo">
			<label class="campo__label" for="Factura">Factura</label>
			<input class="campo__field" type="text" name="Factura" id="Factura">
		</div>

		<div class="campo">
			<label class="campo__label" for="factura">Factura</label>
			<input class="campo__field" type="text" name="factura" id="factura">
		</div>

		<div class="campo">
			<label class="campo__label" for="inventario">Inventario</label>
			<input class="campo__field" type="text" name="inventario" id="inventario">
		</div>

		<div class="campo">
			<label class="campo__label" for="listaPrecios">Lista de Precios</label>
			<input class="campo__field" type="text" name="listaPrecios" id="listaPrecios">
		</div>

		<div class="campo--button">
			<input class="campo__field button--red grd" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="A_Orden" value="Guardar">
		</div>
	</form>
</div>
