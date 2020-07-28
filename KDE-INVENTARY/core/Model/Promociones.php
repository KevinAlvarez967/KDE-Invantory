<?php

Class Promociones extends Validator{
    private $id_promociones = null;
    private $descripcion = null;
    private $codigo = null;
    private $descuento = null;
    private $estado_prom = null;



    //metodos set
    public function setIdpromociones($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_promociones = $value;
            return true;         
        }
        else{
            return false;
        }
    }


    public function setDescripcion($value)
    {
        if($this->validateAlphaNumeric($value,1,50))
        {
            $this->descripcion = $value;
            return true;
        }
        else {
            return false;
        }
    }


    public function setCodigo($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->codigo = $value;
            return true;         
        }
        else{
            return false;
        }
    }

    public function setDescuento($value)
    {
        if($this->validateMoney($value)){
            $this->descuento = $value;
            return true;
        }
        else {
            return false;
        }
    }


    
    public function setEstado($value)
    {
         if($this->validateAlphabetic($value,1,30))
         {
             $this->estado_prom = $value;
             return true;
         }
         else {
             return false;
         }
     }

    //metodos get
    public function getIdpromociones()
    {
        return $this->id_promociones;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getEstado()
    {
        return $this->estado_prom;
    }














}













?>