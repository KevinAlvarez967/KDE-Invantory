<?php

/*
*   Clase para realizar las operaciones en la base de datos.
*/

class Database
{
    //Propiedaddes de la clase
    private static $connection = null;
    private static $statement = null;
    private static $error = null;
    private static $id = null;




    //Metodo para establecer conexion
    private function connect()
    {
        $server = 'localhost';
        $database = 'YesterdaySV';
        $username = 'postgres';
        $password = '1234';

        // Se controlan las excepciones al momento de establecer conexión con el servidor de base de datos.
        try
        {
            // Se crea la conexión mediante la extensión PDO y el controlador para PostgreSQL.
            self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username, $password);
        }
        catch(PDOException $error)
        {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            // Se obtiene el error personalizado y se finaliza el script.
            exit(self::getException());
        }
    }





    //anular conexion a base de datos
    private function desconnect()
    {

        //Anulando conexion con base de datos
        self::$connection = null;

        //arreglo para obtener informacion del error
        $error = self::$statement->errorInfo();

        //verificando algun error en sentencia sql
        if($error[0] != '00000')
        {
            self::setException($error[0], $error[2]);
        }
    }



   // *   Método para ejecutar las siguientes sentencias SQL: insert, update y delete.

   public static function executeRow($query, $values)
   {
       self::connect();
       self::$statement = self::$connection->prepare($query);
       $state = self::$statement->execute($values);
       self::$id = self::$connection->lastInsertId();
       self::desconnect();
       return $state;
   }



   //*   Método para obtener un registro de una sentencia SQL tipo SELECT.
   public static function getRow($query, $values)
   {
       self::connect();
       self::$statement = self::$connection->prepare($query);
       self::$statement->execute($values);
       self::desconnect();
       return self::$statement->fetch(PDO::FETCH_ASSOC);
   }


   //*   Método para obtener todos los registros de una sentencia SQL tipo SELECT.
   public static function getRows($query, $values)
   {
       self::connect();
       self::$statement = self::$connection->prepare($query);
       self::$statement->execute($values);
       self::desconnect();
       return self::$statement->fetchAll(PDO::FETCH_ASSOC);
   }



   //*   Método para obtener el valor de la llave primaria del último registro insertado.
    public static function getLastRowId()
        {
            return self::$id;
        }


        //*   Método para establecer un mensaje de error personalizado al ocurrir una excepción.
        private static function setException($code, $message)
        {
            // Se compara el código del error para establecer un error personalizado.
            // Si el código no coincide con ninguno de los establecidos, se asigna el mensaje original del error.
            switch ($code) {
                case '7':
                    self::$error = 'Existe un problema al conectar con el servidor';
                    break;
                case '42703':
                    self::$error = 'Nombre de campo desconocido';
                    break;
                case '23505':
                    self::$error = 'Dato duplicado, no se puede guardar';
                    break;
                case '42P01':
                    self::$error = 'Nombre de tabla desconocido';
                    break;
                case '23503':
                    self::$error = 'Registro ocupado, no se puede eliminar';
                    break;
                default:
                    self::$error = $message;
            }
        }

        //*   Método para obtener un error personalizado cuando ocurre una excepción.
        public static function getException()
        {
            return self::$error;
        }


}













?>