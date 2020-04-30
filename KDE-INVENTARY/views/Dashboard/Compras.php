<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Compras');
?>


<div class="container">

<!--Area de los data table-->
<div class="d-flex justify-content-center">
            <h3 class="mt-5" id="TituloPag"><i class="fad fa-shopping-bag mr-3"></i>Compras</h3>
            
            </div>
            <hr>
    <div class="row">
            <div class="row mt-3 ml-2 d-flex justify-content-start">
            <a class="btn btn btn-success" href="" role="button" data-toggle="modal" data-target="#ModalAgregar">Agregar</a>
            </div>
        <div class= "col-lg-12 mt-5">
        <table id="Compra" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Fecha de la compra</th>
                <th>Total de la compra</th>
                <th>Proveedor</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12/15/2020</td>
                <td>$20.50</td>
                <td>Kevin Oswaldo Alvarez</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" href="DetalleCompras.php"><i class="far fa-align-justify"></i></a>   
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>12/15/2020</td>
                <td>$24.25</td>
                <td>Guillermo Salvador Cartagena</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" href="DetalleCompras.php"><i class="far fa-align-justify"></i></a>   
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>12/15/2020</td>
                <td>$18.20</td>
                <td>Jimena Vanessa Palacios de Alvarez</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" href="DetalleCompras.php"><i class="far fa-align-justify"></i></a>   
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
<!--Fin de area de los data table-->
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
                                                        
                                                        <input type="text" class="form-control" placeholder="Proveedor">
                                                        </div>                                                                                                          
                                                    </div>  
                                                    <div class="form-row mt-2">
                                                        <div class="col">
                                                        
                                                        <input type="text" class="form-control" placeholder="Fecha">
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
                                                        
                                                        <input type="text" class="form-control" placeholder="Proveedor">
                                                        </div>                                                                                                          
                                                    </div>  
                                                    <div class="form-row mt-2">
                                                        <div class="col">
                                                        
                                                        <input type="text" class="form-control" placeholder="Fecha">
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

<!--Modal Agregar-->
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


<?php
 $pagina->footerTemplate();       
?>