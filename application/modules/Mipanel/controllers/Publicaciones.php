<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends MX_Controller {
  
  function __construct() {
    
    parent::__construct();
    
    if (!$this->ion_auth->logged_in()) {
        redirect('auth/login');
    }

    $this->load->model('Publicaciones_model');
    $this->load->model('Categorias_model');
    
    switch (ENVIRONMENT){
      case 'development':
      ($this->input->is_ajax_request()) ? $this->output->enable_profiler(false) : $this->output->enable_profiler(true);
          break;          
      case 'testing':
      ($this->input->is_ajax_request()) ? $this->output->enable_profiler(false) : $this->output->enable_profiler(true);
          break;
      case 'production':
      ($this->input->is_ajax_request()) ? $this->output->enable_profiler(false) : $this->output->enable_profiler(false);
          break;
      }    

  }

  // Listado del ABM de slider 
  public function index(){      
    $data['files_css']  = array('animate.css','sweetalert2.min.css');
    $data['files_js']   = array('publicaciones.js?v='.rand(),'sweetalert2.min.js');  
    //$data['publicaciones'] = $this->Publicaciones_model->get_AllBackend();
    $this->template->load('layout_back', 'publicaciones_abm_view', $data);  
  }

  // Datos del ABM
  public function getPublicaciones(){
    $data['data'] = $this->Publicaciones_model->get_AllBackend();    
    echo json_encode($data);
  }

  // Listado del ABM de slider 
  public function insertar(){

    $result1 = null;
    $result2 = null;

    $valid_portada = TRUE;

    if(isset($_FILES["portada"]["name"]) and $this->input->post('portada') !== '')
    {
      if($_FILES["portada"]["name"] !=='' )
      {     
        $result1 = $this->upload('portada','jpg|png');
        
        if (isset($result1['error'])) {
          $valid_portada = FALSE;
        }else{
          $valid_portada = TRUE;
        }

       }
    }

    $valid_publicacion = TRUE;

    if(isset($_FILES["publicacion"]["name"]) and $this->input->post('publicacion') !== '')
    {
      if($_FILES["publicacion"]["name"] !=='' )
      {     
          $result2 = $this->upload('publicacion','pdf');
          
          if (isset($result2['error'])) {
            $valid_publicacion = FALSE;
          }else{
            $valid_publicacion = TRUE;
          }
       }
    }
   
    $this->form_validation->set_rules('titulo', 'Titulo','required');

    if($this->form_validation->run($this)==FALSE)
    {
      $data['accion']     = 'insertar';
      $data['categorias'] = $this->Categorias_model->getCategorias(2, $this->config->item('sitio_id'));
      $data['files_css']  = array('animate.css','sweetalert2.min.css');
      $data['files_js']   = array('publicaciones.js?v='.rand(),'sweetalert2.min.js');       
      $this->template->load('layout_back', 'publicaciones_form_view', $data); 
    }
    else 
    {  
      //  Tomo todo lo que llegue
      $pub['titulo']      = $this->input->post('titulo');
      $pub['categoria_id']= $this->input->post('categoria');
      $pub['slug']        = url_title($this->input->post('titulo'),'-',TRUE);
      $pub['anio']        = $this->input->post('anio');
      $pub['isbn']        = $this->input->post('isbn');

      $pub['paginas']     = $this->input->post('paginas');
      $pub['editor']      = $this->input->post('editor');
      $pub['formato']     = $this->input->post('formato');
      $pub['resumen']     = $this->input->post('resumen');
      $pub['enlace']      = $this->input->post('enlace');

      $pub['portada']     = (isset($result1["file_name"])) ? $result1["file_name"] : $this->input->post('portada') ;
      $pub['publicacion'] = (isset($result2["file_name"])) ? $result2["file_name"] : $this->input->post('publicacion') ;

      //  Inserto
      $this->Publicaciones_model->insertar($pub);

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/publicaciones');
    }
 }





  public function editar($id=''){

    $result1 = null;
    $result2 = null;

    $valid_portada = TRUE;

    if(isset($_FILES["portada"]["name"]) and $this->input->post('portada') !== ''){
      if($_FILES["portada"]["name"] !== '' ){     
          $result1 = $this->upload('portada','jpg|png');
          if (isset($result1['error'])) {
              $valid_portada = FALSE;
          }else{
            $valid_portada = TRUE;
          }
       }
    }

    $valid_publicacion = TRUE;

    if(isset($_FILES["publicacion"]["name"]) and $this->input->post('publicacion') !== ''){
      if($_FILES["publicacion"]["name"] !== '' ){     
          $result2 = $this->upload('publicacion','pdf');
          if (isset($result2['error'])) {
              $valid_publicacion = FALSE;
          }else{
            $valid_publicacion = TRUE;
          }
       }
    }

    $this->form_validation->set_rules('titulo', 'Titulo','required');

    if($this->form_validation->run($this)==FALSE){

    $data['files_css']  = array('animate.css','sweetalert2.min.css');
    $data['files_js']   = array('publicaciones.js?v='.rand(),'sweetalert2.min.js');
    $data['accion']     = 'editar';
    $data['pub']        = $this->Publicaciones_model->get($id);  
    $data['categorias'] = $this->Categorias_model->getCategorias(2, $this->config->item('sitio_id'));     
    $this->template->load('layout_back', 'publicaciones_form_view', $data); 
    }
    else 
      {  
        $id = $this->input->post('id');

        //  Tomo todo lo que llegue
        $pub['titulo']    = $this->input->post('titulo');
        $pub['categoria_id'] = $this->input->post('categoria');
        $pub['slug']      = url_title($this->input->post('titulo'),'-',TRUE);
        $pub['anio']      = $this->input->post('anio');
        $pub['isbn']      = $this->input->post('isbn');

        $pub['paginas']   = $this->input->post('paginas');
        $pub['editor']    = $this->input->post('editor');
        $pub['formato']   = $this->input->post('formato');
        $pub['resumen']   = $this->input->post('resumen');
        $pub['enlace']    = $this->input->post('enlace');

        $pub['portada']   = (isset($result1["file_name"])) ? $result1["file_name"] : $this->input->post('NamePortada') ;
        $pub['publicacion'] = (isset($result2["file_name"])) ? $result2["file_name"] : $this->input->post('NamePublicacion') ;

        //  Actualizo
        $this->Publicaciones_model->actualizar($pub, $id);

        // Si NamePortada está vacio hay que eliminar fisicamente la Anterior
        if(($this->input->post('NamePortada') == '' ) and ($this->input->post('PortadaOriginal') !== '') ){
          echo "Mando a borrar la portada anterior<br>";
          $this->deleteFile($this->input->post('PortadaOriginal'));
        }

        // Si NamePortada está vacio hay que eliminar fisicamente la Anterior
        if(($this->input->post('NamePublicacion') == '') and ($this->input->post('PublicacionOriginal') !== '') ){
          echo "Mando a borrar la publicacion anterior<br>";
          $this->deleteFile($this->input->post('PublicacionOriginal'));
        }

        // var_dump($this->input->post());die();
        //  redireccionar a la vista de ABM (Listado)
        redirect('mipanel/publicaciones');
      }
  }





  // Preguntar configuracion de carga de imagenes 
  function upload($archivo, $tipos){
      
    $config['upload_path']   = 'assets/uploads/'.$this->config->item('sitio_id').'/publicaciones';
    $config['allowed_types'] = $tipos ; 

    $this->upload->initialize($config);
    
    if (!$this->upload->do_upload($archivo)){
        $error = array('error' => $this->upload->display_errors());
        return $error; 
    }
    else{
        $data = $this->upload->data();
        return $data;
    }

  }
  


  // Metodo para Eliminar el documento
  public function deleteFile($aEliminar){      
    
    $deletefile = './assets/uploads/'.$this->config->item('sitio_id').'/publicaciones/' . $aEliminar;
    echo "A borrar: " . $aEliminar . "<br>";
    if(unlink($deletefile)){
        return true;
      }
      else{
        return false;
      }
  }   


  // Eliminación fisica
  public function eliminar(){
    
    $id = $this->input->post('Id');
      
    if($this->Publicaciones_model->eliminar($id)){
      echo json_encode(array('status' => true, 'message' => 'Publicación eliminada con exito'));
    }   
    else // Mando un alert de No se puede eliminar
      { 
        echo json_encode(array('status' => false, 'message' => 'No se puede eliminar la publicación'));
      }
  }


  public function cambiarEstado(){
    
    $data['estado'] = ($this->input->post('Estado') == 1) ? '0' : '1';
    $id = $this->input->post('Id');
    $this->Publicaciones_model->actualizar($data, $id);
    echo json_encode(array('status' => TRUE,'estado' => $data['estado']));
  }


}