<div class="fix-margin">
	<h1 class="h1-mine">Modificación de Orden</h1>
	<form class="formulario" id="f_orden" method="POST" action="../includes/functions_orden.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<?php
			
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly required>";
			?>
		</div>


		<div class="campo">
			<label class="campo__label" for="id_or">ID Orden</label>
			<input class="campo__field" type="text"  name="idOrden"id="idOrden" list="ordenes" required onblur="estatusValidaciones('idOrden')">
			<?php
				
				$reg = dispOrden($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='ordenes'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idOrden"]."</option>";

				}
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="dirEnt">Direccion de Entrega</label>
			<input class="campo__field" type="text" name="dirEnt" id="dirEnt" list="dirEntList">
			<?php
				
				$reg = dispDirEnt($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='dirEntList'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["dirEnt"]."</option>";

				}
				echo "</datalist>";
			?>
		</div>
        
		<div class="campo">
			<label class="campo__label" for="fecha-sol">Fecha de solicitud</label>
			<input class="campo__field" type="date" name="fechaSol" id="fechaSol" >
		</div>

        <table>
            <tr>
               <td><label class="campo__label" for="bloqueo">Validación Facturas</label></td>
               <td align="center"><input class="campo__checkbox" type="checkbox" name="vFac" id="vFac" value="1" ></td>
            </tr>
            <tr>
               <td><label class="campo__label" for="bloqueo">Validación Cuentas por cobrar</label></td>
               <td align="center"><input class="campo__checkbox" type="checkbox" name="vCxC" id="vCxC" value="1" ></td>
            </tr>
            <tr>
                <td><label class="campo__label" for="bloqueo">Validación Precios</label></td>
                <td align="center"><input class="campo__checkbox" type="checkbox" name="vVta" id="vVta" value="1" ></td>
            </tr>
            <tr>
                <td><label class="campo__label" for="bloqueo">Validación Costos</label></td>
                <td align="center"><input class="campo__checkbox" type="checkbox" name="vCst" id="vCst" value="1" ></td>
            </tr>
            <tr>
                <td><label class="campo__label" for="bloqueo">Validación Ingeniería</label></td>
                <td align="center"><input class="campo__checkbox" type="checkbox" name="vIng" id="vIng" value="1" ></td>
            </tr>
            <tr>
                <td><label class="campo__label" for="bloqueo">Validación Planeación</label></td>
                <td align="center"><input class="campo__checkbox" type="checkbox" name="vPln" id="vPln" value="1" disabled></td>
            </tr>
			
            <tr>
                <td><label class="campo__label" for="bloqueo">Validación Fechas</label></td>
                <td align="center"><input class="campo__checkbox" type="checkbox" name="vFEC" id="vFEC" value="1" ></td>
            </tr>
        </table>

		<div class="campo--button">
			<input class="campo__field button--red grd" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="U_Orden" value="Guardar">
		</div>
		
	</form>
</div>
