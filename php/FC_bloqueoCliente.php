<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bloqueo de clientes</title>

    </head>
    <body>
        <div class="fix-margin">
            <form action="#" method="POST" class="formulario">
                <br>
                <h2>Bloqueo de clientes</h2>
                <br>
                <table style="width:100%" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th><label class="campo__label" >Disponibles</label></th>
                            <th><label class="campo__label" >Bloqueados</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <table style="width: 100%;">
                        
                                <tr>
                                    <td>Alfreds Futterkiste</td>
                                    <td>
                                        <select class="form-control" name="bloquear">
                                            <option value="1">Sin cambios</option>
                                            <option value="0">Bloquear</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Centro comercial Moctezuma</td>
                                    <td>Francisco Chang</td>
                                </tr>
                            </table>
                            </td>
                            
                            <td>
                            <table style="width: 100%;">
                                <tr>
                                    <td>Alfreds Futterkiste</td>
                                    <td>
                                        <select class="form-control" name="desbloquear">
                                            <option value="0">Sin cambios</option>
                                            <option value="1">Desbloquear</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Magazzini Alimentari Riuniti</td>
                                    <td>Giovanni Rovelli</td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="campo__3--button">
                    <input class="campo__field button--red" style="grid-row: 3 / 4;" type="reset" value="Limpiar">
                    <input class="campo__field button--blue" type="submit" value="Actualizar">
                </div>
            </form>
        </div>
    </body>
</html>

