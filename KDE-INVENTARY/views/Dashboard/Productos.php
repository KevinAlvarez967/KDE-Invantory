<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Productos');
?>

<div class="container">

<!--Area de los data table-->
<div class="d-flex justify-content-center">
        <h3 class="mt-5" id="TituloPag"><i class="fas fa-box-open mr-3"></i>Productos</h3>
                    
            </div>
            <hr>
    <div class="row">
            <div class="row mt-3 ml-2 d-flex justify-content-start">
            <a class="btn btn btn-success" href="Compras.php" role="button">Agregar</a>
            </div>
        <div class= "col-lg-12 mt-5">
        <table id="Productos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>SubCategoria</th>
                <th>Categoria</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Coca-cola</td>
                <td>$0.55</td>
                <td>Gaseosas</td>
                <td>Bebidas</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>7up</td>
                <td>$0.60</td>
                <td>Gaseosas</td>
                <td>Bebidas</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>Pimiento Rojo</td>
                <td>$0.50</td>
                <td>Verduras</td>
                <td>Ingredientes</td>
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
                                                        
                                                        <input type="text" class="form-control" placeholder="Nombre">
                                                        </div>
                                                        <div class="col ml-2">
                                                        
                                                        <input type="text" class="form-control" placeholder="Precio">
                                                        </div>                                                    
                                                    </div>
                                                   <div class="form-row mt-3">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">SubCategoria</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01">
                                                                <option selected>Elegir...</option>
                                                                <option value="1">Gaseosas</option>
                                                                <option value="2">Verduras</option>
                                                                <option value="3">Jugos</option>
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

<!--Modal agregar-->

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




</div>

<?php
 $pagina->footerTemplate();       
?>