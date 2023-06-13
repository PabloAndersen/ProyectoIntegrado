<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>Funciones admin</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Funciones Administrador</h1>
                    <br>
                    <?php
                    if (isset($_SESSION["esAdmin"])) {
                        ?>
                        <ul>
                            <li><a href="./insertarProductoSub.php">Agregar producto</a></li>
                            <li><a href="./eliminarProductoSub.php">Eliminar producto</a></li>
                            <li><a href="./listaUsuarios.php">Ver lista trabajadores</a></li>
                            <li><a href="./crearTrabajador.php">Añadir trabajador</a></li>
                            <li><a href="./listaPedidos.php">Ver lista pedidos</a></li>
                            <li><a href="./insertarClase.php">Añadir clase</a></li>
                            <li><a href="./eliminarClase.php">Eliminar clase</a></li>
                            <li><a href="./cerrarSesion.php">Cerrar Sesión</a></li>
                            <li><a href="./index.php">Volver</a></li>
                        </ul>
                        <?php
                    } else {
                        echo "error";
                    }
                    ?>

                </div>
            </div>
        </div>

    </body>
</html>

