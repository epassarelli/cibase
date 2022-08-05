<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    /// PARAMETRO 2 = "S" Requiere registro
    //if (parametro(2)== 'S') {
     //   if (!$this->ion_auth->logged_in()) {
     //   redirect('login');
     // }
    //}
    
   
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
    $this->load->model('entregas/Entregas_model');
    $this->load->model('mipanel/Provincias_model');
    $this->load->model('mipanel/Localidades_model');
    $this->load->helper('Productos_helper');




  }

  public function index()
  {

    $data['view']  = 'carrito_'.$this->session->userdata('theme').'_view';
    $data['title'] = 'Carrito';
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
                'unidadvta' => $producto->unidadvta,
                'totalitem' => $cantidad*$precioventa,
                'vacio' => 0
              );
              $totallastitem= $cantidad*$precioventa;    
       } 
       
        ///retorno en el json el utimo calculo para cambiar en el fornt 
       
            /// incrementa total del carrito
            $muestratotal=0;
            $elementos = sizeof($_SESSION['carrito']);
            for  ($i = 0; $i <= $elementos-1   ; $i++) {
                if ($_SESSION['carrito'][$i]['tipo']=='item'){
                  if (parametro(8)=="B") { 
                    $muestratotal = $muestratotal +1;
                  }else{  
                    $muestratotal = $muestratotal + $_SESSION['carrito'][$i]['cantidad']; 
                  }  
                }
            }
            //$_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] + $cantidad;
            $_SESSION['carrito'][0]['cantidad'] = $muestratotal;

            

       $response = array('success' => 'OK',
                         'items' => $_SESSION['carrito'][0]['cantidad'], 
                         'totallastitem' => $totallastitem);
       echo json_encode($response);
  }


  public function quitarCarrito() {
       
    $producto_id = $this->input->post('producto_id');
    $cantidad = $this->input->post('cantidad');
    $producto = $this->Productos_model->getProducto($producto_id);
    if (!isset($cantidad) or $cantidad == null) {
      $cantidad = 1;
    }
    $totallastitem = 0;


    ///// verificamos que existe para decrementar cantidad
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
       if ($_SESSION['carrito'][$i]['tipo']=='item'){
         if ($_SESSION['carrito'][$i]['codigo']==$producto_id){
             if($_SESSION['carrito'][$i]['cantidad'] > $cantidad) {
                  $_SESSION['carrito'][$i]['cantidad'] =  $_SESSION['carrito'][$i]['cantidad'] - $cantidad;
                  $_SESSION['carrito'][$i]['totalitem'] =  $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];
                  
                  ///retorno en el json el utimo calculo para cambiar en el fornt 
                  $totallastitem = $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];

                  //$_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] - $cantidad;
             } 
         }  
       }
    }
    
    /// incrementa total del carrito
    $muestratotal=0;
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
        if ($_SESSION['carrito'][$i]['tipo']=='item'){
          if (parametro(8)=="B") { 
            $muestratotal = $muestratotal +1;
          }else{  
            $muestratotal = $muestratotal + $_SESSION['carrito'][$i]['cantidad']; 
          }  
        }
    }
    $_SESSION['carrito'][0]['cantidad'] = $muestratotal;



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

            /// calculo precio por cantidad
            
            $_SESSION['carrito'][$i]['totalitem'] =  $_SESSION['carrito'][$i]['cantidad'] * $_SESSION['carrito'][$i]['precio'];

            $parcial = $_SESSION['carrito'][$i]['totalitem'];
            //$$parcial = number_format($parcial1, 2, ',', '.');

          }  
       }
    }
      /// incrementa total del carrito
      $muestratotal=0;
      $elementos = sizeof($_SESSION['carrito']);
      for  ($i = 0; $i <= $elementos-1   ; $i++) {
          if ($_SESSION['carrito'][$i]['tipo']=='item'){
            if (parametro(8)=="B") { 
              $muestratotal = $muestratotal +1;
            }else{  
              $muestratotal = $muestratotal + $_SESSION['carrito'][$i]['cantidad']; 
            }  
          }
      }
      //$_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] + $cantidad;
      $_SESSION['carrito'][0]['cantidad'] = $muestratotal;

    $response = array('success' => 'OK','items' => $_SESSION['carrito'][0]['cantidad'], 'parcial' => $parcial);
    echo json_encode($response);
  }


  public function pieCarrito() {
       
    $subtotal = 0;
    $cost_unit_vacio = parametro(10);
    $costo_vacio = 0;
    $costoenvio  = 0;   //parametro(3); vamos a tomarlo de entregas_sitios
    
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
       if ($_SESSION['carrito'][$i]['tipo']=='item'){
          $subtotal = $subtotal + $_SESSION['carrito'][$i]['totalitem']; 
          if ($_SESSION['carrito'][$i]['vacio'] == 1){
            $costo_vacio = $costo_vacio + $cost_unit_vacio;
          }
          
       }  
    }
   
    $costoenvio =0;
    $costoenvio =$_SESSION['carrito'][0]['del_costo'];
    
    
      
    if ($costoenvio == 0 or $costoenvio == null) {
      $envio = 0; //'Sin costo de envío';
      $total = $subtotal;
    } else {
      $envio = $costoenvio;
      $total = $subtotal + $costoenvio;
    }

    if ($costo_vacio == 0 or $costo_vacio == null) {
      $costo_vacio = 0; //'Sin costo de envasado al vacio';
    } else {
      $total = $subtotal + $costo_vacio;
    
    }  

        
    $response = array('success' => 'OK',
                       'total' => number_format(round($total,2),2),
                       'subtotal' => number_format(round($subtotal,2),2),
                       'envio' => number_format(round($envio,2),2),
                       'envvacio' => number_format(round($costo_vacio,2),2)
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
  
      
        /// incrementa total del carrito
        $muestratotal=0;
        $elementos = sizeof($_SESSION['carrito']);
        for  ($i = 0; $i <= $elementos-1   ; $i++) {
            if ($_SESSION['carrito'][$i]['tipo']=='item'){
              if (parametro(8)=="B") { 
                $muestratotal = $muestratotal +1;
              }else{  
                $muestratotal = $muestratotal + $_SESSION['carrito'][$i]['cantidad']; 
              }  
            }
        }
        //$_SESSION['carrito'][0]['cantidad'] =  $_SESSION['carrito'][0]['cantidad'] + $cantidad;
        $_SESSION['carrito'][0]['cantidad'] = $muestratotal;
    
    $response = array('success' => 'OK','items' => $_SESSION['carrito'][0]['cantidad'], 'totallastitem' => 0);
    echo json_encode($response);
  }

  public function checkout() {
    $data['title'] = 'Carrito';
    $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js','localidades/js/localidades.js?v='.rand());
    $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
    $data['provincias'] = $this->Provincias_model->getAllBy('provincias','', '','nombre');
    $parametros['provincia_id'] = 6;
    $data['localidades'] = $this->Localidades_model->getAllBy('localidades','', $parametros,'nombre');
    $data['entregas'] = $this->Entregas_model->getEntregas();
    $data['entrega_id'] =  $_SESSION['carrito'][0]['entrega_id'];
    $data['view']       = $this->session->userdata('theme').'-shop-checkout';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
 
  } 

  
  public function checkout_validation()  {
  
    
    $data['title'] = 'Carrito';
   $this->form_validation->set_rules('entrega_id','Entrega',array('greater_than[0]'),
       array('greater_than'   => 'Debe ingresar una forma de envio'));

   $this->form_validation->set_rules('nombre','Nombre',array('required'),
                  array('required'   => 'Debe ingresar un nombre'));
  
   $this->form_validation->set_rules('apellido','Apellido',array('required'),
                  array('required'   => 'Debe ingresar un apellido'));

   $this->form_validation->set_rules('email','Email',array('required'),
                  array('required'   => 'Debe ingresar un email'));
               
   $this->form_validation->set_rules('telefono','telefono',array('required'),
                  array('required'   => 'Debe ingresar un telefono'));

    $entrega_id=$this->input->post("entrega_id");
    $entrega = $this->Entregas_model->getEntregas($entrega_id);

   if ($entrega[0]->pidedirec == 1) {
      $this->form_validation->set_rules('calle','calle',array('required'),
          array('required'   => 'Debe ingresar un calle'));
      $this->form_validation->set_rules('nro','nro',array('required'),
          array('required'   => 'Debe ingresar un nro'));
      $this->form_validation->set_rules('provincia','provincia',array('greater_than[0]'),
          array('greater_than'   => 'Debe ingresar un provincia'));
      $this->form_validation->set_rules('localidad','localidad',array('greater_than[0]'),
          array('greater_than'   => 'Debe ingresar un localidad'));
    }
  
   if ($this->form_validation->run() == true ) {
    
      $subtotal = 0;
      $total = 0;
      $envio = 0;
      $cantidad = 0;
      $cost_unit_vacio = parametro(10);
      $costo_vacio = 0;

      $elementos = sizeof($_SESSION['carrito']);
      for  ($i = 0; $i <= $elementos-1   ; $i++) {
         if ($_SESSION['carrito'][$i]['tipo']=='item'){
            $subtotal = $subtotal + $_SESSION['carrito'][$i]['totalitem']; 
            $cantidad = $cantidad +1;
            if ($_SESSION['carrito'][$i]['vacio'] == 1){
              $costo_vacio = $costo_vacio + $cost_unit_vacio;
            }
       
          }  
      }
  

   
      if ($subtotal == 0) {
        redirect('productos');
      }
      
      //$costoenvio  = parametro(3); vamos a tomar el costo de entregas_sitios
      $costoenvio =  $_SESSION['carrito'][0]['del_costo'];
      
      if ($costoenvio == 0 or $costoenvio == null) {
        $envio = 0;
      }else{
        $envio = $costoenvio;
      }
      $total = $subtotal + $costoenvio;

      if ($costo_vacio != 0) {
        $total = $total + $costo_vacio;
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
                              "del_costo" => round((float)$envio,2),
                              "entrega_id" => $this->input->post("entrega_id"),
                              "subtotal" => round($subtotal,2),
                              "total" => round($total,2),
                              "cantidad_items" => $cantidad,
                              "env_vacio" => round($costo_vacio,2));
    
        
      
      $pedido_id = $this->Carrito_model->grabapedido($data_pedidos);

      $elementos = sizeof($_SESSION['carrito']);
      for  ($i = 0; $i <= $elementos-1   ; $i++) {
         if ($_SESSION['carrito'][$i]['tipo']=='item'){
            $data_item = array(
                  "pedido_id" => $pedido_id,
                  "producto_id" => $_SESSION['carrito'][$i]['codigo'],
                  "cantidad" => $_SESSION['carrito'][$i]['cantidad'],
                  "preciounit" => $_SESSION['carrito'][$i]['precio'],
                  "precioitem" => $_SESSION['carrito'][$i]['totalitem'],
                  "vacio" => $_SESSION['carrito'][$i]['vacio']
                );  
            $this->Carrito_model->grabaitem($data_item);
         }  
      }
       

      // guardamos la variable de sesion para pasarla a la 
      // pasarela de pago antes de borrarla
      $data['carrito'] = $_SESSION['carrito'];

      ///// borramos carro en session 
       $_SESSION['carrito'] = null;
       
       //redirect("productos");
       $data['nombre'] = $data_pedidos['nombre'];
       $data['numero_pedido'] = $pedido_id;
       $data['mensaje'] = parametro(7);
       $data['view']       = $this->session->userdata('theme').'-shop-success';
       $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);


     }else{  
        $data['files_js'] = array('productos/js/productos.js?v='.rand(),'themes/adminlte/js/sweetalert2.min.js','localidades/js/localidades.js?v='.rand());
        $data['files_css'] = array('themes/adminlte/css/animate.css','themes/adminlte/css/sweetalert2.min.css');
        $data['provincias'] = $this->Provincias_model->getAllBy('provincias','', '','nombre');
        $parametros['provincia_id'] = 86;
        $data['localidades'] = $this->Localidades_model->getAllBy('localidades','', $parametros,'nombre');
       
        $data['entregas'] = $this->Entregas_model->getEntregas();
        $data['entrega_id'] =  $_SESSION['carrito'][0]['entrega_id'];
           
        $data['view']       = $this->session->userdata('theme').'-shop-checkout';
        $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
   
    }
  }


  public function cambiaVacio() {
       
    $producto_id = $this->input->post('producto_id');
    $estado_ant = $this->input->post('estado');

    ///// verificamos que existe para decrementar cantidad
    $elementos = sizeof($_SESSION['carrito']);
    for  ($i = 0; $i <= $elementos-1   ; $i++) {
       if ($_SESSION['carrito'][$i]['tipo']=='item'){
         if ($_SESSION['carrito'][$i]['codigo']==$producto_id){
             if($_SESSION['carrito'][$i]['vacio'] ==  1) {
                 $_SESSION['carrito'][$i]['vacio'] =  0;
                 $estado = 0;
             }else{
                 $_SESSION['carrito'][$i]['vacio'] =  1;
                 $estado = 1;
             }    

         }  
       }
    }
    $response = array('success' => 'OK','estado_ant' => $estado_ant, 'estado' => $estado);

    echo json_encode($response);
  }



  public function cambiaEntrega() {
       
    $entrega_id = intval($this->input->post('entrega_id'));

     $entrega = $this->Entregas_model->getEntregas($entrega_id);

     $valor = round($entrega[0]->costo,2);
     $pidedirec = round($entrega[0]->pidedirec,0);
     $id = $entrega[0]->id;


    $_SESSION['carrito'][0]['entrega_id'] = $entrega_id;
    $_SESSION['carrito'][0]['del_costo'] = $valor;

    $response = array('success' => 'OK',
                      'costo_entrega' => round($valor,2),
                      'pidedirec' => $pidedirec,
                      'entrega_id' => $id);

    echo json_encode($response);
  }


  public function idpago() {
    /*
    {
      "id": 12345,
      "live_mode": true,
      "type": "payment",
      "date_created": "2015-03-25T10:04:58.396-04:00",
      "application_id": 123123123,
      "user_id": 44444,
      "version": 1,
      "api_version": "v1",
      "action": "payment.created",
      "data": {
          "id": "999999999"
      }
    }*/
    //require_once 'vendor/autoload.php';
/*     switch($_POST["type"]) {
        case "payment":
            $payment = MercadoPago\Payment::find_by_id($_POST["data"]["id"]);
            break;
        case "plan":
            $plan = MercadoPago\Plan::find_by_id($_POST["data"]["id"]);
            break;
        case "subscription":
            $plan = MercadoPago\Subscription::find_by_id($_POST["data"]["id"]);
            break;
        case "invoice":
            $plan = MercadoPago\Invoice::find_by_id($_POST["data"]["id"]);
            break;
        case "point_integration_wh":
            // $_POST contiene la informaciòn relacionada a la notificaciòn.
            break;
    }
 */
    $json = json_decode($this->input->raw_input_stream);
    $data = $json->data;
    $id = $data->id;
    echo $id;
  
  }

}