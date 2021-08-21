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
        //$passEncriptada = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO `usuario`( `nombre_usuario`, `apellido_usuario`, `correo`, `PASSWORD`, `fk_tipo_usuario`)
            VALUES ('$nombre', '$apellido', '$email','$password',2)";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo $ruta;
            session_start();
            $_SESSION['id'] = $row['pk_usuario']."<br>";			
			$_SESSION['pribilegio'] = $row['fk_tipo_usuario']."<br>";
			$_SESSION['email'] = $row['correo']."<br>";
			$_SESSION['nombre'] = $row['nombre_usuario'];
            header('Location: ../index.html');
        } else {
            echo  $query ;
        }
    }
}else{
    echo "contraseña no coinciden";
}

?>
