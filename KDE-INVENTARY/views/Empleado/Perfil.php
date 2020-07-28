<?php
require_once('../../core/helpers/Template.php');
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
        <div class="col-lg-7 mt-5">
                <div class="card text-center">
                    <div class="card-body" id="usuario">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="d-flex justify-content-end">
                            <a class="btn "  href="#" onclick="openModalProfile()" role="button"><i class="fas fa-edit"></i></a>                           
                        </div>
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="media mt-2">
                            <div class="media-body">
                                <form>
                                <input type="number" id="idusuario" disabled name="idusuario" class="form-control invisible" >
                                    <div class="form-row">
                                        <div class="col">
                                        
                                        <input type="text" id="Nombres" disabled name="Nombres" class="form-control" placeholder="Nombres">
                                        </div>
                                        <div class="col">
                                        
                                        <input type="text" id="Apellidos" disabled name="Apellidos" class="form-control" placeholder="Apellidos">
                                        </div>
                                    </div>
                                    <div class="form-row mt-3 ml-1">
                                        <input type="email"  id="Correo" disabled name="Correo" class="form-control"  placeholder="Nombre@ejemplo.com">
                                    </div>
                                    <div class="form-row mt-4">
                                    <div class="col">
                                        
                                        <input type="text" id="Usuario"  disabled name="Usuario" class="form-control" placeholder="Usuario">
                                        </div>
                                        <div class="col">
                                        
                                        <input type="text" id="Telefono" disabled name="Telefono" class="form-control" placeholder="Telefono">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-5 mt-3">
            <div class="card text-center">
                    <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="media">                           
                            <div class="media-body d-flex justify-content-end">                           
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex justify-content-end mt-3">
                                <h6>Usuario:<h6>
                                <h6 class="ml-2" id="Usuario1" name="Usuario1"><h6>
                            </div>
                        </div>
                        <div class="media">
                            <div class="d-flex justify-content-start mt-3">
                                <h6>Correo:<h6>
                                <h6 class="ml-2"  id="Correo1" name="Correo1" ><h6>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
    </div>        
</div>






<!--Area de los modal-->
<!--Modal agregar-->
<div class="modal fade bd-example-modal-lg" id="profile-modal" name="profile-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Aqui iria todo el cuerpo del modal-->
                    <div class ="container">
                        <div class= "row d-flex justify-content-end">                        
                            <!--Area de input dentro del modal-->
                            <div class= "col-lg-9"> 
                                    <div class="card-body" id="comentarios">
                                        <div class="media mt-2">
                                            <div class="media-body">
                                            <form id="edit-perfil" name="edit-perfil">
                                                <input type="number" id="idusuario" name="idusuario" class="form-control invisible" >
                                                    <div class="form-row">
                                                        <div class="col">
                                                        
                                                        <input type="text" id="Nombres1" name="Nombres1" class="form-control" placeholder="Nombres">
                                                        </div>
                                                        <div class="col">
                                                        
                                                        <input type="text" id="Apellidos1" name="Apellidos1" class="form-control" placeholder="Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-3 ml-1">
                                                    <input type="email"  id="patata"  name="patata" class="form-control"  placeholder="Nombre@ejemplo.com">
                                                    </div>
                                                    <div class="form-row mt-4">
                                                    <div class="col">
                                                        
                                                        <input type="text" id="User" name="User" class="form-control" placeholder="Usuario">
                                                        </div>
                                                        <div class="col-6">
                                                            
                                                            <input type="text" id="telefono1" name="telefono1" class="form-control" placeholder="Telefono">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <button type="submit"  class="btn btn-secondary mt-2" data-tooltip="Cancelar" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary mt-2" data-tooltip="Cancelar"> Guardar </button>
                                                    </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        </div>
                    </div>                
                <div class="modal-footer">                    
                    <!-- <button type="submit"  class="btn btn-secondary" data-tooltip="Cancelar" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" data-tooltip="Cancelar"> Guardar </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--Fin de Area de los modal-->










<?php
 $pagina->footerTemplate('Cuenta.js');       
?>