<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION["esAdmin"])) {
            //Evito que salgan avisos que harían que nuestra página fuese mas fea para el cliente
            error_reporting(0);
            //Guardo todos los datos introducidos previamente en variables
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $nombre_imagen = $_FILES['imagen']['name'];
                $nombre_tmp_imagen = $_FILES['imagen']['tmp_name'];
                $carpeta = "imagenes/";
                $descripcion = $_POST['descripcion'];
                $ruta = $carpeta . $nombre_imagen;
            }
            move_uploaded_file($nombre_tmp_imagen, $ruta);
            print "<h1>Inserción libro</h1>";
            print "<p>Estos son los datos introducidos</p>";
            print "<ul><li>Título: $nombre</li>";
            print "<li>Precio: $precio €</li>";
            print "<li>Descripción: $descripcion</li>";
            print "<li><a href='$ruta'>Foto: $nombre_imagen</a></li>";
            $conexion = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conexion, "cartbasic1");
            mysqli_query($conexion, "INSERT INTO productosub (`nombre`,`precio`,`imagen`,`descripcion`) 
                VALUES ('$nombre','$precio','$ruta','$descripcion')");
            print ("<P>[ <A HREF='funcionesAdmin.php'>Ver funciones</A> ]</P>");
        } else {
            echo "error";
        }
        ?>
    </body>
</html>

