<?php
	$agente = false;

	$checkDefault = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<circle cx="12" cy="12" r="9"/>
			<path d="M9 12l2 2l4 -4"/>
			</svg>';

	$checkGreen = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<circle cx="12" cy="12" r="9"/>
			<path d="M9 12l2 2l4 -4"/>
			</svg>';

	$checkFail = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<path d="M12 9v2m0 4v.01" />
			<path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
			</svg>';


	if(isset($_POST['submitFileAgente'])) {
		FilerReader($conn, "agente");
	}

	if(isset($_POST['submitFileAlmacen'])) {
		FilerReader($conn, "almacen");
	}

	if(isset($_POST['submitFileAlmacen'])) {
		FilerReader($conn, "almacen");
	}

	if(isset($_POST['submitFileArtExistente'])) {
		FilerReader($conn, "artExistente");
	}
?>

<div class="fix-margin">
	<h1 class="h1-mine">Capturar Archivo</h1>	

	<form class="formulario" id="f_orden" method="POST" action="../php/O_capturarArchivo.php" autocomplete="off" enctype="multipart/form-data">
		<div class="campo__archivos">
			<div>
				<label for="test" class="campo__label campo__archivos--label">Agente</label>

				<div class="upload">
					<div>
						<label for="uploadFileAgente">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
								<path d="M14 3v4a1 1 0 0 0 1 1h4" />
								<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
								<line x1="12" y1="11" x2="12" y2="17" />
								<line x1="9" y1="14" x2="15" y2="14" />
							</svg>
						</label>

						<?php
							switch($agente) {
								case NULL:
									echo $checkDefault;
									break;
								case true:
									echo $checkGreen;
									break;
								case false;
									echo $checkFail;
									break;
							}
						?>
					</div>

					<input type="submit" name="submitFileAgente" style="display:none" id="submitAgente">
					<input class="campo__field" type="file" name="uploadFileAgente" id="uploadFileAgente" onchange="document.getElementById('submitAgente').click()">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Almacen</label>

				<div class="upload">
					<label for="uploadFileAlmacen">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
			
			<div>
				<label for="test" class="campo__label campo__archivos--label">Articulo Existente</label>

				<div class="upload">
					<label for="uploadFileArtExistente">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>
					</label>

					<input type="submit" name="submitFileArtExistente" style="display:none" id="submitArtExistente">
					<input class="campo__field" type="file" name="uploadFileArtExistente" id="uploadFileArtExistente" onchange="document.getElementById('submitArtExistente').click()">
				</div>
			</div>
			<label for="test" class="campo__label campo__archivos--label">Arriculo Vendido</label>
			<label for="test" class="campo__label campo__archivos--label">Bloqueo Cliente</label>
			<label for="test" class="campo__label campo__archivos--label">Cantidad Entregada</label>
			<label for="test" class="campo__label campo__archivos--label">Cliente</label>
			<label for="test" class="campo__label campo__archivos--label">Compañia</label>
			<label for="test" class="campo__label campo__archivos--label">Dirección de Entrega</label>
			<label for="test" class="campo__label campo__archivos--label">Factura</label>
			<label for="test" class="campo__label campo__archivos--label">inventario</label>
			<label for="test" class="campo__label campo__archivos--label">Lista de Precios</label>
		</div>


		<div class="campo--button">
			<input class="campo__field button--red grd" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="A_Orden" value="Guardar">
		</div>
	</form>
</div>
