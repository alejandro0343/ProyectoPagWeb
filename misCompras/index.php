<?php include '../includes/sesion.php' ?>
<?php
$id =$_GET['id'];
require ('../db/conexion.php');
$sel = $con->query("SELECT `pk_compra`, `fecha`,`precio_total`,nombre_producto 
        FROM`compra` 
        INNER JOIN usuario
        on  pk_usuario=`fk_usuario`
        INNER JOIN inventario 
        ON pk_inventario =`fk_inventario`
        WHERE pk_usuario = $id
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
        include '../includes/menuUser.php'; 
    ?>
    <main class="container">
        <h1 class="display-3 text-center">Mis Compras</h1>
        <div class="row">
            <div class="col ">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">fecha</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($f = $sel->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $f['fecha'] ?></td>
                                    <td><?php echo "$".number_format($f['precio_total'],2) ?></td>
                                    <td><?php echo $f['nombre_producto'] ?></td>
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