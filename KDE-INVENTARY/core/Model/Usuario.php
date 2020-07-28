<?php

Class Usuario extends Validator{
    private $id_usuario = null;
    private $nombre = null;
    private $apellido = null;
    private $usuario = null;
    private $clave = null;
    private $correo = null;
    private $telefono = null;
    private $id_tipo = null;
    private $id_estado = null;


     //metodos set
     public function setIdusuario($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_usuario = $value;
             return true;         
         }
         else{
             return false;
         }
     }


     public function setNombres($value)
     {
         if($this->validateAlphabetic($value,1,50))
         {
             $this->nombre = $value;
             return true;
         }
         else {
             return false;
         }
     }


     public function setApellidos($value)
     {
         if($this->validateAlphabetic($value,1,50))
         {
             $this->apellido = $value;
             return true;
         }
         else {
             return false;
         }
     }

     public function setUsuario($value)
     {
         if($this->validateAlphaNumeric($value,1,35))
         {
             $this->usuario = $value;
             return true;
         }
         else {
             return false;
         }
     }

     public function setClave($value)
     {
         if($this->validatePassword($value))
         {
             $this->clave = $value;
             return true;
         }
         else{
             return false;
         }
     }

          
    public function setCorreo($value)
    {
        if($this->validateEmail($value))
        {
            $this->correo = $value;
            return true;
        }
        else{
            return false;
        }
    }



    public function setTelefono($value)
    {
        if($this->validateAlphaNumeric($value,1,35))
        {
            $this->telefono = $value;
            return true;
        }
        else{
            return false;
        }
    }


    public function setIdtipousuario($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_tipo = $value;
            return true;         
        }
        else{
            return false;
        }
    }


    public function setIdestadousuario($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_estado = $value;
            return true;         
        }
        else{
            return false;
        }
    }
    
          //metodos get
          public function getIdusuario()
          {
              return $this->id_usuario;
          }
      
          public function getNombre()
          {
              return $this->nombre;
          }

          public function getApellido()
          {
              return $this->apellido;
          }

          public function getUsuario()
          {
              return $this->usuario;
          }

          public function getClave()
          {
              return $this->clave;
          }

          public function getCorreo()
          {
              return $this->correo;
          }

          public function getTelefono()
          {
              return $this->telefono;
          }


          public function getIdtipo()
          {
              return $this->id_tipo;
          }


          public function getIdestado()
          {
              return $this->id_estado;
          }

            
        //Metodos para gestionar la cuenta del usuario

        public function checkUsuario($correo)
        {
            $sql = 'SELECT id_usuario, id_estado FROM Usuario WHERE Correo = ?';
            $params = array($correo);
            if($data = database::getRow($sql, $params))
            {
                $this->id_usuario = $data['id_usuario'];
                $this->id_estado = $data['id_estado'];
                $this->correo = $correo;
                return true;
            }
            else 
            {
                return false;
            }
        }
        

        public function checkClave($clave)
        {
            $sql = 'SELECT Clave FROM Usuario WHERE id_usuario = ?';
            $params = array($this->id_usuario);
            $data = Database::getRow($sql, $params);
            if (password_verify($clave, $data['clave'])) {
                return true;
            } else {
                return false;
            }
        }

        //Leerusuarioslogin
        public function LeerUsuariosLogin()
        {
            $sql = 'SELECT id_usuario, nombre, apellido, Usuario, Correo, telefono, id_tipo, id_estado FROM Usuario';
            $params = null;
            return Database::getRows($sql, $params);
        }




          public function LeerUsuarios()
          {
              $sql = 'SELECT id_usuario, nombre, apellido, Usuario, Correo, telefono, tipo_Usuario.tipo, Estado_usuario.estado FROM Usuario 
              INNER JOIN tipo_Usuario USING (id_tipo) INNER JOIN Estado_usuario USING(id_estado) WHERE estado = ?';
              $params = array('Activo');;
              return Database::getRows($sql, $params);
          }



          
          public function LeerMeseros()
          {
              $sql = 'SELECT id_usuario, nombre, apellido, Usuario, Correo, telefono, tipo_Usuario.tipo, Estado_usuario.estado FROM Usuario 
              INNER JOIN tipo_Usuario USING (id_tipo) INNER JOIN Estado_usuario USING(id_estado) WHERE tipo = ?';
              $params = array('Mesero');;
              return Database::getRows($sql, $params);
          }


        //Busqueda 
        public function BuscarUsuarios($value)
        {
            $sql = 'SELECT id_usuario, nombre, apellido, Usuario, Correo, telefono, tipo_Usuario.tipo, Estado_usuario.estado FROM Usuario 
            INNER JOIN tipo_Usuario USING (id_tipo) INNER JOIN Estado_usuario USING(id_estado)
            WHERE nombre ILIKE ? OR apellido ILIKE ?  OR Usuario ILIKE ? OR Correo ILIKE ? ORDER BY nombre';
            $params = array("%$value%","%$value%","%$value%","%$value%");
            return Database::getRows($sql, $params);
        }

                
            public function createUsuario()
            {
                // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
                $hash = password_hash($this->clave, PASSWORD_DEFAULT);
                $sql = 'INSERT INTO  Usuario (nombre, apellido, Usuario, Correo, telefono, Clave) 
                VALUES (?, ?, ?, ?, ?, ?)';
                $params = array( $this->nombre, $this->apellido,  $this->usuario, $this->correo, $this->telefono, $hash);
                return Database::executeRow($sql, $params);
            }





        public function CrearUsuarios()
        {
            $sql = 'INSERT INTO  Usuario (nombre, apellido, Usuario, Correo, telefono, id_tipo, id_estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->apellido, $this->usuario, $this->correo, $this->telefono,$this->id_tipo,$this->id_estado);
            return Database::executeRow($sql, $params);
        }


        public function updateUsuarios()
        {
            $sql = 'UPDATE Usuario SET nombre = ?, apellido = ?,  Usuario = ?,  Correo = ?,  telefono = ?,  id_tipo = ? ,  id_estado = ?  WHERE id_usuario = ? ';
            $params = array($this->nombre, $this->apellido, $this->usuario, $this->correo, $this->telefono,$this->id_tipo,$this->id_estado, $this->id_usuario);
            return Database::executeRow($sql, $params);
        }

                
            public function editProfile()
            {
                $sql = 'UPDATE Usuario
                        SET nombre = ?, apellido = ?, Correo = ?, Usuario = ?, telefono = ?
                        WHERE id_usuario = ?';
                $params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $this->telefono, $this->id_usuario);
                return Database::executeRow($sql, $params);
            }





                    
            public function LeerUnUsuario()
            {
            $sql ='SELECT id_usuario, nombre, apellido, Usuario, Correo, telefono, id_tipo, id_estado FROM Usuario             
            where id_usuario = ?';
            $params = array($this->id_usuario);
            return Database::getRow($sql, $params);

            }




            public function EliminarUsurio()
            {
            $sql = 'DELETE FROM Usuario WHERE id_usuario = ?';
            $params = array($this->id_usuario);
            return Database::executeRow($sql, $params);
            }
            


            public function LeerEstados()
            {
                $sql = 'SELECT id_estado, Estado FROM Estado_usuario';
                $params = null;
                return Database::getRows($sql, $params);
            }


            public function LeerTipo()
            {
                $sql = 'SELECT id_tipo, Tipo FROM Tipo_usuario';
                $params = null;
                return Database::getRows($sql, $params);
            }











}












?>