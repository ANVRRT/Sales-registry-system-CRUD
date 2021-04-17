
<div class="fix-margin">
	<h1 class="h1-mine">Permisos</h1>

	<form class="formulario"  method="POST" action="../includes/functions_admin.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>
		<div class="campo">
			<label class="campo__label" for="idUsuario">Usuario</label>
			<!-- <input class="campo__field" type="text" id="idUsuario"> -->
			<input class="campo__field" type="text" id="idUsuario" name="idUsuario" list="usuarios"required>
			<?php
				
				$reg = dispUsuarios($conn, $_SESSION["idCompania"]);

				echo "<datalist id='usuarios'>";
				
				while($row = mysqli_fetch_assoc($reg))
				{	
					echo "<option>".$row["idUsuario"]."</option>";


				}

				echo "</datalist>";
			?>
		</div>
    
		<div class="campo">
			<label class="campo__label" for="permiso">Permiso</label>
            <select name="permiso" class="campo__field">
						<option value="p_permisos">Permisos</option>		
						<option value="pb_artCliente">Busqueda Artículo Cliente</option>
						<option value="pb_ordenVenta">Busqueda Orden Venta</option>
						<option value="po_autorizarOrdenCXC">Autorizar Orden CXC</option>	
						<option value="po_autorizarOrdenVTA">Autorizar Orden VTA</option>	
						<option value="po_autorizarOrdenCST">Autorizar Orden CST</option>	
						<option value="po_autorizarOrdenING">Autorizar Orden ING</option>	
						<option value="po_autorizarOrdenPLN">Autorizar Orden PLN</option>	
						<option value="pc_agente">Catálogo Agente</option>	
						<option value="pc_almacen">Catálogo Almacen</option>	
                        <option value="pc_artExistente">Catálogo Artículo Existente</option>
                        <option value="pc_artVendido">Catálogo Artículo Vendido</option>
                        <option value="pc_bloq_Cliente">Catálogo Bloqueo Cliente</option>
                        <option value="pc_cantEntregada">Catálogo Cantidad Entregada</option>
                        <option value="pa_clientes">Agregar Cliente</option>
                        <option value="pc_compania">Catálogo Compania</option>
                        <option value="pc_dirEnt">Catálogo Dirección Entregada</option>
						<option value="pc_factura">Catálogo Factura</option>
                        <option value="pc_inventario">Catálogo Inventario</option>
                        <option value="pc_listPrecios">Catálogo Lista Precios</option>
                        <option value="po_capturar">Capturar Orden</option>
                        <option value="ps_archivos">Subir Archvios</option>
                        <option value="pr_tiempoDepto">Reporte Tiempo Departamento</option>
					</select>
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="A_Permiso" type="submit" value="Agregar Permiso">
		</div>
	</form>
	<form method="POST" action="../php/ADM_permisos.php" style="overflow: hidden">
		<div class="consultas">
			<input class="campo__field consultas--button button--blue" type="submit" value="Consultar todo" name="ADM_permisos">
		</div>
	</form>
</div>