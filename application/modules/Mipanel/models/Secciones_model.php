<?php

class Secciones_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All(){
    $this->db->where('estado', 1);
    $query = $this->db->get('secciones');
    return $query->result();
}

public function get_AllBackend(){
    $this->db->select('se.id, si.nombre as sitio, se.titulo, se.modulo, se.estado')
            ->from('secciones se')
            ->join('sitios si','se.sitio_id=si.id');

    $query=$this->db->get();
    return $query->result();
}

public function setSecciones($data)
{
    $this->db->insert('secciones', $data);
}

public function updateSecciones($id,$data)
{
    $this->db->where('id',$id)
            ->update('secciones',$data);
}

public function deleteSecciones($id)
{
    $this->db
    ->where('id',$id)
    ->delete('secciones');
}

public function cambioEstado($id,$estado){
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id)
            ->update('secciones',$data);
    return $data['estado'];
}

// public function update($data,$id)
// {
// 	$this->db->where('id',$id)
//             ->update('secciones',$data);
//     return TRUE;
// }



}
?>