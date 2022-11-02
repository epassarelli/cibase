<?php

class Entregas_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  



public function getEntregas(){
  $sitio = $this->config->item('sitio_id');

  $ssql = "SELECT entregas_sitios.id, entregas_sitios.sitio_id, entregas_sitios.entregas_id, entregas.nombre,
    entregas_sitios.detalle, entregas_sitios.costo, entregas_sitios.estado, entregas_sitios.pidedirec
    FROM   entregas_sitios  left join entregas on entregas.id = entregas_sitios.entregas_id 
    WHERE entregas_sitios.sitio_id = " . $sitio;
   $query = $this->db->query($ssql);
  return $query->result();

}




public function getTipos(){
  $this->db->select('*')
            ->from('entregas');

  $query = $this->db->get();
  return $query->result();
}





public function setEntregas($data)
{
    $this->db->insert('entregas_sitios', $data);
}

public function update($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('entregas_sitios', $data);
}


public function deleteEntrega($id)
{
    $this->db->where('id',$id);
    $this->db->delete('entregas_sitios');
}



public function cambioEstado($id,$estado)
{
    $data['estado'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->update('entregas_sitios',$data);
    return $data['estado'];
}



public function cambioPidedirec($id,$estado)
{
    $data['pidedirec'] = ($estado == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->update('entregas_sitios',$data);
    return $data['pidedirec'];
}


  public function getCategorias($modulo_id, $sitio_id){
    $this->db->select('categoria_id, categoria')
              ->from('categorias')
              ->where('modulo_id', $modulo_id)
              ->where('sitio_id', $sitio_id);
    $query = $this->db->get();
    return $query->result();
  }

}
?>