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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>

    <iconv ()
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container">
        <h1 class="display-3 text-center">Registro</h1>
        <div class="row justify-content-md-center ">
            <div class="col-md-6 col-sm-12 shadow-lg p-3  border">
                <form action="guardarUsuarios.php"  autocomplete="off"  method="POST">
                    <div class="form-group mb-3" >
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input type="input" name="apellido" placeholder="Apellido" class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input type="email" name="email" placeholder="Email"  class="form-control" >
                    </div>
                    <div class="form-group mb-3" >
                        <input  type="password" name="password" placeholder="Password" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3" >
                        <input  type="password" name="password2" placeholder="Password" class="form-control" rows="5" >
                    </div>
                    <div class="form-group mb-3 d-grid gap-2" >
                        <input type="submit" value="Guardar"  class="btn btn-info" >
                    </div>
                </form>
            <div>
        </div>
    </main>
</body>
</html>