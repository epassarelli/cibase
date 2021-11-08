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
    
        $this->load->model('Home_model');

        //   //Nombre de la base de datos
        //   $base = $this->db->database;
        //   //Revisamos si hay tablas en la base de datos
        //   $tables = count($this->db->query("SHOW TABLES FROM $base")->result_array());
        //   //Ejecutamos la migracion si no hay tablas en la base
        //   ($tables === 0) && redirect('mipanel/install','refresh');

  }
	
	// Carga el Nosotros para el front
	public function index(){
        
        $data['sitio'] = $this->Home_model->getInfoSitio(base_url());
        
        // Si encontré un sitio para esa url
        if($data['sitio']){
            
            // Traigo las secciones del sitio
            $data['secciones'] = $this->Home_model->getSeccionesActivas($data['sitio']->sitio_id);
            $data['landing']    = True;

            // Guardo todos los datos del sitio en session
            foreach ($data['sitio'] as $key => $value) {
                $this->session->set_userdata($key, $value);
            }            

            // Si hay secciones creadas y activas las traigo
            if(count($data['secciones']) > 0){
                $data['view']       = 'home_view';
                $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
            }
            else{
                // Sino muestro sitio en construcción   
                $this->load->view('sitio_en_construccion.html');         
            }
        }
        // Sino muestro sitio en construcción
        else{
            // Sino muestro sitio en construcción   
            $this->load->view('sitio_en_construccion.html');               
        }

	}

}