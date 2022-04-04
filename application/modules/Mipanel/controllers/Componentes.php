<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Componentes  extends MX_Controller {

	var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('Componentes_model');
    
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
    $this->data['files_js'] = array('componentes.js?v='.rand(),'sweetalert2.min.js');
    $this->template->load('layout_back', 'componentes_abm_view', $this->data);  
  }


  // Datos del ABM
  public function getComponentes(){
    $data['data'] = $this->Componentes_model->get_AllBackend();    
    echo json_encode($data);
  }


   // Metodo de agregar nuevo /a 
   public function insertar(){ 

    $result = null;
    $valid_imagen = TRUE;

    if(isset($_FILES["imagen"]["name"]) and $this->input->post('imagen') !== ''){
      if($_FILES["imagen"]["name"] !=='' ){     
        $result = $this->upload('imagen','jpg|png');
        
        if (isset($result['error'])) {
          $valid_imagen = FALSE;
        }else{
          $valid_imagen = TRUE;
        }

      }
    }  

    $this->form_validation->set_rules('bloque_id', 'Bloque','required');

    if($this->form_validation->run($this)==FALSE)
    {
      $data['accion']     = 'insertar';
      $data['bloques'] = $this->Bloques_model->get_AllBackend();
      $data['files_css']  = array('animate.css','sweetalert2.min.css');
      $data['files_js']   = array('componentes.js?v='.rand(),'sweetalert2.min.js');       
      $this->template->load('layout_back', 'componentes_form_view', $data); 
    }
    else 
    {  
      //  Tomo todo lo que llegue
      $comp['bloque_id']    = $this->input->post('bloque_id');
      $comp['icono']        = $this->input->post('icono');
      $comp['texto1']       = $this->input->post('texto1');
      $comp['texto2']       = $this->input->post('texto2');
      $comp['texto3']       = $this->input->post('texto3');
      $comp['texto4']       = $this->input->post('texto4');
      $comp['texto5']       = $this->input->post('texto5');
      $comp['estado']       = 1;
      $comp['imagen']       = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen') ;

      //  Inserto
      $this->Componentes_model->insertar($comp);

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/componentes');
    }

}


   // Metodo de agregar nuevo /a 
   public function editar($id=''){ 
    $result = null;
    $valid_imagen = TRUE;

    if(isset($_FILES["imagen"]["name"]) and $this->input->post('imagen') !== ''){
      if($_FILES["imagen"]["name"] !=='' ){     
        $result = $this->upload('imagen','jpg|png');
        
        if (isset($result['error'])) {
          $valid_imagen = FALSE;
        }else{
          $valid_imagen = TRUE;
        }

      }
    }  

    $this->form_validation->set_rules('bloque_id', 'Bloque','required');

    if($this->form_validation->run($this)==FALSE)
    {
      $data['accion']     = 'editar';
      $data['bloques']    = $this->Bloques_model->get_AllBackend();
      $data['comp']       = $this->Componentes_model->get($id);
      $data['files_css']  = array('animate.css','sweetalert2.min.css');
      $data['files_js']   = array('componentes.js?v='.rand(),'sweetalert2.min.js');       
      $this->template->load('layout_back', 'componentes_form_view', $data); 
    }
    else 
    {  
      $id = $this->input->post('id');

      //  Tomo todo lo que llegue
      $comp['bloque_id']    = $this->input->post('bloque_id');
      $comp['icono']        = $this->input->post('icono');
      $comp['texto1']       = $this->input->post('texto1');
      $comp['texto2']       = $this->input->post('texto2');
      $comp['texto3']       = $this->input->post('texto3');
      $comp['texto4']       = $this->input->post('texto4');
      $comp['texto5']       = $this->input->post('texto5');
      $comp['estado']       = 1;
      $comp['imagen']       = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen') ;

      //  Inserto
      $this->Componentes_model->actualizar($comp, $id);

      // Si NamePortada está vacio hay que eliminar fisicamente la Anterior
      if(($this->input->post('NameImagen') == '' ) and ($this->input->post('ImagenOriginal') !== '') ){
        $this->deleteFile($this->input->post('ImagenOriginal'));
      }

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/componentes');
    }

}


  // Eliminación fisica
  public function eliminar(){
    
    $id = $this->input->post('Id');
      
    if($this->Componentes_model->eliminar($id)){
      echo json_encode(array('status' => true, 'message' => 'Componente eliminado con exito'));
    }   
    else{ // Mando un alert de No se puede eliminar 
        echo json_encode(array('status' => false, 'message' => 'Ha ocurrido un error al eliminar el componente'));
      }
  }


  public function cambiarEstado(){    
    $data['estado'] = ($this->input->post('Estado') == 1) ? '0' : '1';
    $id = $this->input->post('Id');
    $this->Componentes_model->actualizar($data, $id);
    echo json_encode(array('success' => TRUE,'estado' => $data['estado']));
  }


}