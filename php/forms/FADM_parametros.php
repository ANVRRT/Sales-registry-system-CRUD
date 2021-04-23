<div class="fix-margin">
	<h1 class="h1-mine">Parametros</h1>

	<form class="formulario" method="POST" action="../includes/functions_admin.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idRepresentante">Servidor</label>
			<input class="campo__field" placeholder="Alta y Baja" type="text" name="nameServer" id="idServer" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="idRepresentante">Usuario</label>
			<input class="campo__field" placeholder="Alta y Baja" type="text" name="nameUser" id="idUser" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="idRepresentante">Contraseña</label>
			<input class="campo__field" placeholder="Alta" type="text" name="namePassword" id="idPassword">
		</div>

		<div class="campo">
			<label class="campo__label" for="idRepresentante">Puerto</label>
			<input class="campo__field" placeholder="Alta" type="text" name="namePort" id="idPort">
		</div>

		<div class="campo">
			<label class="campo__label" for="idRepresentante">Compañia</label>
			<?php
				echo "<input class='campo__field' type='text' name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idRepresentante">Estado</label>
			<input class="campo__field" placeholder="0: Inactive | 1: Active" type="number" name="nameState" id="idState" min="0" max="1">
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja" name="B_parametros">
			<input class="campo__field button--blue" type="submit" value="Alta" name="A_parametros">
		</div>
	</form>

	<form method="POST" action="../php/ADM_parametros.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_parametros">
		</div>
	</form>
</div>