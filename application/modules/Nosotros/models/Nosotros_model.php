<?php

class Nosotros_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All(){
    $query = $this->db->get('nosotros');
    return $query->result();
}



}
?>