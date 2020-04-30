<?php
class Page 
{
    public function headerTemplate($title) 
    {
        print
        ('
        <!DOCTYPE html>
<html lang="es">
  <head>
        <!-- conjunto de caracteres-->
        <meta charset="utf-8">
        <!-- Indica al navegador que la pagina web esta optimizada para dispositivos moviles-->
        <meta name="viewport" content="width= device-width, initial scale= 1.0">
        <!--Titulo de la pagina-->
        <title>'.$title.'</title>
  <!--Llamando una hoja de estilos-->
    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resources/css/shards.min.css">
    <link rel="stylesheet" href="../../resources/icons/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../resources/css/responsive.bootstrap4.min.css"/>
  </head>
  <body style="background-color: #F6F8FF">
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #BAC9FF;">
                <a class="navbar-brand" href="#">
                    <img src="../../resources/img/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
                </a>
                <a class="navbar-brand" href="#">Yesterday SV</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                        <li class="nav-item active">
                        <a class="nav-link" href="CreacionPedidos.php">Crear pedidos <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="VisualizacionPedidos.php">Pedidos<span class="sr-only">(current)</span></a>
                        </li>
                </ul>
                </div>

                    
                    
                  
                    <button type="button" class="btn" id="User-icon"><a href="Perfil.php" style= "text-align: center; text-decoration: none; color: #000000;">
                    <i class="fas fa-user fa-2x"  class="d-inline-block align-top" alt="" ></i></button>
                    <div class="dropdown ml-4" >
                        <a style="background-color: #BAC9FF; color:black;"class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                        </a>
                    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="CreacionPedidos.php">Crear pedidos</a>
                        <a class="dropdown-item" href="VisualizacionPedidos.php">Pedidos</a>
                        <a class="dropdown-item" href="login.php">Cerrar sesion</a>
                        </div>
                    </div>
                    </nav>

        
        
        ');
    }







    Public function footerTemplate()
    {
        print
        ('  
        
            <!-- Optional JavaScript -->
            <!-- JavaScript Dependencies: jQuery, Popper.js, Bootstrap JS, Shards JS -->
            <script src="../../resources/js/jquery-3.4.1.min.js"></script>
    <script src="../../resources/js/bootstrap.min.js"></script>
    <script src="../../Resources/js/morris.min.js" type="text/javascript"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../../resources/js/JavascriptGraficos.js"></script>
    <script src="../../resources/js/shards.min.js"></script>
    <script src="../../resources/js/jquery.dataTables.min.js"></script>        
    <script src="../../resources/js/dataTables.responsive.min.js"></script>  
    <script src="../../resources/js/responsive.bootstrap4.min.js"></script>
    <script src="../../resources/js/dataTables.bootstrap4.min.js"></script>   
    <script src="../../resources/js/Dash.js"></script>
            </body>
            </html> 
            ');
    }

}   
        