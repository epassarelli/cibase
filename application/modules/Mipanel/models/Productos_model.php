<?php

class Productos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setProducto($data)
{
    $this->db->insert('productos', $data);
}

public function update($id,$data)
{
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->update('productos', $data);
}


public function deleteProductos($id)
{
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->delete('productos');
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