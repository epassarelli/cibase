<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorias  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

    $this->load->model('../models/Categorias_model');
    $this->load->model('../models/Idiomas_model');
    
    
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
  //public function index(){      
  //  $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
  //  $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
  //  $this->data['tipocat'] = 0;
  //  $this->template->load('layout_back', 'mipanel_dashboard_view', $this->data); 
  //}


  public function productos(){      
    $tipocat=3;
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
    $this->data['tipocat'] = $tipocat;
    $this->data['cates'] = $this->getCates($tipocat);
    $this->data['idiomas'] = $this->Idiomas_model->getAllBy('idiomas','','','');
    $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
  }

  public function publicaciones(){      
    $tipocat=2;
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
    $this->data['tipocat'] = $tipocat;
    $this->data['cates'] = $this->getCates($tipocat);
    $this->data['idiomas'] = $this->Idiomas_model->getAllBy('idiomas','','','');
    $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
  }
  
  public function contactos(){      
    $tipocat=1;  
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
    $this->data['tipocat'] = $tipocat;
    $this->data['cates'] = $this->getCates($tipocat);
    $this->data['idiomas'] = $this->Idiomas_model->getAllBy('idiomas','','','');
    $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
  }

  public function contenidos(){
    $tipocat=4;
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
    $this->data['tipocat'] = $tipocat;
    $this->data['cates'] = $this->getCates($tipocat);
    $this->data['idiomas'] = $this->Idiomas_model->getAllBy('idiomas','','','');
    $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
  }

  // Datos del ABM retorna json
  public function getCategorias(){
    $modulo_id = $this->input->get('modulo_id');
    if(!$this->ion_auth->is_admin()){
      $parametros['sitio_id'] = $this->config->item('sitio_id');
    }   
    $parametros['modulo_id'] = $modulo_id;
    $data['data'] = $this->Categorias_model->getAllBy('categorias','',$parametros,'');
    $data['modulo_id'] = $modulo_id;
    echo json_encode($data);
  }

  
// Datos del ABM retorna json
public function getCates($modulo_id){
  $parametros['sitio_id'] = $this->config->item('sitio_id');
  $parametros['modulo_id'] = $modulo_id;
  $cates = $this->Categorias_model->getAllBy('categorias','',$parametros,'');
  return $cates;
}




  // Esta funcion la usamos para enviar datos
  //completos del registro al js para su edicion
  public function getCategoriaJson()
  {
    
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $parametros['categoria_id'] = $this->input->post('Id');
    $data['data'] = $this->Categorias_model->getOneBy('categorias','',$parametros,'');
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

    $this->form_validation->set_rules('categoria','Categoria', array('required','max_length[255]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


                                          
        //Cargamos la imagen en el servidor
        $result = null;
        $valid_imagen = TRUE;
 
        if(isset($_FILES["File"]["name"]) and $this->input->post('imagen') !== '')
        {
          if($_FILES["File"]["name"] !=='' )
          {     
              $result = $this->upload('File','jpg|png');
              if (isset($result['error'])) {
                  $valid_imagen = FALSE;
              }else{
                $valid_imagen = TRUE;
              }
           }
        }

     

   ///para ver respuesta en el navegador        
   $data['f0']   = $this->input->post('imagen');
   $data['result']   = $result;
   $data['file']   = $_FILES;
   $data['valid_imagen']   = $valid_imagen;
   ////// debugging
   

  if ($this->form_validation->run() == TRUE && $valid_imagen ) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $categoria['categoria_id']        = $this->input->post('categoria_id');
        $categoria['catpadre_id']        = $this->input->post('catpadre_id');
        $categoria['sitio_id']  = $this->input->post('sitio_id');
        $categoria['idioma_id']  = $this->input->post('idioma_id');
        $categoria['categoria']  = $this->input->post('categoria');
        $categoria['description']  = $this->input->post('description');
        $categoria['slug']         = $this->input->post('slug');
        $categoria['imagen']       =  (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen') ;
        $categoria['menu'] = $this->input->post('menu');
        $categoria['orden'] = $this->input->post('orden');
        $categoria['keywords'] = $this->input->post('keywords');
        $categoria['modulo_id'] = $this->input->post('modulo_id');
        //para saber el modulo_id si es alta
        $categoria['tipocat'] = $this->input->post('tipocat'); 
        
        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
              $categoria['modulo_id'] = $categoria['tipocat'];
              $data['success'] = $this->setCategorias($categoria);
            break;

            case 'editar':
                $data['success'] = $this->updateCategorias($categoria);
            break;
        }

        
    } else {
        foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
        }

        if (!$valid_imagen) {
            //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
            $data['messages']['imagen']  = '<p class="text-danger">Archivo no valido o tamaño excedido</p>';
          }else {
            $data['messages']['imagen']  = '';
        }
   
    }

    echo json_encode($data);

}

  // Alta de un sitios
  public function setCategorias($data){
    $categoria['sitio_id']      = $this->config->item('sitio_id');
    $categoria['catpadre_id']   = $data['catpadre_id'];
    $categoria['idioma_id']     = $data['idioma_id'];
    $categoria['categoria']     = $data['categoria'];
    $categoria['description']   = $data['description'];
    $categoria['slug']          = $data['slug'];
    $categoria['imagen']        = (isset($result["file_name"])) ? $result["file_name"] : $data['imagen'];
    $categoria['menu']          = $data['menu'];
    $categoria['orden']         = $data['orden'];
    $categoria['keywords']      = $data['keywords'];
    $categoria['modulo_id']     = $data['modulo_id'];

    $this->Categorias_model->setCategorias($categoria);
    return TRUE;
  }

  // Editar un sitios
  public function updateCategorias($data){

    $categoria['sitio_id']      = $this->config->item('sitio_id');
    $categoria['catpadre_id']   = $data['catpadre_id'];
    $categoria['idioma_id']     = $data['idioma_id'];
    $categoria['categoria']     = $data['categoria'];
    $categoria['description']   = $data['description'];
    $categoria['slug']          = $data['slug'];
    $categoria['imagen']        = (isset($result["file_name"])) ? $result["file_name"] : $data['imagen'];
    $categoria['menu']          = $data['menu'];
    $categoria['orden']         = $data['orden'];
    $categoria['keywords']      = $data['keywords'];
    $categoria['modulo_id']     = $data['modulo_id'];
      
    $this->Categorias_model->update($data['categoria_id'], $categoria);

    return TRUE;

  }

  //Eliminando un registro de la tabla de categorias
  public function deleteCategoria()
  {
    $categoria_id = $this->input->post('Id');
   
    //$fileName = $this->input->post('FileName');
    $this->Categorias_model->deleteCategorias($categoria_id);
    //$deletefile = './assets/uploads/' . $id . '/' . $fileName;
    //unlink($deletefile);
    echo json_encode(array('success' => TRUE));
  }

    public function cambioEstado()
   {
    $estado = $this->input->post('Estado');
    $id = $this->input->post('Id');
    
   

    $estadoNuevo = $this->Categorias_model->cambioEstado($id,$estado);
    echo json_encode(array('success' => TRUE,
                           'estado' => $estadoNuevo,
                           'estadoviejo' => $estado,  //estado original
                           'categoria_id' => $id));            //id categoria  
  }
    //Etadoviejo y id solo lo paso para ver lo que esta tomando 
    //por post desde la llamada ajax

    // Preguntar configuracion de carga de imagenes 
  function upload($archivo,$tipos)
    {
      
      $sitio_id = $this->config->item('sitio_id');
      $config['upload_path']          = 'assets/uploads/' . $sitio_id . '/categorias/';
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