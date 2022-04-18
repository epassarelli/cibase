<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidos  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Pedidos_model');
    $this->load->model('../models/Provincias_model');
    $this->load->model('../models/Localidades_model');
    $this->load->model('entregas/Entregas_model');
    $this->load->model('productos/Productos_model');
    
    
   
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

  // Listado del ABM de slider 
  public function index(){      
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    //$this->data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
    $this->data['files_js'] = array('sweetalert2.min.js');
    $this->data['pedidos'] = $this->Pedidos_model->getAll(); 
    $this->template->load('layout_back', 'pedidos_abm_view', $this->data);  
  }



  // Datos del ABM
  public function getPedidos()
  {
    $data['data'] = $this->Pedidos_model->getAll();
    echo json_encode($data);
  }


// Esta funcion la usamos para enviar datos
//completos del registro al js para su edicion
public function getPedidoJson()
{
    $id = $this->input->post('Id');
    $pedidos['id'] = $id;
    //$data['data'] = $this->Pedidos_model->getOneBy('pedidos','',$pedidos,'');
    $data['data'] = $this->Pedidos_model->getPedido($id);
    echo json_encode($data);
}



public function editPedido($id)
{
    $data['files_css'] = array('animate.css','sweetalert2.min.css');
    $data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
   
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $parametros['publicar'] = 1;
    $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
    $data['productos'] = $productos;
    $parametros = [];
    $data['pedido'] = $this->Pedidos_model->getPedido($id);
    $parametros['provincia_id'] = $data['pedido'][0]->provincia_id;
    $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
    $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre',$parametros,'localidades.nombre');
    $data['entregas']    = $this->Entregas_model->getEntregas();
    $data['cost_unit_vacio'] = parametro(10);
    $this->template->load('layout_back', 'pedidos_edit_view', $data);  
   
}




public function getPedidoSitio()
{
    $id       = $this->input->post('Id');
    $sitio_id = $this->config->item('sitio_id');
    $pedidos['pedido_id'] = $id;
    $pedidos['sitio_id'] = $sitio_id;
    $data['data_sitio'] = $this->Pedidos_model->getOneBy('pedidos_sitios','',$pedidos,'');
    echo json_encode($data);
}




public function pedidoValidation()
{
 
  
    $this->form_validation->set_rules('apellido','Apellido', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    $this->form_validation->set_rules('nombre','Nombre', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    if ($this->input->post('domicilio_requerido') == '1') {
          $this->form_validation->set_rules('del_calle','Apellido', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
          'max_length' => '{field} no puede exceder {param} caracteres -'));
    
          $this->form_validation->set_rules('del_nro','Numero', array('required','numeric','greater_than[0]'), array('required'   => '{field} es obligatorio',
          'numeric' => '{field} es un campo numerico -','greater_than' => '{field} debe ser mayor a cero'));
    
          $this->form_validation->set_rules('provincia','Provincia', array('greater_than[0]'), array('greater_than' => 'Debe seleccionar una provincia'));

          $this->form_validation->set_rules('localidad','Localidad', array('greater_than[0]'), array('greater_than' => 'Debe seleccionar una localidad'));

    }

    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


     



    if ($this->form_validation->run() == TRUE ) {
         

        redirect("pedidos");
        
    } else {


      $preciounit = $this->input->post('preciounit');
      $cantidad = $this->input->post('cantidad');
      $precioitem = $this->input->post('precioitem');
      $vacio = $this->input->post('vacio');
      $producto_id = $this->input->post('producto_id');
           

      var_dump($preciounit);
      var_dump($cantidad);
      var_dump($precioitem);
      var_dump($vacio);
      var_dump($producto_id);
      die();



      $data['files_css'] = array('animate.css','sweetalert2.min.css');
      $data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
     
      $parametros['sitio_id'] = $this->config->item('sitio_id');
      $parametros['publicar'] = 1;
      $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
      $data['productos'] = $productos;
      $parametros = [];
      
      //rearmar pedido para que muestre todo denuevo con las filas que agrego 
      //en la edicion o en la insercion
      //$data['pedido'] = $this->Pedidos_model->getPedido($id);
      
      
      $parametros['provincia_id'] = $data['pedido'][0]->provincia_id;
      $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
      $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre',$parametros,'localidades.nombre');
      $data['entregas']    = $this->Entregas_model->getEntregas();
      $data['cost_unit_vacio'] = parametro(10);
      $this->template->load('layout_back', 'pedidos_edit_view', $data);  
    }


}

  // Alta de un sitios
  public function setPedidos($data){
    $pedido['descripcion']      = $data['descripcion'];
    $pedido['default']   = $data['default'];
    $pedido['detalle']   = $data['detalle'];
    $pedido['relacionados']   = $data['relacionados'];
    $pedido['valor']   = $data['valor'];

    $this->Pedidos_model->setPedido($pedido);
    return TRUE;
  }

  // Editar un sitios
  public function updatePedidos($data){

    $pedido['descripcion']      = $data['descripcion'];
    $pedido['default']   = $data['default'];
    $pedido['detalle']   = $data['detalle'];
    $pedido['relacionados']   = $data['relacionados'];
    $pedido['valor']   = $data['valor'];

    
    $this->Pedidos_model->update($data['id'], $pedido);

    return TRUE;

  }

  //Eliminando un registro de la tabla de productos
  public function deletePedido()
  {
    $id = $this->input->post('Id');
   
    $this->Pedidos_model->deletePedidos($id);
    echo json_encode(array('success' => TRUE));
  }


  
 public function verpedido($id)
 {

  $pedidos['pedido_id'] = 56; //$id;
  $data['pedido'] = $this->Pedidos_model->getPedido($id);

    
 $vista ='mipanel/pedido_pdf_view';

$this->load->view($vista, $data); 

 /*
 // instantiate and use the dompdf class
 $dompdf = new Dompdf\Dompdf();
 
 $html = $this->load->view($vista,$data,true);
 
 $dompdf->loadHtml($html);
 
 // (Optional) Setup the paper size and orientation
 $dompdf->setPaper('A4', 'portrait');
 
 // Render the HTML as PDF
 $dompdf->render();
 
 // Get the generated PDF file contents
 $pdf = $dompdf->output();
 
 // Output the generated PDF to Browser
 $dompdf->stream();
*/

}


}