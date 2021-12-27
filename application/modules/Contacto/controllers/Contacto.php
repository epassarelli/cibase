<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends MX_Controller {

 	public function __construct() {
    parent::__construct();
    
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
      $this->color1 = $this->config->item('color1');
  }

	public function index(){
    $data['seccion']    = 'contacto';
    $data['title']    = 'Contacto';

    
    $modulos = $this->config->item('modulos');
    
    $data['view']       = 'contacto_' . $this->session->userdata('theme') . '_1';    
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);

	}

  public function partial($seccion_id, $slug, $titulo, $bajada, $bloque){
    $data['slug']   = $slug;
    $data['titulo'] = $titulo;
    $data['bajada'] = $bajada;

    $modulos = $this->config->item('modulos');
    
    $viewTheme = 'contacto_' . $this->session->userdata('theme') . '_' . $bloque;
    $this->load->view($viewTheme, $data);
	}

}