<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Perfil');
?>



<div class="container">
            <div class="d-flex justify-content-center">
                <h3 class="mt-5" id="TituloPag"><i class="fas fa-users-crown mr-3"></i>Perfil</h3>
               
            </div>
            <hr>
    <div class="row">
     <!--Seccion de comentarios de los usuarios acerca del producto-->
        <div class="col-lg-8 mt-5">
                <div class="card text-center">
                    <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="d-flex justify-content-end">
                            <a class="btn " role="button"><i class="fas fa-edit"></i></a>
                            <a class="btn " role="button"><i class="fas fa-times"></i></a>
                        </div>
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="media mt-2">
                            <div class="media-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                        
                                        <input type="text" class="form-control" placeholder="Nombres">
                                        </div>
                                        <div class="col">
                                        
                                        <input type="text" class="form-control" placeholder="Apellidos">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 ml-1">
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre@ejemplo.com">
                                    </div>
                                    <div class="form-row mt-4">
                                    <div class="col">
                                        
                                        <input type="text" class="form-control" placeholder="Usuario">
                                        </div>
                                        <div class="col">
                                        
                                        <input type="text" class="form-control" placeholder="Contraseña">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-3 mt-3">
            <div class="card text-center">
                    <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="media">
                            <div class="media-body d-flex justify-content-end ml-5">
                                <img src="../../Resources/img/pc.jpg" style="Width: 80px; Height:80px;" class="mr-1" alt="...">
                            </div>
                            <div class="media-body d-flex justify-content-end">
                            <a class="btn" role="button"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex justify-content-end mt-3">
                                <h6>Usuario:<h6>
                                <h6 class="ml-2">Natalia Berrios<h6>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex justify-content-start mt-3">
                                <h6>Correo:<h6>
                                <h6 class="ml-2">Nat@gmail.com<h6>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
    </div>        
</div>













<?php
 $pagina->footerTemplate();       
?>