<?php

Class Detcompra extends Validator{
    private $id_detcompra = null;
    private $cantidad = null;
    private $precio = null;
    private $id_producto = null;
    private $id_compra = null;

    
    //metodos set
    public function setIddetcompra($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_detcompra = $value;
            return true;         
        }
        else{
            return false;
        }
    }

    public function setCantidad($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->cantidad = $value;
            return true;
        }
        else{
            return false;
        }
    }

    public function setPrecio($value)
    {
        if($this->validateMoney($value)){
            $this->precio = $value;
            return true;
        }
        else {
            return false;
        }
    }

    public function setIdproducto($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_producto = $value;
            return true;         
        }
        else{
            return false;
        }
    }


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

//Metodos SCRUD




    public function CrearDetalleCompra()
    {
        $sql = 'INSERT INTO  Det_compra  (id_compra, Cantidad, Precio, id_producto) 
        VALUES (?, ?, ?, ?)';
        $params = array($this->id_compra, $this->cantidad, $this->precio, $this->id_producto);
        return Database::executeRow($sql, $params);
    }
    

    public function LeerUnaCompra()
    {
    $sql ='SELECT id_Det_compra, Cantidad, Precio, id_producto, id_compra FROM Det_compra 
    where id_compra = ?';
    $params = array($this->id_compra);
    return Database::getRow($sql, $params);
    
    }
    

    public function LeerProductos()
    {
        $sql = 'SELECT producto, producto.precio, Sub_categoria.sub_categoria, Det_compra.cantidad FROM Det_compra INNER JOIN Producto USING(id_producto)
        INNER JOIN Sub_categoria USING (id_subcategoria) Where id_compra = ?';
        $params = array($this->id_compra);
        return Database::getRows($sql, $params);
    }














}



















?>