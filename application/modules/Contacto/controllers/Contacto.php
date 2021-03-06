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
  }

	public function index(){
    $data['seccion']    = 'contacto';
    
    $modulos = $this->config->item('modulos');
    
    $data['view']       = 'contacto_' . $this->config->item('theme') . '_' . $modulos[$data['seccion']]['themeNumero'];    
    $this->load->view('layout_'.$this->config->item('theme').'_view', $data);

	}

	public function partial(){
    $data['seccion'] = 'contacto';

    $modulos = $this->config->item('modulos');
    
    $viewTheme = 'contacto_' . $this->config->item('theme') . '_' . $modulos[$data['seccion']]['themeNumero'];
    $this->load->view($viewTheme, $data);
	}

}