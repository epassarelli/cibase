<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    /*
    switch (ENVIRONMENT){
        case 'development': $this->output->enable_profiler(TRUE); break;           
        case 'testing': $this->output->enable_profiler(TRUE); break;
        case 'production': $this->output->enable_profiler(FALSE); break;
    }          
*/
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

  
    $this->load->model('Productos_model');
    $this->load->helper('Productos_helper');
  }

  public function index()
  {
    $data['title'] = 'Productos';
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $parametros['publicar'] = 1;
    //$productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'categoria_id');
    //$data['productos'] = $productos;
    $data['view']       = 'productos_'.$this->session->userdata('theme').'_categorias_view';
    
    $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
    $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js');

    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }

 
  public function categorias($slug = '')
  {
    $parametros['slug'] = $slug;
    $parametros['sitio_id'] = $this->config->item('sitio_id');

    $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
    $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js');


    $data['title'] = 'Productos';
    //obtengo id del slug
    $row_categoria = $this->Productos_model->getOneBy('categorias', '', $parametros, '');
   
    $categoria = $row_categoria->categoria_id; 
    $data['categorias'] = $this->Productos_model->getCategorias();  
    $productos = $this->Productos_model->getProductos($categoria);
    $data['productos'] = $productos;
  


    $data['view']       = 'productos_'.$this->session->userdata('theme').'_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }

  
  public function detalle($id='')
  {
    $data['title'] = 'Productos';
    // Obtengo el producto con el ID que recibo
    $parametros['id'] = $id;
    $producto     = $this->Productos_model->getOneBy('productos', '', $parametros, '');
    

    if($producto){
      $data['producto'] = $producto;

      // Obtengo la /s categoria /s del producto
      $catsProducto = $this->Productos_model->getCatsDelProducto($producto->id);
      $data['catsProducto'] = $catsProducto;     

      // Obtengo el /los talle /s del producto
      $tallesProducto = $this->Productos_model->getTallesDelProducto($producto->id);
      if(count($tallesProducto) > 0){
        $data['tallesProducto'] = $tallesProducto;
      }
               
      // Obtengo el /los colores /s del producto
      $coloresProducto = $this->Productos_model->getColoresDelProducto($producto->id);
      if(count($coloresProducto) > 0){
        $data['coloresProducto'] = $coloresProducto; 
      }
                
    }  
    
    // Obtengo todas las categorias para el sidebar
    $data['categorias'] = $this->Productos_model->getCategorias(); 
    
    $data['view']       = 'producto_'.$this->session->userdata('theme').'_view';

    $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
    $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js');

    // var_dump($data['producto']);
    // echo "<hr>";
    // var_dump($data['catsProducto']);
    // echo "<hr>";
    // var_dump($data['tallesProducto']);
    // echo "<hr>";
    // var_dump($data['coloresProducto']);
    // die();
    
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);    
  }


}