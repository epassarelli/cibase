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
    
    //$data['productos'] = $this->Productos_model->getProductos();  
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $productos = $this->Productos_model->getAllBy('v_productos','', '','categoria_id');
    $data['productos'] = $productos;

    foreach ($data['categorias'] as $cat) {
    //  echo '<h3>' . $cat->categoria_id . ' ' . $cat->catpadre_id . ' ' . $cat->categoria . '</h3>';
    }
    //die();

    $data['view']       = 'productos_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }


  public function productos_categorias($categoria = 0)
  {
    
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $parametros['categoria_id'] = $categoria;
    $productos = $this->Productos_model->getAllBy('v_productos','',$parametros,'titulo');
    $data['productos'] = $productos;

    foreach ($data['categorias'] as $cat) {
    //  echo '<h3>' . $cat->categoria_id . ' ' . $cat->catpadre_id . ' ' . $cat->categoria . '</h3>';
    }
    //die();

    $data['view']       = 'productos_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }


  
  public function productos_categoriasp($categoria = 0)
  {
    
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $parametros['catpadre_id'] = $categoria;
    $parametros['categoria_id'] = $categoria;
    $productos = $this->Productos_model->getAllBy('v_productos','',$parametros,'titulo',1);
    $data['productos'] = $productos;

    foreach ($data['categorias'] as $cat) {
    //  echo '<h3>' . $cat->categoria_id . ' ' . $cat->catpadre_id . ' ' . $cat->categoria . '</h3>';
    }
    //die();

    $data['view']       = 'productos_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }

}