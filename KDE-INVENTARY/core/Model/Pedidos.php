<?php
 
 Class Pedidos extends Validator {
    private $id_pedido = null;
    private $estado = null;
    private $fecha = null;
    private $id_usuario = null;
    private $id_mesa = null;


     //metodos set
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


     public function setEstado($value)
     {
         if($this->validateAlphabetic($value,1,50))
         {
             $this->estado = $value;
             return true;
         }
         else {
             return false;
         }
     }


     public function setFecha($value)
     {
         if($this->validateAlphanumeric($value, 1, 50))
         {
             $this->fecha = $value;
             return true;
     
         }
         else{
             return false;
         }
     }


     public function setIdusuario($value)
     {
         if($this->validateNaturalNumber($value))
         {
             $this->id_usuario = $value;
             return true;         
         }
         else{
             return false;
         }
     }


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


         //metodos get
      public function getIdpedido()
      {
         return $this->id_pedido;
      }


      
      public function getEstado()
      {
         return $this->estado;
      }

      public function getFecha()
      {
         return $this->fecha;
      }

      public function getIdusuario()
      {
         return $this->id_usuario;
      }

      public function getIdmesa()
      {
         return $this->id_mesa;
      }


      //metodos SCRUD

      public function CrearPedido()
      {
          $sql = 'INSERT INTO  Pedidos  (Estado, Fecha, id_usuario, id_mesa) 
          VALUES (?, current_date, ?, ?)';
          $params = array('En espera' , $this->id_usuario, $this->id_mesa);
          return Database::executeRow($sql, $params);
      }


  
      public function readOnePedido()
      {
          $sql = 'SELECT id_pedido, pedidos.Estado, Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa from Pedidos INNER JOIN usuario USING (id_usuario)
          INNER JOIN mesa USING(id_mesa) WHERE id_pedido = ?';
          $params = array($this->id_pedido);
          return database::getRow($sql, $params);
      }   
  


      public function readAllProductoFromPedido()
      {
          $sql = 'SELECT id_pedido, id_det_pedido,  Cantidad, id_producto, producto, producto.precio FROM det_pedido INNER JOIN producto USING(id_producto) WHERE id_pedido = ?';
          $params = array($this->id_pedido);
          return database::getRows($sql, $params);
      }  
  
  
      
      






 }











?>