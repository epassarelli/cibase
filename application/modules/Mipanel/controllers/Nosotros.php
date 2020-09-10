<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nosotros extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

    $this->load->model('nosotros/Nosotros_model');

    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(FALSE);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }      
  }

  // Listado del ABM de slider 
  public function index(){      
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('nosotros.js?v='.rand(),'sweetalert2.min.js');
    $this->template->load('layout_back', 'nosotros_abm_view', $this->data);  
  }

  // Datos del ABM
  public function getNosotros()
  {
    $data['data'] = $this->Nosotros_model->get_AllBackend();
    echo json_encode($data);
  }

public function deleteImg()
{
    $fileName = $this->input->post('FileName');
    $deletefile = './assets/images/nosotros/' . $fileName;
    $directory = './assets/images/nosotros/';
    $ficheros  = scandir($directory);
    
    // recorremos los ficheros a ver si existe en la carpeta
    foreach ($ficheros as $img) {
      if ($img === $fileName && $img != '400x300.jpg') {
        unlink($deletefile);
        $data['success'] = TRUE;
        break;
      }else{
         $data['success'] = FALSE;
      }
    }

    echo json_encode($data);
}

 public function accion()
  {
      $data = array('success' => false, 'messages' => array());

      $this->form_validation->set_rules('Titulo', 'Titulo', 'required');
      $this->form_validation->set_rules('SubTitulo', 'SubTitulo', 'required');
      $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required');
      $this->form_validation->set_rules('Imagen', 'Imagen', 'required');
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      if ($this->form_validation->run() == TRUE) {
          
          //Cargamos la imagen en el servidor
          if(isset($_FILES["File"]["name"])){ $result = $this->upload();}
          
          //Tomamos los valores
          $opcion = $this->input->post('Opcion');
          $nosotros['id'] = $this->input->post('Id');
          $nosotros['titulo'] = $this->input->post('Titulo');
          $nosotros['subtitulo'] = $this->input->post('SubTitulo');
          $nosotros['descripcion'] = $this->input->post('Descripcion');
          $nosotros['imagen'] = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('Imagen') ;
          // Pasar el switch
          switch ($opcion) {

              case 'insertar':
                  $data['success'] = $this->setNosotros($nosotros);
              break;

              case 'editar':
                  $data['success'] = $this->updateNosotros($nosotros);
              break;
          }
         
      } else {
          foreach ($_POST as $key => $value) {
              $data['messages'][$key] = form_error($key);
          }
      }

      echo json_encode($data);

  }

    // Alta de un nosotros
  public function setNosotros($data){
    
      $nosotros['titulo'] = $data['titulo'];
      $nosotros['subtitulo'] = $data['subtitulo'];
      $nosotros['descripcion'] = $data['descripcion'];
      $nosotros['estado'] = 1;
      $nosotros['imagen'] = $data['imagen'];


      $this->Nosotros_model->setNosotros($nosotros);

      return TRUE;
  }

  // Editar un nosotros
  public function updateNosotros($data){

      $nosotros['titulo'] = $data['titulo'];
      $nosotros['subtitulo'] = $data['subtitulo'];
      $nosotros['descripcion'] = $data['descripcion'];
      $nosotros['imagen'] = $data['imagen'];

      $this->Nosotros_model->updateNosotros($data['id'], $nosotros);

      return TRUE;

  }

  //Eliminando un registro de la tabla de nosotros
  public function deleteNosotros()
  {
    $id = $this->input->post('Id');
    $fileName = $this->input->post('FileName');

    $this->Nosotros_model->deleteNosotros($id);


    $deletefile = './assets/images/nosotros/' . $fileName;
    unlink($deletefile);
    
    echo json_encode(array('success' => TRUE));

  }

    public function cambioEstado()
  {
    $estado = $this->input->post('Estado');
    $id = $this->input->post('Id');
    $estadoNuevo = $this->Nosotros_model->cambioEstado($id,$estado);
    echo json_encode(array('success' => TRUE,'estado' => $estadoNuevo));
  }


    // Preguntar configuracion de carga de imagenes 
  function upload()
    {
      
      $config['upload_path']          = 'assets/images/nosotros';
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

}