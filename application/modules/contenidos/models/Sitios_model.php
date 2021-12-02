<?php

class Sitios_model extends CI_Model{
  
    public function __construct(){
        parent::__construct();
    }  

    // Retorna toda la info del sitio
    public function getInfoSitio($url){
        $this->db->from('sitios si');
        $this->db->join('themes th', 'si.theme_id = th.theme_id');    
        $this->db->like('si.url', $url);
        $query = $this->db->get();
        return $query->row();
    }



}