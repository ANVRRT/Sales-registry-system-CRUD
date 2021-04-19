<div class="fix-margin">
	<h1 class="h1-mine" style="margin-top:1.6rem">Dirección de Entrega</h1>

	<form class="formulario" method="POST" action="../includes/functions_catalogos.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">Id Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCliente">Id Cliente</label>
			<input class="campo__field" type="text"  name="idCliente" id="idCliente" list="cliente" required>
			<?php
			    
				$reg = dispClientes($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='cliente'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					if($row["estatus"]==1){
						echo "<option>".$row["idCliente"]."</option>";
					}
				}
				
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="dirEnt">Dir Ent</label>
			<input class="campo__field" type="text" name="dirEnt" id="dirEnt" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="nombreentrega">Nombre Entrega</label>
			<input class="campo__field" type="text" name="nombreEntrega" id="nombreEntrega" >
		</div>

		<div class="campo">
			<label class="campo__label" for="direccion">Dirección</label>
			<input class="campo__field" type="text" name="direccion" id="direccion">
		</div>

		<div class="campo">
			<label class="campo__label" for="municipio">Municipio</label>
			<input class="campo__field" type="text" name="municipio" id="municipio">
		</div>

		<div class="campo">
			<label class="campo__label" for="estado">Estado</label>
			<input class="campo__field" type="text" name="estado" id="estado">
		</div>

		<div class="campo">
			<label class="campo__label" for="telefono">Teléfono</label>
			<input class="campo__field" type="text" name="telefono" id="telefono">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="observacion-orden">Observaciones</label>
			<textarea class="campo__field campo__field--textarea" name="observaciones" id="observaciones"></textarea>
		</div>

		<div class="campo">
			<label class="campo__label" for="codpost">Código Postal</label>
			<input class="campo__field" type="text" name="codpost" id="codpost">
		</div>

		<div class="campo">
			<label class="campo__label" for="codruta">Código de ruta</label>
			<input class="campo__field" type="text" name="codruta" id="codruta" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="pais">País</label>
			<input class="campo__field" type="text" name="pais" id="pais" maxlength="3">
		</div>

		<div class="campo">
			<label class="campo__label" for="rfc">RFC</label>
			<input class="campo__field" type="text" name="rfc" id="rfc">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="B_dirEnt" value="Baja">
			<input class="campo__field button--blue" type="submit" name="A_dirEnt"value="Alta">
		</div>
		<div class="campo__3--button">
		<input style="background-color:#E2CD01" class="campo__field button--blue" type="submit" value="Actualizar" name="U_dirEnt">
		</div>
	</form>

	<form method="POST" action="../php/C_dirEnt.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar Todo" name="C_dirEnt">
		</div>		
	</form>
</div>