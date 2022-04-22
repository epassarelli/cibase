<?php

class Paginas_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'secciones';
    }


    public function get_AllBackend()
    {
        $this->db->select('se.seccion_id, se.titulo, se.slug, se.menu, se.orden, m.modulo, i.idioma, se.estado');
        $this->db->from('secciones se');
        $this->db->join('sitios si', 'si.sitio_id = se.sitio_id');
        $this->db->join('idiomas i', 'se.idioma_id = i.idioma_id');
        $this->db->join('modulos m', 'm.modulo_id = se.modulo_id');
        $this->db->where('si.sitio_id', $this->config->item('sitio_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getPaginas()
    {
        $this->db->from('secciones');
        $this->db->where('sitio_id', $this->config->item('sitio_id'));
        $query = $this->db->get();
        return $query->result();
    }


    public function get($id)
    {
        $this->db->from('secciones');
        $this->db->where('seccion_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function actualizar($data, $id)
    {
        $this->db->where('seccion_id', $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    public function eliminar($id)
    {
        $this->db->where('seccion_id', $id);
        $this->db->delete($this->table);
        return TRUE;
    }


    // Retorna toda la info del sitio
    public function getInfoSitio2($idSitio)
    {
        $this->db->from('sitios si');
        $this->db->join('themes th', 'si.theme_id = th.theme_id');
        $this->db->where('si.sitio_id', $idSitio);
        $query = $this->db->get();
        return $query->row();
    }

    // Retorna toda la info del sitio
    public function getInfoSitio()
    {
        $this->db->from('sitios si');
        $this->db->join('themes th', 'si.theme_id = th.theme_id');
        $this->db->where('si.sitio_id', $this->config->item('sitio_id'));
        $query = $this->db->get();
        return $query->row();
    }

    public function get_All()
    {
        $this->db->where('estado', 1);
        $query = $this->db->get('sitios');
        return $query->result();
    }



    public function setSitios($data)
    {
        $this->db->insert('sitios', $data);
    }

    public function updateSitios($id, $data)
    {
        $this->db->where('sitio_id', $id)
            ->update('sitios', $data);
    }

    public function deleteSitios($id)
    {
        $this->db
            ->where('sitio_id', $id)
            ->delete('sitios');
    }

    public function cambioEstado($id, $estado)
    {
        $data['activo'] = ($estado == 1) ? "0" : "1";
        $this->db->where('sitio_id', $id)
            ->update('sitios', $data);
        return $data['activo'];
    }

    // public function update($data,$id)
    // {
    // 	$this->db->where('id',$id)
    //             ->update('nosotros',$data);
    //     return TRUE;
    // }


}
