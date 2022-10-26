<?php

class Contactos_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setContacto($data)
{
    $this->db->insert('contactos', $data);
}


}
?>