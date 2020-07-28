<?php
require_once('../../core/helpers/Template.php');
$pagina = new page;
$pagina->headerTemplate('Visualizacion Pedidos');
?>


<div class="container">

<!--Area de los data table-->
<div class="d-flex justify-content-center">
        <h3 class="mt-5" id="TituloPag"><i class="fas fa-box-open mr-3"></i> Detalle pedidos</h3>
                    
            </div>
            <hr>
    <div class="row">
        <div class= "col-lg-12 mt-5">
        <table id="Productos2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Descripcion</th>
                <th>Mesa</th>
                <th>Fecha y Hora</th>
                <th>Proceso</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="pedidos">
            <tr>
                <td>1</td>
                <td>Aqui irian la concatenacion de todos los productos</td>
                <td>5</td>
                <td>12/12/2020 12:25:05 PM</td>
                <td>En Cocina</td>
                <td class="d-flex justify-content-center">
                <a class="btn btn-outline-info" href=".php" role="button" data-toggle="modal" data-target="#Moreinfo">Ver mas</a>
                </td>
            </tr>           
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








<?php
 $pagina->footerTemplate('Pedido.js');       
?>