<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    
    switch (ENVIRONMENT){
        case 'development': $this->output->enable_profiler(TRUE); break;           
        case 'testing': $this->output->enable_profiler(TRUE); break;
        case 'production': $this->output->enable_profiler(FALSE); break;
    }          

    $this->load->model('Publicaciones_model');
  }

  public function index()
  {
    $data['articulos'] = $this->Publicaciones_model->getArticulosPor($params);  
    $data['view']      = 'publicaciones_list_'.$this->session->userdata('theme').'_1_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }



  public function mostrar($slugArticulo='')
  {
    $data['articulo'] = $this->Publicaciones_model->getArticuloBy('slug', $slugArticulo);

    $data['relacionados'] = $this->Publicaciones_model->getArticuloRelacionados($idCategoria, $idArticulo);

    $data['view']       = 'publicaciones_single_'.$this->session->userdata('theme').'_1_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }



  public function categoria($slugCategoria='')
  {
    $params = array(
        'slug' => $slugCategoria
    );    
    $rsCats = $this->Publicaciones_model->getCategoriasPor($params);
    $categoria = $rsCats[0];
    $idCategoria = $categoria->categoria_id;
    //var_dump($idCategoria);

    $params2 = array(
        'categoria_id' => $idCategoria,
        //'estado' => 1 ¿ Por que no funciona si pongo estado?
    );
    $data['articulos'] = $this->Publicaciones_model->getArticulosPor($params2);
    //var_dump($data['articulos']);die();
    
    //$articulo = $data['articulos'][0];
    //var_dump($data['articulo']);die();
    $data['otrasCategorias'] = $this->Publicaciones_model->getOtrasCategorias($idCategoria);

    $data['view']       = 'publicaciones_list_'.$this->session->userdata('theme').'_1_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }

}