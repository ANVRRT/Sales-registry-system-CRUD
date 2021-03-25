<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Papeles Corrugados</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/styles-capOrden.css">
	<link rel="stylesheet" href="../css/normalize.css">
</head>
<body>
	<div class="bg">
		<h1>Capturar Orden</h1>
		<form class="formulario">
			<div class="campo">
				<label class="campo__label" for="cliente">Cliente</label>
				<input class="campo__field" type="text" id="cliente">
			</div>

			<div class="campo">
				<label class="campo__label" for="entrega">Dir. de Entrega</label>
				<input class="campo__field" type="text" id="entrega">
			</div>

			<div class="campo">
				<label class="campo__label" for="compra">Orden de Compra</label>
				<input class="campo__field" type="text" id="compra">
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

			<div class="campo">
				<label class="campo__label" for="cantidad">Cantidad</label>
				<input class="campo__field" type="text" id="cantidad">
			</div>

			<div class="campo">
				<label class="campo__label" for="precio">Precio</label>
				<input class="campo__field" type="text" id="precio">
			</div>

			<div class="campo">
				<label class="campo__label" for="fecha-sol">Fecha Solicitada</label>
				<input class="campo__field" type="date" id="fecha-sol">
			</div>

			<div class="campo__text">
				<label class="campo__label" for="observacion-orden">Observaciones de la Orden</label>
				<textarea class="campo__field campo__field--textarea" id="observacion-orden"></textarea>
			</div>


			<div class="campo campo--button">
				<input class="campo__field button--red grd" type="reset" value="Limpiar">
				<input class="campo__field button--blue" type="submit" value="Guardar">
			</div>
		</form>
	</div>	
</html>