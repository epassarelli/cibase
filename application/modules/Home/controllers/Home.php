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

            // Guardo todos los datos del sitio en session
            foreach ($data['sitio'] as $key => $value) {
                $this->session->set_userdata($key, $value);
            }      
            echo "<h4>Datos del sitio:</h4>";
            var_dump($data['sitio']);
            echo "<hr>";
            // Traigo las secciones del sitio
            $data['secciones'] = $this->Home_model->getSeccionesBy('sitio_id',$data['sitio']->sitio_id);

            foreach ($data['secciones'] as $seccion) {
                echo "<h1>Seccion:</h1>";
                // var_dump($seccion);
                foreach ($seccion as $key => $value) {
                    echo $key . ': ' . $value . '<br>';
                }
                echo "<hr>";
                
                $data['bloques'] = $this->Home_model->getBloquesBy('seccion_id', $seccion['seccion_id']);
                //$this->session->set_userdata($key, $value);
                
                foreach ($data['bloques'] as $bloque) {
                    echo "<h2>Bloque:</h2>";
                    // var_dump($bloque);
                    foreach ($bloque as $key => $value) {
                        echo $key . ': ' . $value . '<br>';
                    }

                    echo "<hr>";

                    $data['componentes'] = $this->Home_model->getComponentesBy('bloque_id', $bloque['bloque_id']);
                    foreach ($data['componentes'] as $componente) {
                        echo "<h3>Componente:</h3>";
                        // var_dump($componente);
                        foreach ($componente as $key => $value) {
                            echo $key . ': ' . $value . '<br>';
                        }
                        echo "<hr>";
                    }                    
                }
            } 

            var_dump('Fin contenido del sitio en Secciones, Bloques y Componentes');die();
            $data['landing']    = True;

         

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