<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends MX_Controller {

 	public function __construct() {
         parent::__construct();
         $this->load->model('Slider_model');
    }

	
	// Carga el slider para el front

	public function index(){
	    $sliders  = $this->Slider_model->get_All();
		$data['sliders']  = $sliders;
		$this->load->view('nosotros_home_view',$data);

	}


}

?>