<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Usuarios');
?>


<div class="container">

<!--Area de los data table-->
<div class="d-flex justify-content-center">
        <h3 class="mt-5" id="TituloPag"><i class="fas fa-user-cog mr-3"></i>Usuarios</h3>
                    
            </div>
            <hr>
    <div class="row">
            <div class="row mt-3 ml-2 d-flex justify-content-start">
            <a class="btn btn btn-success" href="#" role="button" onclick="openCreateModal()" >Agregar</a>
            </div>
            <div class="container mt-4 d-flex justify-content-end">
                <div class="row">
                    <form class="form-inline" method="post" id="search-form">
                        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        <div class= "col-lg-12 mt-5">
        <table id="Productos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="Usuarios">
           
        </tbody>
    </table>
        </div>
    </div>
</div>



<!--Area de los modal-->

<!--Modal Actualizar-->

<!-- Modal Agregar -->
<div class="modal fade bd-example-modal-lg" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modal-title" >Agregar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Aqui iria todo el cuerpo del modal-->
                    <div class ="container">
                        <div class= "row">                        
                            <!--Area de input dentro del modal-->
                            <div class= "col-lg-9"> 
                                    <div class="card-body" id="comentarios">
                                        <div class="media mt-2">
                                            <div class="media-body">
                                                <form id="Agregar-form">
                                                    <div class="form-row">
                                                        <input type="number" id="id_usuario" name="id_usuario"  class="form-control" placeholder="id_usuario">
                                                        <div class="col">
                                                        
                                                            <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres">
                                                        </div>
                                                        <div class="col ml-2">
                                                        
                                                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
                                                        </div>                                                    
                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <div class="col">                                                        
                                                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
                                                        </div>    
                                                        <div class="col">                                                        
                                                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono">
                                                        </div>                                                                                                         
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="input-group mt-3 mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                            </div>
                                                            <input type="text"  id="correo" name="correo" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1">
                                                        </div>                                                                                                       
                                                    </div>
                                                   <div class="form-row mt-3">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                                                            </div>
                                                            <select class="custom-select" id="Tipo" name="Tipo">                                                                                                                          
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="Estado">Estado</label>
                                                            </div>
                                                            <select class="custom-select" id="Estado" name="Estado">
                                                                                                                              
                                                            </select>
                                                        </div>                                                        
                                                   </div>
                                                   <div class="form-row mt-4">
                                                            <button type="submit"  class="btn btn-secondary mr-2" data-tooltip="Cancelar" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary" data-tooltip="Cancelar"> Guardar </button>
                                                    </div>      
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar -->








<?php
 $pagina->footerTemplate('Empleado.js');       
?>