<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Provincias  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Provincias_model');
    
   
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

public function getProvinciasJson()
{

  $data['data'] = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
  echo json_encode($data);
}

public function getProvincias()
{
  $provincias = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
  return $provincias;

}





}