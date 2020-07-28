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
            <tbody id="productos-detalle">
            </tbody>
        </table>
    </div>

<div class="col-lg-6 col-sm-12 d-flex justify-content-end mt-5 ml-4">
    <div class="card text-center">
        <h3 class="mt-5" id="TituloPag">Crear Productos</h3>
            <div class="card-body" >
                <div class="media mt-2">
                    <div class="media-body">
                            <form id="agregar-producto">                                
                                <div class="form-row">
                                    <div class="col-lg-6">                                        
                                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Producto">
                                    </div>   
                                    <div class="col-lg-6">                                        
                                        <input type="number"  placeholder="Precio"  id="Precio" name="Precio" class="form-control validate" max="999.99" placeholder="Precio" min="0.01" step="any">
                                    </div>                                      
                                </div>                                    
                                <div class="form-row mt-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"  for="inputGroupSelect01">SubCategoria</label>
                                        </div>
                                            <select class="custom-select" id="Subcategoria" name="Subcategoria">
                                                               
                                            </select>
                                    </div>
                                </div>                                                                        
                                <div class="form-row mt-4 d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary">Cancelar</button>
                                    <button type="submit" class="btn btn-primary ml-1" data-tooltip="Cancelar"> Crear producto </button>
                                </div>
                                <hr>                                
                            </form>                           
                            <form id = "Proveedor-compra-form">
                                    <input type="number"  placeholder="id_compra"  id="id_compra" name="id_compra" class="form-control validate invisible" >
                                <div class="form-row" id="detallecompras">
                                    <div class="col-lg-6">        
                                        <h5  id="TituloPag">Fecha compra</h5>                                 
                                        <input type="text" class="form-control"  disabled id="fecha_compra" name="fecha_compra" placeholder="fecha compra">
                                    </div>   
                                    <div class="col-lg-6">     
                                    <h5  id="TituloPag">Proveedor</h5>                                      
                                    <input type="text" class="form-control"  disabled id="NombreApellidos" name="NombreApellidos" placeholder="Nombre">
                                    </div>                                                                          
                                </div>   
                                <div class="form-row mt-3">
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
                                            <button type="submit" class="btn btn-primary">Crear detalle compra</button>                                        
                                        </div>                                        
                                    </div>
                            </form>
                    </div>
                </div>
            </div>
    </div>
</div>















<?php
$pagina->footerTemplate('Detallecompra.js');
?>