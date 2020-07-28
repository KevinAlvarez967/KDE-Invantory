<?php


Class Usuariosgene extends Validator{
    private $id_usuariogeren = null;
    private $nombres = null;
    private $apellidos  = null;
    private $usuario = null;
    private $pass = null;
    private $correo = null;
    private $telefono = null;
    private $id_tipogeren = null;
    private $id_estadogeren = null;
    private $id_sucursal = null;


     //metodos set
     public function setIdusuariogeren($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_usuariogeren = $value;
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
             $this->nombres = $value;
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
             $this->apellidos = $value;
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


     public function setPass($value)
    {
        if($this->validatePassword($value))
        {
            $this->pass = $value;
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


    public function setIdtipogeren($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_tipogeren = $value;
             return true;         
         }
         else{
             return false;
         }
     }



     public function setIdestadogeren($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_estadogeren = $value;
             return true;         
         }
         else{
             return false;
         }
     }




     public function setIdSucursal($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_sucursal = $value;
             return true;         
         }
         else{
             return false;
         }
     }


       //metodos get
    public function getIdusuariogeren()
    {
        return $this->id_usuariogeren;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }


    public function getPass()
    {
        return $this->pass;
    }


    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getIdtipogeren()
    {
        return $this->id_tipogeren;
    }

    public function getIdestadogeren()
    {
        return $this->id_estadogeren;
    }

    public function getIdsucursal()
    {
        return $this->id_sucursal;
    }
   

//operaciones SCRUD
public function checkUsuario($correo)
{
    $sql = 'SELECT id_usuario_Geren, id_estado FROM Usuarios_Gere WHERE Correo = ?';
    $params = array($correo);
    if($data = database::getRow($sql, $params))
    {
        $this->id_usuariogeren = $data['id_usuario_geren'];
        $this->id_estadogeren = $data['id_estado'];
        $this->correo = $correo;
        return true;
    }
    else 
    {
        return false;
    }
}



public function checkClave($pass)
{
    $sql = 'SELECT pass FROM Usuarios_Gere WHERE id_usuario_geren = ?';
    $params = array($this->id_usuariogeren);
    $data = Database::getRow($sql, $params);
    if (password_verify($pass, $data['pass'])) {
        return true;
    } else {
        return false;
    }
}




        public function LeerUnUsuario()
        {
        $sql = 'SELECT id_usuario_Geren, Nombres, Apellidos, Usuario, Pass, Correo, telefono, id_tipo, id_estado, id_sucursal
        From Usuarios_Gere
        WHERE id_usuario_Geren = ?    ';
        $params = array($this->id_usuariogeren);
        return Database::getRow($sql,$params);
        }







    public function readAllUsuarios()
    {
        $sql = 'SELECT id_usuario_Geren, Nombres, Apellidos, Usuario, Pass, Correo,Usuarios_Gere.telefono, tipogeren, estadogeren, sucursal.nombre
        From Usuarios_Gere
        INNER JOIN Tipo_u_Geren USING(id_tipo) INNER JOIN Estado_u_Geren USING(id_estado) INNER JOIN sucursal USING(id_sucursal)';
        $params = null;
        return database::getRows($sql, $params);
    } 



    public function CrearUsuario()
    {
        $hash = password_hash($this->pass, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO Usuarios_Gere (Nombres, Apellidos, Usuario, telefono, Correo, Pass, id_estado) 
        VALUES (?,?,?,?,?,?,?)';
        $params = array($this->nombres, $this->apellidos, $this->usuario, $this->telefono , $this->correo, $hash, 1);
        return Database::executeRow($sql, $params);
    }
    


    public function editProfile()
    {
        $sql = 'UPDATE Usuarios_Gere
                SET Nombres = ?, Apellidos = ?, Correo = ?, Usuario = ?, telefono = ?
                WHERE id_usuario_Geren = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->usuario, $this->telefono, $this->id_usuariogeren);
        return Database::executeRow($sql, $params);
    }














}










?>