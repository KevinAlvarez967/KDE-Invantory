<?php
    require_once('../../helpers/Database.php');
    require_once('../../helpers/validator.php');
    require_once('../../Model/Usuario.php');
    
    if(isset($_GET['action']))
    {
        session_start();
        $usuario = new Usuario;

        $result = array('status' => 0, 'message' => null, 'exception' => null);



        if(isset($_SESSION['id_usuario'])){
            switch($_GET['action']){
                case 'logout': 
                    if(session_destroy()) {
                        $result['status'] = 1;
                        $result['message'] = 'Sesion eliminada correctamente';
                    } else{
                        $result['exception'] = 'Ocurrio un problema al cerrar la sesion';
                    }
                break;
                case 'readAll':
                    if($result['dataset'] = $usuario->LeerUsuarios()){
                        $result['status'] = 1;
                    } else{
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                break;
                case 'readProfile':
                    if ($usuario->setIdusuario($_SESSION['id_usuario'])) {
                        if ($result['dataset'] = $usuario->LeerUnUsuario()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
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
                case 'readMesero':
                    if($result['dataset'] = $usuario->LeerMeseros()){
                        $result['status'] = 1;
                    } else{
                        $result['exception'] = 'No hay meseros registrados';
                    }
                break;
                case 'editProfile':
                    if ($usuario->setIdusuario($_SESSION['id_usuario'])) {
                        if ($usuario->LeerUnUsuario()) {
                            $_POST = $usuario->validateForm($_POST);
                            if($usuario->setNombres($_POST['Nombres1'])){
                                if($usuario->setApellidos($_POST['Apellidos1'])){
                                    if($usuario->setCorreo($_POST['patata'])){
                                        if($usuario->setUsuario($_POST['User'])){
                                            if($usuario->setTelefono($_POST['telefono1'])) {
                                                if($usuario->editProfile()) {
                                                    $_SESSION['Usuario'] = $usuario->getUsuario();
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
                exit('Accion no disponible log');

            }




        }else{
            switch($_GET['action']){
                case 'readAll':
                    if($result['dataset'] = $usuario->LeerUsuariosLogin()){
                        $result['status'] = 1;
                    } else{
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                break;
                case 'register':
                    $_POST = $usuario->validateForm($_POST);
                        if($usuario->setNombres($_POST['nombres'])){
                            if($usuario->setApellidos($_POST['apellidos'])){
                                if($usuario->setUsuario($_POST['usuario'])){
                                    if($usuario->setTelefono($_POST['telefono'])){
                                        if($usuario->setCorreo($_POST['correo'])){
                                            if($_POST['clave'] == $_POST['confirmarclave']){
                                                if($usuario->setClave($_POST['clave'])){
                                                    if($usuario->createUsuario()){
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Usuario registrado correctamente';
                                                    }else{
                                                            $result['exception'] = Database::getException();
                                                    }
                                                }else{
                                                    $result['exception'] = 'Clave menor de 6 caracteres';
                                                }
                                            }else{
                                                $result['exception'] = 'Claves no similares';
                                            }
                                        }else{
                                            $result['exception'] = 'Correo incorrecto';
                                        }
                                    }else{
                                        $result['exception'] = 'Telefono incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'usuario incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        }else{
                            $result['exception'] = 'Usuarios incorrectos';
                        }
                break;
                case 'Login':
                    $_POST = $usuario->validateForm($_POST);
                        if ($usuario->checkUsuario($_POST['email'])) {
                            if ($usuario->checkClave($_POST['Clave'])) {
                                $_SESSION['id_usuario'] = $usuario->getIdusuario();
                                $_SESSION['Usuario'] = $usuario->getUsuario();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                $result['exception'] = 'Clave incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Usuario incorrecto';
                        }
                break;
                default:
                    exit('Acción no disponible');




            }


        }



 // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
 header('content-type: application/json; charset=utf-8');
 // Se imprime el resultado en formato JSON y se retorna al controlador.
 print(json_encode($result));


    }else{
    exit('Recurso denegado');
}













?>