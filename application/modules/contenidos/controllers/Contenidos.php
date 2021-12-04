<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends MX_Controller {

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
    
        $this->load->model(array('Secciones_model','Bloques_model','Componentes_model'));
    }
	
	// Carga el Nosotros para el front
	public function index(){

	}


    public function pagina($slug='')
    {
        $params = array(
            'sitio_id' => $this->config->item('sitio_id'),
            'slug'  => $slug, 
            'estado' => 1
        );

        $secciones = $this->Secciones_model->getSeccionesPor($params);

        if($secciones){
            
            $seccion = $secciones[0];
            $params2 = array(
                'b.seccion_id' => $seccion->seccion_id,
                'b.estado' => 1
            );

            $data['bloques']    = $this->Bloques_model->getBloquesPor($params2);
            
        }
        else{
            var_dump('NO Existe la seccion');
        }
        $data['view']       = 'contenidos_view';
        $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
    }
    

    public function bloque($bloque_id='', $vista='')
    {
        $params = array(
            'bloque_id' => $bloque_id,
        ); 
        $bloques = $this->Bloques_model->getBloquesPor($params);
        $bloque = $bloques[0];

        $data['bloque'] = $bloque; 

        $params2 = array(
            'bloque_id' => $bloque->bloque_id,
            'estado' => 1
        ); 

        $data['componentes'] = $this->Componentes_model->getComponentesPor($params2);

        $this->load->view($vista, $data);

    }

}