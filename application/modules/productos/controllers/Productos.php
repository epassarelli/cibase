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
    $data['categorias'] = $this->Productos_model->getCategorias();  
    
  //  SELECT categoria_id,catpadre_id,categoria,
  //  (CASE 
  //      WHEN catpadre_id IS NULL THEN categoria_id
  //      ELSE catpadre_id
  //    END) as nivel
  //from `categorias` where sitio_id=3
  //ORDER BY nivel


    foreach ($data['categorias'] as $cat) {
    //  echo '<h3>' . $cat->categoria_id . ' ' . $cat->catpadre_id . ' ' . $cat->categoria . '</h3>';
    }
    //die();

    $data['view']       = 'productos_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }



}