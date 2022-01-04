<?php

class Productos_model extends MY_Model{

  
public function __construct(){
    parent::__construct();
}  

// Retorna 1 o mas registros dependiendo del parametro
public function getProductos($categoria = 0)
    {
        $sitio = $this->config->item('sitio_id');
        if ($categoria  !== 0) {
          $comando =  'SELECT * FROM v_productos WHERE (categoria_id = ' . $categoria . ' or catpadre_id = ' . $categoria . ') AND sitio_id = ' . $sitio . ' order by titulo desc';
        }else{
          $comando = 'SELECT * FROM v_productos WHERE sitio_id = ' . $sitio . ' order by titulo desc';
        }    
        $query = $this->db->query($comando);
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