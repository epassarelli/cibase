<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Impuestos  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Impuestos_model');
    
  }

 

// Listado del ABM de slider 
public function index(){      
  $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
  $this->data['files_js'] = array('impuestos.js?v='.rand(),'sweetalert2.min.js');
  $this->data['impuestos'] = $this->Impuestos_model->getAllBy('impuestos','','','titulo');
  $this->template->load('layout_back', 'impuestos_abm_view', $this->data);  
}




public function accion()
{
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('titulo','Titulo', array('required','max_length[50]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

        
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


  if ($this->form_validation->run() == TRUE ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $impuesto['impuesto_id']        = $this->input->post('impuesto_id');
        $impuesto['titulo']  = $this->input->post('titulo');
        $impuesto['porcentaje']  = $this->input->post('porcentaje');

              
        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
           
              $data['success'] = $this->setImpuestos($impuesto);
            break;

            case 'editar':
                $data['success'] = $this->updateImpuestos($impuesto);
            break;
        }

        
    } else {
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }
        
    }

    echo json_encode($data);

}



  public function setImpuestos($data){
    $impuesto['titulo']   = $data['titulo'];
    $impuesto['porcentaje']   = $data['porcentaje'];
    $this->Impuestos_model->setImpuestos($impuesto);
    return TRUE;
  }


  
// Datos del ABM retorna json
public function getImpuestos(){
  $data['data'] = $this->Impuestos_model->getAllBy('impuestos','','','titulo');
  echo json_encode($data);
}



  public function getImpuestoJson(){
    $parametros['impuesto_id'] = $this->input->post('Id');
    $data['data'] = $this->Impuestos_model->getOneBy('impuestos','',$parametros,'');
    echo json_encode($data);
  }
 



  
  public function updateImpuestos($data){
    $impuesto['titulo']   = $data['titulo'];
    $impuesto['porcentaje']   = $data['porcentaje'];
    $id= $data['impuesto_id'];

    $this->Impuestos_model->update($id , $impuesto);
    return TRUE;

  }



  
  public function deleteImpuesto()
  {
    $id = $this->input->post('Id');

  
    $this->Impuestos_model->deleteImpuesto($id);
    echo json_encode(array('success' => TRUE));
  }



   
/*******************************************************************************************************************/











  


}