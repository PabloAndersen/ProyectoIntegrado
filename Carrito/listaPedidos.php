<title>ListaPedidos</title>
<?php
$conexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($conexion, "cartbasic1");
print "<h2>Lista pedidos</h2>";
$resultado = mysqli_query($conexion, "SELECT * FROM carrito");
$tabla = "<table border='1' cellpadding='10'>\n";
$tabla .= "<tr><th>ID</th><th>Usuario</th><th>Total</th><th>Fecha pedido</th></tr>\n";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $tabla .= "<tr>
                        <td>" . $fila["id"] . "</td>
                        <td>" . $fila["usuario"] . "</td>
                        <td>" . $fila["total"] . "</td>
                        <td>" . $fila["fechaPedido"] . "</td>
                    </tr>\n";
}
$tabla .= "</table>\n";
echo $tabla;
print "<a href='index.php'>Menu principal</a>";

