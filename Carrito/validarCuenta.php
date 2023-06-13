<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Crear cuenta</title>
    <link href="./css/inicioSesion.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap.min.css">
    </head>
    <body>
        <?php
        session_start();
        //Evito que salgan avisos que harían que nuestra página fuese mas fea para el cliente
        error_reporting(0);
        $usuarioRepe=false;
        $usuarioCreado=false;
        //Guardo todos los datos introducidos previamente en variables
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $correo = $_POST['correo'];
            $admin = $_POST['admin'];
        }
        //Compruebo que todos los datos están correctos
        if ($usuario != "" && $contraseña != "" && $correo != "") {
            //Compruebo si el nombre de usuario ya esta en la base de datos si ya esta evito que cree la cuenta
            $conexion = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conexion, "cartbasic1");           
            $resultado = mysqli_query($conexion, "SELECT nombre FROM usuario WHERE nombre='$usuario'");
            if(mysqli_num_rows($resultado) == 0){
                //Si están correctos pinto la lista de todos los datos introducidos
                $_SESSION['usuario'] = $usuario;
                print "<h1>Cuenta de $usuario creada</h1><br>";
                mysqli_query($conexion, "INSERT INTO usuario (`nombre`,`contraseña`, `correo`, `admin`) 
                    VALUES ('$usuario', '$contraseña', '$correo', '$admin')");
                $usuarioCreado=true;
                print ("<P>[ <A HREF='index.php'>Página principal</A> ]</P>");
            }else{
                $usuarioRepe=true;
            }
            
        }
        if($usuarioCreado == false){
            //Sino pinto el formulario de nuevo para que vuelva a introducir los datos y la página se recargue y lo revalide cuando termine el formulario
            ?>
        <body class="text-center">

    <main class="form-signin">
        <form name="formulario" action="validarCuenta.php" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="./images/Andersub.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Por favor introduzca sus datos</h1>
            <div class="form-floating">
                <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre Usuario</label>
            </div>
            <?php
                        if ($usuario == "") {
                            print "<p style='color:red';>(Se requiere un nombre de usuario)</p>";
                        }elseif($usuarioRepe == true){
                            print "<p style='color:red';>(Se requiere otro nombre de usuario)</p>";
                        }
                        ?>
            <div class="form-floating">
                <input type="text" name="correo" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Correo</label>
            </div>
                        <?php
                        if ($correo == "") {
                            print "<p style='color:red';>(Se requiere un correo electronico)</p>";
                        }
                        ?>
            <div class="form-floating">
                <input type="password" name="contraseña" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
                                    <?php
                        if ($contraseña == "") {
                            print "<p style='color:red';>(Se requiere una contraseña)</p>";
                        }
                        ?>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="enviar">Crear cuenta</button><br>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2023</p>
        </form>
        <div class="col-7 d-flex justify-content-end align-items-center">
            <a href="index.php" id="boton" class="btn btn-sm btn-outline-secondary">Volver</a>
          </div>
    </main>

            <?php
        }
        ?>
    </body>
</html>
