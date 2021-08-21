<?php include '../includes/sesion.php' ?>
<?php
require ('../db/conexion.php');
$sel = $con->query("SELECT `pk_productos`, `cantidad`, `nombre_producto`, `precio`, `img_producto` FROM `productos`");
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/menu.php'; ?>
    <main class="container">
        <h1 class="display-3 text-center">Inventario</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while($f = $sel->fetch_assoc()){ ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="
                            <?php echo $f['img_producto'] ?>"
                        class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $f['nombre_producto'] ?>
                            </h5>
                            <p class="card-text">
                                <?php echo "$".number_format($f['precio'],2) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>