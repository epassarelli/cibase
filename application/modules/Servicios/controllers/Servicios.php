<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends MX_Controller {

 	public function __construct() {
         parent::__construct();
         $this->load->model('Servicios_model');
    }

	
	// Carga el Servicios para el front
	public function index(){
		$data['seccion'] = 'servicios';
		//$data['servicios']  = $this->Servicios_model->get_All($estado);
		$this->load->view('servicios_home_1_view', $data);
	}


}

?>