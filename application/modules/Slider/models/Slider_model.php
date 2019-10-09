<?php

class Slider_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All(){
    $this->db->where('estado',1);
    $query=$this->db->get('slider');
    return $query->result();
}



}
?>


