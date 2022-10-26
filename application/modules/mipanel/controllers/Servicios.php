<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends MX_Controller {

	var $data; 

public function __construct()
{
	parent::__construct();
// Redireccionamos por si no esta logueado
	if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }
// Cargamos los modelos
	$this->load->model('servicios/Servicios_model');
}

  // Listado del ABM de Servicios  // Listado del ABM de slider 
  public function index(){      
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('servicios.js?v='.rand(),'sweetalert2.min.js');
    // $this->data['nosotros'] = $this->Nosotros_model->get_All();
    $this->template->load('layout_back', 'servicios_abm_view', $this->data);  
  }

  // Datos del ABM
  public function getServicios()
  {
    $data['data'] = $this->Servicios_model->get_AllBackend();
    echo json_encode($data);
  }

  public function accion()
  {
      $data = array('success' => false, 'messages' => array());

      $this->form_validation->set_rules('Titulo', 'Titulo', 'required');
      $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required');
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      if ($this->form_validation->run() == TRUE) {
          
          //Tomamos los valores
          $opcion = $this->input->post('Opcion');
          $servicio['id'] = $this->input->post('Id');
          $servicio['titulo'] = $this->input->post('Titulo');
          $servicio['descripcion'] = $this->input->post('Descripcion');

          // Pasar el switch
          switch ($opcion) {

              case 'insertar':
                  $data['success'] = $this->setServicio($servicio);
              break;

              case 'editar':
                  $data['success'] = $this->updateServicio($servicio);
              break;
          }
         
      } else {
          foreach ($_POST as $key => $value) {
              $data['messages'][$key] = form_error($key);
          }
      }

      echo json_encode($data);

  }
  // Alta de un slider
  public function setServicio($data){
    
      $servicio['titulo'] = $data['titulo'];
      $servicio['descripcion'] = $data['descripcion'];
      $servicio['estado'] = 1;


      $this->Servicios_model->setServicio($servicio);

      return TRUE;
  }

  // Editar un slider
  public function updateServicio($data){

      $servicio['titulo'] = $data['titulo'];
      $servicio['descripcion'] = $data['descripcion'];

      $this->Servicios_model->updateServicio($data['id'], $servicio);

      return TRUE;

  }

  public function deleteServicio()
  {
    $id = $this->input->post('Id');

    $this->Servicios_model->deleteServicio($id);
    
    echo json_encode(array('success' => TRUE));

  }

  public function cambioEstado()
  {
    $estado = $this->input->post('Estado');
    $id = $this->input->post('Id');
    $estadoNuevo = $this->Servicios_model->cambioEstado($id,$estado);
    echo json_encode(array('success' => TRUE,'estado' => $estadoNuevo));
  }


}//class

/* End of file Servicios.php */
/* Location: ./application/modules/Mipanel/controllers/Servicios.php */
?>