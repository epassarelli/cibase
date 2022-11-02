<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitios  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Sitios_model');
    
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
    $deletefile = './assets/uploads/' . $fileName;
    $directory = './assets/uploads/';
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

    $this->form_validation->set_rules('Sitio','Sitio', array('required','max_length[255]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));
    
    $this->form_validation->set_rules('Url','Url', array('required','max_length[100]'), array('required'   => '{field} es obligatorio',
     'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
    $this->form_validation->set_rules('Theme_id','Tema', array('is_natural_no_zero'),  array('is_natural_no_zero'   => 
    'Debe seleccionar un tema'));    
    
    $this->form_validation->set_rules('Razonsocial','Razon Social', array('required','max_length[200]'),  array('required'   => '{field} es obligatorio',
     'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
  
    $this->form_validation->set_rules('Correo','Correo',array('required','max_length[150]'), array('required'   => '{field} es obligatorio',
       'max_length' => '{field} no puede exceder {param} caracteres -'));                                      
    
 
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


                                          
        //Cargamos la imagen en el servidor
        $result = null;
        $result2 = null;
        $result3 = null;

        $valid_logo = TRUE;
 
        if(isset($_FILES["File"]["name"]) and $this->input->post('Logo') !== '')
        {
          if($_FILES["File"]["name"] !=='' )
          {     
              $result = $this->upload('File','jpg|png');
              if (isset($result['error'])) {
                  $valid_logo = FALSE;
              }else{
                $valid_logo = TRUE;
              }
           }
        }

     

        $valid_icon = TRUE;
        

        if(isset($_FILES["File1"]["name"]) and $this->input->post('Icon') !=='')
        {
          if($_FILES["File1"]["name"] !=='' )           
          { 
              $result2 = $this->upload('File1','ico|svg');
              if (isset($result2['error']))  {
                  $valid_icon = FALSE;
              }else{
                $valid_icon = TRUE;
              }
          }
        }  

        $valid_qr = TRUE;
        if(isset($_FILES["File2"]["name"]) and $this->input->post('Qr') !== '')
        {
          if($_FILES["File2"]["name"] !=='' )
          { 
              $result3 = $this->upload('File2','jpg|png');
              if (isset($result3['error'])) {
                  $valid_qr = FALSE;
              }else{
                $valid_qr = TRUE;
              }
            }
          }           
 
   ///para ver respuesta en el navegador        
   $data['f0']   = $this->input->post('Logo');
   $data['f1']   = $this->input->post('Icon');
   $data['f2']   = $this->input->post('Qr');
   $data['result']   = $result;
   $data['result2']  = $result2;
   $data['result3']  = $result3;
   $data['file']   = $_FILES;
   $data['valid_logo']   = $valid_logo;
   $data['valid_qr']     = $valid_qr;
   $data['valid_icon']   = $valid_icon;
   ////// debugging
   

  if ($this->form_validation->run() == TRUE && $valid_logo && $valid_icon && $valid_qr) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $sitios['sitio_id'] = $this->input->post('Id');
        $sitios['sitio'] =  $this->input->post('Sitio');
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
        
        //$sitios['logo'] = (isset($result["file_name"])) ? $result["file_name"] : "$this->input->post('Logo')" ;

        $sitios['logo'] = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('Logo') ;
        $sitios['icon'] = (isset($result2["file_name"])) ? $result2["file_name"] : $this->input->post('Icon') ;
        $sitios['qr']   = (isset($result3["file_name"])) ? $result3["file_name"] : $this->input->post('Qr') ;
        
       
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

        if (!$valid_logo) {
            //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
            $data['messages']['Logo']  = '<p class="text-danger">Archivo no valido o tamaño excedido</p>';
          }else {
            $data['messages']['Logo']  = '';
        }
        if (!$valid_icon ) {
          //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
          $data['messages']['Icon']  = '<p class="text-danger">Archivo no valido  o tamaño excedido</p>';
        }else{
          $data['messages']['Icon']  = '';
        }
        if (!$valid_qr) {
          //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
          $data['messages']['Qr']  = '<p class="text-danger">Archivo no valido  o tamaño excedido </p>';
        }else{
          $data['messages']['Qr']  = '';
        }

    }

    echo json_encode($data);

}

  // Alta de un sitios
  public function setSitios($data){
      $sitios['sitio']      = $data['sitio'];
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
      $sitios['icon']        = $data['icon'];
      $sitios['qr']          = $data['qr'];


      $this->Sitios_model->setSitios($sitios);
      return TRUE;
  }

  // Editar un sitios
  public function updatesitios($data){

    $sitios['sitio']      = $data['sitio'];
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
    $sitios['icon']        = $data['icon'];
    $sitios['qr']          = $data['qr'];
      
    $this->Sitios_model->updateSitios($data['sitio_id'], $sitios);

    return TRUE;

  }

  //Eliminando un registro de la tabla de sitios
  public function deleteSitios()
  {
    $id = $this->input->post('Id');
   
    $fileName = $this->input->post('FileName');
    $this->Sitios_model->deleteSitios($id);
    $deletefile = './assets/uploads/' . $id . '/' . $fileName;
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
  function upload($archivo,$tipos)
    {
      
      $id = $this->input->post('Id');
      $config['upload_path']          = 'assets/uploads/' . $id . '/';
      $config['allowed_types']        = $tipos ;   //'gif|jpg|png'
    
      // $config['max_size']             = 100;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->upload->initialize($config);
      
      //if (!$this->upload->do_upload('File'))
      if (!$this->upload->do_upload($archivo))      
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