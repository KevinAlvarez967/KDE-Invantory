<?php

Class Sucursal extends Validator{
    private $id_sucursal = null;
    private $nombre = null;
    private $direccion = null;
    private $telefono = null;


     //metodos set
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


     public function setNombre($value)
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

    public function setDireccion($value)
    {
        if($this->validateAlphaNumeric($value,1,100))
        {
            $this->direccion = $value;
            return true;
        }
        else {
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


    
    //metodos get
    public function getIdsucursal()
    {
        return $this->id_sucursal;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }




}









?>