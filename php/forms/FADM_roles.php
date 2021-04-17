<div class="fix-margin">
	<h1 class="h1-mine">Roles de Usuarios</h1>

	<form class="formulario" method="POST" action="../includes/functions_admin.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<?php
			echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='" . $_SESSION["idCompania"] . "' readonly>";
			?>
		</div>
		<div class="campo">
			<label class="campo__label" for="idUsuario">Usuario</label>
			<!-- <input class="campo__field" type="text" id="idUsuario"> -->
			<input class="campo__field" type="text" id="idUsuario" name="idUsuario" list="usuarios" onblur="AjaxFunctionValue('dispRolActual','idUsuario','RolA')" required>
			<?php

			$reg = dispUsuarios($conn, $_SESSION["idCompania"]);

			echo "<datalist id='usuarios'>";

			while ($row = mysqli_fetch_assoc($reg)) {
				echo "<option>" . $row["idUsuario"] . "</option>";
			}

			echo "</datalist>";
			?>
		</div>
		<div class="campo">
			<label class="campo__label" for="RolA">Rol Actual</label>
			<input class="campo__field" type="text" name="RolA" id="RolA" readonly>
		</div>

		<div class="campo">
			<label class="campo__label" for="Roles">Rol Nuevo</label>
			<select name="rolN" class="campo__field">
				<?php

				$reg = dispRoles($conn, $_SESSION["idCompania"]);

				while ($row = mysqli_fetch_assoc($reg)) {
					echo "<option>" . $row["rol"] . "</option>";
				}
				?>
			</select>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="A_Rol" type="submit" value="Actualizar Rol">
		</div>
	</form>
	<form method="POST" action="../php/ADM_roles.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar todo" name="ADM_roles">
		</div>
	</form>
</div>