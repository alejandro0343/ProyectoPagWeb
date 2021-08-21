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
<header class="header">
            <ul class="nav">
                    <li><a href="../index.html">INICIO</a></li>
                <li><a href="../ropamujer.html">MUJER</a>
                    <ul>
                        <li><a href="../ropamujer.html">Ropa Mujer</a>
                            <ul>
                                <li><a href="../blusas.html">Blusas</a></li>
                                <li><a href="../vestidos.html">Vestidos</a></li>
                            </ul>
                        </li>
                        <li><a href="../accesoriosmujer.html">Accesorios Mujer</a>
                            <ul>
                                <li><a href="../bolsas.html">Bolsas</a></li>
                                <li><a href="../joyeria.html">Joyeria</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="../ropahombre.html">HOMBRES</a>
                    <ul>
                        <li><a href="../ropahombre.html">Ropa Hombre</a>
                            <ul>
                                <li><a href="../camisas.html">Camisas</a></li>
                                <li><a href="../sudaderas.html">Sudaderas</a></li>
                            </ul>
                        </li>
                        <li><a href="../accesorioshombre.html">Accesorios Hombre</a>
                            <ul>
                                <li><a href="../sombreros.html">Sombreros</a></li>
                                <li><a href="../joyeriah.html">Joyeria</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="../contacto.html">CONTACTO</a></li>
                <li><a href="http://localhost/ProyectoPagWeb/carrito/?id=%2726%3Cbr%3E%27">CARRITO</a></li>
                 <li><a href="http://localhost/ProyectoPagWeb/misCompras/?id=%2726%3Cbr%3E%27">MIS COMPRAS</a></li>
                

                    
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
         
    
            
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">
          <button class="btn btn-warning" type="submit">Buscar</button>
        </form>

      

        </header>
