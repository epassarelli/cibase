<?php

class Colores_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setColores($data)
{
    $this->db->insert('colores', $data);
}

public function update($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('colores', $data);
}


public function deleteColores($id)
{
    $this->db->where('id',$id);
    $this->db->delete('colores');
}



public function cambioEstado($id,$estado)
{
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->update('colores',$data);
    return $data['estado'];
}


}
?>