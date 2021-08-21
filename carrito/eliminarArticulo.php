<?php 
include '../db/conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $query = "DELETE FROM `carrito` WHERE  pk_carrito = $idArticulo";
    $result = mysqli_query($con, $query);
    if ($result) {
        //header("Location: ./index.php?id=$idUser");
        header("Location: ../categorias/ropa.php");
    } else {
        echo  $idUser;
    }
?>