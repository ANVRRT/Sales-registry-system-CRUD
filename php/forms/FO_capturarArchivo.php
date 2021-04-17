<?php
	$agenteReturn = $almacenReturn = $artExistenteReturn = $artVendidoReturn = $cantEntegadaReturn = $clienteReturn = $companiaReturn = $dirEntregaReturn = $facturaReturn = $inventarioReturn = $listPreciosReturn = array("NULL", "Default");
	
	$infoIconDefault = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<circle cx="12" cy="12" r="9"/>
			<path d="M9 12l2 2l4 -4"/>
			</svg>';

	$infoIconPass = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<circle cx="12" cy="12" r="9"/>
			<path d="M9 12l2 2l4 -4"/>
			</svg>';

	$infoIconFail = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<path d="M12 9v2m0 4v.01" />
			<path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
			</svg>';

	//return [0] bool	error / no error 	| [0...11] bool Corresponding returns to default ${name}Return
	//return [1] str	Returned text query	| [0...11] str	Corresponding returns to default ${name}Return
	if(isset($_POST['submitFiles'])) {
		$allReturn = FilerReader($conn);

		$agenteReturn[0] = $allReturn[0][0];
		$agenteReturn[1] = $allReturn[1][0];

		$almacenReturn[0] = $allReturn[0][1];
		$almacenReturn[1] = $allReturn[1][1];

		$artExistenteReturn[0] = $allReturn[0][2];
		$artExistenteReturn[1] = $allReturn[1][2];

		$artVendidoReturn[0] = $allReturn[0][3];
		$artVendidoReturn[1] = $allReturn[1][3];

		$cantEntegadaReturn[0] = $allReturn[0][4];
		$cantEntegadaReturn[1] = $allReturn[1][4];

		$clienteReturn[0] = $allReturn[0][5];
		$clienteReturn[1] = $allReturn[1][5];

		$companiaReturn[0] = $allReturn[0][6];
		$companiaReturn[1] = $allReturn[1][6];

		$dirEntregaReturn[0] = $allReturn[0][7];
		$dirEntregaReturn[1] = $allReturn[1][7];

		$facturaReturn[0] = $allReturn[0][8];
		$facturaReturn[1] = $allReturn[1][8];

		$inventarioReturn[0] = $allReturn[0][9];
		$inventarioReturn[1] = $allReturn[1][9];

		$listPreciosReturn[0] = $allReturn[0][10];
		$listPreciosReturn[1] = $allReturn[1][10];		
	}
?>

<div class="fix-margin">
	<h1 class="h1-mine">Capturar desde Archivos</h1>	

	<form class="formulario" id="f_orden" method="POST" action="../php/O_capturarArchivo.php" autocomplete="off" enctype="multipart/form-data">
		<div class="campo__archivos">

			<div>
				<label for="test" class="campo__label campo__archivos--label">Agente</label>

				<div class="upload">
					<div>
						<label for="uploadFileAgente">
							<svg xmlns="http://www.w3.org/2000/svg" id="SVGDOCAgente" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
								<path d="M14 3v4a1 1 0 0 0 1 1h4" />
								<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
								<line x1="12" y1="11" x2="12" y2="17" />
								<line x1="9" y1="14" x2="15" y2="14" />
							</svg>

							<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadAgente" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
								<path d="M14 3v4a1 1 0 0 0 1 1h4" />
								<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
								<line x1="12" y1="11" x2="12" y2="17" />
								<polyline points="9 14 12 11 15 14" />
							</svg>
						</label>
						<?php
							switch($agenteReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(0)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(0)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					</div>

					<input class="campo__field" type="file" name="uploadFileAgente" id="uploadFileAgente" onchange="document.getElementById('SVGDOCAgente').style.display='none'; document.getElementById('SVGUploadAgente').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Almacen</label>

				<div class="upload">
					<label for="uploadFileAlmacen">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocAlmacen" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadAlmacen" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($almacenReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(1)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(1)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileAlmacen" id="uploadFileAlmacen" onchange="document.getElementById('SVGDocAlmacen').style.display='none'; document.getElementById('SVGUploadAlmacen').style.display='inherit';">
				</div>
			</div>
			
			<div>
				<label for="test" class="campo__label campo__archivos--label">Articulo Existente</label>

				<div class="upload">
					<label for="uploadFileArtExistente">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocArtExistente" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadArtExistente" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($artExistenteReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(2)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(2)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileArtExistente" id="uploadFileArtExistente" onchange="document.getElementById('SVGDocArtExistente').style.display='none'; document.getElementById('SVGUploadArtExistente').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Articulo Vendido</label>

				<div class="upload">
					<label for="uploadFileArtVendido">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocArtVendido" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadArtVendido" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($artVendidoReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(3)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(3)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileArtVendido" id="uploadFileArtVendido" onchange="document.getElementById('SVGDocArtVendido').style.display='none'; document.getElementById('SVGUploadArtVendido').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Cantidad Entregada</label>

				<div class="upload">
					<label for="uploadFileCantEntregada">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocCantEntregada" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadCantEntregada" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($cantEntegadaReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(4)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(4)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileCantEntregada" id="uploadFileCantEntregada" onchange="document.getElementById('SVGDocCantEntregada').style.display='none'; document.getElementById('SVGUploadCantEntregada').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Cliente</label>

				<div class="upload">
					<label for="uploadFileCliente">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocCliente" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadCliente" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($clienteReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(5)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(5)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileCliente" id="uploadFileCliente" onchange="document.getElementById('SVGDocCliente').style.display='none'; document.getElementById('SVGUploadCliente').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Compañia</label>

				<div class="upload">
					<label for="uploadFileCompania">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocCompania" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadCompania" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($companiaReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(6)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(6)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileCompania" id="uploadFileCompania" onchange="document.getElementById('SVGDocCompania').style.display='none'; document.getElementById('SVGUploadCompania').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Dirección de Entrega</label>

				<div class="upload">
					<label for="uploadFileDirEntrega">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocDirEntrega" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadDirEntrega" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($dirEntregaReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(7)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(7)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileDirEntrega" id="uploadFileDirEntrega" onchange="document.getElementById('SVGDocDirEntrega').style.display='none'; document.getElementById('SVGUploadDirEntrega').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Factura</label>

				<div class="upload">
					<label for="uploadFileFactura">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocFactura" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadFactura" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($facturaReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(8)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(8)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileFactura" id="uploadFileFactura" onchange="document.getElementById('SVGDocFactura').style.display='none'; document.getElementById('SVGUploadFactura').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Inventario</label>

				<div class="upload">
					<label for="uploadFileInventario">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocInventario" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadInventario" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($inventarioReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(9)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(9)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileInventario" id="uploadFileInventario" onchange="document.getElementById('SVGDocInventario').style.display='none'; document.getElementById('SVGUploadInventario').style.display='inherit';">
				</div>
			</div>

			<div>
				<label for="test" class="campo__label campo__archivos--label">Lista de Precios</label>

				<div class="upload">
					<label for="uploadFileListPrecios">
						<svg xmlns="http://www.w3.org/2000/svg" id="SVGDocListPrecios" class="icon icon-tabler icon-tabler-file-plus campo__icon--icon" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<line x1="9" y1="14" x2="15" y2="14" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" id="SVGUploadListPrecios" class="icon icon-tabler icon-tabler-file-upload" width="40" height="40" style="display:none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M14 3v4a1 1 0 0 0 1 1h4" />
							<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
							<line x1="12" y1="11" x2="12" y2="17" />
							<polyline points="9 14 12 11 15 14" />
						</svg>
					</label>
						<?php
							switch($listPreciosReturn[0]) {
								case "NULL":
									echo $infoIconDefault;
									break;
								case "true":
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(10)">';
									echo $infoIconPass;
									echo '</a>';
									break;
								case "false";
									echo '<a href="#" data-toggle="modal" data-target="#infoModal" onclick="changeDisplayText(10)">';
									echo $infoIconFail;
									echo '</a>';
									break;
							}
						?>
					<input class="campo__field" type="file" name="uploadFileListPrecios" id="uploadFileListPrecios" onchange="document.getElementById('SVGDocListPrecios').style.display='none'; document.getElementById('SVGUploadListPrecios').style.display='inherit';">
				</div>
			</div>
		</div>


		<div class="campo--button">
			<input class="campo__field button--red grd" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="submitFiles" value="Subir">
		</div>
	</form>

	<!-- Info Modal-->
	<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información Adicional</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id= "infoAgente" style= "display: none"><?php echo $agenteReturn[1]; ?></div>
                <div class="modal-body" id= "infoAlmacen" style= "display: none"><?php echo $almacenReturn[1]; ?></div>
                <div class="modal-body" id= "infoArtExistente" style= "display: none"><?php echo $artExistenteReturn[1]; ?></div>
                <div class="modal-body" id= "infoArtVendido" style= "display: none"><?php echo $artVendidoReturn[1]; ?></div>
                <div class="modal-body" id= "infoBloqueoCliente" style= "display: none"><?php echo $bloqueoClienteReturn[1]; ?></div>
                <div class="modal-body" id= "infoCantEntregada" style= "display: none"><?php echo $cantEntegadaReturn[1]; ?></div>
                <div class="modal-body" id= "infoCliente" style= "display: none"><?php echo $clienteReturn[1]; ?></div>
                <div class="modal-body" id= "infoCompania" style= "display: none"><?php echo $companiaReturn[1]; ?></div>
                <div class="modal-body" id= "infoDirEntrega" style= "display: none"><?php echo $dirEntregaReturn[1]; ?></div>
                <div class="modal-body" id= "infoFactura" style= "display: none"><?php echo $facturaReturn[1]; ?></div>
                <div class="modal-body" id= "infoInventario" style= "display: none"><?php echo $inventarioReturn[1]; ?></div>
                <div class="modal-body" id= "infoListPrecios" style= "display: none"><?php echo $listPreciosReturn[1]; ?></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
