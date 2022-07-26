<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stocks  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Productos_model');
    $this->load->model('../models/Colores_model');
    $this->load->model('../models/Talles_model');
    $this->load->model('../models/Stocks_model');
    
    
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
  $this->data['files_js'] = array('stocks.js?v='.rand(),'sweetalert2.min.js');
  $this->data['stocks'] = $this->Productos_model->getAllBy('stocks','','','');
  $this->template->load('layout_back', 'stocks_abm_view', $this->data);  
}


public function getStocks(){      
  $stocks['data'] = $this->Stocks_model->getStocks();
  echo json_encode($stocks);
}

public function getStocksHistoria($producto,$talle,$color){      
  $stocks['data'] = $this->Stocks_model->getStocksHistoria($producto,$talle,$color);
  echo json_encode($stocks);
}





public function unidadesStock(){      

  $this->data['files_css'] = array('animate.css','sweetalert2.min.css','chosen.css');
  $this->data['files_js'] = array('stocks.js?v='.rand(),'sweetalert2.min.js','chosen-select.js', 'chosen.jquery.js');
  $this->data['productos'] = $this->Productos_model->getAllBy('productos','','','titulo');
  $this->data['colores'] = $this->Colores_model->getAllBy('colores','','','');
  $this->data['talles'] = $this->Talles_model->getAllBy('talles','','','');
  $this->data['tipo_moves'] = $this->Stocks_model->getTipoMoves();
  $this->template->load('layout_back', 'stocks_unidades_view', $this->data); 



  // jquery-ui-1.9.2.js'
  
}




  public function grabaIngreso() {
      
    $data = $this->input->post('datos');
    $tipo = $this->input->post('tipo');

    $elementos = sizeof($data) ;

    for  ($i = 0; $i <= $elementos-1   ; $i++) {
        $registro=$data[$i];
        $parametros = [];
        $parametros['idproducto'] = $registro[0];
        $parametros['idtalle']    = $registro[4];
        $parametros['idcolor']    = $registro[2];
        $parametros['cantidad']   = $registro[6];
      
  

        
        //$existe=$this->Stocks_model->getOneBy('stocks', 'cantidad', $parametros,'');

        $existe = $this->Stocks_model->cuentaStock($parametros);

      if ($existe->cuantos != 0 ) {
          $this->Stocks_model->actualizarStock($parametros);
        }else{
           $this->Stocks_model->insertar($parametros);
      } 

      $parametros['usuario']    = $this->session->userdata('username');             
      $parametros['idtipomove']   = $tipo;
      $this->Stocks_model->historiaStocks($parametros);  

    }       
      echo json_encode(array('success' => TRUE,'data' => $registro, 'cantidad' => sizeof($data),'existe' => $existe));       
  }

}