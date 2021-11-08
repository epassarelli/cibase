<?php

class Sitios_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All(){
    $this->db->where('estado', 1);
    $query = $this->db->get('sitios');
    return $query->result();
}

public function get_AllBackend(){
    $query=$this->db->get('sitios');
    return $query->result();
}

public function setSitios($data)
{
   $this->db->insert('sitios', $data);
}

public function updateSitios($id,$data)
{
    $this->db->where('id',$id)
            ->update('sitios',$data);
}

public function deleteSitios($id)
{
    $this->db
    ->where('id',$id)
    ->delete('sitios');
  
}

public function cambioEstado($id,$estado)
{
    $data['activo'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id)
            ->update('sitios',$data);
    return $data['activo'];
}

// public function update($data,$id)
// {
// 	$this->db->where('id',$id)
//             ->update('nosotros',$data);
//     return TRUE;
// }


}
?>