<?php

class Servicios_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  

public function get_By($seccion_id){
    $this->db->where('seccion_id', $seccion_id);
    $this->db->where('estado', 1);
    $query = $this->db->get('servicios');
    return $query->result();
}

public function get_All($estado=''){   
    if($estado !== ''){
    		$this->db->where('estado', $estado);
		}
    $query=$this->db->get('servicios');
    return $query->result();
}

public function get_AllBackend()
{
	$query=$this->db->get('servicios');
    return $query->result();
}

public function setServicio($data)
{
    $this->db->insert('servicios', $data);
}

public function updateServicio($id,$data)
{
    $this->db->where('id',$id)
            ->update('servicios',$data);
}

public function deleteServicio($id)
{
    $this->db
    ->where('id',$id)
    ->delete('servicios');
}

public function cambioEstado($id,$estado)
{
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id)
            ->update('servicios',$data);
    return $data['estado'];
}

}
?>


