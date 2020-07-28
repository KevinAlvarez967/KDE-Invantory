<?php 

Class Producto extends Validator {
    private $id_producto = null;
    private $producto = null;
    private $precio = null;
    private $id_subcategoria = null;



     //metodos set
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


     public function setProducto($value)
    {
        if($this->validateAlphabetic($value,1,50))
        {
            $this->producto = $value;
            return true;
        }
        else {
            return false;
        }
    }


    public function setPrecio($value)
    {
        if($this->validateMoney($value)){
            $this->precio = $value;
            return true;
        }
        else {
            return false;
        }
    }


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



    //metodos get
    public function getIdproducto()
    {
        return $this->id_producto;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getIdsubcategoria()
    {
        return $this->id_subcategoria;
    }




    public function LeerProductos()
    {
        $sql = 'SELECT id_producto, producto, Precio, Sub_categoria.sub_categoria,  Categoria.Categoria  from Producto 
        INNER JOIN Sub_categoria USING(id_Subcategoria)
        INNER JOIN Categoria USING (id_categorias) ORDER BY producto';
        $params = null;
        return Database::getRows($sql, $params);
    }



    public function LeerUnProducto()
    {
        $sql = 'SELECT id_producto, producto, Precio, id_Subcategoria from Producto 
        WHERE id_producto = ? ORDER BY producto';
        $params = array($this->id_producto);
        return Database::getRow($sql, $params);
    }


//Busqueda 
public function BuscarProducto($value)
{
    $sql = 'SELECT id_producto, producto, Precio, Sub_categoria.sub_categoria,  Categoria.Categoria  from Producto 
    INNER JOIN Sub_categoria USING(id_Subcategoria)
    INNER JOIN Categoria USING (id_categorias) WHERE producto ILIKE ? OR sub_categoria ILIKE ? OR Categoria ILIKE ?  ORDER BY producto';
    $params = array("%$value%","%$value%","%$value%");
    return Database::getRows($sql, $params);
}






public function LeerSubcategoria()
{
    $sql = 'SELECT  Subcategoria.id_Subcategoria, Sub_categoria.sub_categoria from Producto 
    INNER JOIN Sub_categoria USING(id_Subcategoria)
    WHERE id_producto = ?';
    $params = array($this->id_producto);
    return Database::getRow($sql, $params);
}

public function LeerCategoria()
{
    $sql = 'SELECT Categoria.id_categorias, Categoria.Categoria  from Producto 
    INNER JOIN Sub_categoria USING(id_Subcategoria)
    INNER JOIN Categoria USING (id_categorias)
    WHERE id_producto = ? ';
    $params = array($this->id_producto);
    return Database::getRow($sql, $params);
}


public function updateProducto()
{
    
    $sql = 'UPDATE Producto 
            SET producto = ?, Precio = ?, id_Subcategoria = ?
            WHERE id_producto = ?';
        $params = array($this->producto, $this->precio, $this->id_subcategoria, $this->id_producto);
    return Database::executeRow($sql, $params);
}


public function CrearProducto()
{
    $sql = 'INSERT INTO  Producto (producto, Precio, id_Subcategoria) 
    VALUES (?, ?, ?)';
    $params = array($this->producto, $this->precio, $this->id_subcategoria);
    return Database::executeRow($sql, $params);
}




public function EliminarProducto()
{
$sql = 'DELETE FROM Producto where id_producto = ?';
$params = array($this->id_producto);
return Database::executeRow($sql, $params);
}










}





?>