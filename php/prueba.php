<?php
echo "<script>
		function pruebaxy(par){
			var r = confirm('¿Deseas eliminar a '+par+'?');
			if (r == true) {
				valor= par;
				var serv = '../includes/functions_catalogos.php?A_PLN=A_btn&resultado='+valor;
				location.href = serv;
			  } else {
				alert('No eliminaste a '+par+'!');
			  }
			
			// alert(valor);
		}

		function pruebalist(nombre){

			

		}

		</script>
";


if (isset($_SESSION["permisos"])) {
	
	echo "HOLA";
    // echo $_SESSION["permisos"]["1"];
	foreach($_SESSION["permisos"] as $value){
		echo $value . "<br>";
	}
}
?>

<div class="fix-margin">
	<h1 class="h1-mine">Capturar Agente</h1>

	<form name="prueba" class="formulario" autocomplete="off">
        <?php
			$idRepresentante = "A01422954";
            echo "<div class='campo'>";
            echo "<label class='campo__label' for='idRepresentante'>ID Representante</label>";
            echo "<input class='campo__field' name='idRepresentante' type='text' id='$idRepresentante'>";
			echo "<input class='campo__field button--blue' type='button' value='Baja' onClick='pruebaxy(document.getElementById(\"$idRepresentante\").value)'>";
            echo "</div>";
			// onClick='pruebax(document.getElementById(\"$idRepresentante\").value)'
        ?>
		<div class="campo">
			<label class="campo__label" for="idCompania">ID Compañia</label>
			<input class="campo__field" type="text" id="idCompania">
		</div>

		<div class="campo">
			<label class="campo__label" for="nomRepresentate">Nombre del representante</label>
			<input class="campo__field" type="text" id="nomRepresentante">
		</div>

		<div class="campo__3--button">
			<input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
			<input class="campo__field button--blue" type="submit" value="Baja" >
			<input class="campo__field button--blue" type="submit" value="Alta">
		</div>

		<div>
			<input id="city2" type="text" onblur="AjaxFunction('dispListaPreciosByCliente','city2','city1')" >

			<input id="city" list="city1" >
			<datalist id="city1" >
			</datalist>

			<!-- <input type=button onclick="AjaxFunction('dispListaPrecios')" value='Add Options'> -->

		
		
		</div>
	</form>
</div>
