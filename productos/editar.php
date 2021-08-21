<?php
include '../db/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->query("SELECT * FROM productos WHERE pk_productos = '$id' ");
if ($f = $sel->fetch_assoc()) {
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

                    
                    

            </ul>
        </div>
        
         <br>
    
            
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">
          <button class="btn btn-warning" type="submit">Buscar</button>
        </form>

      

        </header>

   <main class="container" style="padding-top:10px;" >
        <div class="row row-cols-2">
            <div class="col-md-6 ">
                <h1 class="display-3 text-center">Editar Inventario</h1>
                <form action="actualizar.php" method="POST" enctype="multipart/form-data"  autocomplete="off"  >
                    <h1 class="display-5 text-center">Nombre de producto</h3>
                    <div class="form-group" >
                        <input type="hidden" name="id" value="<?php echo $f['pk_productos'] ?>" >
                        <input type="hidden" name="imagen" value="<?php echo $f['img_producto'] ?>" >
                        <input type="text" name="producto" placeholder="Producto" class="form-control" value="<?php echo $f['nombre_producto'] ?>" >
                    </div>
                    <h1 class="display-5 text-center">Precio</h3>
                    <div class="form-group" >
                        <input type="number" name="precio" placeholder="Precio" step="0.01" class="form-control" value="<?php echo $f['precio'] ?>" >
                    </div>
                    <h1 class="display-5 text-center">Cantidad de productos</h3>
                    <div class="form-group" >
                        <input type="numer" name="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $f['cantidad'] ?>" >
                 </div>
                    <div class="form-group" >
                        <input type="submit" value="Editar"  class="btn btn-info" >
                    </div>
                </form>
                <div class="row">
                    <div class="col border">
                        <h1 class="display-5 text-center">Cambiar imagen</h3>
                        <form action="cambiarImagen.php" method="POST" enctype="multipart/form-data"  autocomplete="off"  >
                            <div class="form-group" >
                                <input type="hidden" name="id" value="<?php echo $f['pk_productos'] ?>" >
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text">Upload</label>
                                <input type="file" class="form-control"  name="foto">
                            </div>
                            <div class="form-group" >
                                <input type="submit" value="Editar"  class="btn btn-info" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?php echo $f['img_producto'] ?>" class="img-fluid">
            </div>
            
        </div>
    </main>