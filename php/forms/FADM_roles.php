
<div class="fix-margin">
	<h1 class="h1-mine">Roles</h1>

	<form class="formulario"  method="POST" action="../includes/functions_admin.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>
		<div class="campo">
			<label class="campo__label" for="rol">Rol</label>
			<!-- <input class="campo__field" type="text" id="idUsuario"> -->
			<input class="campo__field" type="text" id="rol" name="rol" list="roles"required>
			<?php
				
				$reg = dispRoles($conn, $_SESSION["idCompania"]);

				echo "<datalist id='roles'>";
				
				while($row = mysqli_fetch_assoc($reg))
				{	
					echo "<option>".$row["rol"]."</option>";


				}

				echo "</datalist>";
			?>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_Rol" type="submit" value="Eliminar Rol">
			<input class="campo__field button--blue" name="A_Rol" type="submit" value="Agregar Rol">
		</div>
	</form>
	<form method="POST" action="../php/ADM_roles.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar todo" name="ADM_roles">
		</div>
	</form>
</div>