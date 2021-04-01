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
                                        <input class="btn btn-danger" type="submit" value="bloquear">
                                    </td>
                                </tr>
                            </table>
                            </td>
                            
                            <td>
                            <table style="width: 100%;">
                                <tr>
                                    <td>Alfreds Futterkiste</td>
                                    <td>
                                        <input class="btn btn-success" type="submit" value="desbloquear">
                                    </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>

