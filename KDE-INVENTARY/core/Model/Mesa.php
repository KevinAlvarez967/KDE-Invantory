<?php

Class Mesa extends Validator{

private $id_mesa = null;
private $numero_mesa = null;
private $estado = null;
private $Tamanio = null;



    //metodos set
    public function setIdmesa($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_mesa = $value;
            return true;         
        }
        else{
            return false;
        }
    }

    public function setNumeromesa($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->numero_mesa = $value;
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

     public function setTamanio($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->Tamanio = $value;
             return true;         
         }
         else{
             return false;
         }
     }



       //metodos get
       public function getIdmesa()
       {
           return $this->id_mesa;
       }


       public function getNumeromesa()
       {
           return $this->numero_mesa;
       }
       

       
       public function getEstado()
       {
           return $this->estado;
       }

       public function getTamanio()
       {
           return $this->Tamanio;
       }
       


            
        public function LeerMesas()
        {
            $sql = 'SELECT id_mesa, Numero_mesa, Estado from Mesa WHERE Estado = ?';
            $params = array('Disponible');
            return Database::getRows($sql, $params);
        }




















}










?>