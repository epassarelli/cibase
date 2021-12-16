<?php

class Bloques_model extends MY_Model{

  
    public function __construct(){
        parent::__construct();
    }  

    public function getItemsMenu(){
        $this->db->from('bloques');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBloquesPor($parametros){
        
        $this->db->select('b.bloque_id,b.seccion_id,b.texto1,b.texto2,b.imagen,b.formato_id,f.view')
                    ->from('bloques b')
                    ->join('formatos f', 'f.formato_id = b.formato_id')
                    ->where($parametros);
        $query = $this->db->get();
        // var_dump($query);
        // echo "<br>";
        // var_dump($this->db->last_query());
        return $query->result();
    }

    public function getBloque($idBloque='')
    {
        $this->db->from('bloques b')
                ->where('bloque_id', $idBloque);
        $query = $this->db->get();
        return $query->row();
    }




}