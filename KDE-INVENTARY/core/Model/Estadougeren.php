<?php


Class Estadougeren extends Validator {

    private $id_estadogeren = null;
    private $estadogeren = null;


    //metodos set
    public function setIdestadogeren($value)
{
    if($this->validateNaturalNumber($value))
    {
        $this->id_estadogeren = $value;
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
         $this->estadogeren = $value;
         return true;
     }
     else {
         return false;
     }
 }

//metodos get
public function getIdestadogeren()
{
    return $this->id_estadogeren;
}

public function getEstado()
{
    return $this->estadogeren;
}



















}











?>