<?php
$conexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($conexion, "cartbasic1");

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $query="delete from `clase` where id='$id'";
    $query_run= mysqli_query($conexion, $query);
    if($query_run){
        echo "Clase eliminada";
        print "<a href='funcionesAdmin.php'>Volver funciones</a>";
    }else{
        echo "Clase no eliminada";
    }
}
