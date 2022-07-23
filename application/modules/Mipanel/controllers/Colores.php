<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Colores  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Colores_model');
    
    
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
  $this->data['files_js'] = array('colores.js?v='.rand(),'sweetalert2.min.js');
  $this->data['colores'] = $this->Colores_model->getAllBy('colores','','','');
  $this->template->load('layout_back', 'colores_abm_view', $this->data);  
}




public function accion()
{
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('descripcion','Descripcion', array('required','max_length[100]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


  if ($this->form_validation->run() == TRUE ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $color['id']        = $this->input->post('id');
        $color['descripcion']  = $this->input->post('descripcion');
        
        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
              $data['success'] = $this->setColores($color);
            break;

            case 'editar':
                $data['success'] = $this->updateColores($color);
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
  public function setColores($data){
    $color['descripcion']   = $data['descripcion'];
    $this->Colores_model->setColores($color);
    return TRUE;
  }


  
  // Esta funcion la usamos para enviar datos
  //completos del registro al js para su edicion
  public function getColoresJson(){
    $parametros['id'] = $this->input->post('Id');
    $data['data'] = $this->Colores_model->getOneBy('colores','',$parametros,'');
    echo json_encode($data);
  }
 



  // Editar un sitios
  public function updateColores($data){
    $color['id']            = $data['id'];
    $color['descripcion']   = $data['descripcion'];
    $this->Colores_model->update($data['id'], $color);
    return TRUE;

  }



  //Eliminando un registro de la tabla de colores
  public function deleteTalle()
  {
    $id = $this->input->post('Id');
    $this->Colores_model->deleteColores($id);
    echo json_encode(array('success' => TRUE));
  }



  public function cambioEstado()
  {
   $estado = $this->input->post('Estado');
   $id = $this->input->post('Id');
   
  

   $estadoNuevo = $this->Colores_model->cambioEstado($id,$estado);
   echo json_encode(array('success' => TRUE,
                          'estado' => $estadoNuevo,
                          'estadoviejo' => $estado,  //estado original
                          'id' => $id));            //id categoria  
 }
   //Etadoviejo y id solo lo paso para ver lo que esta tomando 
   //por post desde la llamada ajax

   
/*******************************************************************************************************************/




// Datos del ABM retorna json
public function getColores(){
    $data['data'] = $this->Colores_model->getAllBy('colores','','','');
    echo json_encode($data);
}

  
// Datos del ABM retorna json
public function getCates($modulo_id){
  $parametros['sitio_id'] = $this->config->item('sitio_id');
  $parametros['modulo_id'] = $modulo_id;
  $cates = $this->Colores_model->getAllBy('colores','',$parametros,'');
  return $cates;
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




  

    // Preguntar configuracion de carga de imagenes 
  function upload($archivo,$tipos)
    {
      
      $sitio_id = $this->config->item('sitio_id');
      $config['upload_path']          = 'assets/uploads/' . $sitio_id . '/colores/';
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