<?php 
include '../db/conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($password == $password){
        $up = $con->query("UPDATE `usuario` SET
            `nombre_usuario`='$nombre' ,`apellido_usuario`='$apellido',
            `correo`='$email' ,`PASSWORD`='$password',
            direccion='$direccion'
            WHERE pk_usuario ='$id';
        ");
        if($up){
            header('Location: ./index.php?id='.$id);
        }else{
            echo $up;
        }
        $con->close();
    }else{
        echo "no coinsiden las contraseñas";
    }
}else{
    header('Location: ./index.php?id='.$id);
}

?>