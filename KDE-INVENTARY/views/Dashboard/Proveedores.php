<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Proveedores');
?>

<div class="container">
<!--Area de los data table-->
            <div class="d-flex justify-content-center">
                <h3 class="mt-5" id="TituloPag"><i class="fas fa-users mr-3"></i>Proveedores</h3>
               
            </div>
            <hr>
    <div class="row">
            <div class="row mt-3 ml-2 d-flex justify-content-start">
                <a class="btn btn btn-success" href="" role="button"  data-toggle="modal" data-target="#Agregar">Agregar</a>
            </div>
        <div class= "col-lg-12 mt-5">
        <table id="Proveedores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Guillermo</td>
                <td>Cartagena</td>
                <td>Cartagena12_12@hotmail.com</td>
                <td>7584-9636</td>
                <td>Rambla Lorem ipsum, 292A 15ºH</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>Jimena</td>
                <td>Escobar</td>
                <td>Jimena1234@gmail.com</td>
                <td>7584-3652</td>
                <td>Rambla Lorem ipsum, 292A 15ºH</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>Guillermo</td>
                <td>Cartagena</td>
                <td>Cartagena12_12@hotmail.com</td>
                <td>7584-9636</td>
                <td>Rambla Lorem ipsum, 292A 15ºH</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>Jimena</td>
                <td>Escobar</td>    
                <td>Jimena1234@gmail.com</td>
                <td>7584-3652</td>
                <td>Rambla Lorem ipsum, 292A 15ºH</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>Guillermo</td>
                <td>Cartagena</td>
                <td>Cartagena12_12@hotmail.com</td>
                <td>7584-9636</td>
                <td>Rambla Lorem ipsum, 292A 15ºH</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>Jimena</td>
                <td>Escobar</td>
                <td>Jimena1234@gmail.com</td>
                <td>7584-3652</td>
                <td>Rambla Lorem ipsum, 292A 15ºH</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
<!--Fin de area de los data table-->

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
                                                        <div class="col">
                                                        
                                                        <input type="text" class="form-control" placeholder="Apellidos">
                                                        </div>                                                    
                                                    </div>
                                                    <div class="form-row mt-3">                                            
                                                        <div class="col">        
                                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre@ejemplo.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">                                        
                                                        <div class="col-lg-6 mt-3">
                                                        
                                                        <input type="text" class="form-control" placeholder="Telefono">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Direccion</span>
                                                                </div>
                                                                <textarea class="form-control" aria-label="With textarea"></textarea>
                                                            </div>

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

<!--Modal agregar-->

<div class="modal fade bd-example-modal-lg" id="Agregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
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
                                                        <div class="col">
                                                        
                                                        <input type="text" class="form-control" placeholder="Apellidos">
                                                        </div>                                                    
                                                    </div>
                                                    <div class="form-row mt-3">                                            
                                                        <div class="col">        
                                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre@ejemplo.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">                                        
                                                        <div class="col-lg-6 mt-3">
                                                        
                                                        <input type="text" class="form-control" placeholder="Telefono">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Direccion</span>
                                                                </div>
                                                                <textarea class="form-control" aria-label="With textarea"></textarea>
                                                            </div>

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

<!--Modal Eliminar-->
<div class="modal" id="Eliminar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>¿Esta seguro de que desea eliminar este elemento?<h4>
      </div>
      <div class="modal-footer border-0">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>





<!--Modal Eliminar-->




<!--Fin de Area de los modal-->




</div>





<?php
 $pagina->footerTemplate();       
?>