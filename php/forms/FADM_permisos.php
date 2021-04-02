
<div class="fix-margin">
	<h1 class="h1-mine">Permisos</h1>

	<form class="formulario">
		<div class="campo">
			<label class="campo__label" for="idUsuario">Usuario</label>
			<input class="campo__field" type="text" id="idUsuario">
		</div>
    
		<div class="campo">
			<label class="campo__label" for="permiso">Permiso</label>
            <select name="permiso" class="campo__field">
						<option>ADM Administrador</option>		
						<option>AGE Agente</option>
						<option>CST Costos</option>	
						<option>CXC Cuentas por Cobrar</option>	
						<option>DIR Dirección</option>	
                        <option>EMB Embarques</option>
                        <option>FAC Facturación</option>
                        <option>FEC Fechas</option>
                        <option>ING Ingeniería</option>
                        <option>PLN Planeación</option>
                        <option>REA Reaprovisionamientos</option>
                        <option>VTA/PRE Ventas y Precios</option>
					</select>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Guardar Permisos">
		</div>
	</form>
</div>