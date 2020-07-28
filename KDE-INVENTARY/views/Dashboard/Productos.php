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
            <div class="container mt-4 d-flex justify-content-end">
                <div class="row">
                    <form class="form-inline" method="post" id="search-form">
                        <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
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
        <tbody id="Productos-table">            
           
        </tbody>
    </table>
        </div>
    </div>
<!--Fin de area de los data table-->
<!--Fin de area de los data table-->

<!--Area de los modal-->


<!--Modal agregar-->

<div class="modal fade bd-example-modal-lg" id="Agregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modal-title"></h5>
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
                                            <form id="form-Actualizar">
                                                <input class="invisible mb-3" type="number" id="id_producto" name="id_producto"/>
                                                    <div class="form-row">
                                                        <div class="col">
                                                        <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Nombres">                                                       
                                                        </div>
                                                        <div class="col ml-2">
                                                        
                                                        <input type="number" id="Precio" name="Precio" class="form-control validate" max="999.99" placeholder="Precio" min="0.01" step="any">
                                                        </div>                                                                                                            
                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01">SubCategoria</label>
                                                            </div>
                                                            <select class="custom-select" id="Subcategoria" name="Subcategoria">
                                                               
                                                            </select>
                                                        </div>
                                                   </div>                                                                                                  
                                                    <div class="form-row mt-4">
                                                            <button type="submit"  class="btn btn-secondary mr-2" data-tooltip="Cancelar" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary" data-tooltip="Cancelar"> Guardar </button>
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
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<?php
 $pagina->footerTemplate('Producto.js');       
?>