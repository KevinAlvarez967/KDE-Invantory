<?php
require_once('../../core/helpers/Template.php');
$pagina = new page;
$pagina->headerTemplate('Visualizacion Pedidos');
?>


<div class="container">

<!--Area de los data table-->
<div class="d-flex justify-content-center">
        <h3 class="mt-5" id="TituloPag"><i class="fas fa-box-open mr-3"></i> Visualizacion pedidos</h3>
                    
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
        <tbody>
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
            <tr>
                <td>2</td>
                <td>Aqui irian la concatenacion de todos los productos</td>
                <td>2</td>
                <td>05/11/2020 02:05:05 PM</td>
                <td>En Cocina</td>
                <td class="d-flex justify-content-center">
                <a class="btn btn-outline-info" href=".php" role="button" data-toggle="modal" data-target="#Moreinfo">Ver mas</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Aqui irian la concatenacion de todos los productos</td>
                <td>4</td>
                <td>25/02/2020 01:05:55 PM</td>
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
                    <div class="modal-body border-0">
                        <form>
                            <div class="form-row">
                                <p>Nº de pedido:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                            </div>
                            <div class="form-row">    
                                <p>Descripcion:<textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p>Cantidad:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                                <div class="col">
                                    <p>Precio(unitario):<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p>Mesa:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                                <div class="col">
                                    <p>Fecha y Hora:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p>Estado:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                                <div class="col">
                                    <p>Mesero:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p>Promociones:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                                <div class="col">
                                    <p>Total:<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Generar Factura</button>
                    </div>
                </div>
            </div>
        </div>









<?php
 $pagina->footerTemplate();       
?>