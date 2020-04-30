<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login KDE-INVENTARY</title>
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resources/css/shards.min.css">
</head>

<body style="overflow-y:hidden;overflow-x:hidden">

    <div class="row">
        <div class="col-lg-8 d-flex justify-content-end">
            <img src="../../Resources/img/Distant Mountain.jpg" height="767" class="d-none d-sm-none d-md-block">
        </div>
        <div class="col-lg-4" style="background-color: White">
            <div class="d-flex justify-content-center mt-5 pt-5">
                <form class="container">
                    <div class="my-3 mb-5">
                        <h1 class="text-center">Codigo de verificacion</h1>
                        <p class="text-center"><small>Ingrese el codigo de 4 dijitos enviado a su correo electronico</small></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Codigo</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Example=J3R0">
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                    <small id="emailHelp" class="form-text text-muted mt-4"><a href="recuperarPaso1.php" style="text-decoration: none;">¿No tienes codigo de verificacion?</a></small>
                        <a class="btn btn btn-success mt-3" href="recuperarPaso3.php" role="button">Verificar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../../resources/js/bootstrap.min.min.js"></script>
    <script src="../../resources/js/jquery-3.4.1.min.min.js"></script>
    <script src="../../resources/js/shards.min.js"></script>
</body>

</html>