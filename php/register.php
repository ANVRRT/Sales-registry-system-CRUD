<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="https://www.papelescorrugados.com.mx/images/logotipo.png" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="../img/logo.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">¡Bienvenido usuario!</p>
                            <form method="post" action="../includes/signup.inc.php">
                                <div class="form-group">
                                    <input type="text" name="idUsuario" class="form-control" required placeholder="Usuario" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="idCompania" class="form-control" required placeholder="Compañia" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control" required placeholder="Nombre" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="rol" class="form-control" required placeholder="Rol" autocomplete="off">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="contrasena" id="password" class="form-control" required placeholder="Contraseña">
                                    <input type="password" name="repcontrasena" id="password" class="form-control" required placeholder="Repetir contraseña">
                                </div>
                                <input name="submit" id="register" class="btn btn-block login-btn mb-4" type="submit" value="Registrar Usuario" onclick="">
                                <!-- <input type="submit" name="submit" value="Registrar" title="Registra tu cuenta"> -->

                            </form>
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "invalididU") {
                                        echo "<p style='color: white;'> ¡Nombre de usuario invalido! </p>";
                                    }
                                    if ($_GET["error"] == "pswrd!match") {
                                        echo "<p style='color: white;'> ¡Las contraseñas no coinciden! </p>";
                                    }
                                    if ($_GET["error"] == "rol!exist") {
                                        echo "<p style='color: white;'> ¡No existe ese rol en esa compañia! </p>";
                                    }
                                    if ($_GET["error"] == "usrtaken") {
                                        echo "<p style='color: white;'> ¡Ese usuario ya existe! </p>";
                                    }
                                    if ($_GET["error"] == "comp!exist") {
                                        echo "<p style='color: white;'> ¡Esa empresa no existe! </p>";
                                    }
                                    if ($_GET["error"] == "stmtfailed") {
                                        echo "<p style='color: white;'> ¡Algo ocurrió! Contacta al administrador </p>";
                                    }
                                    if ($_GET["error"] == "success") {
                                        echo "<p style='color: green;'> ¡Usuario creado exitosamente! </p>";
                                    }
                                }
                            ?>
                            <nav class="login-card-footer-nav">
                                <p>Papeles Corrugados S.A. de C.V. Vialidad Toluca Tenango Km 6 San Lorenzo Coacalco, Metepec, Estado de México. C.P. 52140</p>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>