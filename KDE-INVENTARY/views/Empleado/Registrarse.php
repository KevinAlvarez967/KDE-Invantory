<?php
require_once('../../core/helpers/Template.php');
$pagina = new page;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro KDE-INVENTARY</title>
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
                <form class="container" id="Usuario-form">
                    <div class="my-3 mb-5">
                        <h1 class="text-center">Registro</h1>
                    </div>
                    <div class="row my-2">
                                <div class="col-lg-6">
                                    <label for="inputEmail4">Nombres</label>                                    
                                    <input type="text" class="form-control" name="nombres"  id="nombres"  required/>
                                </div>
                                <div class="col-lg-6">
                                    <label for="inputEmail4">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos"  id="apellidos"   required/>
                                </div>
                            </div> 
                           <div class="row my-2">
                                <div class="col-lg-6">
                                        <label for="inputEmail4">Usuario</label>
                                        <input type="text" class="form-control"  name="usuario"  id="usuario"   required/>
                                </div>
                                <div class="col-lg-6">
                                    <label for="exampleInputPassword1">Telefono</label>
                                    <input type="text" class="form-control" name="telefono"  id="telefono"  required/>
                                </div>
                                
                           </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Correo</label>
                                <input type="email" class="form-control" id="correo"  name="correo"  placeholder="Nombre@ejemplo.com"  required/>
                            </div>
                            <div class="row my-2">
                                <div class="col-lg-6">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" class="form-control" name="clave"  id="clave"  required/>
                                    <small id="passwordHelpInline" class="text-muted">
                                        8-20 Caracteres de largo
                                    </small>
                                </div>
                                <div class="col-lg-6">
                                    <label for="exampleInputPassword1"> Confirmar contraseña</label>
                                    <input type="password" class="form-control" name="confirmarclave"  id="confirmarclave"  required/>
                                    <small id="passwordHelpInline" class="text-muted">
                                        8-20 Caracteres de largo
                                    </small>
                                </div>
                            </div>
                            <button  class="btn btn-success" type="submit">Registrarse</button>

                </form>
            </div>
        </div>
    </div>



<?php
 $pagina->footerTemplate('Register.js');       
?>