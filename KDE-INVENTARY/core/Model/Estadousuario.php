<?php

Class Estadousuario extends Validator{
    private $id_estado = null;
    private $estado = null;

    
       //metodos set
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
       public function getIdestado()
       {
           return $this->id_estado;
       }
       
       public function getEstado()
       {
           return $this->estado;
       }
       

















}












?>