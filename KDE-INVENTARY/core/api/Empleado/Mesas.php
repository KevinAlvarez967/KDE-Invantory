<?php
require_once('../../helpers/Database.php');
require_once('../../helpers/validator.php');
require_once('../../Model/Mesa.php');




if(isset($_GET['action'])){
    session_start();

    $Mesa = new Mesa;

    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if(isset($_SESSION['id_usuario'])){
        switch($_GET['action']){
                case 'readAll':
                    if ($result['dataset'] = $Mesa->LeerMesas()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se encontraron Mesas disponibles';
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






