<?php

class Menu_model extends CI_Model{

  
    public function __construct(){
        parent::__construct();
    }  


    // Retorna las secciones activas si las tiene
    public function getSecciones(){
        //$this->db->select('seccion_id, titulo, bajada, slug, modulo, menu, orden, bloqueNumero');
        $this->db->from('secciones');
        // $this->db->where($key, $value);
        $this->db->where('estado', 1);
        $this->db->order_by('orden', 'asc');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // Retorna las secciones activas si las tiene
    public function getBloques($value){
        //$this->db->select('seccion_id, titulo, bajada, slug, modulo, menu, orden, bloqueNumero');
        $this->db->from('bloques');
        $this->db->where('seccion_id', $value);
        $this->db->where('estado', 1);
        
        $query = $this->db->get();
        return $query->result_array();
    }



}