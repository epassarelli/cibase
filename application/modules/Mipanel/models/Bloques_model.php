<?php

class Bloques_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'bloques';
    }


    public function get_AllBackend()
    {
        //$this->db->select('b.bloque_id, b.sitio_id, b.seccion_id, f.imagen, si.logo');
        $this->db->select('b.bloque_id, se.sitio_id, b.seccion_id, b.texto1, si.sitio, si.logo, se.titulo, f.imagen, b.formato_id, b.estado');
        $this->db->from('bloques b');
        $this->db->join('secciones se', 'se.seccion_id = b.seccion_id');
        $this->db->join('sitios si', 'se.sitio_id = si.sitio_id');
        $this->db->join('formatos f', 'f.formato_id = b.formato_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function getPorPagina($seccion_id = '')
    {
        $this->db->from('bloques');
        $this->db->where('seccion_id', $seccion_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function actualizar($data, $id)
    {
        $this->db->where('bloque_id', $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    public function eliminar($id)
    {
        $this->db->where('bloque_id', $id);
        $this->db->delete($this->table);
        return TRUE;
    }
}
