<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
?>
<html>
    <head>
        <title>Insertar clase</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Insertar clase</h1>
                    <br>
                    <?php
                    if (isset($_SESSION["esAdmin"])) {
                        ?>
                        <form name="formulario" action="validarClase.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <table>
                                    <tr>
                                        <td>Nivel:</td>
                                        <td>
                                        <input type="radio" id="Principiante" name="nivel" value="Principiante" checked="checked">
                                        <label for="Principiante">Principiante</label><br>
                                        <input type="radio" id="Intermedio" name="nivel" value="Intermedio">
                                        <label for="Intermedio">Intermedio</label><br>
                                        <input type="radio" id="Avanzado" name="nivel" value="Avanzado">
                                        <label for="Avanzado">Avanzado</label><br>
                                        <input type="radio" id="Experto" name="nivel" value="Experto">
                                        <label for="Experto">Experto</label><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Localización:</td>
                                        <td><input type="text" name="localizacion" required/></td>
                                    </tr>
                                    <tr>
                                        <td>MaxParticipantes:</td>
                                        <td><input type="number" name="maxpar" required/></td>
                                    </tr>
                                    <tr>
                                        <td>Trabajador:</td>
                                        <td>
                                            <?php
$conexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($conexion, "cartbasic1");
$resultado = mysqli_query($conexion, "SELECT * FROM usuario WHERE admin <> 0");
while ($fila = mysqli_fetch_assoc($resultado)) {
    $tabla .= "<input type='radio' id='trabajador' name='trabajador' value=".$fila["id"].">
               <label for='trabajador'>".$fila["nombre"]."</label><br>";
}
echo $tabla;
    ?>
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" name="enviar">Crear clase</button>
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
