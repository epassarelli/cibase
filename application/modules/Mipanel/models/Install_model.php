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

    // Insertar user  y grupo en user_group
    public function insertarUsuarioGrupo($data){
     $this->db->insert_batch('users_groups', $data);	
    } 

    // Insertar un registro para sitios
    public function insertarSitio($data){
		$this->db->insert('sitios', $data);	
    }

    // Insertar temas
    public function insertarTema($data){
		$this->db->insert_batch('themes', $data);	
    }       
    // Insertar user por sitio en user_group
    public function insertarUsuarioSitio($data){
      $this->db->insert('users_sitios', $data);	
    } 
    // Insertar los parametros
    public function insertarParam($data){
		$this->db->insert_batch('parametros', $data);	
    }

    // Insertar los parametros_sitio??
    public function insertarParamSitio($data){
		$this->db->insert_batch('parametros_sitios', $data);	
    }

}