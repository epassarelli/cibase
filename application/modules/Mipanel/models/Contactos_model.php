<?php

class Contactos_model extends MY_Model{
  
    public function __construct() {
        parent::__construct();
    }  


    public function setContacto($data)
    {
        $this->db->insert('contactos', $data);
    }

    public function get_AllBackend()
    {
        $query = $this->db->get('contactos');
        return $query->result();    
    }

}
?>