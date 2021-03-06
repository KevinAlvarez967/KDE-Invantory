<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Categoria.php');


//Api que controla lo esencial de categorias utilizado en el programa
if(isset($_GET['action'])){
    session_start();

    $categoria = new Categoria;

    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_usuario_geren'])){
        switch($_GET['action']){
            //Case utilizado para llenar los selects 
            case 'readAll':
                if ($result['dataset'] = $categoria->LeerCategorias()) {
                     $result['status'] = 1;
                 } else {
                    $result['exception'] = 'No se encontraron Categorias';
                 }
             break;
             case 'search':
                $_POST = $producto->validateForm($_POST);
                if($_POST['search'] != ''){
                    if($result['dataset'] = $producto->BuscarProducto($_POST['search'])){
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if($rows > 1){
                            $result['message'] = 'Se encontraron '.$rows.' coincidencias';
                        }else{
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    }else{
                        $result['exception'] = 'No hay coincidencias';
                    }
                }else{
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
            break;
             case 'readOne':
                if($producto->setIdproducto($_POST['id_producto'])){
                    if($result['dataset'] = $producto->LeerUnProducto()){
                        $result['status'] = 1;
                    } else{
                        $result['exception'] = 'Producto inexistente';
                    }
                } else{
                    $result['exception'] = 'Producto incorrecto';
                }
            break;
            default: 
            exit('Accion no disponible');


        }
        header('content-type: application/json; charset=utf-8');
        print(json_encode($result));

     }else{
        exit('Acceso no disponible');
    }




}else{
    exit('Recurso denegado');
}


































?>