<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Crear Trabajador</title>
    <link href="./css/inicioSesion.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body class="text-center">

    <main class="form-signin">
        <form name="formulario" action="validarCuenta.php" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="./images/Andersub.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Por favor introduzca sus datos</h1>
            <div class="form-floating">
                <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre Usuario</label>
            </div>
            <div class="form-floating">
                <input type="text" name="correo" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Correo</label>
            </div>
            <div class="form-floating">
                <input type="text" name="contraseña" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <p>Seleccionar tipo de trabajador:</p>
            <input type="radio" id="trabajador" name="admin" value="2" checked="checked">
            <label for="trabajador">Trabajador</label><br>
            <input type="radio" id="admin" name="admin" value="1">
            <label for="admin">Administrador</label><br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="enviar">Crear cuenta</button>
            <p>(Si es administrador podra usar todas las funciones de administrador)</p>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2023</p>
        </form>
        <div class="col-7 d-flex justify-content-end align-items-center">
            <a href="index.php" id="boton" class="btn btn-sm btn-outline-secondary">Volver</a>
          </div>
    </main>


</body>
</html>
