<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends MX_Controller {

  var $data;

  function __construct() {
    parent::__construct();
    // if (!$this->ion_auth->logged_in()) {
    //     redirect('auth/login');
    // }

    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(False);
          break;
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }

    $this->load->model('slider/Slider_model');
  }

  // Listado del ABM de slider
  public function index(){
    $this->data['files_js'] = array('slider.js?v='.rand());
    $this->template->load('index', 'slider_abm_view', $this->data);
  }

  // Datos del ABM
  public function getSliders()
  {
    $data['data'] = $this->Slider_model->get_AllBackend();
    echo json_encode($data);
  }

  public function accion()
  {
      $data = array('success' => false, 'messages' => array());

      $this->form_validation->set_rules('Titulo', 'Titulo', 'required');
      $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required');
      $this->form_validation->set_rules('Imagen', 'Imagen', 'required');
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      if ($this->form_validation->run() == TRUE) {
          
          //Cargamos la imagen en el servidor
          if(isset($_FILES["File"]["name"])){ $result = $this->upload();}
          // var_dump($result);die('asdasdasd');
          //Tomamos los valores
          $opcion = $this->input->post('Opcion');
          $slider['id'] = $this->input->post('Id');
          $slider['titulo'] = $this->input->post('Titulo');
          $slider['descripcion'] = $this->input->post('Descripcion');
          $slider['imagen'] = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('Imagen') ;

          // Pasar el switch
          switch ($opcion) {

              case 'insertar':
                  $data['success'] = $this->setSlider($slider);
              break;

              case 'editar':
                  $data['success'] = $this->updateSlider($slider);
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
  public function setSlider($data){
    
      $slider['titulo'] = $data['titulo'];
      $slider['descripcion'] = $data['descripcion'];
      $slider['estado'] = 1;
      $slider['imagen'] = $data['imagen'];

      $this->Slider_model->setSlider($slider);

      return TRUE;
  }

  // Editar un slider
  public function updateSlider($data){

      $slider['titulo'] = $data['titulo'];
      $slider['descripcion'] = $data['descripcion'];
      $slider['imagen'] = $data['imagen'];

      $this->Slider_model->updateSlider($data['id'], $slider);

      return TRUE;
  }

  public function deleteSlide()
  {
    $id = $this->input->post('Id');
    $fileName = $this->input->post('FileName');

    $this->Slider_model->deleteSlider($id);

    $deletefile = './assets/images/slider/' . $fileName;
    unlink($deletefile);
    
    echo json_encode(array('success' => TRUE));
  }

  public function cambioEstado()
  {
    $estado = $this->input->post('Estado');
    $id = $this->input->post('Id');
    $estadoNuevo = $this->Slider_model->cambioEstado($id,$estado);
    echo json_encode(array('success' => TRUE,'estado' => $estadoNuevo));
  }

  // Preguntar configuracion de carga de imagenes 
  function upload()
    {
      
      $config['upload_path']          = 'assets/images/slider';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['max_size']             = 100;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->upload->initialize($config);

      if (!$this->upload->do_upload('File'))
      {
              $error = array('error' => $this->upload->display_errors());
              return $error;
      }
      else
      {
              $data = $this->upload->data();
              return $data;
      }
    }

}// Class