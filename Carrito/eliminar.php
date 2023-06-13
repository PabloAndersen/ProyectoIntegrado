<?php
$conexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($conexion, "cartbasic1");

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $query="delete from `productosub` where id='$id'";
    $query_run= mysqli_query($conexion, $query);
    if($query_run){
        echo "Producto eliminado";
        print "<a href='funcionesAdmin.php'>Volver funciones</a>";
    }else{
        echo "Producto no eliminado";
    }
}

