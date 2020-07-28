<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Usuario.php');




if(isset($_GET['action'])){

    session_start();

    $usuario = new Usuario;

    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_usuario_geren'])){
        switch($_GET['action']){
            case 'readAll':
                if ($result['dataset'] = $usuario->LeerUsuarios()) {
                     $result['status'] = 1;
                 } else {
                    $result['exception'] = 'No se encontraron Usuarios';
                 }
             break;
             case 'readEstados':
                if ($result['dataset'] = $usuario->LeerEstados()) {
                     $result['status'] = 1;
                 } else {
                    $result['exception'] = 'No se encontraron Estados';
                 }
             break;
             case 'readTipos':
                if ($result['dataset'] = $usuario->LeerTipo()) {
                     $result['status'] = 1;
                 } else {
                    $result['exception'] = 'No se encontraron Tipo';
                 }
             break;
             case 'search':
                $_POST = $usuario->validateForm($_POST);
                if($_POST['search'] != ''){
                    if($result['dataset'] = $usuario->BuscarUsuarios($_POST['search'])){
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
                $_POST = $usuario->validateForm($_POST);
                    if($usuario->setNombres($_POST['nombres'])){
                        if($usuario->setApellidos($_POST['apellidos'])){
                            if($usuario->setUsuario($_POST['usuario'])){
                                if($usuario->setTelefono($_POST['telefono'])){
                                    if($usuario->setCorreo($_POST['correo'])){
                                        if(isset($_POST['Tipo'])){
                                            if($usuario->setIdtipousuario($_POST['Tipo'])){
                                                if(isset($_POST['Estado'])){
                                                    if($usuario->setIdestadousuario($_POST['Estado'])){
                                                        if($usuario->CrearUsuarios()){
                                                            $result['status'] = 1;
                                                            $result['message'] = 'usuario creado correctamente';
                                                        }else{
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    }else{
                                                        $result['exception'] = 'Estado incorrecto';
                                                    }
                                                }else{
                                                    $result['exception'] = 'Seleccione un Estado ';
                                                }
                                            }else{
                                                $result['exception'] = 'Tipo incorrecto';
                                            }
                                        }else{
                                            $result['exception'] = 'Seleccione un tipo ';
                                        }
                                    }else{
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    }else{
                        $result['exception'] = 'Nombres incorrectos';
                    }
                break;
                case 'readOne':
                    if($usuario->setIdusuario($_POST['id_usuario'])){
                        if($result['dataset'] = $usuario->LeerUnUsuario()){
                            $result['status'] = 1;
                        } else{
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else{
                        $result['exception'] = 'Usuario incorrecto';
                    }
                break;
                case 'update':
                    $_POST = $usuario->validateForm($_POST);
                    if($usuario->setIdusuario($_POST['id_usuario'])){    
                        if($data = $usuario->LeerUnUsuario()){            
                            if($usuario->setNombres($_POST['nombres'])){
                                if($usuario->setApellidos($_POST['apellidos'])){
                                    if($usuario->setUsuario($_POST['usuario'])){
                                        if($usuario->setTelefono($_POST['telefono'])){
                                            if($usuario->setCorreo($_POST['correo'])){
                                                if(isset($_POST['Tipo'])){
                                                    if($usuario->setIdtipousuario($_POST['Tipo'])){
                                                        if(isset($_POST['Estado'])){
                                                            if($usuario->setIdestadousuario($_POST['Estado'])){
                                                                if($usuario->updateUsuarios()){
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'usuario creado correctamente';
                                                                }else{
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            }else{
                                                                $result['exception'] = 'Estado incorrecto';
                                                            }
                                                        }else{
                                                            $result['exception'] = 'Seleccione un Estado ';
                                                        }
                                                    }else{
                                                        $result['exception'] = 'Tipo incorrecto';
                                                    }
                                                }else{
                                                    $result['exception'] = 'Seleccione un tipo ';
                                                }
                                            }else{
                                                $result['exception'] = 'Correo incorrecto';
                                            }
                                        }else{
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Usuario incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Apellidos incorrectos';
                                }
                            }else{
                                $result['exception'] = 'Nombres incorrectos';
                            }
                        }else{
                            $result['exception'] = 'Usuario inexistente';
                        }
                    }else{
                        $result['exception'] = 'Usuario incorrecto';
                    }
                break;
                case 'delete': 
                    if($usuario->setIdusuario($_POST['id_usuario'])){
                        if($data = $usuario->LeerUnUsuario()) {
                            if($usuario->EliminarUsurio()){
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';                               
                            } else{
                                $result['exception'] = Database::getException();
                            } 
                        } else{
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else{
                        $result['exception'] = 'Usuario incorrecto';
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
     
}































?>