<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends MX_Controller {

 	public function __construct() {
    parent::__construct();
    $this->load->model('Nosotros_model');
    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(TRUE);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }          
  }

	
	// Carga el Nosotros para el front
	public function index(){
	    $data['seccion'] = 'nosotros';
	    $data['nosotros']  = $this->Nosotros_model->get_All();

		$this->load->view('nosotros_home_view',$data);
	}

	// Carga el Nosotros para el front
	public function partial(){
	    $data['seccion'] = 'nosotros';
	    $data['nosotros']  = $this->Nosotros_model->get_All();

		$this->load->view('nosotros_home_view',$data);
	}

}

?>