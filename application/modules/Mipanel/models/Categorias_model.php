<?php

class Categorias_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function setCategorias($data)
    {
        $this->db->insert('categorias', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('categoria_id', $id);
        $this->db->where('sitio_id', $this->config->item('sitio_id'));
        $this->db->update('categorias', $data);
    }


    public function deleteCategorias($id)
    {
        $this->db->where('categoria_id', $id);
        $this->db->where('sitio_id', $this->config->item('sitio_id'));
        $this->db->delete('categorias');
    }



    public function cambioEstado($id, $estado)
    {
        $data['estado'] = ($estado == 1) ? "0" : "1";
        $this->db->where('categoria_id', $id);
        $this->db->where('sitio_id', $this->config->item('sitio_id'));
        $this->db->update('categorias', $data);
        return $data['estado'];
    }

    public function getCategorias($modulo_id, $sitio_id)
    {
        $this->db->select('categoria_id, categoria')
            ->from('categorias')
            ->where('modulo_id', $modulo_id)
            ->where('sitio_id', $sitio_id)
            ->order_by('categoria', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}