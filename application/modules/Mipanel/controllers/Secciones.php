<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Secciones extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

    $this->load->model('Secciones_model');
    $this->load->model('Sitios_model');
    

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
    $this->data['sitios'] = $this->Sitios_model->get_AllBackend();
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

      $this->form_validation->set_rules('Modulo','Modulo', array('required','max_length[45]'), array('required'   => '{field} es obligatorio',
      'max_length' => '{field} no puede exceder {param} caracteres -'));
      
      $this->form_validation->set_rules('Sitio_id','Sitio', array('required'), 
              array('required'   => '{field} es obligatorio -'));                                      
      
      $this->form_validation->set_rules('Titulo','Titulo', array('required','max_length[30]'),  
            array('required'   => '{field} es obligatorio', 'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
      $this->form_validation->set_rules('Slug','Slug',array('required','max_length[30]'), array('required'   => '{field} es obligatorio',
         'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
      
      $this->form_validation->set_rules('Bajada','Bajada',array('required','max_length[250]'), array('required'   => '{field} es obligatorio',
         'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
  
      $this->form_validation->set_rules('Orden','Orden', array('is_natural_no_zero'),  array('is_natural_no_zero'   => 
         'Debe asignar un orden'));    

      $this->form_validation->set_rules('Bloque','Bloque', array('is_natural_no_zero'),  array('is_natural_no_zero'   => 
         'Debe asignar unbloque'));    
      
   
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      if ($this->form_validation->run() == TRUE) {
          
          //Cargamos la imagen en el servidor
          if(isset($_FILES["File"]["name"])){ $result = $this->upload();}
          
          //Tomamos los valores
          $opcion = $this->input->post('Opcion');
          $seccion['id'] = $this->input->post('Id');
          $seccion['sitio_id'] = $this->input->post('Sitio_id');
          $seccion['titulo'] = $this->input->post('Titulo');
          $seccion['bajada'] = $this->input->post('Bajada');
          $seccion['slug'] = $this->input->post('Slug');
          $seccion['menu'] = $this->input->post('Menu');
          $seccion['orden'] = $this->input->post('Orden');
          $seccion['bloquenumero'] = 1; //$this->input->post('Bloque');
          $seccion['modulo'] = $this->input->post('Modulo');
          
          $data['datos'] = $seccion;
          $data['opcion'] = $opcion;





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
    
      $seccion['sitio_id'] = $data['sitio_id'];
      $seccion['titulo']   = $data['titulo'];
      $seccion['bajada']   = $data['bajada'];
      $seccion['slug']     = $data['slug'];
      $seccion['menu']     = $data['menu'];
      $seccion['orden']    = $data['orden'];
      $seccion['bloquenumero'] = $data['bloquenumero'];
      $seccion['modulo']   = $data['modulo'];


      $this->Secciones_model->setSecciones($seccion);

      return TRUE;
  }

  // Editar un seccion
  public function updateSecciones($data){

    $seccion['sitio_id'] = $data['sitio_id'];
    $seccion['titulo']   = $data['titulo'];
    $seccion['bajada']   = $data['bajada'];
    $seccion['slug']     = $data['slug'];
    $seccion['menu']     = $data['menu'];
    $seccion['orden']    = $data['orden'];
    $seccion['bloquenumero'] = $data['bloquenumero'];
    $seccion['modulo']   = $data['modulo'];

      $this->Secciones_model->updateSecciones($data['id'], $seccion);

      return TRUE;

  }

  //Eliminando un registro de la tabla de nosotros
  public function deleteSecciones()
  {
    $id = $this->input->post('Id');
    $fileName = $this->input->post('FileName');

    $this->Secciones_model->deleteSecciones($id);


   // $deletefile = './assets/images/secciones/' . $fileName;
   // unlink($deletefile);
    
    echo json_encode(array('success' => TRUE));

  }

    public function cambioEstado()
  {
    $estado = $this->input->post('Estado');
    $id = $this->input->post('Id');
    $estadoNuevo = $this->Secciones_model->cambioEstado($id,$estado);
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