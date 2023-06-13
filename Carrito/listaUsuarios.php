<?php
$conexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($conexion, "cartbasic1");
print "<h2>Lista trabajadores</h2>";
$resultado = mysqli_query($conexion, "SELECT * FROM usuario WHERE admin <> 0");
$tabla = "<table border='1' cellpadding='10'>\n";
$tabla .= "<tr><th>Nombre</th><th>Correo</th></tr>\n";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $tabla .= "<tr>
                        <td>" . $fila["nombre"] . "</td>
                        <td>" . $fila["correo"] . "</td>
                    </tr>\n";
}
$tabla .= "</table>\n";
echo $tabla;
print "<a href='index.php'>Menu principal</a>";

