<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloques extends MX_Controller {

 	public function __construct() {
    parent::__construct();
   // $this->load->model('Bloques_model');
    $this->load->model('../componentes/Componentes_model');

    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(TRUE);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }          
  }

	public function index(){
   
     echo '<h4>controller bloques<h4>';

	}

/*
    public function preview($bloque_id = 0,$vista) {
        $bloque = $this->Bloques_model->get_bloque($bloque_id);
        $componentes = $this->Componentes_model->getComponentesBloques($bloque_id);

        $data['bloque'] = $bloque;
        $data['componentes'] = $componentes;

        var_dump($bloque);
        var_dump($componentes);
        die();


        $this->load->view($vista,$data); 

        
    }
*/


}