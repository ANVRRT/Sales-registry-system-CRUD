
<div class="fix-margin">
    <h1 class="h1-mine">Busqueda de Artículos de Cliente</h1>

    <form class="formulario" style="min-height:18rem" method="POST" action="../php/BC_articuloCliente.php">

        <div class="campo">
            <label class="campo__label" for="idCliente">Cliente</label>
            <input class="campo__field" type="text" id="idCliente" name="idCliente">
        </div>

        <div class="campo__3--button">
            <input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
            <input class="campo__field button--blue" type="submit" value="Buscar" name="Buscar">
        </div>
    </form>
</div>