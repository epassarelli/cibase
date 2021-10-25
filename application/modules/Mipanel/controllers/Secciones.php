<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Secciones extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('Secciones_model');

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
    $this->data['files_js'] = array('secciones.js?v='.rand(),'sweetalert2.min.js');
    $this->data['modulos'] = array('Nosotros', 'Servicios');
    $this->template->load('layout_back', 'secciones_abm_view', $this->data);  
  }

  // Datos del ABM
  public function getSecciones()
  {
    $data['data'] = $this->Secciones_model->get_AllBackend();
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
          $seccion['id'] = $this->input->post('Id');
          $seccion['titulo'] = $this->input->post('Titulo');
          $seccion['subtitulo'] = $this->input->post('SubTitulo');
          $seccion['descripcion'] = $this->input->post('Descripcion');
          $seccion['imagen'] = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('Imagen') ;
          // Pasar el switch
          switch ($opcion) {

              case 'insertar':
                  $data['success'] = $this->setSecciones($seccion);
              break;

              case 'editar':
                  $data['success'] = $this->updateSecciones($seccion);
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
  public function setSecciones($data){
    
      $seccion['titulo'] = $data['titulo'];
      $seccion['subtitulo'] = $data['subtitulo'];
      $seccion['descripcion'] = $data['descripcion'];
      $seccion['estado'] = 1;
      $seccion['imagen'] = $data['imagen'];


      $this->Secciones_model->setSecciones($seccion);

      return TRUE;
  }

  // Editar un seccion
  public function updateSecciones($data){

      $seccion['titulo'] = $data['titulo'];
      $seccion['subtitulo'] = $data['subtitulo'];
      $seccion['descripcion'] = $data['descripcion'];
      $seccion['imagen'] = $data['imagen'];

      $this->Secciones_model->updateSecciones($data['id'], $seccion);

      return TRUE;

  }

  //Eliminando un registro de la tabla de nosotros
  public function deleteSecciones()
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