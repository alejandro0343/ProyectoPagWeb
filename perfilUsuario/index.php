
<?php include '../includes/sesion.php' ?>
<?php
require ('../db/conexion.php');
$id=$_GET['id'];
$sel = $con->query("SELECT
    `pk_usuario`, descripccion,`nombre_usuario`,
    `apellido_usuario`,`correo`,`direccion`,numero
    FROM usuario
    INNER JOIN tipo_usuario on
    `fk_tipo_usuario` = pk_tipo_usuario
    LEFT JOIN telefonos on
    fk_usuario = pk_usuario
    where  `pk_usuario` =$id 
");
if ($user = $sel->fetch_assoc()) {
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
        <h1 class="display-3 text-center">
            <?php echo $user['nombre_usuario']; ?>
        </h1>
        <div class="row">
            <div class="col-12">
                <figure class="text-center  position-relative">
                    <svg 
                    width="10rem"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    class="bi bi-person-circle iconXL"
                    viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <span class="position-absolute top-50 start-75 translate-middle badge rounded-pill bg-danger">
                        <?php echo $user['pk_usuario']; ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </figure>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="p-3 border rounded bg-light  h-100">
                    <h3 class="display-6 text-center">
                        Direccion
                    </h3>
                    <p class="fs-4">
                        <?php echo $user['direccion']; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class=" p-4 border rounded bg-light  h-100">
                    <h3 class="display-6 text-center">
                        Correo
                    </h3>
                    <h3 class="h5 text-center">
                        <?php echo $user['correo']; ?>
                    </h3>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class=" p-4 border rounded bg-light  h-100">
                    <h3 class="display-6 text-center">
                        Telefono
                    </h3>
                    <h3 class="h5 text-center">
                        <?php echo $user['numero']; ?>
                    </h3>
                </div>
            </div>
        </div>
        <br>
        <div class="row  justify-content-md-center">
            <div class="col-md-8 ">
                <div class="d-grid gap-2 col-12 mx-auto">
                    <a
                    class="btn btn-warning"
                    href="./editarUsuariosPerfil.php?id=<?php echo $user['pk_usuario']; ?>"
                    >
                        Editar
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>