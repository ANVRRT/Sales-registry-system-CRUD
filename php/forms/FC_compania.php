<div class="fix-margin">
	<h1 class="h1-mine">Capturar Compañia</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">Id Compañia</label>
			<input class="campo__field" type="text" name="idCompania" id="idCompania">
		</div>

		<div class="campo">
			<label class="campo__label" for="nom_compania">Nombre de Compañia</label>
			<input class="campo__field" type="text" name="nombre" id="nombre">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja" name="B_Compania">
			<input class="campo__field button--blue" type="submit" value="Alta" name="A_Compania">
		</div>
	</form>
</div>
