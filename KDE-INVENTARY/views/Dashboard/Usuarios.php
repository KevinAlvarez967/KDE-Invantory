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
            <a class="btn btn btn-success" href="" role="button" data-toggle="modal" data-target="#ModalAgregar">Agregar</a>
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
                <th>Sucursal</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kevin Oswaldo</td>
                <td>Alvarez Rosales</td>
                <td>Kev</td>
                <td>Kevin.3401@hotmail.com</td>
                <td>71307929</td>
                <td>Administrador</td>
                <td>Activo</td>
                <td>Cuscatlan</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                
                </td>
            </tr>
            <tr>
                <td>Jimena Vanessa</td>
                <td>Palacios de Alvarez</td>
                <td>Shimi</td>
                <td>Jimena@gmail.com</td>
                <td>74789562</td>
                <td>Administrador</td>
                <td>Activo</td>
                <td>Cuscatlan</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                
                </td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>



<!--Area de los modal-->
<!-- Modal Actualizar -->
<div class="modal fade bd-example-modal-lg" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel" >Actualizar</h5>
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
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col">
                                                        
                                                        <input type="text" class="form-control" placeholder="Nombres">
                                                        </div>
                                                        <div class="col ml-2">
                                                        
                                                        <input type="text" class="form-control" placeholder="Apellidos">
                                                        </div>                                                    
                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <div class="col">                                                        
                                                        <input type="text" class="form-control" placeholder="Usuario">
                                                        </div>    
                                                        <div class="col">                                                        
                                                        <input type="text" class="form-control" placeholder="Telefono">
                                                        </div>                                                                                                         
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="input-group mt-3 mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>                                                                                                       
                                                    </div>
                                                   <div class="form-row mt-3">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Administrador</option>
                                                                <option value="2">Cocinero</option>
                                                                <option value="3">Mesero</option>
                                                                <option value="4">Cajero</option>                                                                
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect02">Estado</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect02">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Activo</option>
                                                                <option value="2">Inactivo</option>                                                                
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect02">Sucursal</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect02">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Cuscatlan</option>
                                                                <option value="2">Heroes</option>                                                                
                                                            </select>
                                                        </div>
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
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Actualizar-->

<!-- Modal Agregar -->
<div class="modal fade bd-example-modal-lg" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel" >Agregar</h5>
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
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col">
                                                        
                                                        <input type="text" class="form-control" placeholder="Nombres">
                                                        </div>
                                                        <div class="col ml-2">
                                                        
                                                        <input type="text" class="form-control" placeholder="Apellidos">
                                                        </div>                                                    
                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <div class="col">                                                        
                                                        <input type="text" class="form-control" placeholder="Usuario">
                                                        </div>    
                                                        <div class="col">                                                        
                                                        <input type="text" class="form-control" placeholder="Telefono">
                                                        </div>                                                                                                         
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="input-group mt-3 mb-1">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>                                                                                                       
                                                    </div>
                                                   <div class="form-row mt-3">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Administrador</option>
                                                                <option value="2">Cocinero</option>
                                                                <option value="3">Mesero</option>
                                                                <option value="4">Cajero</option>                                                                
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect02">Estado</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect02">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Activo</option>
                                                                <option value="2">Inactivo</option>                                                                
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect02">Sucursal</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect02">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Cuscatlan</option>
                                                                <option value="2">Heroes</option>                                                                
                                                            </select>
                                                        </div>
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
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar -->








<?php
 $pagina->footerTemplate();       
?>