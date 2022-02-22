<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bloques  extends MX_Controller {

	var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('Bloques_model');
    
    switch (ENVIRONMENT){
      case 'development':
      ($this->input->is_ajax_request()) ? $this->output->enable_profiler(false):$this->output->enable_profiler(true);
          break;          
      case 'testing':
      ($this->input->is_ajax_request()) ? $this->output->enable_profiler(false):$this->output->enable_profiler(true);
          break;
      case 'production':
      ($this->input->is_ajax_request()) ? $this->output->enable_profiler(false):$this->output->enable_profiler(false);
          break;
      }    
  }




  // Listado del ABM de slider 
  public function index(){      
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('bloques.js?v='.rand(),'sweetalert2.min.js');
    $this->template->load('layout_back', 'bloques_abm_view', $this->data);  
  }

  // Datos del ABM
  public function getBloques()
  {
    $data['data'] = $this->Bloques_model->get_AllBackend();
    
    echo json_encode($data);
  }



}