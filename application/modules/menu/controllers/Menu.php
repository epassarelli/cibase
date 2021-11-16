<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MX_Controller {

 	public function __construct() {        
    parent::__construct();   
    switch (ENVIRONMENT)
      {
        case 'development': $this->output->enable_profiler(TRUE); break;           
        case 'testing': $this->output->enable_profiler(TRUE); break;
        case 'production': $this->output->enable_profiler(FALSE); break;
      }          
    $this->load->model('Menu_model');
  }


  public function main($seccion_id=''){
    $landing = $this->session->userdata('landing');
    
    if($landing){
      $items = $this->Menu_model->getBloques($seccion_id);
    }else{
      $items = $this->Menu_model->getSecciones();
    }
    
    return $items;
  }



}