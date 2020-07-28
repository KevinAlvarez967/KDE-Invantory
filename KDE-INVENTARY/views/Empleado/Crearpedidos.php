<?php
require_once('../../core/helpers/Template.php');
$pagina = new page;
$pagina->headerTemplate('crear Pedidos');
?>


<div class="container">

<!--Area de los data table-->
<div class="d-flex justify-content-center">
        <h3 class="mt-5" id="TituloPag"><i class="fas fa-box-open mr-3"></i> Visualizacion pedidos</h3>
                    
            </div>
            <div class="row mt-3 ml-2 d-flex justify-content-start">
            <a class="btn btn btn-success" href="#" onclick="openCreateModal()" >Agregar</a>
            </div>
            <hr>
    <div class="row">
        <div class= "col-lg-12 mt-5">
        <table id="Productos2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Mesero</th>
                <th>Mesa</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="pedidos-table">
                    
        </tbody>
    </table>
        </div>
    </div>

<!-- modal -->
<div class="modal fade" id="Moreinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLabel">Mas informacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body border-0" id="detallepedido">
                    <table id="Pedidos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th>Precio unitario</th>
                                <th>Cantidad</th>                               
                            </tr>
                        </thead>
                        <tbody id="productos-pedidos">
                                                    
                        </tbody>
                    </table>   
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




<!-- Modal Agregar -->
<div class="modal fade bd-example-modal-lg" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modal-title" ></h5>
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
                                                <form id="pedido-form">       
                                                        <div class="form-row mt-3">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Mesero</label>
                                                                </div>
                                                                    <select class="custom-select" id="Mesero" name="Mesero">
                                                                                                                    
                                                                    </select>
                                                                </div>
                                                        </div> 
                                                        <div class="form-row mt-3">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Mesa</label>
                                                                </div>
                                                                    <select class="custom-select" id="Mesa" name="Mesa">
                                                                                                                    
                                                                    </select>
                                                                </div>
                                                        </div>                                         
                                                        <div class="form-row d-flex justify-content-center mt-4">
                                                            <div class="col-lg-12">
                                                            <button type="submit"  class="btn btn-secondary mr-2" data-tooltip="Cancelar" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary" data-tooltip="Cancelar"> Guardar </button>
                                                            
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
            </div>
        </div>
    </div>
</div>







<?php
 $pagina->footerTemplate('Crearpedido.js');       
?>











