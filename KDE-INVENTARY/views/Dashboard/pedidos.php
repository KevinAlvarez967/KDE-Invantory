<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Pedidos');
?>
<div class="container">
        <div class="d-flex justify-content-center">
            <h3 class="mt-5" id="TituloPag"><i class="fas fa-sort-size-up-alt mr-3"></i>Pedidos</h3>
            
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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>12/12/2020</td>
                        <td>En cocina</td>
                        <td>Guillermo Cartagena</td>
                        <td>$10.43</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-info" href=".php" role="button" data-toggle="modal" data-target="#Moreinfo">Ver mas</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>3</td>
                        <td>12/12/2020</td>
                        <td>Entregado</td>
                        <td>Kevin Oswaldo</td>
                        <td>$5.21</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-info" href=".php" role="button" data-toggle="modal" data-target="#Moreinfo">Ver mas</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>4</td>
                        <td>12/12/2020</td>
                        <td>En cocina</td>
                        <td>Juan Anaya</td>
                        <td>$13.03</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-info" href=".php" role="button" data-toggle="modal" data-target="#Moreinfo">Ver mas</a>
                        </td>
                    </tr>
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
                    <div class="modal-body border-0">
                        <p>Descripcion:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                        <p>Precio:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                        <p>Cantidad:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
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
$pagina->footerTemplate();
?>