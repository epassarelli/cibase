<?php

class Presentaciones_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setPresentacion($data)
{
    $this->db->insert('presentaciones', $data);
}


}
?>