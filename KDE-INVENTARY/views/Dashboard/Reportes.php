<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Reportes');
?>


<div class="container">

<div class="card text-center mt-3">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active">Productos</a>
      </li>
      <li class="nav-item">
      <a class="btn btn btn-success ml-2" href="" role="button"  data-toggle="modal" data-target="#Fecha">Ver por fecha</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Reportes de productos</h5>
            <div class="card card-body">
                <div class ="row d-flex justify-content-center mr-5">
                    <div class="col-lg-4 col-md-12 mt-4 mb-5">
                        <h5>Ventas en el mes</h5>
                    <div id="bar-example" style="height: 250px;"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-3 mb-5"> 
                        <h5>Productos mas vendidos</h5>
                            <div id="donut-example" style="height: 250px;"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-3 mb-5"> 
                        <h5>Ingresos por mes</h5>
                            <div id="line-example" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
  </div>
</div>
<div class="card text-center mt-3">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active">Ganancias</a>
      </li>
      <li class="nav-item">
       <a class="btn btn btn-success ml-2" href="" role="button"  data-toggle="modal" data-target="#Fecha1">Ver por fecha</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Reportes de ganancias</h5>
    <div class="card card-body">
                <div class ="row d-flex justify-content-center mr-5">
                    <div class="col-lg-4 col-md-12 mt-4 mb-5">
                        <h5>Ventas en el mes</h5>
                    <div id="bar-example1" style="height: 250px;"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-3 mb-5"> 
                        <h5>Productos mas vendidos</h5>
                            <div id="donut-example1" style="height: 250px;"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-3 mb-5"> 
                        <h5>Ingresos por mes</h5>
                            <div id="line-example1" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
  </div>
</div>
<div class="card text-center mt-3">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active">Ventas del dia</a>
      </li>
      <li class="nav-item">
       <a class="btn btn btn-success ml-2" href="" role="button"  data-toggle="modal" data-target="#Fecha2">Ver por fecha</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Reportes ventas del dia</h5>
    <div class="card card-body">
                <div class ="row d-flex justify-content-center mr-5">
                    <div class="col-lg-4 col-md-12 mt-4 mb-5">
                        <h5>Ventas en el dia</h5>
                    <div id="bar-example2" style="height: 250px;"></div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-3 mb-5"> 
                        <h5>Productos mas vendidos</h5>
                            <div id="donut-example2" style="height: 250px;"></div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-3 mb-5"> 
                        <h5>Ingresos por dia</h5>
                            <div id="line-example2" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
  </div>
</div>



</div>



<!--Modal Fecha-->
<div class="modal" id="Fecha" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Fecha">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!--Modal Fecha-->
<!--Modal Fecha-->
<div class="modal" id="Fecha1" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Fecha">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!--Modal Fecha-->
<!--Modal Fecha-->
<div class="modal" id="Fecha2" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">Advertencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Fecha">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!--Modal Fecha-->

<?php
 $pagina->footerTemplate();       
?>