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

    $modulos = $this->config->item('modulos');
    
    $data['view']       = 'nosotros_' . $this->config->item('theme') . '_' . $modulos[$data['seccion']]['themeNumero'];    
    $this->load->view('layout_'.$this->config->item('theme').'_view', $data);
	}

	// Carga el Nosotros para el front
	public function partial(){
    $data['seccion'] = 'nosotros';
    $data['nosotros']  = $this->Nosotros_model->get_All();

    $modulos = $this->config->item('modulos');

    $viewTheme = 'nosotros_' . $this->config->item('theme') . '_' . $modulos[$data['seccion']]['themeNumero'];
    $this->load->view($viewTheme, $data);
	}

}

?>