<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paginas  extends MX_Controller
{

  var $data;

  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('auth/login');
    }

    $this->load->model(array('Paginas_model', 'Modulos_model', 'Idiomas_model', 'Bloques_model'));

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
    $data['files_css'] = array('animate.css', 'sweetalert2.min.css');
    $data['files_js'] = array('paginas.js?v=' . rand(), 'sweetalert2.min.js');
    // $data['paginas'] = $this->Paginas_model->get_AllBackend(); 
    $this->template->load('layout_back', 'paginas_abm_view', $data);
  }



  // Datos del ABM
  public function getPaginas()
  {
    $data['data'] = $this->Paginas_model->get_AllBackend();
    echo json_encode($data);
  }



  // Metodo de agregar nuevo /a 
  public function insertar()
  {

    $this->form_validation->set_rules('titulo', 'Titulo', 'required');

    if ($this->form_validation->run($this) == FALSE) {
      $data['accion']     = 'insertar';
      $data['modulos'] = $this->Modulos_model->get_AllBackend();
      $data['idiomas'] = $this->Idiomas_model->get_AllBackend();
      $data['files_css']  = array('animate.css', 'sweetalert2.min.css');
      $data['files_js']   = array('paginas.js?v=' . rand(), 'sweetalert2.min.js');
      $this->template->load('layout_back', 'paginas_form_view', $data);
    } else {
      //  Tomo todo lo que llegue
      $pagina['titulo']      = $this->input->post('titulo');
      $pagina['modulo_id']   = $this->input->post('modulo_id');
      $pagina['slug']        = url_title($this->input->post('titulo'), '-', TRUE);
      $pagina['bajada']      = $this->input->post('bajada');
      $pagina['orden']       = $this->input->post('orden');
      $pagina['menu']        = $this->input->post('menu');

      $pagina['bajada']      = '';

      $pagina['estado']      = 1;
      $pagina['sitio_id']    = $this->config->item('sitio_id');
      $pagina['idioma_id']   = $this->input->post('idioma_id');

      //  Inserto
      $this->Paginas_model->insertar($pagina);

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/paginas');
    }
  }




  // Metodo de agregar nuevo /a 
  public function editar($id = '')
  {

    $this->form_validation->set_rules('titulo', 'Titulo', 'required');

    if ($this->form_validation->run($this) == FALSE) {
      $data['accion']     = 'editar';
      $data['modulos'] = $this->Modulos_model->get_AllBackend();
      $data['idiomas'] = $this->Idiomas_model->get_AllBackend();
      $data['pag']        = $this->Paginas_model->get($id);
      $data['files_css']  = array('animate.css', 'sweetalert2.min.css');
      $data['files_js']   = array('paginas.js?v=' . rand(), 'sweetalert2.min.js');
      $this->template->load('layout_back', 'paginas_form_view', $data);
    } else {
      $id = $this->input->post('id');

      //  Tomo todo lo que llegue
      $pagina['titulo']      = $this->input->post('titulo');
      $pagina['modulo_id']   = $this->input->post('modulo_id');
      $pagina['slug']        = url_title($this->input->post('titulo'), '-', TRUE);
      $pagina['orden']       = $this->input->post('orden');
      $pagina['menu']        = $this->input->post('menu');
      $pagina['idioma_id']   = $this->input->post('idioma_id');
      $pagina['bajada']      = '';

      //  Inserto
      $this->Paginas_model->actualizar($pagina, $id);

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/paginas');
    }
  }


  // Elimina o no una página y Devuelve un JSON de status y mensaje
  public function eliminar()
  {
    $id = $this->input->post('Id');

    $bloques = $this->Bloques_model->getPorPagina($id);
    // var_dump($bloques);

    // Si no tiene bloques asociados la elimino
    if (count($bloques) == 0) {

      if ($this->Paginas_model->eliminar($id)) {
        echo json_encode(array('status' => true, 'message' => 'Pagina eliminada con exito'));
      } else {
        echo json_encode(array('status' => false, 'message' => 'Ha ocurrido un error al eliminar la página'));
      }
    } else {
      // Mando un alert de No se puede eliminar    
      echo json_encode(array('status' => false, 'message' => 'No se puede eliminar la página por tener bloques asociados'));
    }
  }



  public function cambiarEstado()
  {
    $data['estado'] = ($this->input->post('Estado') == 1) ? '0' : '1';
    $id = $this->input->post('Id');
    $this->Paginas_model->actualizar($data, $id);
    echo json_encode(array('status' => TRUE, 'estado' => $data['estado']));
  }
}
