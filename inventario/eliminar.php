<?php 
include '../db/conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$sql="SELECT nombre_producto FROM `inventario` WHERE `nombre_producto` ='$producto'";
$result=$con->query($sql);
$rows=$result->num_rows;
if($rows > 0) {
    echo 'Correo ya Existe ';
}
else {
    $query = "DELETE FROM `inventario` WHERE  pk_inventario = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        header('Location: ./index.php');
    } else {
        echo  $query ;
    }
}

?>