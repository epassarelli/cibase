<?php

class Productos_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setProducto($data)
{
    $this->db->insert('productos', $data);
}


}
?>