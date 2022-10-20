<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Productos  extends MX_Controller
{

  var $data;

  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('login');
    }

    $this->load->model('../models/Productos_model');
    $this->load->model('../models/Impuestos_model');
    $this->load->model('../models/Presentaciones_model');
    $this->load->model('../models/Categorias_model');
    $this->load->model('../models/Estados_model');
    $this->load->helper('productos');



    switch (ENVIRONMENT) {
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
  public function index()
  {
    $this->data['files_css'] = array('animate.css', 'sweetalert2.min.css');
    $this->data['files_js'] = array('productos.js?v=' . rand(), 'sweetalert2.min.js');
    $this->data['presentaciones'] = $this->Presentaciones_model->getAllBy('presentaciones', '', '', '');
    $this->data['impuestos'] = $this->Impuestos_model->getAllBy('impuestos', '', '', '');
    $this->data['presentaciones'] = $this->Presentaciones_model->getAllBy('presentaciones', '', '', '');

    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $this->data['categorias'] = $this->Categorias_model->getAllBy('categorias', '', $parametros, 'categoria');

    $this->template->load('layout_back', 'productos_abm_view', $this->data);
  }

  // Datos del ABM
  public function getProductos()
  {

    $parametros['sitio_id'] = $this->config->item('sitio_id');
    $data['data'] = $this->Productos_model->getAllBy('productos', '', $parametros, '');
    echo json_encode($data);
  }


  // Esta funcion la usamos para enviar datos
  //completos del registro al js para su edicion
  public function getProductoJson()
  {

    // $parametros['sitio_id'] = $this->config->item('sitio_id');
    // $parametros['id'] = $this->input->post('Id');
    // $data['data'] = $this->Productos_model->getOneBy('productos','',$parametros,'');

    $id = $this->input->post('Id');

    $producto = $this->Productos_model->getAllById($id);


    if (enOferta($producto->precioOF, $producto->OfDesde, $producto->OfHasta)) {
      $precioventa  = $producto->precioOF;
    } else {
      $precioventa  = $producto->precioLista;
    }
    $producto->precioventa = $precioventa;



    $data['data'] = $producto;
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
      } else {
        $data['success'] = FALSE;
      }
    }

    echo json_encode($data);
  }


  public function accion()
  {
    $data = array('success' => false, 'messages' => array());

    $this->form_validation->set_rules('titulo', 'Titulo', array('required', 'max_length[255]'), array(
      'required'   => '{field} es obligatorio',
      'max_length' => '{field} no puede exceder {param} caracteres -'
    ));

    $this->form_validation->set_rules(
      'categoria_id',
      'Categoria',
      array('required', 'greater_than[0]'),
      array(
        'required'   => '{field} es obligatorio',
        'greater_than'   => '{field} es obligatorio'
      )
    );

    $this->form_validation->set_rules('unidadvta', 'Unidad de Venta', array('required'), array('required'   => '{field} es obligatorio'));

    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');



    //Cargamos la imagen en el servidor
    $result = null;
    $result2 = null;
    $result3 = null;

    $valid_imagen = TRUE;

    if (isset($_FILES["File"]["name"]) and $this->input->post('imagen') !== '') {
      if ($_FILES["File"]["name"] !== '') {
        $result = $this->upload('File', 'jpg|png');
        if (isset($result['error'])) {
          $valid_imagen = FALSE;
        } else {
          $valid_imagen = TRUE;
        }
      }
    }



    $valid_imagen2 = TRUE;


    if (isset($_FILES["File1"]["name"]) and $this->input->post('imagen2') !== '') {
      if ($_FILES["File1"]["name"] !== '') {
        $result2 = $this->upload('File1', 'jpg|png');
        if (isset($result2['error'])) {
          $valid_imagen2 = FALSE;
        } else {
          $valid_imagen2 = TRUE;
        }
      }
    }

    $valid_imagen3 = TRUE;
    if (isset($_FILES["File2"]["name"]) and $this->input->post('imagen3') !== '') {
      if ($_FILES["File2"]["name"] !== '') {
        $result3 = $this->upload('File2', 'jpg|png');
        if (isset($result3['error'])) {
          $valid_imagen3 = FALSE;
        } else {
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
      $categoria = $this->input->post('categoria_id');
      $producto['id']        = $this->input->post('id');
      $producto['sitio_id']  = $this->input->post('sitio_id');
      $producto['titulo']    = $this->input->post('titulo');
      $producto['codigo']    = $this->input->post('codigo');
      $producto['descLarga'] = $this->input->post('descLarga');
      $producto['descCorta'] = $this->input->post('descCorta');
      $producto['imagen']    = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen');
      $producto['imagen2']   = (isset($result2["file_name"])) ? $result2["file_name"] : $this->input->post('imagen2');
      $producto['imagen3']   = (isset($result3["file_name"])) ? $result3["file_name"] : $this->input->post('imagen3');
      $producto['precioLista'] = $this->input->post('precioLista');
      $producto['precioOF']    = $this->input->post('precioOF');
      $producto['OfDesde'] = $this->input->post('OfDesde');
      $producto['OfHasta'] = $this->input->post('OfHasta');
      $producto['impuesto_id'] = $this->input->post('impuesto_id');
      $producto['presentacion_id'] = $this->input->post('presentacion_id');
      $producto['destacar_id'] = $this->input->post('destacar_id');
      $producto['etiquetas'] = $this->input->post('etiquetas');
      $producto['peso'] = $this->input->post('peso');
      $producto['tamano'] = $this->input->post('tamano');
      $producto['link'] = $this->input->post('link');
      $producto['orden'] = $this->input->post('orden');
      $producto['unidadvta'] = $this->input->post('unidadvta');



      // Pasar el switch
      switch ($opcion) {

        case 'insertar':
          $data['success'] = $this->setProductos($producto, $categoria);
          break;

        case 'editar':
          $data['success'] = $this->updateProductos($producto, $categoria);
          break;
      }
    } else {
      foreach ($_POST as $key => $value) {
        $data['messages'][$key] = form_error($key);
      }

      if (!$valid_imagen) {
        //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
        $data['messages']['imagen']  = '<p class="text-danger">Archivo no valido o tamaño excedido</p>';
      } else {
        $data['messages']['imagen']  = '';
      }
      if (!$valid_imagen2) {
        //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
        $data['messages']['imagen2']  = '<p class="text-danger">Archivo no valido  o tamaño excedido</p>';
      } else {
        $data['messages']['imagen2']  = '';
      }
      if (!$valid_imagen3) {
        //hay que agregarle la eitqueta de text danger porque no viene de form_error sino que es manual
        $data['messages']['imagen3']  = '<p class="text-danger">Archivo no valido  o tamaño excedido </p>';
      } else {
        $data['messages']['imagen3']  = '';
      }
    }

    echo json_encode($data);
  }

  // Alta de un sitios
  public function setProductos($data, $categoria)
  {
    $producto['titulo']      = $data['titulo'];
    $producto['descLarga']   = $data['descLarga'];
    $producto['codigo']   = $data['codigo'];
    $producto['descCorta']   = $data['descCorta'];
    $producto['imagen']      = $data['imagen'];
    $producto['imagen2']     = $data['imagen2'];;
    $producto['imagen3']     = $data['imagen3'];
    $producto['precioLista'] = $data['precioLista'];
    $producto['precioOF']    = $data['precioOF'];
    $producto['OfDesde']     = $data['OfDesde'];
    $producto['OfHasta']     = $data['OfHasta'];
    $producto['impuesto_id'] = $data['impuesto_id'];
    $producto['presentacion_id'] = $data['presentacion_id'];
    $producto['destacar_id'] = $data['destacar_id'];
    $producto['etiquetas'] = $data['etiquetas'];
    $producto['peso'] = $data['peso'];
    $producto['tamano'] = $data['tamano'];
    $producto['link'] = $data['link'];
    $producto['orden'] = $data['orden'];
    $producto['unidadvta'] = $data['unidadvta'];
    $producto['sitio_id'] = $this->config->item('sitio_id');



    $this->Productos_model->setProducto($producto, $categoria);
    return TRUE;
  }

  // Editar un sitios
  public function updateProductos($data, $categoria)
  {

    $producto['titulo']      = $data['titulo'];
    $producto['descLarga']   = $data['descLarga'];
    $producto['codigo']   = $data['codigo'];
    $producto['descCorta']   = $data['descCorta'];
    $producto['imagen']      = $data['imagen'];
    $producto['imagen2']     = $data['imagen2'];;
    $producto['imagen3']     = $data['imagen3'];
    $producto['precioLista'] = $data['precioLista'];
    $producto['precioOF']    = $data['precioOF'];
    $producto['OfDesde']     = $data['OfDesde'];
    $producto['OfHasta']     = $data['OfHasta'];
    $producto['impuesto_id'] = $data['impuesto_id'];
    $producto['presentacion_id'] = $data['presentacion_id'];
    $producto['destacar_id'] = $data['destacar_id'];
    $producto['etiquetas'] = $data['etiquetas'];
    $producto['peso'] = $data['peso'];
    $producto['tamano'] = $data['tamano'];
    $producto['link'] = $data['link'];
    $producto['orden'] = $data['orden'];
    $producto['unidadvta'] = $data['unidadvta'];

    $this->Productos_model->update($data['id'], $producto, $categoria);

    return TRUE;
  }

  //Eliminando un registro de la tabla de productos
  public function deleteProducto()
  {
    $id = $this->input->post('Id');

    //$fileName = $this->input->post('FileName');
    $this->Productos_model->deleteProductos($id);
    //$deletefile = './assets/uploads/' . $id . '/' . $fileName;
    //unlink($deletefile);
    echo json_encode(array('success' => TRUE));
  }

  public function cambioEstado()
  {
    $publicar = $this->input->post('Publicar');
    $id = $this->input->post('Id');



    $estadoNuevo = $this->Productos_model->cambioEstado($id, $publicar);
    echo json_encode(array(
      'success' => TRUE,
      'publicar' => $estadoNuevo,
      'estadoviejo' => $publicar,  //estado original
      'id' => $id
    ));            //id producto  
  }
  //Etadoviejo y id solo lo paso para ver lo que esta tomando 
  //por post desde la llamada ajax

  // Preguntar configuracion de carga de imagenes 
  function upload($archivo, $tipos)
  {

    $sitio_id = $this->config->item('sitio_id');
    $config['upload_path']          = 'assets/uploads/' . $sitio_id . '/productos/';
    $config['allowed_types']        = $tipos;   //'gif|jpg|png'

    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->upload->initialize($config);

    //if (!$this->upload->do_upload('File'))
    if (!$this->upload->do_upload($archivo)) {
      $error = array('error' => $this->upload->display_errors());
      return $error;
    } else {
      $data = $this->upload->data();
      return $data;
    }
  }
}
