<?php 
include '../db/conexion.php';
include '../includes/guardarImagen.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
        $archivo = $_FILES['foto']['tmp_name'];
        $nombrearchivo = $_FILES['foto']['name'];
        $img = formatoImg($archivo,$nombrearchivo );
        $up = $con->query("UPDATE inventario 
        SET img_producto='$img' WHERE pk_inventario = '$id' 
        ");
    echo $up;
    if($up){
        header('Location: ../admin/index.php');
    }else{
        echo "no edito";
    }
    echo $up;
    $up->close();
    $con->close();
}else{
    header('Location: ../admin/index.php');
}
?>