<?php
include '../db/conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $sql="SELECT * FROM `inventario`
        where $idProducto = `pk_inventario`";
    $result=$con->query($sql);
    $rows=$result->num_rows;
    $row = $result->fetch_assoc();
    $precio=$row['precio'];
    if($rows == 0) {
        echo 'No hay en esistencia';
    }
    else {
        $query = "INSERT INTO `compra`(  `precio_total`,  `fk_usuario`,fk_inventario) VALUES ('$precio','$idUsuario','$idProducto')";
        $result = mysqli_query($con, $query);
        if ($result) {
            header('Location: ../cliente');
        } else {
            echo  $query;
        }
    }

?>
