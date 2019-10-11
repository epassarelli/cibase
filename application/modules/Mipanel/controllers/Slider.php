<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends MX_Controller {

  var $data;

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

    $this->load->model('slider/Slider_model');     
  }

  // Listado del ABM de slider 
  public function index(){      
    $this->data['sliders'] = $this->Slider_model->get_All();
    $this->template->load('layout_back', 'slider_abm_view', $this->data);  
  }


  // Alta de un slider
  public function insertar(){

    $this->template->load('layout_back', 'slider_form_view', $this->data);   
  }


  // Editar un slider 
  public function editar($slider_id){

    $this->template->load('layout_back', 'slider_form_view', $this->data);   
  }

}