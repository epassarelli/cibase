<?php

class Impuestos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setImpuestos($data)
{
    
    $this->db->insert('impuestos', $data);
}

public function update($id,$data)
{
    $this->db->where('impuesto_id',$id);
    $this->db->update('impuestos', $data);
}


public function deleteImpuesto($id)
{
    $this->db->where('impuesto_id',$id);
    $this->db->delete('impuestos');
}




}
?>