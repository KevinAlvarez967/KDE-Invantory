<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Pedidos');
?>
<div class="container">
        <div class="d-flex justify-content-center">
            <h3 class="mt-5" id="TituloPag"><i class="fas fa-sort-size-up-alt mr-3"></i>Pedidos</h3>
            
        </div>
        <div class="container mt-4 d-flex justify-content-end">
                <div class="row">
                    <form class="form-inline" method="post" id="search-form">
                        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        <hr>   
    <div class="row"> 
        <div class="col-lg-12 mt-5">
            <table id="Pedidos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Mesa</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Total a pagar</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="pedido-table">
                                    
                </tbody>
            </table>
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

<?php
$pagina->footerTemplate('Detallepedido.js');
?>