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
		$data['seccion']    = 'servicios';
		$data['servicios']  = $this->Servicios_model->get_All(1);
    
    $modulos = $this->config->item('modulos');
    
    $data['view']       = 'servicios_' . $this->session->userdata('theme') . '_' . $modulos[$data['seccion']]['themeNumero'];    
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
	}

	// Carga el Servicios para el front
  public function partial($seccion_id, $slug, $titulo, $bajada, $bloque){
    $data['slug']   = $slug;
		$data['titulo'] = $titulo;
    $data['bajada'] = $bajada;
		$data['servicios']  = $this->Servicios_model->get_By($seccion_id);
    //var_dump($data);
    $modulos = $this->config->item('modulos');
    $viewTheme = 'servicios_' . $this->session->userdata('theme') . '_' . $bloque;
		$this->load->view($viewTheme, $data);
	}

}