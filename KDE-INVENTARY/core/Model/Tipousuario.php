<?php

Class Tipousuario extends Validator {

    private $id_tipo = null;
    private $estado = null;

    

    //metodos set
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
    
    
    public function setEstado($value)
     {
         if($this->validateAlphabetic($value,1,30))
         {
             $this->estado = $value;
             return true;
         }
         else {
             return false;
         }
     }


    
        //metodos get
        public function getIdtipousuario()
        {
            return $this->id_tipo;
        }
        
        public function getEstado()
        {
            return $this->estado;
        }
        























}











?>