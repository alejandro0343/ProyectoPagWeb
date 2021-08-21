
<?php include '../includes/sesion.php' ?>
<?php
include '../db/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->query("SELECT
`pk_usuario`, descripccion,`nombre_usuario`,
`apellido_usuario`,`correo`,`direccion`,numero,PASSWORD
FROM usuario
INNER JOIN tipo_usuario on
`fk_tipo_usuario` = pk_tipo_usuario
LEFT JOIN telefonos on
fk_usuario = pk_usuario
where  `pk_usuario` = $id");
if ($Usuario = $sel->fetch_assoc()) {
}
//-----telefonos

$tel = $con->query("SELECT
    `pk_usuario`,pk_telefonos,numero
    FROM usuario
    INNER JOIN telefonos on
    fk_usuario = pk_usuario
    where  `pk_usuario` = $id");
if ($Telefonos = $tel->fetch_assoc()) {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artesanias Ines</title>
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
        <h1 class="display-3 text-center">Editar Informacion</h1>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <form action="actualizarPerfilUsuario.php"  autocomplete="off"  method="POST">
                    <div class="form-group mb-3" >
                        <label  class="form-label">Nombre</label>
                        <input type="text" name="nombre"  value="<?php echo $Usuario['nombre_usuario'] ?>"  require placeholder="Nombre" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Apellido</label>
                        <input type="text" name="apellido" value="<?php echo $Usuario['apellido_usuario'] ?>"  require placeholder="Apellido" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Correo</label>
                        <input type="hidden" name="id" value="<?php echo $Usuario['pk_usuario'] ?>" >
                        <input type="email" name="email" value="<?php echo $Usuario['correo'] ?>" placeholder="Email"  class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Contraseña</label>
                        <input  type="password" name="password" placeholder="Password"  require value="<?php echo $Usuario['PASSWORD'] ?>" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Confirmar Contraseña</label>
                        <input  type="password" name="password2" placeholder="Password" require value="<?php echo $Usuario['PASSWORD'] ?>" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3" >
                        <label  class="form-label">Direccion</label>
                        <textarea type="text" name="direccion" placeholder="Direccion" value="<?php echo $Usuario['direccion'] ?>" class="form-control" rows="5" >
                        <?php echo $Usuario['direccion'] ?>
                        </textarea>
                    </div>
                    <div class="form-group mb-3" >
                        <div class="d-grid gap-2">
                            <input type="submit" value="Guardar"  class="text-center btn btn-info" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-12 border-start">
                <h3 class="display-6 text-center">Telefonos</h3>
                <br>
                <form action="agregarTelefono.php"  autocomplete="off"  method="POST">
                    <div class="mb-3">
                        <label  class="form-label">Numero Nuevo</label>
                        <input placeholder="Numero Nuevo" name="telefono" type="number" class="form-control">
                        <input  name="id" type="hidden" class="form-control" value=" <?php echo $Usuario['pk_usuario'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control" >
                    </div>
                </form>
                <hr>
                <ul class="list-group list-group-flush">
                    <?php while($Telefonos = $sel->fetch_assoc()){ ?>
                        <li class="list-group-item text-center">
                            <?php echo $Telefonos['numero'] ?>
                            <a
                            href="./eliminarTelefono.php?idTelefono=<?php echo $Telefonos['pk_telefonos']; ?>"
                            class="btn btn-outline-danger"
                            >
                                Eliminar
                            </a>
                        </li>
                    <?php } ?> 
                </ul>
            </div>
        </div>
    </main>
</body>
</html>