<?php

class Componentes_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setComponente($data)
{
    $this->db->insert('componentes', $data);
}


}
?>