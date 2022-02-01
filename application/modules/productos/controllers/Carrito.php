<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    /// PARAMETRO 2 = "S" Requiere registro
    if (parametro(2)== 'S') {
      if (!$this->ion_auth->logged_in()) {
        redirect('login');
      }
    }
    
   
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

   
    $this->load->model('Carrito_model');
    $this->load->model('Productos_model');
    $this->load->model('mipanel/Provincias_model');
    $this->load->model('mipanel/Localidades_model');
    $this->load->helper('Productos_helper');




  }

  public function index()
  {

    $data['view']       = 'carrito_'.$this->session->userdata('theme').'_view';

    $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js');
    $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');

    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }


  public function agregarCarrito() {
       $producto_id = $this->input->post('producto_id');
       $cantidad = $this->input->post('cantidad');
      
       $producto = $this->Productos_model->getProducto($producto_id);
       $totallastitem = 0;
       if (!isset($cantidad) or $cantidad == null) {
         $cantidad = 1;
       }
       $_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] + $cantidad;

       ///// verificamos que existe para solo incrementar la cantidad
       $existe = 0;
       $elementos = sizeof($_SESSION['carrito']);
       for  ($i = 0; $i <= $elementos-1   ; $i++) {
          if ($_SESSION['carrito'][$i]['tipo']=='item'){
            if ($_SESSION['carrito'][$i]['codigo']==$producto_id){
                $existe=1;
                $_SESSION['carrito'][$i]['cantidad'] =  $_SESSION['carrito'][$i]['cantidad'] + $cantidad;
                $_SESSION['carrito'][$i]['totalitem'] =  $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];

                $totallastitem = $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];
            }  
          }
       }
       if ($existe==0) {
          if (enOferta($producto->precioOF,$producto->OfDesde,$producto->OfHasta)) {
            $precioventa  = $producto->precioOF;
          }else{
            $precioventa  = $producto->precioLista;
          }
          $imagen = base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $producto->imagen;
          $_SESSION['carrito'][] = 
          array('tipo' => 'item',
                'cantidad' => $cantidad, 
                'codigo' => $producto_id,
                'titulo' => $producto->titulo,
                'precio' => $precioventa,
                'imagen' => $imagen,
                'totalitem' => $cantidad*$precioventa,
              );
              $totallastitem= $cantidad*$precioventa;    
       } 
       
        ///retorno en el json el utimo calculo para cambiar en el fornt 
       

       $response = array('success' => 'OK','items' => $_SESSION['carrito'][0]['cantidad'], 'totallastitem' => $totallastitem);
       echo json_encode($response);
  }


  public function quitarCarrito() {
       
    $producto_id = $this->input->post('producto_id');
    $cantidad = $this->input->post('cantidad');
    $producto = $this->Productos_model->getProducto($producto_id);
    if (!isset($cantidad) or $cantidad == null) {
      $cantidad = -1;
    }
    $totallastitem = 0;


    ///// verificamos que existe para decrementar cantidad
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
       if ($_SESSION['carrito'][$i]['tipo']=='item'){
         if ($_SESSION['carrito'][$i]['codigo']==$producto_id){
             if($_SESSION['carrito'][$i]['cantidad'] > 1) {
                  $_SESSION['carrito'][$i]['cantidad'] =  $_SESSION['carrito'][$i]['cantidad'] -1;
                  $_SESSION['carrito'][$i]['totalitem'] =  $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];
                  
                  ///retorno en el json el utimo calculo para cambiar en el fornt 
                  $totallastitem = $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];

                  $_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] -1;
             } 
         }  
       }
    }
    
    $response = array('success' => 'OK','items' => $_SESSION['carrito'][0]['cantidad'], 'totallastitem' => $totallastitem);
    echo json_encode($response);
  }


  public function cambiarCarrito() {
       
    $producto_id = $this->input->post('producto_id');
    $cantidad = $this->input->post('cantidad');
    $parcial = 0;

    ///// verificamos que existe para decrementar cantidad
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
       if ($_SESSION['carrito'][$i]['tipo']=='item'){
         if ($_SESSION['carrito'][$i]['codigo']==$producto_id){
            /// descuento del total de items la cantidad anterior
            $_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] - $_SESSION['carrito'][$i]['cantidad'];

            /// le pongo al articulo la cantidad nueva
            $_SESSION['carrito'][$i]['cantidad'] = $cantidad;

            /// sumo al total de items la nueva cantidad
            $_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] + $_SESSION['carrito'][$i]['cantidad'];
            
            /// calculo precio por cantidad
            
            $_SESSION['carrito'][$i]['totalitem'] =  $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];

            $parcial = $_SESSION['carrito'][$i]['totalitem'];
            //$$parcial = number_format($parcial1, 2, ',', '.');

          }  
       }
    }
    
    $response = array('success' => 'OK','items' => $_SESSION['carrito'][0]['cantidad'], 'parcial' => $parcial);
    echo json_encode($response);
  }


  public function pieCarrito() {
       
    $subtotal = 0;
   
    
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
       if ($_SESSION['carrito'][$i]['tipo']=='item'){
          $subtotal = $subtotal + $_SESSION['carrito'][$i]['totalitem']; 
       }  
    }

    $costoenvio  = parametro(3);

    if ($costoenvio == 0 or $costoenvio == null) {
      $envio = 'Sin costo ede envío';
      $total = $subtotal;
    } else {
      $envio = $costoenvio;
      $total = $subtotal + $costoenvio;
    }


    
    $response = array('success' => 'OK',
                       'total' => $total,
                       'subtotal' => $subtotal,
                       'envio' => $envio
                      );
    echo json_encode($response);
  }


  public function eliminarItemCarrito() {
       
      $producto_id = $this->input->post('producto_id');


      ///// verificamos que existe para decrementar cantidad
      $elementos = sizeof($_SESSION['carrito']);
      $aborrar = -1;
      for  ($i = 0; $i <= $elementos-1   ; $i++) {
        if ($_SESSION['carrito'][$i]['tipo']=='item'){
          if ($_SESSION['carrito'][$i]['codigo']==$producto_id){

              //guardo la cantidad a borrar del total  
              $cantidadaborrar = $_SESSION['carrito'][$i]['cantidad'] =  $_SESSION['carrito'][$i]['cantidad'];
              
              //seteo la cantidad restada
              $_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] - $cantidadaborrar;

              //elimino la variable de la memoria 
              //unset($_SESSION['carrito'][$i]);
              // reordeno los indices del array
              $aborrar = $i;
          } 
        }  
      }

      if ($aborrar !== -1 ) {
        array_splice($_SESSION['carrito'],$aborrar,1);
      }
  
    
    $response = array('success' => 'OK','items' => $_SESSION['carrito'][0]['cantidad'], 'totallastitem' => 0);
    echo json_encode($response);
  }

  public function checkout() {
    
    $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js');
    $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
    $data['provincias'] = $this->Provincias_model->getAllBy('provincias','', '','nombre');
    $parametros['provincia_id'] = 86;
    $data['localidades'] = $this->Localidades_model->getAllBy('localidades','', $parametros,'nombre');
    $data['view']       = $this->session->userdata('theme').'-shop-checkout';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
 
  } 

   
  public function checkout_validation()  {
       
   $this->form_validation->set_rules('nombre','Nombre',array('required'),
                  array('required'   => 'Debe ingresar un nombre'));
  
   $this->form_validation->set_rules('apellido','Apellido',array('required'),
                  array('required'   => 'Debe ingresar un apellido'));

   $this->form_validation->set_rules('email','Email',array('required'),
                  array('required'   => 'Debe ingresar un email'));
               
   $this->form_validation->set_rules('telefono','telefono',array('required'),
                  array('required'   => 'Debe ingresar un telefono'));

   if (parametro(4) == "S") {
      $this->form_validation->set_rules('calle','calle',array('required'),
          array('required'   => 'Debe ingresar un calle'));
      $this->form_validation->set_rules('nro','nro',array('required'),
          array('required'   => 'Debe ingresar un nro'));
     // $this->form_validation->set_rules('piso','piso',array('required'),
     //     array('required'   => 'Debe ingresar un piso'));
     // $this->form_validation->set_rules('dpto','dpto',array('required'),
     //     array('required'   => 'Debe ingresar un dpto'));
      $this->form_validation->set_rules('provincia','provincia',array('greater_than[0]'),
          array('greater_than'   => 'Debe ingresar un provincia'));
      $this->form_validation->set_rules('localidad','localidad',array('greater_than[0]'),
          array('greater_than'   => 'Debe ingresar un localidad'));
    }
  
   if ($this->form_validation->run() == true) {
    
      $subtotal = 0;
      $total = 0;
      $envio = 0;
      $cantidad = 0;

      $elementos = sizeof($_SESSION['carrito']);
      for  ($i = 0; $i <= $elementos-1   ; $i++) {
         if ($_SESSION['carrito'][$i]['tipo']=='item'){
            $subtotal = $subtotal + $_SESSION['carrito'][$i]['totalitem']; 
            $cantidad = $cantidad +1;
         }  
      }
  
      $costoenvio  = parametro(3);
  
      if ($costoenvio == 0 or $costoenvio == null) {
        $envio = 0;
        $total = $subtotal + $costoenvio;
      }

        $data_pedidos = array(
                              "sitio_id" => $this->config->item('sitio_id'),
                              "fecha"    => date('Y-m-d H:i:s'), 
                              "sucursal_id" => 1, 
                              "cliente_id"  => 0, 
                              "apellido" => $this->input->post("apellido"),
                              "nombre" => $this->input->post("nombre"), 
                              "email" => $this->input->post("email"), 
                              "telefono" => $this->input->post("telefono"), 
                              "del_calle" => $this->input->post("calle"),
                              "del_nro" => $this->input->post("nro"),
                              "del_dpto" => $this->input->post("dpto"),
                              "del_piso" => $this->input->post("piso"),
                              "provincia_id" => $this->input->post("provincia"),
                              "localidad_id" => $this->input->post("localidad"),
                              "formapago_id" => 0,
                              "observaciones" => "",
                              "estado_id" => 1,                     
                              "del_costo" => $envio,
                              "subtotal" => $subtotal,
                              "total" => $total,
                              "cantidad_items" => $cantidad);
    
        
      
      $pedido_id = $this->Carrito_model->grabapedido($data_pedidos);

      $elementos = sizeof($_SESSION['carrito']);
      for  ($i = 0; $i <= $elementos-1   ; $i++) {
         if ($_SESSION['carrito'][$i]['tipo']=='item'){
            $data_item = array(
                  "pedido_id" => $pedido_id,
                  "producto_id" => $_SESSION['carrito'][$i]['codigo'],
                  "cantidad" => $_SESSION['carrito'][$i]['cantidad'],
                  "preciounit" => $_SESSION['carrito'][$i]['precio'],
                  "precioitem" => $_SESSION['carrito'][$i]['totalitem']);  
            $this->Carrito_model->grabaitem($data_item);
         }  
      }
       

       ///// borramos carro en session 
       $_SESSION['carrito'] = null;

       
       redirect("productos");
     }else{  
        $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js');
        $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
        $data['provincias'] = $this->Provincias_model->getAllBy('provincias','', '','nombre');
        $parametros['provincia_id'] = 86;
        $data['localidades'] = $this->Localidades_model->getAllBy('localidades','', $parametros,'nombre');
        $data['view']       = $this->session->userdata('theme').'-shop-checkout';
        $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
   
    }
  }

}