<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    
    switch (ENVIRONMENT){
        case 'development': $this->output->enable_profiler(TRUE); break;           
        case 'testing': $this->output->enable_profiler(TRUE); break;
        case 'production': $this->output->enable_profiler(FALSE); break;
    }          

    $this->load->model('Productos_model');
  }

  public function index()
  {
    $data['productos'] = $this->Productos_model->getProductos();  
    $data['view']       = 'productos_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }



}