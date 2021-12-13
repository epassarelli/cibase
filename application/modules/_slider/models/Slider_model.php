<?php

class Slider_model extends CI_Model{
  
public function __construct() {
    parent::__construct();
}  


public function get_All(){
    $this->db->where('estado',1);
    $query=$this->db->get('slider');
    return $query->result();
}

public function get_AllBackend(){
    $query=$this->db->get('slider');
    return $query->result();
}

public function setSlider($data)
{
    $this->db->insert('slider', $data);
}

public function updateSlider($id,$data)
{
    $this->db->where('id',$id)
            ->update('slider',$data);
}

public function deleteSlider($id)
{
    $this->db
    ->where('id',$id)
    ->delete('slider');
}

public function cambioEstado($id,$estado)
{
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id)
            ->update('slider',$data);
    return $data['estado'];
}


}
?>


