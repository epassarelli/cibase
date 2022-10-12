<?php

class Presentaciones_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setPresentaciones($data)
{
    
    $this->db->insert('presentaciones', $data);
}

public function update($id,$data)
{
    $this->db->where('presentacion_id',$id);
    $this->db->update('presentaciones', $data);
}


public function deletePresentacion($id)
{
    $this->db->where('presentacion_id',$id);
    $this->db->delete('presentaciones');
}




}
?>