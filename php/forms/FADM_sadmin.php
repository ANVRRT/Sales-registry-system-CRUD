<div class="fix-margin">
	<h1 class="h1-mine">Super Admin</h1>

	<form class="formulario" method="POST" action="../includes/functions_admin.php" autocomplete="off">
    <div class="campo">
			<label class="campo__label" for="idCompaniaA">ID Compañia Actual</label>
			<?php
			echo "<input class='campo__field' type='text'name='idCompaniaA' id='idCompaniaA' value='" . $_SESSION["idCompania"] . "' readonly>";
			?>

		</div>
		<div class="campo">
			<label class="campo__label" for="idCompaniaN">ID Compañia a cambiar</label>
			<?php
			echo "<input class='campo__field' type='text'name='idCompaniaN' id='idCompaniaN' list='companias'  >";

            $reg = dispCompania($conn);

			echo "<datalist id='companias'>";

			while ($row = mysqli_fetch_assoc($reg)) {
				echo "<option value = '". $row["idCompania"] ."'>" . $row["nombre"] . "</option>";
			}

			echo "</datalist>";
			?>

		</div>
		<div class="campo">
			<label class="campo__label" for="idUsuario">Usuario</label>
			<!-- <input class="campo__field" type="text" id="idUsuario"> -->
            <?php
			echo "<input class='campo__field' type='text' id='idUsuario' name='idUsuario' value='" . $_SESSION["idUsuario"] . "'readonly required>"

            ?>

		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="A_CompADM" type="submit" value="Actualizar Compañia">
		</div>
	</form>
</div>