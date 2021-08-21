<?php
include '../db/conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
if($password == $password2){
    $sql="SELECT correo FROM `usuario` where correo ='$email'";
    $result=$con->query($sql);
    $rows=$result->num_rows;
    if($rows > 0) {
        echo 'Usuario ya existe';
    }
    else {
        //$passEncriptada = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO 
        `usuario`( `nombre_usuario`, `apellido_usuario`, `correo`, `PASSWORD`,direccion, `fk_tipo_usuario`)
            VALUES ('$nombre', '$apellido', '$email','$password','$direccion','$typeUser')";
        $result = mysqli_query($con, $query);
        if ($result) {
            header('Location: ./index.php');
        } else {
            echo  $typeUser ;
        }
    }
}else{
    echo "contraseña no coinciden";
}
?>
