<?php 

Class Subcategoria extends Validator {
    private $id_subcategoria = null;
    private $subcategoria = null;
    private $id_categoria = null;



    //metodos set
    public function setIdsubcategoria($value)
    {
        if($this->validateNaturalNumber($value))
        {
            $this->id_subcategoria = $value;
            return true;         
        }
        else{
            return false;
        }
    }


    public function setSubcategoria($value)
    {
        if($this->validateAlphabetic($value,1,50))
        {
            $this->subcategoria = $value;
            return true;
        }
        else {
            return false;
        }
    }

    public function setIdcategoria($value)
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


   //metodos get
   public function getIdsubcategoria()
   {
       return $this->id_subcategoria;
   }

   public function getSubcategoria()
   {
       return $this->subcategoria;
   }

   public function getCategoria()
   {
       return $this->id_categoria;
   }





   public function LeerSubcategorias()
    {
        $sql = 'SELECT id_Subcategoria, sub_categoria, Categoria.Categoria From Sub_categoria
        INNER JOIN Categoria USING (id_categorias) ORDER BY  sub_categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }








}










?>