<div class="fix-margin">
	<form method="POST" action="../php/C_agente.php" style="overflow: hidden">
		<table width="100%">
			<tr>
				<td width="50%"><h1 class="h1-mine" style="margin-top:1.6rem">Agente</h1></td>
				<td><input class="campo__field button--blue" type="submit" value="Consultar los representantes" name="C_agente" style="margin-top:0rem"></td>
			</tr>
		</table>
	</form>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idRepresentante">ID Representante</label>
			<input class="campo__field" type="text" name="idRepresentante" id="idRepresentante" list="representante" required>
			<?php
				$reg = dispRepresentante($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='representante'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idRepresentante"]."</option>";

				}
				
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<?php
				echo "<input class='campo__field' type='text' name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="nomRepresentante">Nombre del representante</label>
			<input class="campo__field" type="text" name="nomRepresentante" id="nomRepresentante">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_agente" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_agente" type="submit" value="Alta">
		</div>
	</form>
</div>