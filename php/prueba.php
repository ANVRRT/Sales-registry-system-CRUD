<?php
echo "<script>
		function pruebaxy(par){
			var r = confirm('¿Deseas eliminar a '+par+'?');
			if (r == true) {
				valor = par;
				var serv = 'http://localhost/CCLAMODERNA/PHP/'+'index.php?resultado='+valor;
				location.href = serv;
			  } else {
				alert('No eliminaste a '+par+'!');
			  }
			
			// alert(valor);
		}

		</script>
";




?>

<div class="fix-margin">
	<h1 class="h1-mine">Capturar Agente</h1>

	<form name="prueba" class="formulario">
        <?php
		$idRepresentante = "A01422954";
            echo "<div class='campo'>";
            echo "<label class='campo__label' for='idRepresentante'>ID Representante</label>";
            echo "<input class='campo__field' name='idRepresentante' type='text' id='$idRepresentante'>";
			echo "<input class='campo__field button--blue' type='button' value='Baja' onClick='pruebaxy(idRepresentante=document.getElementById(\"$idRepresentante\").value)'>";
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
	</form>
</div>