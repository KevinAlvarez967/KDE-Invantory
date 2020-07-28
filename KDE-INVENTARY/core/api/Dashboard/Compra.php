<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Compra.php');
require_once('../../Model/Proveedor.php');


if(isset($_GET['action'])){
    session_start();
        $compra = new Compra;
        $proveedores = new Proveedor;
        $result = array('status' => 0, 'message' => null, 'exception' => null);

        if(isset($_SESSION['id_usuario_geren'])){
            switch($_GET['action']){
                case 'readAll':
                    if ($result['dataset'] = $compra->LeerCompras()) {
                         $result['status'] = 1;
                     } else {
                        $result['exception'] = 'No se encontraron compras disponibles';
                     }
                 break;
                 case 'readProveedores':
                    if ($result['dataset'] = $proveedores->LeerProvedores()) {
                         $result['status'] = 1;
                     } else {
                        $result['exception'] = 'No se encontraron proveedores disponibles';
                     }
                 break;
                 case 'search':
                    $_POST = $compra->validateForm($_POST);
                    if($_POST['search'] != ''){
                        if($result['dataset'] = $compra->BuscarCompra($_POST['search'])){
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
                 case 'create':
                    $_POST = $compra->validateForm($_POST);
                        if($compra->setfecha($_POST['Fecha'])){
                            if($compra->setIdproveedor($_POST['Proveedor'])){
                                if($compra->CrearCompra()){
                                    $result['status'] = 1;
                                    $result['message'] = 'Compra creada correctamente';
                                } else{
                                    $result['exception'] = Database::getException();
                                }
                            }else{
                                $result['exception'] = 'Fecha incorrecta';
                            }
                        }else{
                            $result['exception'] = 'Proveedor incorrecto';
                        }
                    break;
                    case 'readOne':
                        if($compra->setIdcompra($_POST['id_compra'])){
                            if($result['dataset'] = $compra->LeerUnaCompra()){
                                $result['status'] = 1;
                            } else{
                                $result['exception'] = 'Compra inexistente';
                            }
                        } else{
                            $result['exception'] = 'Compra incorrecta';
                        }
                    break;
                    case 'update':
                        $_POST = $compra->validateForm($_POST);
                            if($compra->setIdcompra($_POST['id_compra'])){
                                if($data= $compra->LeerUnaCompra()){
                                    if($compra->setfecha($_POST['Fecha'])){
                                        if($compra->setIdproveedor($_POST['Proveedor'])){
                                            if($compra->ActualizarCompra()){
                                                $result['status'] = 1;
                                                $result['message'] = 'Compra modificada correctamente';
                                            }else{
                                                $result['exception'] = Database::getException();
                                            }
                                        }else{
                                            $result['exception'] = 'Proveedor incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Fecha incorrecta';
                                    }
                                }else{
                                    $result['exception'] = 'Compra inexistente';
                                }
                            }else{
                                $result['exception'] = 'Compra incorrecta';
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