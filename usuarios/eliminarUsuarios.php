<?php 
include '../db/conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $query = "DELETE FROM `usuario` WHERE  pk_usuario = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        header('Location: ./index.php');
    } else {
        echo  $query ;
    }
?>