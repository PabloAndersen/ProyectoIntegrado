<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>InsertarProducto</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
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
                        <form name="formulario" action="validarInserción.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <table>
                                    <tr>
                                        <td>Nombre:</td>
                                        <td><input type="text" name="nombre" required/></td>
                                    </tr>
                                    <tr>
                                        <td>Precio:</td>
                                        <td><input type="text" name="precio" required/></td>
                                    </tr>
                                    <tr>
                                        <td>Foto producto:</td>
                                        <td><input type="file" name="imagen"/></td>
                                    </tr>
                                    <tr>
                                        <td>Descripción:</td>
                                        <td>
                                            <textarea rows="4" name="descripcion" placeholder="Escribe aqui una breve descripcion..."></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" name="enviar">Insertar producto</button>
                            </fieldset>
                        </form>
                        <a href="index.php">Menu principal</a>
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
