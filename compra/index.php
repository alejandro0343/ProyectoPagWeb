<?php
require ('../db/conexion.php');
$idProducto = $con->real_escape_string(htmlentities($_GET['idProducto']));
$idUsuario = $con->real_escape_string(htmlentities($_GET['idUser']));
$sel = $con->query("SELECT `pk_productos`, `cantidad`, `nombre_producto`, `precio`, `img_producto`
    FROM `productos`
    where pk_productos = $idProducto
    ");
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
    <?php
    session_start();
    include '../includes/menuUser.php'; 
    ?>
    <main class="container bg-light">
        <h1 class="display-3 text-center">Compra</h1>
        <?php while($f = $sel->fetch_assoc()){ ?>
            <div class="row">
                <div class="col-md-7">
                      <img src="<?php echo $f['img_producto'] ?>" class="img-fluid">
                </div>
                <div class="col-md-4 border-top ">
                    <h5 class="fw-bold display-2 text-center">
                        <?php echo $f['nombre_producto'] ?>
                    </h5>
                    <p class="display-6 text-center">
                        <?php echo "$".number_format($f['precio'],2) ?>
                    </p>
                    <div class="row justify-content-md-center border-bottom">
                        <div class="col-sm-12 col-md-6">
                            <form action="./compra.php"  autocomplete="off"  method="POST"  enctype="multipart/form-data">
                                <input  name="idProducto" type="hidden" class="form-control" value=" <?php echo $idProducto ?>">
                                <input  name="idUsuario" type="hidden" class="form-control" value=" <?php echo $idUsuario?>">
                                    <button type="submit" class="btn btn-success">
                                        Comprar
                                    </button>
                            </form>
                            <form action="./carrito.php"  autocomplete="off"  method="POST"  enctype="multipart/form-data">
                                <input  name="idProducto" type="hidden" class="form-control" value=" <?php echo $idProducto ?>">
                                <input  name="idUsuario" type="hidden" class="form-control" value=" <?php echo $idUsuario?>">
                                    <button type="submit" class="btn btn-warning">
                                        Guardar
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
</body>

</html>