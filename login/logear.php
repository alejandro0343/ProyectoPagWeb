<?php
require ('../db/conexion.php');
session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
echo 'email:'.$user;
echo '<br>contraseña:'.$pass;
$error = '';
$sha1_pass = sha1($pass);
$sql = "SELECT * FROM usuario WHERE correo= '$user' AND PASSWORD = '$pass'";
		$result=$con->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
		    $row = $result->fetch_assoc();
		    $_SESSION['id'] = $row['pk_usuario']."<br>";			
			$_SESSION['pribilegio'] = $row['fk_tipo_usuario']."<br>";
			$_SESSION['email'] = $row['correo']."<br>";
			$_SESSION['nombre'] = $row['nombre_usuario'];
			$type=$_SESSION['tipo'] = $row['fk_tipo_usuario'];
			if($type==1){
				header('Location: ../admin/index.php');
			}
			if($type==2){
				header('Location: ../index.html');
			}
			} else {
            $error = "El nombre o contraseña son incorrectos";
            echo  $error;
		}
	
?>