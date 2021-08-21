<?php 
include '../db/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $precio =$_POST['precio'];
    $cantidad =$_POST['cantidad'];
    $id = $_POST['id'];
        $up = $con->query("UPDATE productos 
        SET nombre_producto = '$producto', precio='$precio', cantidad='$cantidad'
        WHERE pk_productos = '$id' 
        ");
    echo $up;
    if($up){
        header('Location: ../admin');
    }else{
        echo "no edito";
    }
    echo $up;
    $up->close();
    $con->close();

}else{

}

?>