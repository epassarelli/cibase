<?php

class Productos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setProducto($data)
{
    $this->db->insert('productos', $data);
}


public function cambioEstado($id,$publicar)
{
    $data['publicar'] = ($publicar == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->update('productos',$data);
    return $data['publicar'];
}

}
?>