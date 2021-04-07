<div class="fix-margin">
	<form method="POST" action="../php/C_compania.php" style="overflow: hidden">
		<table width="100%">
			<tr>
				<td width="50%"><h1 class="h1-mine" style="margin-top:1.6rem">Compañia</h1></td>
				<td><input class="campo__field button--blue" type="submit" value="Consultar todas las compañías" name="C_Compania" style="margin-top:0rem"></td>
			</tr>
		</table>
	</form>

	<br>
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
