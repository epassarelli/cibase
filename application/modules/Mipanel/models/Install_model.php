<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    // Inserta los 2 roles posibles
    public function insertarGrupos($data){
		$this->db->insert_batch('groups', $data);	
    }

    // Insertar user Admin + SAdmin
    public function insertarUsuarios($data){
		$this->db->insert('users', $data);	
    }

    // Insertar un registro para empresa
    public function insertarEmpresa($data){
		$this->db->insert('empresa', $data);	
    }

    // Insertar un registro para nosotros
    public function insertarNosotros($data){
		$this->db->insert('nosotros', $data);	
    }       

    // Insertar los slides
    public function insertarSlides($data){
		$this->db->insert_batch('slider', $data);	
    }

    // Insertar los servicios
    public function insertarServicios($data){
		$this->db->insert_batch('servicios', $data);	
    }

}