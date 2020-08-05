<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Detpedido.php');




//API utilizada para gestionar las funciones de detalle pedido

if(isset($_GET['action'])){

    session_start();

    $pedido = new Detpedido;

    $result = array('status' => 0, 'message' => null, 'exception' => null);
        if(isset($_SESSION['id_usuario_geren'])){
            switch($_GET['action']){
                //Case para leer todos los pedidos en base
                case 'readAll':
                    if ($result['dataset'] = $pedido->readAllPedidos()) {
                         $result['status'] = 1;
                     } else {
                        $result['exception'] = 'No se encontraron Pedido';
                     }
                 break;
                  case 'search':
                        $_POST = $pedido->validateForm($_POST);
                        if($_POST['search'] != ''){
                            if($result['dataset'] = $pedido->BuscarPedido($_POST['search'])){
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
                    //Case utilizado para leer los productos de cada pedido mediante el id detalle
                    case 'readOne':
                        if($pedido->setIddetpedido($_POST['id_det_pedido'])){
                            if($result['dataset'] = $pedido->readAllProductoFromPedidos()){
                                $result['status'] = 1;
                            } else{
                                $result['exception'] = 'Pedido inexistente';
                            }
                        } else{
                            $result['exception'] = 'Pedido incorrecto';
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