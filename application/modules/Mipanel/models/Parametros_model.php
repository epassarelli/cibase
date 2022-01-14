<?php

class Parametros_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setParametro($data)
{
    $param['descripcion']  = $data['descripcion'];
    $param['default']      = $data['default'];
    $param['detalle']      = $data['detalle'];
    $param['relacionados'] = $data['relacionados'];
    $this->db->insert('parametros', $param);
    $parametro_id =  $this->db->insert_id();
    if (isset($data['valor'])) {
        $param2['parametro_id']   = $parametro_id;
        $param2['sitio_id']   = $this->config->item('sitio_id');    
        $param2['valor']    = $data['valor'];    
        $this->db->insert('parametros_sitios', $param2);
    }
    


}

public function update($id,$data)
{

    $param['descripcion']  = $data['descripcion'];
    $param['default']      = $data['default'];
    $param['detalle']      = $data['detalle'];
    $param['relacionados'] = $data['relacionados'];

    $this->db->where('id',$id);
    $this->db->update('parametros', $param);

    if (isset($data['valor'])) {

        $this->db->where('parametro_id',$id);
        $this->db->where('sitio_id',$this->config->item('sitio_id'));
        $this->db->delete('parametros_sitios');

        $param2['parametro_id']   = $id;
        $param2['sitio_id']   = $this->config->item('sitio_id');    
        $param2['valor']    = $data['valor'];    
        $this->db->insert('parametros_sitios', $param2);
    }




}


public function deleteParametros($id)
{
    $this->db->where('id',$id);
    $this->db->delete('parametros');

    $this->db->where('parametro_id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->delete('parametros_sitios');
}


}
?>