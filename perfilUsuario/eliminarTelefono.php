<?php 
include '../db/conexion.php';
$idTelefono = $con->real_escape_string(htmlentities($_GET['idTelefono']));

    $query = "DELETE FROM `telefonos` WHERE `telefonos`.`pk_telefonos`= $idTelefono";
    $result = mysqli_query($con, $query);
    if ($result) {
        header('Location: ./editarUsuariosPerfil.php?id='.$idTelefono);
    } else {
        echo  $query ;
    }
?>