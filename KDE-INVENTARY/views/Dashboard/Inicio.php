<?php
require_once('../../core/helpers/TemplateDash.php');
$pagina = new page;
$pagina->headerTemplate('Inicio');
?>




<div class= "container">

<div class="d-flex justify-content-center">
        <h3 class="mt-5" id="TituloPag"><i class="fas fa-columns mr-3"></i>Dashboard</h3>
                    
            </div>
            <hr>
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
    <div class="row mt-5">
        <div class="jumbotron jumbotron-fluid col-lg-12">
            <div class="container ">
                <h1 class="display-4">¡Bienvenido!</h1>
                <p class="lead">En esta seccion puedes visualizar graficas mas importantes tales como:</p>
                <p class="lead">-Ventas en el mes la cual permite llevar un mejor control de las ventas haciendo asi mas factible 
                las medidas de marketing para poder aumentar las ventas</p>
                <p class="lead">-Productos mas vendidos permite el rapido conocimiento de los productos mejor vendidos en cierto 
                periodo de tiempo</p>
                <p class="lead">-Ingresos por mes permite conocer los ingresos de dinero por cada mes haciendo conocer
                en que momento hubo mas demanda en las sucursales</p>
            </div>
        </div>
    </div>
</div>



<?php
 $pagina->footerTemplate();       
?>