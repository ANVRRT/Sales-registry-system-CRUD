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
				require_once("../includes/dbh.inc.php");

				require_once("../includes/functions_catalogos.php");
				$reg = dispClientes($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='cliente'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idCliente"]."</option>";

				}
				echo "</datalist>";
			?>
			
		</div>

		<div class="campo">
			<label class="campo__label" for="idOrden">ID Orden</label>
			<input class="campo__field" type="text" name="idOrden" id="idOrden" maxlength="10" list="idOrdenlist">
			<datalist id="idOrdenlist" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="dirEnt">Direccion de Entrega</label>
			<input class="campo__field" type="text" name="dirEnt" id="dirEnt" list="dirEntList">
			<datalist id="dirEntList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="idList">Lista de precios a utilizar</label>
			<input class="campo__field" type="text" name="idList" id="idList" list="listaPrecio">
			<datalist id="listaPrecio" >
			</datalist>
		</div>

		<div class="campo">
			<div class="campo__icon">
				<label class="campo__label" for="articulo">Artículo</label>
				<button  name="A_articulo"  type="submit"  style="border:none;" >
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus campo__icon--icon" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#36b9cc" fill="none" stroke-linecap="round" stroke-linejoin="round" >
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<circle cx="12" cy="12" r="9" />
						<line x1="9" y1="12" x2="15" y2="12" />
						<line x1="12" y1="9" x2="12" y2="15" />
					</svg>
				</button>
			</div>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulo" onblur="AjaxFunction2('dispFolio','idCliente','idArticulo','folioList');AjaxFunction2('dispPrecio','idList','idArticulo','precioList')">
			<?php
				require_once("../includes/dbh.inc.php");

				require_once("../includes/functions_catalogos.php");
				$reg = dispArticulos($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='articulo'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					echo "<option>".$row["idArticulo"]."</option>";

				}
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="folio">Folio</label>
			<input class="campo__field" type="text" name="folio" id="folio" list="folioList"  >
			<datalist id="folioList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="precio">Precio</label>
			<input class="campo__field" type="text" name="precio" id="precio" list="precioList" >
			<datalist id="precioList" >
			</datalist>
		</div>

		<div class="campo">
			<label class="campo__label" for="cantidad">Cantidad</label>
			<input class="campo__field" type="number" name="cantidad" id="cantidad" min="0">
		</div>

		

		<div class="campo">
			<label class="campo__label" for="codAviso">Código de aviso</label>
			<input class="campo__field" type="text" name="codAviso" id="codAviso">
		</div>

		<div class="campo">
			<label class="campo__label" for="udVta">Unidad de venta</label>
			<input class="campo__field" type="text" name="udVta" id="udVta">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="observacion-orden">Observaciones</label>
			<textarea class="campo__field campo__field--textarea" name="observaciones" id="observaciones"></textarea>
		</div>

		<div class="campo">
			<label class="campo__label" for="fecha-sol">Fecha de solicitud</label>
			<input class="campo__field" type="date" name="fechaSol" id="fechaSol">
		</div>

		<div class="campo--button">
			<input class="campo__field button--red grd" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" name="A_Orden" value="Guardar">
		</div>
	</form>
</div>
