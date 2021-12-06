<?php

class Publicaciones_model extends CI_Model{

  
public function __construct(){
    parent::__construct();
}  

// Retorna 1 o mas registros dependiendo del parametro
public function getArticulosPor($parametros)
    {
        //$this->db->select('*');
        $this->db->from('publicaciones');
        //$this->db->join('categorias c', 'p.categoria_id = c.categoria_id');
        $this->db->where($parametros);
        $query = $this->db->get();
        // var_dump($this->db->last_query());
        return $query->result();
    }

// Retorna 1 o mas registros dependiendo del parametro
public function getCategoriasPor($parametros)
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $this->db->where($parametros);
        $query = $this->db->get();
        // var_dump($this->db->last_query());
        return $query->result();
    }

public function getOtrasCategorias($idCatActual)
    {
        # code...
        $this->db->select('*');
        $this->db->from('categorias');
        // $this->db->where('idioma_id', $idIdioma);
        // $this->db->where('modulo_id', $idModulo);
        $this->db->where('categoria_id !=', $idCatActual);
        $query = $this->db->get();
        return $query->result();        
    }

}