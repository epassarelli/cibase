<?php

class Componentes_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function getComponentesBloques($bloque_id = 0){
    $this->db->where('bloque_id',$bloque_id);
    $query = $this->db->get('componentes');
    return $query->result();
}




}
?>