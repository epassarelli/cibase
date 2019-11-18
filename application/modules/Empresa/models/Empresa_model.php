<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

public function get_All()
{
	$query = $this->db->get('empresa');
	return $query->row();
}

public function update($data,$id)
{
	$this->db->where('id',$id)
            ->update('empresa',$data);
    return TRUE;
}

}

/* End of file Empresas_model.php */
/* Location: ./application/modules/Empresa/models/Empresas_model.php */