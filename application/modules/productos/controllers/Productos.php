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
    
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'categoria_id');
    $data['productos'] = $productos;
    $data['view']       = 'productos_'.$this->session->userdata('theme').'_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }

 

  public function categorias($slug = '')
  {
    $parametros['slug'] = $slug;
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    
    //obtengo id del slug
    $row_categoria = $this->Productos_model->getOneBy('categorias', '', $parametros, '');
   
    $categoria = $row_categoria->categoria_id; 
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $productos = $this->Productos_model->getProductos($categoria);
    $data['productos'] = $productos;
  


    $data['view']       = 'productos_'.$this->session->userdata('theme').'_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }




}