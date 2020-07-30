<?php


Class Compra extends Validator{
    private $id_compra = null;
    private $fecha_compra = null;
    private $total_compra = null;
    private $id_proveedor = null;

//metodos set
public function setIdcompra($value)
{
    if($this->validateNaturalNumber($value))
    {
        $this->id_compra = $value;
        return true;         
    }
    else{
        return false;
    }
}

public function setfecha($value)
{
    if($this->validateString($value, 1, 50))
    {
        $this->fecha_compra = $value;
        return true;

    }
    else{
        return false;
    }
}


public function setTotal($value)
{
    if($this->validateMoney($value)){
        $this->total_compra = $value;
        return true;
    }
    else {
        return false;
    }
}

public function setIdproveedor($value)
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

 //metodos get
 public function getIdcompra()
 {
     return $this->id_compra;
 }

 public function getFechacompra()
 {
     return $this->fecha_compra;
 }


 public function getTotalcompra()
 {
     return $this->total_compra;
 }

 public function getIdproveedor()
 {
     return $this->id_proveedor;
 }

 




 public function LeerCompras()
 {
     $sql = 'SELECT  id_compra, fecha_compra, proveedor.nombre, proveedor.apellido from compra
     INNER JOIN proveedor USING(id_proveedor)   ';
     $params = null;
     return Database::getRows($sql, $params);
 }



 public function LeerUnaCompra()
 {
     $sql = 'SELECT id_compra, fecha_compra, Total_compra, proveedor.nombre, proveedor.apellido from Compra INNER JOIN
     proveedor USING(id_proveedor)
     WHERE id_compra = ?';
     $params = array($this->id_compra);
     return Database::getRow($sql, $params);
 }



 public function CrearCompra()
 {
     $sql = 'INSERT INTO  Compra (fecha_compra, id_proveedor) 
     VALUES (?, ?)';
     $params = array($this->fecha_compra, $this->id_proveedor );
     return Database::executeRow($sql, $params);
 }

 public function ActualizarCompra()
 {
     $sql = 'UPDATE  Compra SET fecha_compra = ?, id_proveedor = ? WHERE  id_compra = ?';
     $params = array($this->fecha_compra, $this->id_proveedor, $this->id_compra );
     return Database::executeRow($sql, $params);
 }


    //Busqueda 
    public function BuscarCompra($value)
    {
        $sql = 'SELECT id_compra, fecha_compra, Total_compra, proveedor.nombre, proveedor.apellido from Compra INNER JOIN
        proveedor USING(id_proveedor) WHERE fecha_compra ILIKE ? OR proveedor.nombre ILIKE ? OR proveedor.apellido ILIKE ? ';
        $params = array("%$value%","%$value%","%$value%");
        return Database::getRows($sql, $params);
    }



    public function EliminarCompra()
    {
    $sql = 'DELETE FROM Compra WHERE id_compra = ?';
    $params = array($this->id_compra);
    return Database::executeRow($sql, $params);
    }
    






 



}



















?>