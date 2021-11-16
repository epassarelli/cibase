<?php

class Secciones_model extends CI_Model{

  
    public function __construct(){
        parent::__construct();
    }  

    public function getItemsMenu(){
        $this->db->from('secciones');
        $this->db->where('sitio_id', $this->session->userdata('sitio_id'));
        $this->db->where('menu', 1);
        $query = $this->db->get();
        return $query->result_array();
    }


}