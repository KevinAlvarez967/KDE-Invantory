<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Detcompra.php');




if(isset($_GET['action'])){
    session_start();

    $detcompra = new Detcompra;

    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if(isset($_SESSION['id_usuario_geren'])){
        switch($_GET['action']){
                case 'create':
                    $_POST = $detcompra->validateForm($_POST);
                        if($detcompra->setIdcompra($_POST['id_compra'])){ 
                            if($detcompra->setCantidad($_POST['cantidad'])){
                                if($detcompra->setPrecio($_POST['Precio'])){
                                    if(isset($_POST['Producto'])){
                                        if($detcompra->setIdproducto($_POST['Producto'])){
                                            if($detcompra->CrearDetalleCompra()){
                                                $result['status'] = 1;
                                                $result['message'] = 'detalle compra creada correctamente';
                                            }else{
                                                $result['exception'] = Database::getException();
                                            }
                                        }else{
                                            $result['exception'] = 'Producto incorrecto';
                                        }
                                }else{
                                    $result['exception'] = 'Seleccione un Producto';
                                }
                            }else{
                                $result['exception'] = 'Precio incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    }else{
                        $result['exception'] = 'Compra incorrecta';
                    }
                break;
                case 'readOne':
                    if($detcompra->setIdcompra($_POST['id_compra'])){
                        if($result['dataset'] = $detcompra->LeerUnaCompra()){
                            $result['status'] = 1;
                        } else{
                            $result['exception'] = 'detalle compra inexistente';
                        }
                    } else{
                        $result['exception'] = 'detalle compra incorrecta';
                    }
                break;
                 case 'readProductos':
                    if($detcompra->setIdcompra($_POST['id_compra'])){
                        if($result['dataset'] = $detcompra->LeerProductos()){
                            $result['status'] = 1;
                        } else{
                            $result['exception'] = 'productos inexistentes';
                        }
                    } else{
                        $result['exception'] = 'No se encontraron productos';
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