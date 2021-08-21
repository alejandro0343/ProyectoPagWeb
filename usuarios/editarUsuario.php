
<?php include '../includes/sesion.php' ?>
<?php
include '../db/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->query("SELECT * FROM usuario WHERE pk_usuario = '$id' ");
if ($f = $sel->fetch_assoc()) {
}
//queru tipo user
$typeUser = $con->query("SELECT DISTINCT    pk_tipo_usuario,descripccion FROM `tipo_usuario`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<body>

  <header class="header">
            <ul class="nav">
                    <li><a href="../admin/index.php">INVENTARIO</a></li>

                
                
                
                <li><a href="http://localhost/ProyectoPagWeb/Inventario/index.php">REGISTRO</a></li>
                <li><a href="http://localhost/ProyectoPagWeb/usuarios/index.php">USUARIOS</a></li>

                    
                    <li class="nav-item">
                        <a class="nav-link active"
                        aria-current="page"
                        href="../perfilUsuario?id='<?php echo trim($_SESSION['id'])?>'">
                            <span class="btn btn-dark">
                                <?php echo $_SESSION['nombre'];?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                        aria-current="page"
                        href="../includes/salir.php">
                            <span class="btn btn-danger">
                                Salir
                            </span>
                        </a>
                    </li>

            </ul>
        </div>
        
         <br>
    
            
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">
          <button class="btn btn-warning" type="submit">Buscar</button>
        </form>

      

        </header>

        
    <main class="container">
        <h1 class="display-3 text-center">Editar Uasuarios</h1>
        <div class="row">
            <div class="col  ">
                <form action="actualizarUsuario.php"  autocomplete="off"  method="POST"  enctype="multipart/form-data">
                    <div class="form-group mb-3" >
                        <label  class="form-label">Nombre</label>
                        <input type="text" name="nombre"  value="<?php echo $f['nombre_usuario'] ?>"  require placeholder="Nombre" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Apellido</label>
                        <input type="text" name="apellido" value="<?php echo $f['apellido_usuario'] ?>"  require placeholder="Apellido" class="form-control" >
                    </div>

                    <select name="typeUser" class="form-select  mb-3"  require aria-label="Default select example">
                        <option  >Tipo Usuario</option>
                        <?php while($t = $typeUser->fetch_assoc()){ ?>
                            <option selected="selected"  value="<?php echo $t['pk_tipo_usuario'] ?>">
                            <?php echo $t['descripccion'] ?>
                        </option>
                        <?php } ?> 
                    </select>

                    <div class="form-group mb-3" >
                        <label  class="form-label">Correo</label>
                        <input type="hidden" name="id" value="<?php echo $f['pk_usuario'] ?>" >
                        <input type="email" name="email" value="<?php echo $f['correo'] ?>" placeholder="Email"  class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Contraseña</label>
                        <input  type="password" name="password" placeholder="Password"  require value="<?php echo $f['PASSWORD'] ?>" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3">
                        <label  class="form-label">Confirmar Contraseña</label>
                        <input  type="password" name="password2" placeholder="Password" require value="<?php echo $f['PASSWORD'] ?>" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3" >
                    <label  class="form-label"> Direccion</label>
                        <textarea type="text" name="direccion" placeholder="Direccion" value="<?php echo $f['direccion'] ?>" class="form-control" rows="5" >
                        <?php echo $f['direccion'] ?>
                        </textarea>
                    </div>
                    <div class="form-group mb-3" >
                        <input type="submit" value="Guardar"  class="btn btn-info" >
                    </div>
                </form>
            <div>
        </div>
    </main>
</body>
</html>