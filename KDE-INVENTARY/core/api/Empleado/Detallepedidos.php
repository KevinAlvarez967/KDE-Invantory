<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Detpedido.php');
require_once('../../Model/pedidos.php');






if(isset($_GET['action'])){

    session_start();

    $pedido = new Detpedido;
    $Crearpedido = new Pedidos;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
        if(isset($_SESSION['id_usuario'])){
            switch($_GET['action']){
                case 'readAll':
                    if ($result['dataset'] = $pedido->LeerPedidos()) {
                         $result['status'] = 1;
                     } else {
                        $result['exception'] = 'No se encontraron Pedido';
                     }
                 break;
                  case 'search':
                        $_POST = $pedido->validateForm($_POST);
                        if($_POST['search'] != ''){
                            if($result['dataset'] = $pedido->BuscarPedidos($_POST['search'])){
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
                    case 'create': 
                        $_POST = $Crearpedido->validateForm($_POST);
                            if(isset($_POST['Mesero'])){
                                if($Crearpedido->setIdusuario($_POST['Mesero'])){
                                    if(isset($_POST['Mesa'])){
                                        if($Crearpedido->setIdmesa($_POST['Mesa'])){
                                            if($Crearpedido->CrearPedido()){
                                                $result['status'] = 1;
                                                $result['message'] = 'pedido creado correctamente';
                                            }else{
                                                $result['exception'] = Database::getException();
                                            }
                                        }else{
                                            $result['exception'] = 'Mesa incorrecta';
                                        }
                                    }else{
                                        $result['exception'] = 'Selecciona una mesa';
                                    }
                                }else{
                                    $result['exception'] = 'Mesero incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Selecciona un Mesero';
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