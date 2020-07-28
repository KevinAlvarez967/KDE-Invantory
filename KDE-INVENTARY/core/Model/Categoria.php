<?php 

Class Categoria extends Validator{

private $id_categoria = null;
private $categoria = null;


//metodos set 
public function setIdCategoria($value)
{
    if($this->validateNaturalNumber($value))
    {
        $this->id_categoria = $value;
        return true;         
    }
    else{
        return false;
    }
}


public function setCategoria($value)
 {
     if($this->validateAlphabetic($value,1,30))
     {
         $this->categoria = $value;
         return true;
     }
     else {
         return false;
     }
 }

//metodos get

public function getIdCategoria()
{
    return $this->id_categoria;
}

public function getCategoria()
{
    return $this->categoria;
}





public function LeerCategorias()
{
    $sql = 'SELECT id_categorias, Categoria From Categoria
     ORDER BY  Categoria';
    $params = null;
    return Database::getRows($sql, $params);
}












}
















?>