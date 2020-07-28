<?php
require_once('../../core/helpers/Template.php');
$pagina = new page;
$pagina->headerTemplate('Creacion Pedidos');
?>


            <div class="d-flex justify-content-center">
                <h3 class="mt-5" id="TituloPag"><i class="fas fa-box-open mr-3"></i> Creacion pedidos</h3>
                    
            </div>
            <hr>

<div class="container d-flex justify-content-between ">
<div class="col-lg-6 d-flex justify-content-start mt-5 ml-4">
                <div class="card text-center">
                    <h3 class="mt-5" id="TituloPag"> Detalle Orden</h3>
                        <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->                       
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                            <div class="media mt-2">
                                <div class="media-body">                                   
                                        <div class="form-row mt-4">
                                            <table id="Proveedores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nombres</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detallepedidoscrear">                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>                                                                        
                                </div>
                            </div>
                        </div>
                </div>
    </div>



    <div class="col-lg-6 d-flex justify-content-end mt-5 ml-4">
                <div class="card text-center">
                    <h3 class="mt-5" id="TituloPag"> Detalle Orden</h3>
                        <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->                       
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                            <div class="media mt-2">
                                <div class="media-body">
                                    <form id="Detallepedido">
                                        <input type="number"  placeholder="id_pedido"  id="id_pedido" name="id_pedido" class="form-control validate invisible" >
                                        <div class="form-row mt-3 ml-5 mr-5">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Producto</label>
                                                </div>
                                                    <select class="custom-select" id="Producto" name="Producto">
                                                                                                    
                                                    </select>
                                                </div>
                                        </div> 
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <input id="cantidad" type="number" name="cantidad" class="form-control validate ml-3" max="999" placeholder="Cantidad" min="1" step="any" required/>
                                            </div>                                                                                  
                                        </div>
                                        <div class="form-row d-flex justify-content-center mt-4">
                                            <div class="col-lg-12">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Crear detalle pedido</button> 
                                            
                                            </div>                                        
                                        </div>
                                    </form>                                                                                                       
                                </div>
                            </div>
                        </div>
                </div>
    </div>












<?php
 $pagina->footerTemplate('Detallepedido.js');       
?>