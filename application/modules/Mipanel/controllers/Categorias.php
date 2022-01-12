<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorias  extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('login');
    }

    $this->load->model('../models/Categorias_model');
    
    
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
    $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
    $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
  }


  public function productos(){      
    $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
    $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
    $this->data['tipocat'] = 3;
    $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
  }

  public function publicaciones(){      
      $this->data['files_css'] = array('animate.css','sweetalert2.min.css');
      $this->data['files_js'] = array('categorias.js?v='.rand(),'sweetalert2.min.js');
      $this->data['tipocat'] = 9;
      $this->template->load('layout_back', 'categorias_abm_view', $this->data); 
    }
  


  // Datos del ABM
  public function getCategorias()
  {
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $parametros['modulo_id'] = $tipocat;
    $data['data'] = $this->Categorias_model->getAllBy('categorias','',$parametros,'');
    $data['pepe'] = $tipocat;
    echo json_encode($data);
  }


  // Esta funcion la usamos para enviar datos
  //completos del registro al js para su edicion
  public function getProductoJson()
  {
    
    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $parametros['id'] = $this->input->post('Id');
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

    $this->form_validation->set_rules('titulo','Titulo', array('required','max_length[255]'), array('required'   => '{field} es obligatorio',
    'max_length' => '{field} no puede exceder {param} caracteres -'));
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');


                                          
        //Cargamos la imagen en el servidor
        $result = null;
        $result2 = null;
        $result3 = null;

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

     

        $valid_imagen2 = TRUE;
        

        if(isset($_FILES["File1"]["name"]) and $this->input->post('imagen2') !=='')
        {
          if($_FILES["File1"]["name"] !=='' )           
          { 
              $result2 = $this->upload('File1','jpg|png');
              if (isset($result2['error']))  {
                  $valid_imagen2 = FALSE;
              }else{
                $valid_imagen2 = TRUE;
              }
          }
        }  

        $valid_imagen3 = TRUE;
        if(isset($_FILES["File2"]["name"]) and $this->input->post('imagen3') !== '')
        {
          if($_FILES["File2"]["name"] !=='' )
          { 
              $result3 = $this->upload('File2','jpg|png');
              if (isset($result3['error'])) {
                  $valid_imagen3 = FALSE;
              }else{
                $valid_imagen3 = TRUE;
              }
            }
          }           
 
   ///para ver respuesta en el navegador        
   $data['f0']   = $this->input->post('imagen');
   $data['f1']   = $this->input->post('imagen2');
   $data['f2']   = $this->input->post('imagen3');
   $data['result']   = $result;
   $data['result2']  = $result2;
   $data['result3']  = $result3;
   $data['file']   = $_FILES;
   $data['valid_imagen']   = $valid_imagen;
   $data['valid_imagen2']  = $valid_imagen2;
   $data['valid_imagen3']  = $valid_imagen3;
   ////// debugging
   

  if ($this->form_validation->run() == TRUE && $valid_imagen && $valid_imagen2 && $valid_imagen3) {
         
        //Tomamos los valores
        $opcion = $this->input->post('Opcion');
        $categoria['id']        = $this->input->post('id');
        $categoria['sitio_id']  = $this->input->post('sitio_id');
        $categoria['titulo']    = $this->input->post('titulo');
        $categoria['codigo']    = $this->input->post('codigo');
        $categoria['descLarga'] = $this->input->post('descLarga');
        $categoria['descCorta'] = $this->input->post('descCorta');
        $categoria['imagen']    = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen') ;
        $categoria['imagen2']   = (isset($result2["file_name"])) ? $result2["file_name"] : $this->input->post('imagen2') ;
        $categoria['imagen3']   = (isset($result3["file_name"])) ? $result3["file_name"] : $this->input->post('imagen3') ;
        $categoria['precioLista'] = $this->input->post('precioLista');
        $categoria['precioOF']    = $this->input->post('precioOF');
        $categoria['OfDesde'] = $this->input->post('OfDesde');        
        $categoria['OfHasta'] = $this->input->post('OfHasta');
        $categoria['impuesto_id'] = $this->input->post('impuesto_id');
        $categoria['presentacion_id'] = $this->input->post('presentacion_id');
        $categoria['destacar_id'] = $this->input->post('destacar_id');
        $categoria['etiquetas'] = $this->input->post('etiquetas');
        $categoria['peso'] = $this->input->post('peso');
        $categoria['tamano'] = $this->input->post('tamano');
        $categoria['link'] = $this->input->post('link');
        $categoria['orden'] = $this->input->post('orden');
      
        // Pasar el switch
        switch ($opcion) {

            case 'insertar':
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
        if (!$valid_imagen2 ) {
          //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
          $data['messages']['imagen2']  = '<p class="text-danger">Archivo no valido  o tamaño excedido</p>';
        }else{
          $data['messages']['imagen2']  = '';
        }
        if (!$valid_imagen3) {
          //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
          $data['messages']['imagen3']  = '<p class="text-danger">Archivo no valido  o tamaño excedido </p>';
        }else{
          $data['messages']['imagen3']  = '';
        }

    }

    echo json_encode($data);

}

  // Alta de un sitios
  public function setCategorias($data){
    $categoria['titulo']      = $data['titulo'];
    $categoria['descLarga']   = $data['descLarga'];
    $categoria['codigo']   = $data['codigo'];
    $categoria['descCorta']   = $data['descCorta'];
    $categoria['imagen']      = $data['imagen'];
    $categoria['imagen2']     = $data['imagen2'];;
    $categoria['imagen3']     = $data['imagen3'];
    $categoria['precioLista'] = $data['precioLista'];
    $categoria['precioOF']    = $data['precioOF'];
    $categoria['OfDesde']     = $data['OfDesde'];        
    $categoria['OfHasta']     = $data['OfHasta'];
    $categoria['impuesto_id'] = $data['impuesto_id'];
    $categoria['presentacion_id'] = $data['presentacion_id'];
    $categoria['destacar_id'] = $data['destacar_id'];
    $categoria['etiquetas'] = $data['etiquetas'];
    $categoria['peso'] = $data['peso'];
    $categoria['tamano'] = $data['tamano'];
    $categoria['link'] = $data['link'];
    $categoria['orden'] = $data['orden'];
    $categoria['sitio_id'] = $this->config->item('sitio_id');
    


      $this->Categorias_model->setCategoria($categoria);
      return TRUE;
  }

  // Editar un sitios
  public function updateCategorias($data){

    $categoria['titulo']      = $data['titulo'];
    $categoria['descLarga']   = $data['descLarga'];
    $categoria['codigo']   = $data['codigo'];
    $categoria['descCorta']   = $data['descCorta'];
    $categoria['imagen']      = $data['imagen'];
    $categoria['imagen2']     = $data['imagen2'];;
    $categoria['imagen3']     = $data['imagen3'];
    $categoria['precioLista'] = $data['precioLista'];
    $categoria['precioOF']    = $data['precioOF'];
    $categoria['OfDesde']     = $data['OfDesde'];        
    $categoria['OfHasta']     = $data['OfHasta'];
    $categoria['impuesto_id'] = $data['impuesto_id'];
    $categoria['presentacion_id'] = $data['presentacion_id'];
    $categoria['destacar_id'] = $data['destacar_id'];
    $categoria['etiquetas'] = $data['etiquetas'];
    $categoria['peso'] = $data['peso'];
    $categoria['tamano'] = $data['tamano'];
    $categoria['link'] = $data['link'];
    $categoria['orden'] = $data['orden'];
      
    $this->Productos_model->update($data['id'], $categoria);

    return TRUE;

  }

  //Eliminando un registro de la tabla de categorias
  public function deleteCategoria()
  {
    $id = $this->input->post('Id');
   
    //$fileName = $this->input->post('FileName');
    $this->Productos_model->deleteCategorias($id);
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