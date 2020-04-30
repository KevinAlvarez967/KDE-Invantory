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
    <div class="col-lg-6 mt-5 mr-5">
    <h3 class="mt-5" id="TituloPag"> Productos</h3>
        <table id="Proveedores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Coca-cola</td>
                    <td>7up</td>
                    <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></td>
                    <td>$0.65</td>
                    <td class="d-flex justify-content-center">
                    <a class="btn" role="button"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>hot dog</td>
                    <td>Norteamericana</td>
                    <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></td>
                    <td>$0.75</td>
                    <td class="d-flex justify-content-center">
                    <a class="btn" role="button"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Hambuerguesa sv</td>
                    <td>Norteamericana</td>
                    <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></td>
                    <td>$1.55</td>
                    <td class="d-flex justify-content-center">
                    <a class="btn" role="button"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Sopa de tortilla</td>
                    <td>Sopas</td>
                    <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby=""></td>
                    <td>Gratis</td>
                    <td class="d-flex justify-content-center">
                    <a class="btn" role="button"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="col-lg-6 d-flex justify-content-end mt-5 ml-4">
                <div class="card text-center">
                <h3 class="mt-5" id="TituloPag"> Orden</h3>
                    <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->                       
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="media mt-2">
                            <div class="media-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                        
                                        <input type="text" class="form-control" placeholder="Mesero">
                                        </div>                                        
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-lg-6">                                        
                                        <input type="text" class="form-control" placeholder="Mesa">
                                        </div> 
                                    </div>
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
                                        <tbody>
                                            <tr>
                                                <td>Coca-cola</td>
                                                <td>1</td>
                                                <td>$0.55</td>
                                                <td class="d-flex justify-content-center">
                                                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                                                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hambuerguesa sv</td>
                                                <td>1</td>
                                                <td>$1.55</td>
                                                <td class="d-flex justify-content-center">
                                                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                                                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sopa de tortilla</td>
                                                <td>1</td>
                                                <td>Gratis</td>
                                                <td class="d-flex justify-content-center">
                                                <a class="btn" role="button" data-toggle="modal" data-target="#ModalActualizar"><i class="fas fa-edit"></i></a>
                                                <a class="btn" role="button" data-toggle="modal" data-target="#Eliminar"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>


                                    </div>
                                    <div class="form-row d-flex justify-content-center mt-4">
                                        <div class="col-lg-6">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                         <button type="button" class="btn btn-primary">Guardar</button>
                                        
                                        </div>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
    
</div>












<?php
 $pagina->footerTemplate();       
?>