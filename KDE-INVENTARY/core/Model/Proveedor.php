<?php

Class Proveedor extends Validator 
{
    private $id_proveedor = null;
    private $nombre = null;
    private $apellido = null;
    private $correo = null;
    private $telefono = null;
    private $direccion = null;


    //metodos para asignar valores a los atributos
public function setIdProveedor($value)
{
    if($this->validateNaturalNumber($value))
    {
        $this->id_proveedor = $value;
        return true;         
    }
    else{
        return false;
    }
}


public function setNombres($value)
 {
     if($this->validateAlphabetic($value,1,30))
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
     if($this->validateAlphabetic($value,1,40))
     {
         $this->apellido = $value;
         return true;
     }
     else {
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
     if($this->validateNaturalNumber($value))
     {
         $this->telefono = $value;
         return true;
     }
     else{
         return false;
     }
 }




 public function setDireccion($value)
 {
     if($this->validateAlphanumeric($value, 1, 150))
     {
         $this->direccion = $value;
         return true;
     }
     else {
         return false;
     }
 }



//Metodos para obtener datos a los atributos

public function getIdProveedor()
{
    return $this->id_proveedor;
}



public function getNombres()
{
    return $this->nombre;
}

public function getApellidos()
{
    return $this->apellido;
}


public function getCorreo()
{
    return $this->correo;
}

public function getTelefono()
{
    return $this->telefono;
}


public function getDireccion()
{
    return $this->direccion;
}




//Metodos para operaciones SCRUD




public function LeerProvedores()
{
    $sql = 'SELECT id_proveedor, Nombre, Apellido, Correo, Telefono, Direccion from Proveedor ORDER BY Nombre';
    $params = null;
    return Database::getRows($sql, $params);
}

//Busqueda 
public function BuscarProveedor($value)
{
    $sql = 'SELECT id_proveedor, Nombre, Apellido, Correo, Telefono, Direccion from Proveedor
    WHERE Nombre ILIKE ? OR Apellido ILIKE ?  OR Correo ILIKE ? OR Direccion ILIKE ? ORDER BY Nombre';
    $params = array("%$value%","%$value%","%$value%","%$value%");
    return Database::getRows($sql, $params);
}



public function CrearProveedor()
{
    $sql = 'INSERT INTO  Proveedor (Nombre, Apellido, Correo, Telefono, Direccion) 
    VALUES (?, ?, ?, ?, ?)';
    $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->direccion);
    return Database::executeRow($sql, $params);
}

public function updateProveedor()
{
    $sql = 'UPDATE Proveedor SET Nombre = ?, Apellido = ?,  Correo = ?,  Telefono = ?,  Direccion = ? WHERE id_proveedor = ? ';
    $params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->direccion, $this->id_proveedor);
    return Database::executeRow($sql, $params);
  

}


public function LeerUnProveedor()
{
$sql ='SELECT id_proveedor, Nombre, Apellido, Correo, Telefono, Direccion from Proveedor
where id_proveedor = ?';
$params = array($this->id_proveedor);
return Database::getRow($sql, $params);

}





public function EliminarProveedor()
{
$sql = 'DELETE FROM Proveedor WHERE id_proveedor = ?';
$params = array($this->id_proveedor);
return Database::executeRow($sql, $params);
}







}























?>