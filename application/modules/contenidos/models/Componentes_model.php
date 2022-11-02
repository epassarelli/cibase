<?php

class Componentes_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }  

    // Retorna las secciones activas si las tiene
    public function getComponentesPor($params){

        $this->db->from('componentes')
                ->where($params);    
        $query = $this->db->get();
        return $query->result();
    }

}