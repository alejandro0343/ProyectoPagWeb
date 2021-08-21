<?php include '../includes/sesion.php' ?>
<?php
require ('../db/conexion.php');
$sel = $con->query("SELECT `pk_inventario`, `cantidad`,
                            `nombre_producto`, `precio`,
                            `img_producto`
                    FROM `inventario`
                    WHERE cantidad >0 || NOT null");
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
<?php
        include '../includes/menuUser.php'; 
    ?>

    <main class="container">
        <h1 class="display-3 text-center">Artesanias Ines</h1>
        <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php while($f = $sel->fetch_assoc()){ ?>
                <div class="col">
                    <div class="card h-100" >
                        <a href="../compra/index.php?idProducto=<?php echo $f['pk_inventario']?>&idUser=<?php echo $_SESSION['id']?>">
                            <img src="<?php echo $f['img_producto'] ?>"
                                class="card-img-top imgCard" alt="..."
                            >
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $f['nombre_producto'] ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo "$".number_format($f['precio'],2) ?>
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-start">
                                            Cantidad: <?php echo $f['cantidad'] ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text text-end">
                                            Codigo: <?php echo $f['pk_inventario'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>



    
</body>
</html>