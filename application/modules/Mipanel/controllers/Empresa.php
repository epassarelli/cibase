<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empresa extends MX_Controller {

  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(false);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }      

    $this->load->model('empresa/Empresa_model');

  }

  // Listado del ABM de empresa 
  public function index(){      

    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('empresa.js?v='.rand(),'sweetalert2.min.js');
    $this->template->load('layout_back', 'empresa_abm_view', $this->data);  
    
  }

  public function listar()
  {
     $empresa = $this->Empresa_model->get_All();
     echo json_encode($empresa);
  }

  public function accion()
  {
        

      $data = array('success' => false, 'messages' => array());
      
      $this->form_validation->set_rules('Nombre', 'Razon Social', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Direccion', 'Dirección', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Pais', 'País', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Provincia', 'Provincia', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Localidad', 'Localidad', 'trim|strip_tags|required');
      $this->form_validation->set_rules('CodigoP', 'Codigo Postal', 'trim|strip_tags|numeric|required');
      $this->form_validation->set_rules('Coordenadas', 'Coordenadas', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Telefono1', 'Telefono', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Correo', 'Email', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Facebook', 'Facebook', 'trim|strip_tags|required');
      $this->form_validation->set_rules('Instagram', 'Instagram', 'trim|strip_tags|required');
      
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


      if ($this->form_validation->run() == TRUE) {
 
          //Tomamos los valores
          $empresa['razonsocial'] = $this->input->post('Nombre');
          $empresa['direcion'] = $this->input->post('Direccion');
          $empresa['pais'] = $this->input->post('Pais');
          $empresa['provincia'] = $this->input->post('Provincia');
          $empresa['localidad'] = $this->input->post('Localidad');
          $empresa['cpostal'] = $this->input->post('CodigoP');
          $empresa['cordenadas'] = $this->input->post('Coordenadas');
          $empresa['telefono'] = $this->input->post('Telefono1');
          $empresa['correo'] = $this->input->post('Correo');
          $empresa['facebook'] = $this->input->post('Facebook');
          $empresa['instagram'] = $this->input->post('Instagram');

          // Ingresamos en la base de Datos
          $data['success'] = $this->Empresa_model->update($empresa,1);
        
      } else {
        foreach ($_POST as $key => $value) {
              $data['messages'][$key] = form_error($key);
          }
      }
      echo json_encode($data);
    }

}