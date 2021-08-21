<?php include '../includes/sesion.php' ?>
<?php
require ('../db/conexion.php');
$sel = $con->query("SELECT  `pk_usuario`,
descripccion,`nombre_usuario`,`apellido_usuario`,`correo`,`direccion`
FROM usuario
INNER JOIN tipo_usuario
on `fk_tipo_usuario` = pk_tipo_usuario");

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

                
                
                
                <li><a href="http://localhost/ProyectoPagWeb/productos/index.php">REGISTRO</a></li>
                <li><a href="http://localhost/ProyectoPagWeb/usuarios/index.php">USUARIOS</a></li>
                <li><a href="http://localhost/ProyectoPagWeb/comprasUsuarios/">COMPRA DE USUARIOS</a></li>

                    
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
        <h1 class="display-3 text-center">Agregar Usuarios</h1>
        <div class="row">
            <div class="col  ">
                <form action="agregarUsuario.php"  autocomplete="off"  method="POST"  enctype="multipart/form-data">
                    <div class="form-group mb-3" >
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input type="text" name="apellido" placeholder="Apellido" class="form-control" >
                    </div>
                    <select name="typeUser" class="form-select  mb-3" aria-label="Default select example">
                        <option  selected>Tipo Usuario</option>
                        <?php while($t = $typeUser->fetch_assoc()){ ?>
                            <option   value="<?php echo $t['pk_tipo_usuario'] ?>">
                            <?php echo $t['descripccion'] ?>
                        </option>
                        <?php } ?> 
                    </select>
                    <div class="form-group mb-3" >
                        <input type="email" name="email" placeholder="Email"  class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input  type="password" name="password" placeholder="Password" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3" >
                        <input  type="password" name="password2" placeholder="Password" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3" >
                        <textarea  type="numer" name="direccion" placeholder="Dirección" class="form-control" rows="5" ></textarea>
                    </div>
                    <div class="form-group mb-3" >
                        <input type="submit" value="Guardar"  class="btn btn-info" >
                    </div>
                </form>
            <div>
            <div class="col ">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($f = $sel->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $f['descripccion'] ?></td>
                                    <td><?php echo $f['nombre_usuario'] ?></td>
                                    <td><?php echo $f['apellido_usuario'] ?></td>
                                    <td><?php echo $f['correo'] ?></td>
                                    <td><?php echo $f['direccion'] ?></td>
                                    <td><a href="editarUsuario.php?id=<?php echo $f['pk_usuario'] ?>" class="btn btn-warning" >editar</a></td>
                                    <td><a href="eliminarUsuarios.php?id=<?php echo $f['pk_usuario'] ?>" class="btn btn-danger" >eliminar</a></td>
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            <div>
        </div>
    </main>
</body>
</html>