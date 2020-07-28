<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Producto.php');




if(isset($_GET['action'])){
    session_start();

    $producto = new Producto;

    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_usuario_geren'])){
        switch($_GET['action']){
            case 'readAll':
                if ($result['dataset'] = $producto->LeerProductos()) {
                     $result['status'] = 1;
                 } else {
                    $result['exception'] = 'No se encontraron productos';
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
            case 'create':
                $_POST = $producto->validateForm($_POST);
                if($producto->setProducto($_POST['Nombre'])){
                    if($producto->setPrecio($_POST['Precio'])){
                        if($producto->setIdsubcategoria($_POST['Subcategoria'])){
                            if($producto->CrearProducto()){
                                $result['status'] = 1;
                                $result['message'] = 'Producto creado correctamente';
                            }else{
                                $result['exception'] = Database::getException();
                            }
                        }else{
                            $result['message'] = 'Categoria incorrecta';
                        }
                    }else{
                        $result['message'] = 'Precio incorrecto';
                    }
                }else{
                    $result['message'] = 'Producto incorrecto';
                }
            break;
           case 'update':
                 $_POST = $producto->validateForm($_POST);
                    if($producto->setIdproducto($_POST['id_producto'])){
                        if($data = $producto->LeerUnProducto()){
                            if($producto->setProducto($_POST['Nombre'])){
                                if($producto->setPrecio($_POST['Precio'])){
                                    if($producto->setIdsubcategoria($_POST['Subcategoria'])){
                                        if($producto->updateProducto()){
                                            $result['status'] = 1;
                                            $result['message'] = 'Producto modificado correctamente';
                                        }else{
                                            $result['exception'] = Database::getException();
                                        }
                                    }else{
                                        $result['message'] = 'Categoria incorrecta';
                                    }
                                }else{
                                    $result['message'] = 'Precio incorrecto';
                                }
                            }else{
                                $result['message'] = 'Producto incorrecto';
                            }
                        }else{
                            $result['message'] = 'Producto  inexistente';
                        }
                    }else{
                        $result['message'] = 'Producto incorrecto';
                    }
                break;
                case 'delete': 
                    if($producto->setIdproducto($_POST['id_producto'])){
                        if($data = $producto->LeerUnProducto()) {
                            if($producto->EliminarProducto()){
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


































?>