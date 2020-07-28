<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
?>

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
                <form class="container" id="Login">
                    <div class="my-3 mb-5">
                        <h1 class="text-center">Bienvenido A KDE</h1>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Correo</label>
                        <input type="email" id="Correo" name="Correo" class="form-control"  placeholder="Nombre@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" id="Clave" name="Clave" class="form-control" >
                    </div>
                    <div class="d-flex justify-content-between">

                            
                            <small id="emailHelp" class="form-text text-muted mt-4 mb-3"><a href="recuperarpaso1.php" style="text-decoration: none;">Recuperar Contraseña</a></small>
                    </div>
                    <button  class="btn btn-success" type="submit">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </div>



<?php
 $pagina->footerTemplate('Index.js');       
?>