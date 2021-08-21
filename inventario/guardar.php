<?php
include '../db/conexion.php';
include '../includes/guardarImagen.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$archivo = $_FILES['foto']['tmp_name'];
$nombrearchivo = $_FILES['foto']['name'];

$img = formatoImg($archivo,$nombrearchivo ); 

$sql="SELECT nombre_producto FROM `inventario` WHERE `nombre_producto` ='$producto'";
$result=$con->query($sql);
$rows=$result->num_rows;
if($rows > 0) {
    echo 'Correo ya Existe ';
}
else {
    $query = "INSERT INTO `inventario`( `cantidad`, `nombre_producto`, `precio`, img_producto) 
    VALUES ('$cantidad', '$producto', '$precio','$img')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo $ruta;
        header('Location: ./index.php');
    } else {
        echo  $query ;
    }
}

?>
