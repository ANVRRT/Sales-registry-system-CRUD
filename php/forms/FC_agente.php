<div class="fix-margin">
	<h1 class="h1-mine">Agente</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idRepresentante">ID Representante</label>
			<input class="campo__field" type="text" name="idRepresentante" id="idRepresentante" list="representante" maxlength="10 "required>
			<?php
				$reg = dispRepresentante($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='representante'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					if($row["estatus"]==1){
						echo "<option>".$row["idRepresentante"]."</option>";
					}

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
			<input style="background-color:#E2CD01" class="campo__field button--blue" type="submit" value="Actualizar" name="U_agente">
			<input class="campo__field button--blue" name="B_agente" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_agente" type="submit" value="Alta">
		</div>
	</form>

	<form method="POST" action="../php/C_agente.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_agente">
		</div>
	</form>
</div>