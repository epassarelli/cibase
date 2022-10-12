<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Entregas  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Entregas_model');
    
  }

 

// Listado del ABM de slider 
public function index(){      
  $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
  $this->data['files_js'] = array('entregas.js?v='.rand(),'sweetalert2.min.js');
  $this->data['entregas'] = $this->Entregas_model->getEntregas();
  $this->data['tipos'] = $this->Entregas_model->getTipos();
 
  $this->template->load('layout_back', 'entregas_abm_view', $this->data);  
}


public function cambioEstado()
{
 $estado = $this->input->post('Estado');
 $id = $this->input->post('Id');
 
 $estadoNuevo = $this->Entregas_model->cambioEstado($id,$estado);
 echo json_encode(array('success' => TRUE,
                        'estado' => $estadoNuevo,
                        'estadoviejo' => $estado,  //estado original
                        'id' => $id));            //id categoria  
}
 //Etadoviejo y id solo lo paso para ver lo que esta tomando 
 //por post desde la llamada ajax



 public function cambioPidedirec()
{
 $estado = $this->input->post('Estado');
 $id = $this->input->post('Id');
 
 $estadoNuevo = $this->Entregas_model->cambioPidedirec($id,$estado);
 echo json_encode(array('success' => TRUE,
                        'estado' => $estadoNuevo,
                        'estadoviejo' => $estado,  //estado original
                        'id' => $id));            //id categoria  
}



public function accion()
{
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('detalle','Detalle', array('required','max_length[100]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    $this->form_validation->set_rules('entregas_id','Tipo de Entrega', array('required','greater_than[0]'), 
                              array('required'   => '{field} es obligatorio','greater_than' => 'Debe seleccionar un tipo de entrega'));


    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


  if ($this->form_validation->run() == TRUE ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $entrega['entregas_id']        = $this->input->post('entregas_id');
        $entrega['detalle']  = $this->input->post('detalle');
        $entrega['costo']  = $this->input->post('costo');

              
        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
         
              $data['success'] = $this->setEntregas($entrega);
            break;

            case 'editar':
              $entrega['id']  = $this->input->post('id'); 
              $data['success'] = $this->updateEntregas($entrega);
            break;
        }

        
    } else {
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }
        
    }

    echo json_encode($data);

}



  public function setEntregas($data){
    $entrega['pidedirec'] = 1;
    $entrega['estado']    = 0;
    $entrega['detalle']   = $data['detalle'];
    $entrega['costo']     = $data['costo'];
    $entrega['entregas_id'] = $data['entregas_id'];
    $entrega['sitio_id'] = $this->config->item('sitio_id');
    $this->Entregas_model->setEntregas($entrega);
    return TRUE;
  }


  
// Datos del ABM retorna json
public function getEntregas(){
  $data['data'] = $this->Entregas_model->getEntregas();
  echo json_encode($data);
}



  public function getEntrega(){
    $parametros['id'] = $this->input->post('Id');
    $data['data'] = $this->Entregas_model->getOneBy('entregas_sitios','',$parametros,'');
    echo json_encode($data);
  }
 



  
  public function updateEntregas($data){
    $id= $data['id'];
    $entrega['detalle']   = $data['detalle'];
    $entrega['costo']     = $data['costo'];
    $entrega['entregas_id'] = $data['entregas_id'];
    $this->Entregas_model->update($id , $entrega);
    return TRUE;

  }



  
  public function deleteEntrega()
  {
    $id = $this->input->post('Id');

  
    $this->Entregas_model->deleteEntrega($id);
    echo json_encode(array('success' => TRUE));
  }



   
/*******************************************************************************************************************/











  


}