<?php

class Home_model extends CI_Model{

  
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

// Retorna las secciones activas si las tiene
public function getSeccionesActivas($sitio_id){
    $this->db->select('se.seccion_id, se.titulo, se.bajada, se.slug, se.modulo, se.menu, se.orden, se.bloqueNumero');
    $this->db->from('secciones se');
    $this->db->join('sitios si', 'se.sitio_id = si.sitio_id');
    $this->db->where('se.sitio_id', $sitio_id);
    $this->db->where('se.estado', 1);
    $this->db->order_by('se.orden', 'ASC');
    
    $query = $this->db->get();
    return $query->result_array();
}

// Retorna las secciones activas si las tiene
public function getSeccionesBy($key, $value){
    //$this->db->select('seccion_id, titulo, bajada, slug, modulo, menu, orden, bloqueNumero');
    $this->db->from('secciones');
    $this->db->where($key, $value);
    $this->db->where('estado', 1);
    
    $query = $this->db->get();
    return $query->result_array();
}
// Retorna las secciones activas si las tiene
public function getBloquesBy($key, $value){
    //$this->db->select('seccion_id, titulo, bajada, slug, modulo, menu, orden, bloqueNumero');
    $this->db->from('bloques');
    $this->db->where($key, $value);
    $this->db->where('estado', 1);
    
    $query = $this->db->get();
    return $query->result_array();
}
// Retorna las secciones activas si las tiene
public function getComponentesBy($key, $value){
    //$this->db->select('seccion_id, titulo, bajada, slug, modulo, menu, orden, bloqueNumero');
    $this->db->from('componentes');
    $this->db->where($key, $value);
    $this->db->where('estado', 1);
    
    $query = $this->db->get();
    return $query->result_array();
}
}