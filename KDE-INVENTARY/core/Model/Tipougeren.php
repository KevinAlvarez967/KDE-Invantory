<?php

Class Tipougeren extends Validator{

    private $id_tipogeren = null;
    private $tipogeren = null;


       //metodos set
       public function setIdTipogeren($value)
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
       
       
       public function setTipo($value)
        {
            if($this->validateAlphabetic($value,1,30))
            {
                $this->tipogeren = $value;
                return true;
            }
            else {
                return false;
            }
        }
       
       //metodos get
       public function getIdtipogeren()
       {
           return $this->id_tipogeren;
       }
       
       public function getTipo()
       {
           return $this->tipogeren;
       }
       






}









?>