<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/Validator.php');
require_once('../../Model/Usuariosgene.php');


if(isset($_GET['action']))
{ 
    session_start();

    $usuarios = new Usuariosgene;

    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_usuario_geren'])){ 
        switch ($_GET['action']){
            case 'LogOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
                case 'readProfile':
                    if ($usuarios->setIdusuariogeren($_SESSION['id_usuario_geren'])) {
                        if ($result['dataset'] = $usuarios->LeerUnUsuario()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
                case 'readAll':
                    if($result['dataset'] = $usuarios->readAllUsuarios()){
                        $result['status'] = 1;
                    } else{
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                break;
                case 'editProfile':
                    if ($usuarios->setIdusuariogeren($_SESSION['id_usuario_geren'])) {
                        if ($usuarios->LeerUnUsuario()) {
                            $_POST = $usuarios->validateForm($_POST);
                            if($usuarios->setNombres($_POST['Nombres1'])){
                                if($usuarios->setApellidos($_POST['Apellidos1'])){
                                    if($usuarios->setCorreo($_POST['email'])){
                                        if($usuarios->setUsuario($_POST['User'])){
                                            if($usuarios->setTelefono($_POST['telefono1'])) {
                                                if($usuarios->editProfile()) {
                                                    $_SESSION['Usuario'] = $usuarios->getUsuario();
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Perfil modificado correctamente';
                                                }else{
                                                    $result['exception'] = Database::getException();
                                                }
                                            }else{
                                                $result['exception'] = 'telefono incorrecto';
                                            }
                                        }else{
                                            $result['exception'] = 'Usuario incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Apellidos incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Nombres incorrecto';
                            }
                         } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                     } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                break;
                default:
                exit('Acción no disponible dentro de la sesión');

         }


    }else{
        switch($_GET['action']){
            case 'readAll':
                if($result['dataset'] = $usuarios->readAllUsuarios()){
                    $result['status'] = 1;
                } else{
                    $result['exception'] = 'No hay usuarios registrados';
                }
            break;
            case 'register':
                $_POST = $usuarios->validateForm($_POST);                             
                                if($usuarios->setNombres($_POST['nombres'])){
                                    if($usuarios->setApellidos($_POST['apellidos'])){
                                        if($usuarios->setCorreo($_POST['correo'])){
                                            if($usuarios->setTelefono($_POST['telefono'])){
                                                if($usuarios->setUsuario($_POST['usuario'])){
                                                if($_POST['clave'] == $_POST['confirmarclave']){
                                                    if($usuarios->setPass($_POST['clave'])){
                                                        if($usuarios->CrearUsuario()){
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Usuario registrado correctamente';
                                                        } else{
                                                            $result['exception'] = 'Ocurrio un problema al registrar el Usuario';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Las claves no coinciden';
                                                }
                                            } else {
                                                $result['exception'] = 'Usuario incorrecto';
                                            }
                                            } else {
                                                $result['exception'] = ' El telefono es incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'El correo es incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Los apellidos son incorrectos';
                                    }
                                } else{
                                    $result['exception'] = 'Los nombres son incorrectos';
                                }                                                                
                    break;
                    case 'Login':
                        $_POST = $usuarios->validateForm($_POST);
                            if ($usuarios->checkUsuario($_POST['Correo'])) {
                                if ($usuarios->checkClave($_POST['Clave'])) {
                                    $_SESSION['id_usuario_geren'] = $usuarios->getIdusuariogeren();
                                    $_SESSION['correo'] = $usuarios->getCorreo();
                                    $result['status'] = 1;
                                    $result['message'] = 'Autenticación correcta';
                                } else {
                                    $result['exception'] = 'Clave incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                    break;
                    
                    default:
                    exit('Acción no disponible fuera de la sesión');

        }

    }
    header('content-type: application/json; charset=utf-8');

    print(json_encode($result));
    


} else {
    exit('Recurso denegado');
}












?>


