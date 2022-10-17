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
    $this->load->model('productos/Carrito_model');
    
    
   
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
    $data['operacion'] = "E";

    $parametros['provincia_id'] = $data['pedido'][0]->provincia_id;
    $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
    $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre',$parametros,'localidades.nombre');
    $data['entregas']    = $this->Entregas_model->getEntregas();
    $data['cost_unit_vacio'] = parametro(10);
    $this->template->load('layout_back', 'pedidos_edit_view', $data);  
   
}


public function newPedido()
{
    $data['files_css'] = array('animate.css','sweetalert2.min.css');
    $data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
   
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $parametros['publicar'] = 1;
    $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
    $data['productos'] = $productos;
    $parametros = [];
    $data['operacion'] = "N";

    $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
    $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre','','localidades.nombre');
    $data['entregas']    = $this->Entregas_model->getEntregas();
    $data['cost_unit_vacio'] = parametro(10);
    $data['pedido'] = null;
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
         $operacion = $this->input->post('accion');
         $subtotal = $this->input->post('subtotal');
         $total    = $this->input->post('total');
         $envio    = $this->input->post('delivery');
         $cost_unit_vacio = parametro(10);
         $costo_vacio = $this->input->post('env_vacio');
         $preciounit = $this->input->post('preciounit');
         $cantidad = $this->input->post('cantidad');
         $precioitem = $this->input->post('precioitem');
         $vacio = $this->input->post('vacio');
         $producto_id = $this->input->post('producto_id');
         $titulo = $this->input->post('titulo');
         $rowCount = sizeof($producto_id); 
     

         ///cabecera
         $data_pedidos = array(
                                 "sitio_id" => $this->config->item('sitio_id'),
                                 "fecha"    => date('Y-m-d H:i:s'), 
                                 "sucursal_id" => 1, 
                                 "cliente_id"  => 0, 
                                 "apellido" => $this->input->post("apellido"),
                                 "nombre" => $this->input->post("nombre"), 
                                 "email" => $this->input->post("email"), 
                                 "telefono" => $this->input->post("telefono"), 
                                 "del_calle" => $this->input->post("del_calle"),
                                 "del_nro" => $this->input->post("del_nro"),
                                 "del_dpto" => $this->input->post("del_dpto"),
                                 "del_piso" => $this->input->post("del_piso"),
                                 "provincia_id" => $this->input->post("provincia"),
                                 "localidad_id" => $this->input->post("localidad"),
                                 "formapago_id" => 0,
                                 "observaciones" => "",
                                 "estado_id" => 1,                     
                                 "del_costo" => round((float)$envio,2),
                                 "entrega_id" => $this->input->post("entrega_id"),
                                 "subtotal" => round($subtotal,2),
                                 "total" => round($total,2),
                                 "cantidad_items" => $rowCount,
                                 "env_vacio" => round($costo_vacio,2));
         
         if ($operacion=='E') {  //edicion
                  
                  $idpedido = $this->input->post('id');
                  $this->Carrito_model->updatepedido($data_pedidos,$idpedido);
                  $this->Carrito_model->borraitemspedido($idpedido);
                  $elementos = $rowCount;
                  for  ($i = 0; $i <= $elementos-1   ; $i++) {
                      //detalle 
                      $data_item = array(
                              "pedido_id" => $idpedido,
                              "producto_id" => $producto_id[$i],
                              "cantidad" => $cantidad[$i],
                              "preciounit" => $preciounit[$i],
                              "precioitem" => $precioitem[$i],
                              "vacio" => $vacio[$i],
                            );  
                            $this->Carrito_model->grabaitem($data_item);
                  }          
                 
          }else{  //alta
            $pedido_id = $this->Carrito_model->grabapedido($data_pedidos);
            $elementos = $rowCount;
            for  ($i = 0; $i <= $elementos-1   ; $i++) {
                 //detalle 
                 $data_item = array(
                        "pedido_id" => $pedido_id,
                        "producto_id" => $producto_id[$i],
                        "cantidad" => $cantidad[$i],
                        "preciounit" => $preciounit[$i],
                        "precioitem" => $precioitem[$i],
                        "vacio" => $vacio[$i],
                      );  
                      $this->Carrito_model->grabaitem($data_item);
             }          
   
          }
          redirect('mipanel/pedidos');
         
    }else{    

      $parametros['sitio_id'] = $this->config->item('sitio_id');
      $parametros['publicar'] = 1;
      $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
      $parametros = [];
      $data['productos'] = $productos;
  
      $preciounit = $this->input->post('preciounit');
      $cantidad = $this->input->post('cantidad');
      $precioitem = $this->input->post('precioitem');
      $vacio = $this->input->post('vacio');
      $producto_id = $this->input->post('producto_id');
      $titulo = $this->input->post('titulo');
      $data['operacion'] = $this->input->post('accion');
      $parametros['id'] = $this->input->post('provincia');
      $tablaprovi =  $this->Provincias_model->getOneBy('provincias', 'nombre', $parametros,'');

      $parametros = [];
      $parametros['id'] =  $this->input->post('localidad');
      $tablalocal =  $this->Localidades_model->getOneBy('localidades', 'nombre', $parametros,'');  
      $parametros = [];

      $parametros['id'] = $this->input->post('entrega_id');
      $tablaentrega =  $this->Entregas_model->getOneBy('entregas', 'nombre', $parametros,'');  
      $parametros = [];

      

      $rowCount = sizeof($producto_id);
      for ($i = 0; $i <= $rowCount-1   ; $i++) {
        
        $registro = array('id' => $this->input->post('id'), 
                          'cantidad' =>  $cantidad[$i],
                          'titulo' => $titulo[$i],
                          'preciounit' => $preciounit[$i],
                          'precioitem' => $precioitem[$i],
                          'vacio' => $vacio[$i],
                          'fecha' =>  $this->input->post('fecha'),
                          'apellido' =>  $this->input->post('apellido'),
                          'nombre' =>  $this->input->post('nombre'),
                          'email' =>  $this->input->post('email'),
                          'telefono' =>  $this->input->post('telefono'),
                          'calle' =>  $this->input->post('del_calle'),
                          'nro' =>  $this->input->post('del_nro'),
                          'piso' =>  $this->input->post('del_piso'),
                          'dpto' =>  $this->input->post('del_dpto'),
                          'subtotal' =>  $this->input->post('subtotal'),
                          'delivery' =>  $this->input->post('delivery'),
                          'env_vacio' =>  $this->input->post('env_vacio'),
                          'total' =>  $this->input->post('total'),
                          'localidad' => $tablalocal->nombre,
                          'nomentrega' => $tablaentrega->nombre,
                          'localidad_id' =>  $this->input->post('localidad'),
                          'provincia_id' =>  $this->input->post('provincia'),
                          'entrega_id' =>  $this->input->post('entrega_id'),
                          'provincia' => $tablaprovi->nombre);
                          $data['pedido'][$i] = (object) $registro;
      }
      
      $parametros['provincia_id'] = $data['pedido'][0]->provincia_id;
      $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
      $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre',$parametros,'localidades.nombre');
      $parametros=[];
      $data['entregas']    = $this->Entregas_model->getEntregas();
      $data['cost_unit_vacio'] = parametro(10);

      $data['files_css'] = array('animate.css','sweetalert2.min.css');
      $data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
     
      $parametros['sitio_id'] = $this->config->item('sitio_id');
      $parametros['publicar'] = 1;
      $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
      $data['productos'] = $productos;
      $parametros = [];
      
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


  
 public function verPedid_old($id)
 {

 //$data['files_css'] = array('animate.css','sweetalert2.min.css');
 // $data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');
 
  $parametros['sitio_id'] = $this->config->item('sitio_id');
  $parametros['publicar'] = 1;
  $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
  $data['productos'] = $productos;
  $parametros = [];
  $data['pedido'] = $this->Pedidos_model->getPedido($id);
  $data['operacion'] = "E";

  $parametros['provincia_id'] = $data['pedido'][0]->provincia_id;
  $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
  $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre',$parametros,'localidades.nombre');
  $data['entregas']    = $this->Entregas_model->getEntregas();
  $data['cost_unit_vacio'] = parametro(10);
  

  //$vista = "mipanel/pedidos_pdf_view"; version anterior
  $vista = "mipanel/pedidos_pdf_view2"; 
  $dompdf = new Dompdf\Dompdf();
  //$dompdf->setBasePath(base_url('assets/themes/adminlte/css/pedidopdf.min.css'));
 
  $html = $this->load->view($vista,$data,true);
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();
  $pdf = $dompdf->output();
  $dompdf->stream();

 

}




 
public function verPedido($id)
{

//$data['files_css'] = array('animate.css','sweetalert2.min.css');
// $data['files_js'] = array('pedidos.js?v='.rand(),'sweetalert2.min.js');

 $parametros['sitio_id'] = $this->config->item('sitio_id');
 $parametros['publicar'] = 1;
 $productos = $this->Productos_model->getAllBy('v_productos','', $parametros,'titulo');
 $data['productos'] = $productos;
 $parametros = [];
 $data['pedido'] = $this->Pedidos_model->getPedido($id);
 $data['operacion'] = "E";

 $parametros['provincia_id'] = $data['pedido'][0]->provincia_id;
 $data['provincias']  = $this->Provincias_model->getAllBy('provincias','provincias.id,provincias.nombre','','provincias.nombre');
 $data['localidades'] = $this->Localidades_model->getAllBy('localidades','localidades.id,localidades.nombre',$parametros,'localidades.nombre');
 $data['entregas']    = $this->Entregas_model->getEntregas();
 $data['cost_unit_vacio'] = parametro(10);
 

 //$vista = "mipanel/pedidos_pdf_view"; version anterior
 $vista = "mipanel/pedidos_pdf_view2"; 
 
 
 
 ob_start();
  $this->load->view($vista,$data,false);
 $htmlv = ob_get_clean();
 $dompdf = new Dompdf\Dompdf(['enable_remote' => true]);
 $dompdf->loadHtml($htmlv);
 $dompdf->setPaper('A4', 'portrait');
 $dompdf->render();
 $dompdf->output();
 $dompdf->stream('pedido_'. $id .  '.pdf');
 



}


}