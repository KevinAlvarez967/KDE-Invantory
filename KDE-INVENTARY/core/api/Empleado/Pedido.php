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
                    if ($result['dataset'] = $pedido->readPedidos()) {
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
                    case 'readOne':
                        if($Crearpedido->setIdpedido($_POST['id_pedido'])){
                            if($result['dataset'] = $Crearpedido->readOnePedido()){
                                $result['status'] = 1;
                            } else{
                                $result['exception'] = 'Pedido inexistente';
                            }
                        } else{
                            $result['exception'] = 'Pedido incorrecto';
                        }
                    break;  
                    case 'readProductos':
                        if($Crearpedido->setIdpedido($_POST['id_pedido'])){
                            if($result['dataset'] = $Crearpedido->readAllProductoFromPedido()){
                                $result['status'] = 1;
                            } else{
                                $result['exception'] = 'productos inexistentes';
                            }
                        } else{
                            $result['exception'] = 'No se encontraron productos';
                        }
                    break;
                    case 'create':
                        $_POST = $pedido->validateForm($_POST);                    
                                if($pedido->setCantidad($_POST['cantidad'])){
                                    if($pedido->setIdpedido($_POST['id_pedido'])){
                                        if(isset($_POST['Producto'])){
                                            if($pedido->setIdproducto($_POST['Producto'])){
                                                if($pedido->CrearDetallePedido()){
                                                    $result['status'] = 1;
                                                    $result['message'] = 'detalle pedido creado correctamente';
                                                }else{
                                                    $result['exception'] = Database::getException();
                                                }
                                            }else{
                                                $result['exception'] = 'producto incorrecto';
                                            }
                                        }else{
                                            $result['exception'] = 'Seleccione un producto';
                                        }
                                    }else{
                                        $result['exception'] = 'Pedido incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Cantidad incorrecta';
                                }                
                    break;           
                    case 'delete': 
                        if($pedido->setIddetpedido($_POST['id_det_pedido'])){
                            if($data = $pedido->readAllProductoFromPedidos()) {                                
                                    if($pedido->EliminarProductoDelDetalle()){
                                        $result['status'] = 1;
                                        $result['message'] = 'Producto eliminado correctamente';                               
                                    } else{
                                        $result['exception'] = Database::getException();
                                    }                                
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