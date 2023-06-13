<?php 
session_start();
$conexion = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conexion, "cartbasic1");
            mysqli_query($conexion, "INSERT INTO carrito (`usuario`,`total`, `fechaPedido`) 
                VALUES ('$_SESSION[usuario]', '$_SESSION[precio]', NOW())");
print "<p>Venta procesada del usuario ".$_SESSION['usuario'].". Precio total: ".$_SESSION['precio']."</p><br>";
print "<a href='../index.php'>Volver</a>";
$_SESSION['precio']=null;