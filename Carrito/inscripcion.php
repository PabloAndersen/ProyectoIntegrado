<?php
session_start();
if(isset($_POST["id_desClase"])){
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "cartbasic1");
    $id =$_SESSION["idclase"];
    echo $id;
    $clases = $con->query("select * from clase WHERE id = ".$id."");
    $r = $clases->fetch_object();
    $numpar = $r->numParticipantes - 1;
    $sql = "UPDATE clase SET numParticipantes=".$numpar." WHERE id =".$id."";
    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
    $_SESSION["clases"] = '';
    $_SESSION["idclase"] = '';
    print "<script>window.location='./clases.php';</script>";
}else{
    $_SESSION["clases"] = 'true';
    $_SESSION["idclase"] = $_POST["id_clase"];
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "cartbasic1");
    $id =$_POST["id_clase"];
    $clases = $con->query("select * from clase WHERE id = ".$id."");
    $r = $clases->fetch_object();
    $numpar = $r->numParticipantes + 1;
    $sql = "UPDATE clase SET numParticipantes=".$numpar." WHERE id =".$id."";
    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
    print "<script>window.location='./clases.php';</script>";
}