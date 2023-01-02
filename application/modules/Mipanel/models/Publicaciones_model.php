<?php

class Publicaciones_model extends MY_Model{
  
    public function __construct() {
        parent::__construct();
        $this->table = 'publicaciones';
    }  


    public function get_AllBackend(){
        $this->db->select('c.categoria, p.publicacion_id, p.titulo, p.estado');
        $this->db->from('publicaciones p');
        $this->db->join('categorias c', 'c.categoria_id = p.categoria_id'); 
        $query=$this->db->get();
        return $query->result();
    }


    public function get($id='')
    {
        $this->db->from('publicaciones p');
        $this->db->join('categorias c', 'c.categoria_id = p.categoria_id'); 
        $this->db->where('publicacion_id', $id); 
        $query=$this->db->get();
        return $query->row();        
    }

    public function actualizar($data, $id) {
        $this->db->where('publicacion_id', $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

	// borrar un adjunto (abm en editar)
	public function deleteAdjunto($campo, $id)
	{
		$data[$campo] = NULL;		
		$this->db->where('publicacion_id', $id)
			 ->update('publicaciones', $data);
	}

    public function eliminar($id) {
        $this->db->where('publicacion_id', $id);
        $this->db->delete($this->table);
        return TRUE;
    }

}