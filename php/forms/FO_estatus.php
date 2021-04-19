
<div class="fix-margin">
    <h1 class="h1-mine">Estatus de Ordenes de Venta</h1>

    <form class="formulario" style="min-height:18rem" method="POST" action="../php/O_estatus.php" autocomplete="off">

        <div class="campo">
            <label class="campo__label" for="estatus">Estatus</label>
            <select name="estatus" class="campo__field">
                <option></option>
                <option>Todas</option>
                <option>En proceso</option>
                <option>Procesadas</option>
            </select>
        </div>

        <div class="campo__3--button">
            <input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
            <input class="campo__field button--blue" type="submit" value="Buscar" name="Buscar">
        </div>
    </form>
</div>