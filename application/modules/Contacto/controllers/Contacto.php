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
		$this->load->view('contacto_home_view');
	}

	public function partial(){
		$this->load->view('contacto_home_view');
	}

}