<?php

class Servicios_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All($estado=''){   
    if($estado !== ''){
    		$this->db->where('estado', $estado);
		}
    $query=$this->db->get('servicios');
    return $query->result();
}



}
?>


