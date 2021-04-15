
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
						<option>p_permisos</option>		
						<option>pb_artCliente</option>
						<option>po_ordenesVenta</option>	
						<option>pc_agente</option>	
						<option>pc_almacen</option>	
                        <option>pc_artExistente</option>
                        <option>pc_artVendido</option>
                        <option>pc_bloq_Cliente</option>
                        <option>pc_cantEntregada</option>
                        <option>pa_clientes</option>
                        <option>pc_compania</option>
                        <option>pc_dirEnt</option>
						<option>pc_factura</option>
                        <option>pc_inventario</option>
                        <option>pc_listPrecios</option>
                        <option>po_capturar</option>
					</select>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Guardar Permisos">
		</div>
	</form>
</div>