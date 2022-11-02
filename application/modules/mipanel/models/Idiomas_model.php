<?php

class Idiomas_model extends My_Model{
  
    public function __construct() {
        parent::__construct();
    }  

    public function get_AllBackend(){
        $this->db->from('idiomas');

        $query=$this->db->get();
        return $query->result();
    }

}
?>