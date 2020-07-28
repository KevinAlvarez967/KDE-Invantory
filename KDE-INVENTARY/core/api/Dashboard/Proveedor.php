<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Proveedor.php');






if(isset($_GET['action'])){

    session_start();

    $proveedor = new Proveedor;

    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_usuario_geren'])){
        switch($_GET['action']){
            case 'readAll':
                if ($result['dataset'] = $proveedor->LeerProvedores()) {
                     $result['status'] = 1;
                 } else {
                    $result['exception'] = 'No se encontraron proveedores';
                 }
             break;
             case 'search':
                $_POST = $proveedor->validateForm($_POST);
                if($_POST['search'] != ''){
                    if($result['dataset'] = $proveedor->BuscarProveedor($_POST['search'])){
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
                $_POST = $proveedor->validateForm($_POST);
                    if($proveedor->setNombres($_POST['Nombre'])){
                        if($proveedor->setApellidos($_POST['Apellidos'])){
                            if($proveedor->setCorreo($_POST['Correo'])){
                                if($proveedor->setTelefono($_POST['telefono'])){
                                    if($proveedor->setDireccion($_POST['Direccion'])){
                                            if($proveedor->CrearProveedor()){
                                                $result['status'] = 1;
                                                $result['message'] = 'Proveedor creado correctamente';
                                            } else{
                                                $result['exception'] = Database::getException();
                                            }
                                    }else{
                                        $result['exception'] = 'Direccion incorrecta';
                                    }
                                }else{
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Correo incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    }else{
                        $result['exception'] = 'Nombres incorrectos';
                    }
                break;
                case 'readOne':
                    if($proveedor->setIdProveedor($_POST['id_proveedor'])){
                        if($result['dataset'] = $proveedor->LeerUnProveedor()){
                            $result['status'] = 1;
                        } else{
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    } else{
                        $result['exception'] = 'Proveedor incorrecto';
                    }
                break;
                case 'update':
                    $_POST = $proveedor->validateForm($_POST);
                    if($proveedor->setIdProveedor($_POST['id_proovedor'])){
                        if($data = $proveedor->LeerUnProveedor()){
                            if($proveedor->setNombres($_POST['Nombre'])){
                                if($proveedor->setApellidos($_POST['Apellidos'])){
                                    if($proveedor->setCorreo($_POST['Correo'])){
                                        if($proveedor->setTelefono($_POST['telefono'])){
                                            if($proveedor->setDireccion($_POST['Direccion'])){
                                                    if($proveedor->updateProveedor()){
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Proveedor modificado correctamente';
                                                    } else{
                                                        $result['exception'] = Database::getException();
                                                    }
                                            }else{
                                                $result['exception'] = 'Direccion incorrecta';
                                            }
                                        }else{
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Apellidos incorrectos';
                                }
                            }else{
                                $result['exception'] = 'Nombres incorrectos';
                            }
                        }else{
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    }else{
                        $result['exception'] = 'Proveedor incorrecto';
                    }
                break;
                case 'delete': 
                    if($proveedor->setIdProveedor($_POST['id_proveedor'])){
                        if($data = $proveedor->LeerUnProveedor()) {
                            if($proveedor->EliminarProveedor()){
                                $result['status'] = 1;
                                $result['message'] = 'Proveedor eliminado correctamente';                               
                            } else{
                                $result['exception'] = Database::getException();
                            } 
                        } else{
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    } else{
                        $result['exception'] = 'Proveedor incorrecto';
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