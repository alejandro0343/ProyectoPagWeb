<?php
include '../db/conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $sql="SELECT `pk_usuario`,numero FROM
        usuario INNER JOIN telefonos on
        fk_usuario = pk_usuario
        where $telefono = `numero`";
    $result=$con->query($sql);
    $rows=$result->num_rows;
    if($rows > 0) {
        echo 'Telefono ya existe';
    }
    else {
        //$passEncriptada = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `telefonos`(`numero`, `fk_usuario`) VALUES ($telefono,$id)";
        $result = mysqli_query($con, $query);
        if ($result) {
            header('Location: ./editarUsuariosPerfil.php?id='.$id);
        } else {
            echo  $query;
        }
    }

?>
