<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

 	public function __construct() {
    parent::__construct();
    
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

      //Nombre de la base de datos
      $base = $this->db->database;

      //Revisamos si hay tablas en la base de datos
      $tables = count($this->db->query("SHOW TABLES FROM $base")->result_array());

      //Ejecutamos la migracion si no hay tablas en la base
      ($tables === 0) && redirect('mipanel/install','refresh');

  }
	
	// Carga el Nosotros para el front
	public function index(){
    $data['landing']  = $this->config->item('landing');
    $data['modulos']  = $this->config->item('modulos');
    $data['view']     = 'home_view';
		$this->load->view('layout_'.$this->config->item('theme').'_view', $data);
	}

}