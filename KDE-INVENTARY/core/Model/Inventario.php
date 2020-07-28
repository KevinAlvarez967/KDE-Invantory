<?php 

Class Inventario extends Validator {
    private $id_inventario = null;
    private $stock = null;
    private $peso = null;
    private $id_sucursal = null;
    private $id_producto = null;



//metodos set
     public function setIdinventario($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_inventario = $value;
             return true;         
         }
         else{
             return false;
         }
     }


     public function setStock($value)
     {
         if($this->validateMoney($value)){
             $this->stock = $value;
             return true;
         }
         else {
             return false;
         }
     }


     public function setPeso($value)
     {
         if($this->validateAlphaNumeric($value,1,50))
         {
             $this->peso = $value;
             return true;
         }
         else {
             return false;
         }
     }


     public function setIdsucursal($value)
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


    //metodos get
    public function getIdinventario()
    {
        return $this->id_inventario;
    }


    public function getStock()
    {
        return $this->stock;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getIdsucursal()
    {
        return $this->id_sucursal;
    }

    public function getIdproducto()
    {
        return $this->id_producto;
    }














}







?>