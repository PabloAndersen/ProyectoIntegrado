<?php
session_start(); 
if (isset($_SESSION["esAdmin"])) {
    $conexion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conexion, "cartbasic1");
    print "<h2>Lista productos</h2>";
    $contid = 0;
    $resultado = mysqli_query($conexion, "SELECT * FROM productosub");
    $tabla = "<table border='1' cellpadding='10'>\n";
    $tabla .= "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Imagen</th><th>Descripción</th></tr>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $contid=$fila["id"];
        $tabla .= "<tr>
            <td>" . $fila["id"] . "</td>
                <td>" . $fila["nombre"] . "</td>
                    <td>" . $fila["precio"] . "</td>
                        <td> <a href=" . $fila["imagen"] . ">Foto</a> </td>
                            <td>" . $fila["descripcion"] . "</td>
                    </tr>\n";
    }
    $tabla .= "</table>\n";
    echo $tabla;
    print "<form name='formulario' action='eliminar.php' method='POST' enctype='multipart/form-data'><p>Inserte el ID del producto que quiera eliminar: ";
    print "<input type='number' name='id' min='1' max='$contid' value='1' required/><br>";
    print "<button type='submit' name='enviar'>Eliminar producto</button><br></form>";
    print "<a href='funcionesAdmin.php'>Volver funciones</a>";
} else {
    echo "error";
}


