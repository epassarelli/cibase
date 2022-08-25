<?php

class Estados_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setEstados($data)
{
    $this->db->insert('estados_envios', $data);
}

public function update($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('estados_envios', $data);
}


public function deleteEstados($id)
{
    $this->db->where('id',$id);
    $this->db->delete('estados_envios');
}



}
?>