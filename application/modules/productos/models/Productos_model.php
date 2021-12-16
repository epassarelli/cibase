<?php

class Productos_model extends CI_Model{

  
public function __construct(){
    parent::__construct();
}  

// Retorna 1 o mas registros dependiendo del parametro
public function getProductos($parametros = '')
    {
        //$this->db->select('*');
        $this->db->from('productos');
        //$this->db->join('categorias c', 'p.categoria_id = c.categoria_id');
        $this->db->where('sitio_id',$this->config->item('sitio_id'));
        $this->db->order_by('titulo', 'desc');
        $query = $this->db->get();
        // var_dump($this->db->last_query());
        return $query->result();
    }

public function getCategorias($parametros = '')
    {
        $this->db->from('categorias');
        $this->db->where('sitio_id',$this->config->item('sitio_id'));
        $this->db->order_by('catpadre_id','orden');
        $query = $this->db->get();
        return $query->result();
    }




}