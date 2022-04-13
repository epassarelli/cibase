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
    $this->data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
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




public function accion()
{
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('descripcion','Descripcion', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    $this->form_validation->set_rules('default','Valor Default', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));
    


    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


    if ($this->form_validation->run() == TRUE ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $pedido['id']        = $this->input->post('id');
        $pedido['detalle']  = $this->input->post('detalle');
        $pedido['descripcion']    = $this->input->post('descripcion');
        $pedido['default']    = $this->input->post('default');
        $pedido['relacionados'] = $this->input->post('relacionados');
        $pedido['valor'] = $this->input->post('valor');

        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
                $data['success'] = $this->setPedidos($pedido);
            break;

            case 'editar':
                $data['success'] = $this->updatePedidos($pedido);
            break;
        }

        
    } else {
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }

    }

    echo json_encode($data);

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