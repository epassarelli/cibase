<?php

class Home_model extends CI_Model{
  
public function __construct(){
    parent::__construct();
}  

// Retorna toda la info del sitio
public function getInfoSitio($url){
    $this->db->from('sitios si');
    $this->db->join('themes th', 'si.theme_id = th.id');    
    $this->db->where('si.url', $url);
    $query = $this->db->get();
    return $query->row();
}

// Retorna las secciones activas si las tiene
public function getSeccionesActivas($url){
    $this->db->from('secciones se');
    $this->db->join('sitios si', 'se.sitio_id = si.id');
    $this->db->where('si.url', $url);
    $this->db->where('se.estado', 1);
    
    $query = $this->db->get();
    return $query->result_array();
}


}