<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION["esAdmin"])) {
            //Evito que salgan avisos que harían que nuestra página fuese mas fea para el cliente
            error_reporting(0);
            //Guardo todos los datos introducidos previamente en variables
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nivel = $_POST['nivel'];
                $localizacion = $_POST['localizacion'];
                $maxpar = $_POST['maxpar'];
                $trabajador = $_POST['trabajador'];
                $conexion = mysqli_connect("localhost", "root", "");
                mysqli_select_db($conexion, "cartbasic1");
            }
            move_uploaded_file($nombre_tmp_imagen, $ruta);
            print "<h1>Inserción clase</h1>";
            print "<p>Estos son los datos introducidos</p>";
            print "<ul><li>Nivel: $nivel</li>";
            print "<li>Localización: $localizacion</li>";
            print "<li>Maximo Participantes: $maxpar</li>";
            print "<li>IdTrabajador: ".$trabajador."</li>";
            $conexion = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conexion, "cartbasic1");
            mysqli_query($conexion, "INSERT INTO clase (`nivel`,`localizacion`,`maxparticipantes`,`idtrabajador`,`numparticipantes`) 
                VALUES ('$nivel','$localizacion','$maxpar','$trabajador','0')");
            print ("<P>[ <A HREF='funcionesAdmin.php'>Ver funciones</A> ]</P>");
        } else {
            echo "error";
        }
        ?>
    </body>
</html>
