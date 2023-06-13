<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>InciarSesion</title>
        <link href="./css/inicioSesion.css" rel="stylesheet">
        <link rel="stylesheet" href="./bootstrap.min.css">
    </head>
    <body class="text-center">
        <?php
        session_start();
        //Guardo todos los datos introducidos previamente en variables
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
        }
        $conexion = mysqli_connect("localhost", "root", "");
        mysqli_select_db($conexion, "cartbasic1");
        //Comprueb si el usuario y la contraseña estan en mi base de datos
        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre = '$usuario' AND contraseña = '$contraseña'");
        $num_rows = mysqli_num_rows($consulta);
        //Si no estan le vuelvo a pedir los datos pero si estan entonces inicio sesión
        if ($num_rows < 1) {
            ?>
        <main class="form-signin">
        <form name="formulario" action="validarInicioSesion.php" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="./images/Andersub.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Por favor introduzca sus datos</h1>
            <div class="form-floating">
                <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre Usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" name="contraseña" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="enviar">Iniciar sesión</button><br>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2023</p>
        </form>
        <a href="crearCuenta.php">¿No tienes cuenta? Creala aquí</a><br>
        <div class="col-7 d-flex justify-content-end align-items-center">
            <a href="index.php" id="boton" class="btn btn-sm btn-outline-secondary">Volver</a>
          </div>
            <p style='color:red';>(Usuario o contraseña no valido)</p>
        </main>
            <?php
        } else {
            //Guardo en la sesión el usuario
            $_SESSION['usuario'] = $usuario;
            //Compruebo si el usuario es un administrador
            $admin=mysqli_query($conexion, "SELECT admin FROM usuario WHERE nombre = '$usuario' AND contraseña = '$contraseña' AND admin = '1'");
            $num_rows = mysqli_num_rows($admin);
            if ($num_rows >= 1) {
                $_SESSION['esAdmin'] = 1;
            }
            print "<script>window.location='./index.php';</script>";
        }
        ?>
    </body>
</html>

