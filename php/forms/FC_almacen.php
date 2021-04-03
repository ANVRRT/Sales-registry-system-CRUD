<div class="fix-margin">
	<h1 class="h1-mine">Capturar Almacen</h1>

	<form class="formulario"  method="POST" action="../includes/functions_catalogos.php">
		<div class="campo">
			<label class="campo__label" for="idAlmacen">ID Almacen</label>
			<input class="campo__field" type="text" id="idAlmacen" name="idAlmacen" list="almacen">
			<?php
				require_once("../includes/dbh.inc.php");

				// $query="SELECT * FROM ArticuloExistente WHERE idCompania = ".$_SESSION["idCompania"].";";

				// echo "<datalist id='articulos'>";
				// $sql=mysqli_query($conn,$query);
				// while ($reg=mysqli_fetch_object($sql)){
				// 	echo "<option>$reg->idArticulo";
				// }
				// echo "</datalist>";

				require_once("../includes/functions_catalogos.php");
				$reg = dispAlmacenes($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='almacen'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					// echo $row["idArticulo"]."<br>";
					echo "<option>".$row["idAlmacen"]."</option>";

				}
				
				echo "</datalist>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>
		</div>

		<div class="campo">
			<label class="campo__label" for="compra">Orden de Compra</label>
			<input class="campo__field" type="text" id="compra" name="compra">
		</div>

		<div class="campo campo__text">
			<label class="campo__label" for="descripcion">Descripción</label>
			<textarea class="campo__field campo__field--textarea" name="descripcion" id="descripcion"></textarea>
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_almacen" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_almacen" type="submit" value="Alta">
		</div>
	</form>
</div>