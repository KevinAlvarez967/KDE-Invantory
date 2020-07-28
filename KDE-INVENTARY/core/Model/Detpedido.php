<?php


Class Detpedido extends Validator{
    private $id_det_pedido = null;
    private $detalles = null;
    private $precio = null;
    private $cantidad = null;
    private $id_pedido = null;
    private $id_producto = null;
    private $id_promociones = null;


     //metodos set
     public function setIddetpedido($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_det_pedido  = $value;
             return true;         
         }
         else{
             return false;
         }
     }


     public function setDetalles($value)
     {
         if($this->validateAlphanumeric($value, 1, 100))
         {
             $this->detalles = $value;
             return true;
     
         }
         else{
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


     public function setCantidad($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->cantidad = $value;
             return true;         
         }
         else{
             return false;
         }
     }



     public function setIdpedido($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_pedido = $value;
             return true;         
         }
         else{
             return false;
         }
     }


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



    //metodos get
    public function getIddetpedido()
    {
        return $this->id_det_pedido;
    }

    public function getDetalles()
    {
        return $this->detalles;
    }


    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getIdpedido()
    {
        return $this->id_pedido;
    }

    public function getIdproducto()
    {
        return $this->id_producto;
    }

    public function getIdpromociones()
    {
        return $this->id_promociones;
    }


    public function readAllPedidos()
    {
        $sql = 'SELECT MAX (producto.precio) as precio, id_det_pedido , id_pedido, numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido  FROM det_pedido
        INNER JOIN pedidos USING(id_pedido) INNER JOIN usuario USING (id_usuario)
		INNER JOIN mesa USING(id_mesa) INNER JOIN producto USING (id_producto) GROUP BY id_pedido,id_det_pedido , numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido';
        $params = null;
        return database::getRows($sql, $params);
    }   

    //detalle Pedidos empleados
        public function readPedidos()
        {
            $sql = 'SELECT  id_det_pedido, producto.producto, id_pedido, fecha , pedidos.Estado, numero_mesa FROM pedidos
            INNER JOIN det_pedido USING(id_pedido) INNER JOIN usuario USING (id_usuario)
            INNER JOIN mesa USING(id_mesa) INNER JOIN producto USING (id_producto) ';
            $params = null;
            return database::getRows($sql, $params);
        }   
            

        public function LeerPedidos()
        {
            $sql = 'SELECT SUM (producto.precio) as precio,  id_pedido, pedidos.Estado , Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa from Det_pedido 
            INNER JOIN pedidos USING (id_pedido) INNER JOIN usuario USING (id_usuario)
                        INNER JOIN mesa USING(id_mesa) INNER JOIN producto  USING(id_producto) 
                        GROUP BY id_pedido, pedidos.Estado , Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa ';
            $params = null;
            return database::getRows($sql, $params);
        } 

        public function BuscarPedidos($value)
        {
            $sql = 'SELECT id_pedido, pedidos.Estado, Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa from Pedidos INNER JOIN usuario USING (id_usuario)
            INNER JOIN mesa USING(id_mesa)
            WHERE fecha ILIKE ? OR pedidos.estado ILIKE ? OR nombre ILIKE ? OR apellido ILIKE ? ';
            $params = array("%$value%","%$value%","%$value%","%$value%" );
            return Database::getRows($sql, $params);
        }
        



    //Pedido empleados


    public function readAllProductoFromPedidos()
    {
        $sql = 'SELECT Cantidad,id_det_pedido,  producto, producto.precio FROM det_pedido INNER JOIN producto USING(id_producto) WHERE id_det_pedido = ?';
        $params = array($this->id_det_pedido);
        return database::getRows($sql, $params);
    }   


    public function BuscarPedido($value)
    {
        $sql = 'SELECT id_pedido, numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido, det_pedido.precio FROM det_pedido
        INNER JOIN pedidos USING(id_pedido) INNER JOIN usuario USING (id_usuario) INNER JOIN mesa USING(id_mesa)
        WHERE fecha ILIKE ? OR pedidos.estado ILIKE ? OR nombre ILIKE ? OR apellido ILIKE ? ';
        $params = array("%$value%","%$value%","%$value%","%$value%" );
        return Database::getRows($sql, $params);
    }
    






    public function CrearDetallePedido()
    {
        $sql = 'INSERT INTO  Det_pedido  ( Cantidad, id_pedido, id_producto) 
        VALUES ( ?, ?, ?)';
        $params = array( $this->cantidad, $this->id_pedido, $this->id_producto);
        return Database::executeRow($sql, $params);
    }
    

    public function EliminarProductoDelDetalle()
    {
    $sql = 'DELETE from Det_pedido where id_det_pedido  = ?';
    $params = array($this->id_det_pedido);
    return Database::executeRow($sql, $params);
    }
    






}











?>