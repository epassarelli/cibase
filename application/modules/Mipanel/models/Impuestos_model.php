<?php

class Impuestos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setImpuesto($data)
{
    $this->db->insert('impuestos', $data);
}


}
?>