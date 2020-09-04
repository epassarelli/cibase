<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MX_Controller {

 	public function __construct() {
    parent::__construct();
    $this->load->model('Slider_model');
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

	
	// Carga el slider para el front
	public function index(){
		$data['seccion'] = 'slider';
		$sliders  = $this->Slider_model->get_All();
		if(count($sliders) > 0){
			$data['sliders'] = $sliders;
		}		
		$this->load->view('slider_home_view', $data);

	}

	// Carga el slider para el front
	public function partial(){
		$data['seccion'] = 'slider';
		$sliders  = $this->Slider_model->get_All();
		if(count($sliders) > 0){
			$data['sliders'] = $sliders;
		}		
		$this->load->view('slider_home_view', $data);

	}

}

?>


