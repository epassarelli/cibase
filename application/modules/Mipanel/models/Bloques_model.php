<?php

class Bloques_model extends CI_Model{
  
    public function __construct() {
        parent::__construct();
    }  


    public function get_AllBackend(){
        //$this->db->select('b.bloque_id, b.sitio_id, b.seccion_id, f.imagen, si.logo');
        $this->db->select('b.bloque_id, se.sitio_id, b.seccion_id, b.texto1, si.sitio, si.logo, se.titulo, b.estado, f.imagen, b.formato_id');
        $this->db->from('bloques b');
        $this->db->join('secciones se', 'se.seccion_id = b.seccion_id'); 
        $this->db->join('sitios si', 'se.sitio_id = si.sitio_id'); 
        $this->db->join('formatos f', 'f.formato_id = b.formato_id'); 
        $query=$this->db->get();
        return $query->result();
    }




}
