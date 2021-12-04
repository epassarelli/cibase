<?php

class Sitios_model extends CI_Model{
  
    public function __construct(){
        parent::__construct();
    }  

    // Retorna toda la info del sitio
    public function getInfoSitio(){
        $this->db->from('sitios si');
        $this->db->join('themes th', 'si.theme_id = th.theme_id');    
        $this->db->where('si.sitio_id', $this->config->item('sitio_id'));
        $query = $this->db->get();
        return $query->row();
    }



}