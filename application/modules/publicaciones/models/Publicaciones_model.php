<?php

class Publicaciones_model extends CI_Model{

  
public function __construct(){
    parent::__construct();
}  

// Retorna 1 o mas registros dependiendo del parametro
public function getBy($key='',$value='')
{
    $this->db->from('publicaciones');
    $this->db->where($key, $value);
    $query = $this->db->get();
    return $query->result();
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


}