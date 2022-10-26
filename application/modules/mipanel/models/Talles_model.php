<?php

class Talles_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setTalles($data)
{
    $this->db->insert('talles', $data);
}

public function update($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('talles', $data);
}


public function deleteTalles($id)
{
    $this->db->where('id',$id);
    $this->db->delete('talles');
}



public function cambioEstado($id,$estado)
{
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->update('talles',$data);
    return $data['estado'];
}


}
?>