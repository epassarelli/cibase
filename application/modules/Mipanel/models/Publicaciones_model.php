<?php

class Publicaciones_model extends CI_Model{
  
    public function __construct() {
        parent::__construct();
    }  


    public function get_AllBackend(){
        $this->db->select('c.categoria, p.publicacion_id, p.titulo');
        $this->db->from('publicaciones p');
        $this->db->join('categorias c', 'c.categoria_id = p.categoria_id'); 
        $query=$this->db->get();
        return $query->result();
    }


    public function get($id='')
    {
        $this->db->from('publicaciones p');
        $this->db->join('categorias c', 'c.categoria_id = p.categoria_id'); 
        $this->db->where('publicacion_id', $id); 
        $query=$this->db->get();
        return $query->row();        
    }


}
