<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitios  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('sitios/Sitios_model');

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
    $this->data['files_js'] = array('sitios.js?v='.rand(),'sweetalert2.min.js');
    $this->template->load('layout_back', 'sitios_abm_view', $this->data);  
  }

  // Datos del ABM
  public function getSitios()
  {
    $data['data'] = $this->Sitios_model->get_AllBackend();
    echo json_encode($data);
  }

public function deleteImg()
{
    $fileName = $this->input->post('FileName');
    $deletefile = './assets/images/sitios/' . $fileName;
    $directory = './assets/images/sitios/';
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

    $this->form_validation->set_rules('Nombre','Nombre', array('required','max_length[255]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));
    
    $this->form_validation->set_rules('Url','Url', array('required','max_length[100]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Theme_id','Tema', array('required','numeric'),  array('required'   => '{field} es obligatorio',
                                      'numeric' => '{field} solo acepta valores numericos'));    
    
    $this->form_validation->set_rules('Landing','Landing Page', array('required','numeric'),  array('required'   => '{field} es obligatorio',
                                      'numeric' => '{field} solo acepta valores numericos'));    
              
    $this->form_validation->set_rules('Razonsocial','Razon Social', array('required','max_length[200]'),  array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
  
    $this->form_validation->set_rules('Direccion','Direccion',  array('required','max_length[200]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
                          
    $this->form_validation->set_rules('Cpostal','Codigo Postal', array('required','max_length[10]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Localidad','Localidad', array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Provincia','Provincia', array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Pais','Pais', array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('UrlGMap','Coordenadas de Google Maps',  array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
                  
    
    $this->form_validation->set_rules('Telefono','Telefonos',  array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Correo','Correo',array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Facebook','Facebook',array('required','max_length[150]'),  array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));
    
    $this->form_validation->set_rules('Instagram','Instagram',array('required','max_length[150]'),   array('required'   => '{field} es obligatorio',
                                      'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
                                          
       
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


    if ($this->form_validation->run() == TRUE) {
        
        //Cargamos la imagen en el servidor
        if(isset($_FILES["File"]["name"]))
            { $result = $this->upload();}
        
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $sitios['id'] = $this->input->post('Id');
        $sitios['nombre'] =  $this->input->post('Nombre');
        $sitios['url'] = $this->input->post('Url');
        $sitios['theme_id'] = $this->input->post('Theme_id');
        $sitios['landing'] = $this->input->post('Landing');
        $sitios['activo'] = 0;
        $sitios['razonsocial'] = $this->input->post('Razonsocial');
        $sitios['direccion'] = $this->input->post('Direccion');
        $sitios['cpostal'] = $this->input->post('Cpostal');
        $sitios['localidad'] = $this->input->post('Localidad');
        $sitios['provincia'] = $this->input->post('Provincia');
        $sitios['pais'] = $this->input->post('Pais');
        $sitios['urlGMap'] = $this->input->post('UrlGMap');
        $sitios['telefono'] = $this->input->post('Telefono');
        $sitios['correo'] = $this->input->post('Correo');
        $sitios['facebook'] = $this->input->post('Facebook');
        $sitios['instagram'] = $this->input->post('Instagram');
        
        $sitios['logo'] = (isset($result["file_name"])) ? $result["file_name"] : '' ;
       // $sitios['icon'] = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('Icon') ;
       // $sitios['qr']   = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('Qr') ;


        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
                $data['success'] = $this->setSitios($sitios);
            break;

            case 'editar':
                $data['success'] = $this->updateSitios($sitios);
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
  public function setSitios($data){
      $sitios['nombre']      = $data['nombre'];
      $sitios['url']         = $data['url'];
      $sitios['theme_id']    = $data['theme_id'];
      $sitios['landing']     = $data['landing'];
      $sitios['activo']      = $data['activo'];
      $sitios['razonsocial'] = $data['razonsocial'];
      $sitios['direccion']   = $data['direccion'];
      $sitios['cpostal']     = $data['cpostal'];
      $sitios['localidad']   = $data['localidad'];
      $sitios['provincia']   = $data['provincia'];
      $sitios['pais']        = $data['pais'];
      $sitios['urlGMap']     = $data['urlGMap'];
      $sitios['telefono']    = $data['telefono'];
      $sitios['correo']      = $data['correo'];
      $sitios['facebook']    = $data['facebook'];
      $sitios['instagram']   = $data['instagram'];
      $sitios['logo']        = $data['logo'];
      //$sitios['icon']        = $data['icon'];
      //$sitios['qr']          = $data['qr'];
      $this->Sitios_model->setSitios($sitios);
      return TRUE;
  }

  // Editar un sitios
  public function updatesitios($data){

    $sitios['nombre']      = $data['nombre'];
    $sitios['url']         = $data['url'];
    $sitios['theme_id']    = $data['theme_id'];
    $sitios['landing']     = $data['landing'];
    $sitios['activo']      = $data['activo'];
    $sitios['razonsocial'] = $data['razonsocial'];
    $sitios['direccion']   = $data['direccion'];
    $sitios['cpostal']     = $data['cpostal'];
    $sitios['localidad']   = $data['localidad'];
    $sitios['provincia']   = $data['provincia'];
    $sitios['pais']        = $data['pais'];
    $sitios['urlGMap']     = $data['urlGMap'];
    $sitios['telefono']    = $data['telefono'];
    $sitios['correo']      = $data['correo'];
    $sitios['facebook']    = $data['facebook'];
    $sitios['instagram']   = $data['instagram'];
    $sitios['logo']        = $data['logo'];
    //$sitios['icon']        = $data['icon'];
    //$sitios['qr']          = $data['qr'];
      
    $this->Sitios_model->updateSitios($data['id'], $sitios);

    return TRUE;

  }

  //Eliminando un registro de la tabla de sitios
  public function deleteSitios()
  {
    $id = $this->input->post('Id');
    $fileName = $this->input->post('FileName');
    $this->Sitios_model->deleteSitios($id);
    $deletefile = './assets/images/sitios/' . $fileName;
    //unlink($deletefile);
    echo json_encode(array('success' => TRUE));
  }

    public function cambioEstado()
  {
    $estado = $this->input->post('Estado');
    $id = $this->input->post('Id');
    $estadoNuevo = $this->Sitios_model->cambioEstado($id,$estado);
    echo json_encode(array('success' => TRUE,'activo' => $estadoNuevo));
  }


    // Preguntar configuracion de carga de imagenes 
  function upload()
    {
      
      $config['upload_path']          = 'assets/uploads';
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