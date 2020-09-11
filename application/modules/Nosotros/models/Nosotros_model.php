<?php

class Nosotros_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All(){
    $this->db->where('estado', 1);
    $query = $this->db->get('nosotros');
    return $query->result();
}

public function get_AllBackend(){
    $query=$this->db->get('nosotros');
    return $query->result();
}

public function setNosotros($data)
{
    $this->db->insert('nosotros', $data);
}

public function updateNosotros($id,$data)
{
    $this->db->where('id',$id)
            ->update('nosotros',$data);
}

public function deleteNosotros($id)
{
    $this->db
    ->where('id',$id)
    ->delete('nosotros');
}

public function cambioEstado($id,$estado)
{
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id)
            ->update('nosotros',$data);
    return $data['estado'];
}

// public function update($data,$id)
// {
// 	$this->db->where('id',$id)
//             ->update('nosotros',$data);
//     return TRUE;
// }



}
?>