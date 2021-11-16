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
    
    $data['view']       = 'nosotros_' . $this->session->userdata('theme') . '_' . $modulos[$data['seccion']]['themeNumero'];    
    $this->load->view('layout_'. $this->session->userdata('theme').'_view', $data);
	}

	// Carga el Nosotros para el front
  public function partial($seccion_id, $slug, $titulo, $bajada, $bloque){
    $data['slug']   = $slug;
    $data['titulo'] = $titulo;
    $data['bajada'] = $bajada;
    $data['nosotros']  = $this->Nosotros_model->get_By($seccion_id);

    $modulos = $this->config->item('modulos');

    $viewTheme = 'nosotros_' . $this->session->userdata('theme') . '_' . $bloque;
    $this->load->view($viewTheme, $data);
	}

}

?>