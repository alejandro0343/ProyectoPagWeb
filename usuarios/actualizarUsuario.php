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
            `fk_tipo_usuario`= '$typeUser',direccion='$direccion'
            WHERE pk_usuario ='$id';
        ");
        if($up){
            header('Location: ./index.php');
        }else{
            //$passEncriptada = password_hash($password, PASSWORD_BCRYPT);
            echo "UPDATE `usuario` SET
            `nombre_usuario`='$nombre' ,`apellido_usuario`='$apellido',
            `correo`='$email' ,`PASSWORD`='$password',
            `fk_tipo_usuario`= '$typeUser',direccion='$direccion'
            WHERE pk_usuario ='$id';
        ";
            echo "no edito";
        }

        $con->close();
    }else{
        echo "no coinciden las contraseñas";
    }

}else{
    header('Location: ./index.php');
}

?>