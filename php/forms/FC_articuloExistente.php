<div class="fix-margin">
	<h1 class="h1-mine">Artículo existente</h1>

	<form class="formulario" method="POST" action=".../includes/functions_catalogos.php">
		<div class="campo">
			<label class="campo__label" for="idCompania">Compañía</label>

			<?php
				echo "<input class='campo__field' type='text'name='idCompania' id='idCompania' value='".$_SESSION["idCompania"]."' readonly>";
			?>

			
		</div>
		<div class="campo">
			<label class="campo__label" for="idArticulo">ID Artículo</label>
			<input class="campo__field" type="text" name="idArticulo" id="idArticulo" list="articulos">
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
				$reg = dispArticulos($conn, $_SESSION["idCompania"]);
				
				echo "<datalist id='articulos'>";
				while($row = mysqli_fetch_assoc($reg))
				{
					// echo $row["idArticulo"]."<br>";
					echo "<option>".$row["idArticulo"]."</option>";

				}
				
				echo "</datalist>";
			?>
		</div>



		<div class="campo campo__text">
			<label class="campo__label" for="descripcion">Descripción</label>
			<textarea class="campo__field campo__field--textarea" name="descripcion" id="descripcion"></textarea>
		</div>

		<div class="campo">
			<label class="campo__label" for="unidad">Costo estándar</label>
			<input class="campo__field" type="number" name="costo" id="costo">
		</div>


		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" name="B_artE" type="submit" value="Baja">
			<input class="campo__field button--blue" name="A_artE" type="submit" value="Alta">
		</div>
	</form>
</div>