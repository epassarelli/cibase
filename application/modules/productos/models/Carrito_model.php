<?php

class Carrito_model extends MY_Model{

  
public function __construct(){
    parent::__construct();
}  



public function grabapedido($data)
{
   
    $this->db->insert('pedidos', $data);
    $pedido_id =  $this->db->insert_id();
    return $pedido_id;    
}



public function grabaitem($data)
{
    $this->db->insert('pedidos_items', $data);
}


public  function updatepedido($data,$id){
    $this->db->where('id', $id);  
    $this->db->update('pedidos', $data);  
}

public  function borraitemspedido($id){
    $this->db->where('pedido_id', $id);  
    $this->db->delete('pedidos_items');
}



}