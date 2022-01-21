<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    
    switch (ENVIRONMENT){
        case 'development': $this->output->enable_profiler(TRUE); break;           
        case 'testing': $this->output->enable_profiler(TRUE); break;
        case 'production': $this->output->enable_profiler(FALSE); break;
    }          

    $this->load->model('Carrito_model');
    $this->load->helper('Productos_helper');
  }

  public function index()
  {
    
    // $data['productos'] = $this->Productos_model->getCategorias();  
    // $parametros['sitio_id'] = $this->config->item('sitio_id');
    // $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'categoria_id');
    // $data['productos'] = $productos;
    $data['view']       = 'carrito_'.$this->session->userdata('theme').'_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }

 


}