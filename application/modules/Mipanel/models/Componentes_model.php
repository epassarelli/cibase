<?php

class Componentes_model extends CI_Model{
  
    public function __construct() {
        parent::__construct();
        $this->table = 'componentes';
    }  


    public function getComponentesBloques($bloque_id = 0){
        $this->db->where('bloque_id',$bloque_id);
        $query = $this->db->get('componentes');
        return $query->result();
    }

    public function get_AllBackend(){
        //$this->db->select('b.bloque_id, se.sitio_id, b.seccion_id, b.texto1, si.sitio, si.logo, se.titulo, b.estado, f.imagen, b.formato_id');
        $this->db->select('co.componente_id, co.texto1, co.texto2, co.bloque_id, se.seccion_id, si.sitio_id, co.estado');
        $this->db->from('componentes co');
        $this->db->join('bloques bl', 'bl.bloque_id = co.bloque_id'); 
        $this->db->join('secciones se', 'se.seccion_id = bl.seccion_id'); 
        $this->db->join('sitios si', 'si.sitio_id = se.sitio_id'); 
        //$this->db->join('formatos f', 'f.formato_id = b.formato_id'); 
        $query=$this->db->get();
        return $query->result();
    }

    function actualizar($data, $id) {
        $this->db->where('componente_id', $id);
        $this->db->update($this->table, $data);
        return TRUE;
      }

}
