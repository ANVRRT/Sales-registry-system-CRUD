<div class="fix-margin">
	<h1 class="h1-mine">Capturar Orden</h1>
	<form class="formulario" id="f_orden" method="POST" action="../includes/functions_orden.php" autocomplete="off">
		<div class="campo">
			<label class="campo__label" for="compania">Compañía</label>
			<?php
			
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="cliente"> id Cliente</label>
			<input class="campo__field" type="text" name="idCliente" id="idCliente" list="cliente" onblur="AjaxFunction('dispDirEntByCLiente','idCliente','dirEntList');AjaxFunction('dispListaPreciosByCliente','idCliente','listaPrecio'); AjaxFunction('dispOrdenByCliente','idCliente','idOrdenlist')"  required>
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
			<label class="campo__label" for="idOrden">ID Orden</label>
			<input class="campo__field" type="text" name="idOrden" id="idOrden" maxlength="10" list="idOrdenlist" required>
			<datalist id="idOrdenlist" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="dirEnt">Direccion de Entrega</label>
			<input class="campo__field" type="text" name="dirEnt" id="dirEnt" list="dirEntList" required>
			<datalist id="dirEntList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="idList">Lista de precios a utilizar</label>
			<input class="campo__field" type="text" name="idList" id="idList" list="listaPrecio" onblur="AjaxFunction('dispArtByList','idList','articuloList')" required>
			<datalist id="listaPrecio" >
			</datalist>
		</div>

		<div class="campo">
			<div class="campo__icon">
				<label class="campo__label campo__label--icon" for="articulo">Artículo</label>
				<button  name="A_articulo"  type="submit"  style="border:none; background: none;" >
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round" >
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<circle cx="12" cy="12" r="9" />
						<line x1="9" y1="12" x2="15" y2="12" />
						<line x1="12" y1="9" x2="12" y2="15" />
					</svg>
				</button>
			</div>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articuloList" onblur="AjaxFunction2('dispFolio','idCliente','idArticulo','folioList');AjaxFunction2('dispPrecio','idList','idArticulo','precioList')" required>
			<datalist id="articuloList" >
			</datalist>
		</div>
 
		<div class="campo">
			<label class="campo__label" for="folio">Folio</label>
			<input class="campo__field" type="text" name="folio" id="folio" list="folioList">
			<datalist id="folioList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="precio">Precio</label>
			<input class="campo__field" type="text" name="precio" id="precio" list="precioList" required>
			<datalist id="precioList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="cantidad">Cantidad</label>
			<input class="campo__field" type="number" name="cantidad" id="cantidad" min="0" required>
		</div>

		

		<div class="campo">
			<label class="campo__label" for="codAviso">Código de aviso</label>
			<input class="campo__field" type="text" name="codAviso" id="codAviso" maxlength="3" required>
		</div>

		<div class="campo">
			<label class="campo__label" for="udVta">Unidad de venta</label>
			<input class="campo__field" type="text" name="udVta" id="udVta" maxlength="3" required>
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="observacion-orden">Observaciones</label>
			<textarea class="campo__field campo__field--textarea" name="observaciones" id="observaciones" required></textarea>
		</div>

		<div class="campo">
			<label class="campo__label" for="fecha-sol">Fecha de solicitud</label>
			<input class="campo__field" type="date" name="fechaSol" id="fechaSol" required>
		</div>

		<div class="campo--button">
			<input class="campo__field button--red grd" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="A_Orden" value="Guardar">
		</div>
		
	</form>
</div>
