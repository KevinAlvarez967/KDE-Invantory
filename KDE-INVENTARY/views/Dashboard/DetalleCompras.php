<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Detalle Compras');
?>

<div class="d-flex justify-content-center">
                <h3 class="mt-5" id="TituloPag"><i class="fas fa-box-open mr-3"></i> Detalle de la compra</h3>
                    
            </div>
            <hr>

<div class="container d-flex justify-content-between ">
    <div class="col-lg-6 col-sm-12 mt-5 mr-5">
    <h3 class="mt-5 mb-5" id="TituloPag"> Detalle Productos</h3>
        <table id="Proveedores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Coca-cola</td>
                    <td>Gaseosas</td>
                    <td>1</td>
                    <td>$0.65</td>
                    <td class="d-flex justify-content-center">
                    <a class="btn" role="button"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-6 col-sm-12 d-flex justify-content-end mt-5 ml-4">
                <div class="card text-center">
                <h3 class="mt-5" id="TituloPag">Agregar Productos</h3>
                    <div class="card-body" id="comentarios">
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->                       
                            <!--Seccion de valoracion dentro de cada comentario y detalles de producto-->
                        <div class="media mt-2">
                            <div class="media-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                        
                                        <input type="text" class="form-control" placeholder="Producto">
                                        </div>   
                                        <div class="col-lg-6">
                                        
                                        <input type="text" class="form-control" placeholder="Precio">
                                        </div>                                      
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-lg-6">                                        
                                        <input type="text" class="form-control" placeholder="Categoria">
                                        </div> 
                                        <div class="col-lg-6">                                        
                                        <input type="text" class="form-control" placeholder="SubCategoria">
                                        </div> 
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-lg-6">                                        
                                        <input type="text" class="form-control" placeholder="Cantidad">
                                        </div>                                        
                                    </div>
                                    <div class="form-row d-flex justify-content-center mt-4">
                                        <div class="col-lg-12">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Borrar</button>
                                         <button type="button" class="btn btn-primary">Guardar producto</button>
                                        
                                        </div>                                        
                                    </div>
                                    <hr>
                                    <h3 class="mt-5" id="TituloPag">Datos de la compra</h3>
                                    <div class="form-row mt-4">
                                    <table id="Proveedores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha de la compra</th>
                                                <th>Total</th>
                                                <th>Proveedor</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/05/2020</td>
                                                <td>$14.50</td>
                                                <td>Kevin Alvarez</td>                                               
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>


                                    </div>
                                    <div class="form-row d-flex justify-content-center mt-4">
                                        <div class="col-lg-12">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                         <button type="button" class="btn btn-primary">Terminar proceso</button>
                                        
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