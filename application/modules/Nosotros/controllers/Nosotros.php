<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends MX_Controller {

 	public function __construct() {
         parent::__construct();
         $this->load->model('Nosotros_model');
    }

	
	// Carga el Nosotros para el front
	public function index(){
	    $data['seccion'] = 'nosotros';
	    $data['nosotros']  = $this->Nosotros_model->get_All();

		$this->load->view('nosotros_home_view',$data);
	}


}

?>