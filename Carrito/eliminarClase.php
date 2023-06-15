<?php
session_start(); 
if (isset($_SESSION["esAdmin"])) {
    $conexion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conexion, "cartbasic1");
    print "<h2>Lista clases</h2>";
    $contid = 0;
    $resultado = mysqli_query($conexion, "SELECT * FROM clase");
    $tabla = "<table border='1' cellpadding='10'>\n";
    $tabla .= "<tr><th>ID</th><th>Nivel</th><th>Localizacion</th><th>numParticipantes</th><th>maxParticipantes</th><th>idtrabajador</th></tr>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $contid=$fila["id"];
        $tabla .= "<tr>
            <td>" . $fila["id"] . "</td>
                <td>" . $fila["nivel"] . "</td>
                    <td>" . $fila["localizacion"] . "</td>
                        <td>" . $fila["numParticipantes"] . "</td>
                            <td>" . $fila["maxParticipantes"] . "</td>
                                <td>" . $fila["idtrabajador"] .     "</td>
                    </tr>\n";
    }
    $tabla .= "</table>\n";
    echo $tabla;
    print "<form name='formulario' action='eliminarC.php' method='POST' enctype='multipart/form-data'><p>Inserte el ID de la clase que quiera eliminar: ";
    print "<input type='number' name='id' min='1' max='$contid' value='1' required/><br>";
    print "<button type='submit' name='enviar'>Eliminar clase</button><br></form>";
    print "<a href='funcionesAdmin.php'>Volver funciones</a>";
} else {
    echo "error";
}
