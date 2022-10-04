<?php

class Publicaciones_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Retorna 1 o mas registros dependiendo del parametro
    public function getArticulosPor($parametros)
    {
        $this->db->from('publicaciones');
        $this->db->where($parametros);
        $this->db->order_by('titulo', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Retorna 1 o mas registros dependiendo del parametro
    public function getCategoriasPor($parametros)
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $this->db->where($parametros);
        $query = $this->db->get();
        return $query->result();
    }

    public function getOtrasCategorias($idCatActual, $idIdioma)
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $this->db->where('idioma_id', $idIdioma);
        $this->db->where('sitio_id', $this->config->item('sitio_id'));
        $this->db->where('categoria_id !=', $idCatActual);
        $this->db->where('estado', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getBySlug($slug)
    {
        $this->db->from('publicaciones');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        return $query->row();
    }

    // Retorna N novedades si N es Mayor a 0 y sinó retorna todas
    public function getNovedades($cant)
    {
        $this->db->from('publicaciones p');
        $this->db->join('categorias c', 'p.categoria_id = c.categoria_id');
        $this->db->where('c.slug', 'novedades');
        $this->db->order_by('publicacion_id', 'desc');
        if ($cant > 0) {
            $this->db->limit($cant);
        }
        $query = $this->db->get();
        //var_dump($this->db->last_query());
        return $query->result();
    }

    function actualizarCategoria($tabla, $data, $id)
    {
        $this->db->where('categoria_id', $id);
        $this->db->update($tabla, $data);
        return TRUE;
    }

    function actualizarPublicacion($tabla, $data, $id)
    {
        $this->db->where('publicacion_id', $id);
        $this->db->update($tabla, $data);
        return TRUE;
    }
}
