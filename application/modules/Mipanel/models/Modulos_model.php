<?php

class Modulos_model extends MY_Model{
  
    public function __construct() {
        parent::__construct();
    }  


    public function get_AllBackend(){
        $this->db->from('modulos');

        $query=$this->db->get();
        return $query->result();
    }




}
