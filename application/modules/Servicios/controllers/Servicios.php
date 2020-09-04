<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends MX_Controller {

 	public function __construct() {
    parent::__construct();
    $this->load->model('Servicios_model');
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
	
	// Carga el Servicios para el front
	public function index(){
		$data['seccion'] = 'servicios';
		$data['servicios']  = $this->Servicios_model->get_All(1);
		$this->load->view('servicios_home_2_view', $data);
	}

	// Carga el Servicios para el front
	public function partial(){
		$data['seccion'] = 'servicios';
		$data['servicios']  = $this->Servicios_model->get_All(1);
    $modulos = $this->config->item('modulos');
    $viewTheme = 'servicios_' . $this->config->item('theme') . '_' . $modulos[$data['seccion']]['nro'];
		$this->load->view($viewTheme, $data);
	}

}