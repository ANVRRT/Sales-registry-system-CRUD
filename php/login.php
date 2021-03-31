<?php
    session_start();
    if(isset($_SESSION["idUsuario"]))
    {
        header("location: ../php/index.php");
        exit();
    }
    

?>

<!DOCTYPE html>
<html lang="en">
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
              <form method="post" action="../includes/login.inc.php">
                  <div class="form-group">
                    <input type="text" name="idUsuario" id="user" class="form-control" required placeholder="Usuario">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Contraseña">
                  </div>
                  <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Iniciar Sesión" onclick="">
                  <!-- <input type="submit" name="submit" value="Registrar" title="Registra tu cuenta"> -->

                </form>
                <?php
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "user!exists")
                        {
                            echo "<p style='color: black;'> ¡Ese nombre de usuario no existe! </p>";
                        }
                        if($_GET["error"] == "wrongpswrd")
                        {
                            echo "<p style='color: black;'> ¡Contraseña invalida! </p>";
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
