<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contactos extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

    $this->load->model('Contactos_model');
    

    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(FALSE);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }      
  }

  // Listado del ABM de slider 
  public function index(){      
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('secciones.js?v='.rand(),'sweetalert2.min.js');
    $this->data['modulos'] = array('Nosotros', 'Servicios');
    $this->data['mensajes'] = $this->Contactos_model->get_AllBackend();
    $this->template->load('layout_back', 'contactos_abm_view', $this->data);  
  }

}