<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empresa extends MX_Controller {

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

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

  // Listado del ABM de empresa 
  public function index(){      

    $this->template->load('index', 'empresa_abm_view', $this->data);  
  }


  // Alta de un empresa
  public function insertar(){

    $this->template->load('index', 'empresa_form_view', $this->data);   
  }


  // Editar un empresa 
  public function editar($empresa_id){

    $this->template->load('index', 'empresa_form_view', $this->data);   
  }

}