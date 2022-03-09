<?php

class Pedidos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function getAll(){
    $ssql = "SELECT pedidos.id,pedidos.fecha,pedidos.apellido,pedidos.nombre,pedidos.email,pedidos.telefono,pedidos.total,estado_envios.nombre AS nomestado FROM pedidos  LEFT JOIN estado_envios  ON pedidos.estado_id = estado_envios.id WHERE sitio_id = " . $this->config->item('sitio_id') . " ORDER BY pedidos.fecha desc  ";    

    $query = $this->db->query($ssql);
    return  $query->result();
}


public function setParametro($data)
{
    $param['descripcion']  = $data['descripcion'];
    $param['default']      = $data['default'];
    $param['detalle']      = $data['detalle'];
    $param['relacionados'] = $data['relacionados'];
    $this->db->insert('pedidos', $param);
    $parametro_id =  $this->db->insert_id();
    if (isset($data['valor'])) {
        $param2['parametro_id']   = $parametro_id;
        $param2['sitio_id']   = $this->config->item('sitio_id');    
        $param2['valor']    = $data['valor'];    
        $this->db->insert('pedidos_sitios', $param2);
    }
    


}

public function update($id,$data)
{

    $param['descripcion']  = $data['descripcion'];
    $param['default']      = $data['default'];
    $param['detalle']      = $data['detalle'];
    $param['relacionados'] = $data['relacionados'];

    $this->db->where('id',$id);
    $this->db->update('pedidos', $param);

    if (isset($data['valor'])) {

        $this->db->where('parametro_id',$id);
        $this->db->where('sitio_id',$this->config->item('sitio_id'));
        $this->db->delete('pedidos_sitios');

        $param2['parametro_id']   = $id;
        $param2['sitio_id']   = $this->config->item('sitio_id');    
        $param2['valor']    = $data['valor'];    
        $this->db->insert('pedidos_sitios', $param2);
    }




}


public function deletePedidos($id)
{
    $this->db->where('id',$id);
    $this->db->delete('pedidos');

    $this->db->where('parametro_id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->delete('pedidos_sitios');
}


}
?>