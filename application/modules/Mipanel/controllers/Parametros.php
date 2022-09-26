<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Parametros  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

    $this->load->model('../models/Parametros_model');
    
    
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
    $this->data['files_js'] = array('parametros.js?v='.rand(),'sweetalert2.min.js');
    
    $this->template->load('layout_back', 'parametros_abm_view', $this->data);  
  }

  // Datos del ABM
  public function getParametros()
  {
    //$data['data'] = $this->Parametros_model->getAllBy('parametros','','','');
    $data['data'] = $this->Parametros_model->getAll();
    echo json_encode($data);
  }


// Esta funcion la usamos para enviar datos
//completos del registro al js para su edicion
public function getParametroJson()
{
    $id = $this->input->post('Id');
    $parametros['id'] = $id;
    $data['data'] = $this->Parametros_model->getOneBy('parametros','',$parametros,'');
    echo json_encode($data);
}

public function getParametroSitio()
{
    $id       = $this->input->post('Id');
    $sitio_id = $this->config->item('sitio_id');
    $parametros['parametro_id'] = $id;
    $parametros['sitio_id'] = $sitio_id;
    $data['data_sitio'] = $this->Parametros_model->getOneBy('parametros_sitios','',$parametros,'');
    echo json_encode($data);
}


public function accion()
{
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('descripcion','Descripcion', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));

    $this->form_validation->set_rules('default','Valor Default', array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));
    


    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


    if ($this->form_validation->run() == TRUE ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $parametro['id']        = $this->input->post('id');
        $parametro['detalle']  = $this->input->post('detalle');
        $parametro['descripcion']    = $this->input->post('descripcion');
        $parametro['default']    = $this->input->post('default');
        $parametro['relacionados'] = $this->input->post('relacionados');
        $parametro['valor'] = $this->input->post('valor');

        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
                $data['success'] = $this->setParametros($parametro);
            break;

            case 'editar':
                $data['success'] = $this->updateParametros($parametro);
            break;
        }

        
    } else {
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }

    }

    echo json_encode($data);

}

  // Alta de un sitios
  public function setParametros($data){
    $parametro['descripcion']      = $data['descripcion'];
    $parametro['default']   = $data['default'];
    $parametro['detalle']   = $data['detalle'];
    $parametro['relacionados']   = $data['relacionados'];
    $parametro['valor']   = $data['valor'];

    $this->Parametros_model->setParametro($parametro);
    return TRUE;
  }

  // Editar un sitios
  public function updateParametros($data){

    $parametro['descripcion']      = $data['descripcion'];
    $parametro['default']   = $data['default'];
    $parametro['detalle']   = $data['detalle'];
    $parametro['relacionados']   = $data['relacionados'];
    $parametro['valor']   = $data['valor'];

    
    $this->Parametros_model->update($data['id'], $parametro);

    return TRUE;

  }

  //Eliminando un registro de la tabla de productos
  public function deleteParametro()
  {
    $id = $this->input->post('Id');
   
    $this->Parametros_model->deleteParametros($id);
    echo json_encode(array('success' => TRUE));
  }


}