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
    // $this->data['nosotros'] = $this->Nosotros_model->get_All();
    $this->template->load('layout_back', 'nosotros_back_view', $this->data);  
  }

public function listar()
{
     $nosotros = $this->Nosotros_model->get_All();
      echo json_encode($nosotros);
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
      
      $this->form_validation->set_rules('Fileqs', 'Imagen Quienes somos', 'required');
      $this->form_validation->set_rules('TituloQs', 'Titulo Quienes somos', 'trim|required');
      $this->form_validation->set_rules('SubtituloQs', 'Subtitulo Quienes somos', 'trim|required');
      $this->form_validation->set_rules('TextoQs', 'Texto Quienes somos', 'trim|required');

      $this->form_validation->set_rules('Filem', 'Imagen Mision', 'required');
      $this->form_validation->set_rules('TituloM', 'Titulo Mision', 'trim|required');
      $this->form_validation->set_rules('SubtituloM', 'Subtitulo Mision', 'trim|required');
      $this->form_validation->set_rules('TextoM', 'Texto Mision', 'trim|required');

      $this->form_validation->set_rules('Filev', 'Imagen Vision', 'required');
      $this->form_validation->set_rules('TituloV', 'Titulo Vision', 'trim|required');
      $this->form_validation->set_rules('SubtituloV', 'Subtitulo Vision', 'trim|required');
      $this->form_validation->set_rules('TextoV', 'Texto Vision', 'trim|required');

      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


      if ($this->form_validation->run() == TRUE) {
        
        //Cargamos las imagenes en el servidor
          $result1 = $this->upload('FileQs');
          $result2 = $this->upload('FileM');
          $result3 = $this->upload('FileV');

          //Tomamos los valores
          //Quienes somos
          $nosotros['quienestitulo'] = $this->input->post('TituloQs');
          $nosotros['quienessubtitulo'] = $this->input->post('SubtituloQs');
          $nosotros['quienestexto'] = $this->input->post('TextoQs');
          $nosotros['quienesfoto'] = (isset($result1["file_name"])) ? $result1["file_name"] : $this->input->post('Fileqs') ;
          // Mision
          $nosotros['nosotrostitulo'] = $this->input->post('TituloM');
          $nosotros['nosotrossubtitulo'] = $this->input->post('SubtituloM');
          $nosotros['nosotrostexto'] = $this->input->post('TextoM');
          $nosotros['nosotrosfoto'] = (isset($result2["file_name"])) ? $result2["file_name"] : $this->input->post('Filem') ;
          // Vision
          $nosotros['visiontitulo'] = $this->input->post('TituloV');
          $nosotros['visionsubtitulo'] = $this->input->post('SubtituloV');
          $nosotros['visiontexto'] = $this->input->post('TextoV');
          $nosotros['visionfoto'] = (isset($result3["file_name"])) ? $result3["file_name"] : $this->input->post('Filev') ;
          // Ingresamos en la base de Datos
          $data['success'] = $this->Nosotros_model->update($nosotros,1);
        
      } else {
        foreach ($_POST as $key => $value) {
              $data['messages'][$key] = form_error($key);
          }
      }
      echo json_encode($data);
}


    // Preguntar configuracion de carga de imagenes 
  function upload($input)
    {
      
      $config['upload_path']          = 'assets/images/nosotros';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['max_size']             = 100;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->upload->initialize($config);

      if (!$this->upload->do_upload($input))
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