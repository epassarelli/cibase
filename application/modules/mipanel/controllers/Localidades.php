<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Localidades  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
   
  /*  K: lo comenté porque en el front estaba pidiendo el login
  if (!$this->ion_auth->logged_in()) {
      redirect('login');
  } */

    $this->load->model('../models/Localidades_model');
    
    
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

 

  // Esta funcion la usamos para enviar datos
  //completos del registro al js para su edicion
  public function getLocalidadesJson()
  {
    
    $parametros['provincia_id'] = $this->input->post('provincia');
    $data['data'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre,localidades.provincia_id',$parametros,'localidades.nombre');
    echo json_encode($data['data']);
  }
 

  public function getLocalidades($provincia='')
  {    
    if ($provincia=='') {
      $parametros='';
    }else{
      $parametros['provincia_id'] = $this->input->post('provincia');
    }
    $localidades = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre,localidades.provincia_id',$parametros,'localidades.nombre');
    return $localidades;
  }
 



}