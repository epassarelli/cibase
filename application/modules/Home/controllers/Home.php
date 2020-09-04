<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

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
	
	// Carga el Nosotros para el front
	public function index(){
    $data['landing']  = $this->config->item('landing');
    $data['modulos']  = $this->config->item('modulos');
    $data['view']     = 'home_view';
		$this->load->view('layout_'.$this->config->item('theme').'_view', $data);
	}

}