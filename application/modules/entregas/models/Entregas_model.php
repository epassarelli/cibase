<?php

class Entregas_model extends MY_Model{
  
public function __construct(){
    parent::__construct();
}  



public function getEntregas($identrega = 0)
    {
        $sitio = $this->config->item('sitio_id');
        $comando =  'SELECT a.id,a.detalle,a.costo,a.pidedirec,b.nombre
        FROM entregas_sitios a  LEFT JOIN entregas b ON b.id=a.entregas_id
        WHERE a.estado = 1 AND a.sitio_id= ' . $sitio;
        
        if ($identrega !=0) {
            $ids= (string)$identrega;
            $comando=$comando . ' AND a.id = ' . $ids ;
        }
        
        $query = $this->db->query($comando);
        return $query->result();
    }


}