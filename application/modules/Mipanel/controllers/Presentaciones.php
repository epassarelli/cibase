<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Presentaciones  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Presentaciones_model');
    
    /*
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
  */
  }

 

// Listado del ABM de slider 
public function index(){      
  $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
  $this->data['files_js'] = array('presentaciones.js?v='.rand(),'sweetalert2.min.js');
  $this->data['presentaciones'] = $this->Presentaciones_model->getAllBy('presentaciones','','','titulo');
  $this->template->load('layout_back', 'presentaciones_abm_view', $this->data);  
}




public function accion()
{
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('titulo','Titulo', array('required','max_length[50]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    $this->form_validation->set_rules('sigla','Sigla', array('required','max_length[10]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


  if ($this->form_validation->run() == TRUE ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $presentacion['presentacion_id']        = $this->input->post('presentacion_id');
        $presentacion['titulo']  = $this->input->post('titulo');
        $presentacion['sigla']  = $this->input->post('sigla');

              
        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
           
              $data['success'] = $this->setPresentaciones($presentacion);
            break;

            case 'editar':
                $data['success'] = $this->updatePresentaciones($presentacion);
            break;
        }

        
    } else {
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }
        
    }

    echo json_encode($data);

}



  public function setPresentaciones($data){
    $presentacion['titulo']   = $data['titulo'];
    $presentacion['sigla']   = $data['sigla'];
    $this->Presentaciones_model->setPresentaciones($presentacion);
    return TRUE;
  }


  
// Datos del ABM retorna json
public function getPresentaciones(){
  $data['data'] = $this->Presentaciones_model->getAllBy('presentaciones','','','titulo');
  echo json_encode($data);
}



  public function getPresentacionJson(){
    $parametros['presentacion_id'] = $this->input->post('Id');
    $data['data'] = $this->Presentaciones_model->getOneBy('presentaciones','',$parametros,'');
    echo json_encode($data);
  }
 



  
  public function updatePresentaciones($data){
    $presentacion['titulo']   = $data['titulo'];
    $presentacion['sigla']   = $data['sigla'];
    $id= $data['presentacion_id'];

    $this->Presentaciones_model->update($id , $presentacion);
    return TRUE;

  }



  
  public function deletePresentacion()
  {
    $id = $this->input->post('Id');

  
    $this->Presentaciones_model->deletePresentacion($id);
    echo json_encode(array('success' => TRUE));
  }



   
/*******************************************************************************************************************/











  


}