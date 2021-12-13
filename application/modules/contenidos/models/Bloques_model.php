<?php

class Bloques_model extends CI_Model{

  
    public function __construct(){
        parent::__construct();
    }  

    public function getItemsMenu(){
        $this->db->from('bloques');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBloquesPor($parametros){
        
        $this->db->select('b.texto1,b.texto2,b.imagen')
                    ->from('bloques b')
                    ->join('formatos f', 'f.formato_id = b.formato_id')
                    ->where($parametros);
        $query = $this->db->get();
        return $query->result();
    }

}