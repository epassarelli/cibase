<?php

class Bloques_model extends CI_Model{

  
    public function __construct(){
        parent::__construct();
    }  

    public function getItemsMenu(){
        $this->db->from('bloques');
        $query = $this->db->get();
        return $query->result_array();
    }


}