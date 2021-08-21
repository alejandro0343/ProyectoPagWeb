
<?php include '../includes/sesion.php' ?>
<?php
require ('../db/conexion.php');
$sel = $con->query("SELECT `pk_inventario`, `cantidad`, `nombre_producto`, `precio`, `img_producto`  FROM `inventario`");
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
        <h1 class="display-3 text-center">REGISTRO PRODUCTOS</h1>
        <div class="row">
            <div class="col  ">
                <form action="guardar.php"  autocomplete="off"  method="POST"  enctype="multipart/form-data">
                    <div class="form-group mb-3" >
                        <input type="text" name="producto" placeholder="Producto" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input type="number" name="precio" placeholder="Precio" step="0.01" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input type="numer" name="cantidad" placeholder="Cantidad" class="form-control" >
                    </div>
                    
                    <div class="input-group mb-3">
                        <label class="input-group-text">Subir</label>
                        <input type="file" class="form-control"  name="foto">
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
                                <th scope="col">ID</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">img_producto </th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($f = $sel->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $f['pk_inventario'] ?></td>
                                    <td><?php echo $f['cantidad'] ?></td>
                                    <td><?php echo "$".number_format($f['precio'],2) ?></td>
                                    <td><?php echo $f['nombre_producto'] ?></td>
                                    <td><?php echo $f['img_producto'] ?></td>
                                    

                                    <td><a href="editar.php?id=<?php echo $f['pk_inventario'] ?>" class="btn btn-warning" >editar</a></td>
                                    <td><a href="eliminar.php?id=<?php echo $f['pk_inventario'] ?>" class="btn btn-danger" >eliminar</a></td>
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