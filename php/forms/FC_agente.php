<div class="fix-margin">
	<h1 class="h1-mine">Capturar Agente</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php">
		<div class="campo">
			<label class="campo__label" for="idRepresentante">ID Representante</label>
			<input class="campo__field" type="text" name="idRepresentante" id="idRepresentante" list="representante" required>
			<?php
				require_once("../includes/dbh.inc.php");

				require_once("../includes/functions_catalogos.php");
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