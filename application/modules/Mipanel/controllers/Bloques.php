<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bloques  extends MX_Controller
{

  var $data;

  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('auth/login');
    }

    $this->load->model('Bloques_model');

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
    $this->data['files_js'] = array('bloques.js?v=' . rand(), 'sweetalert2.min.js');
    $this->template->load('layout_back', 'bloques_abm_view', $this->data);
  }

  // Datos del ABM
  public function getBloques()
  {
    $data['data'] = $this->Bloques_model->get_AllBackend();
    echo json_encode($data);
  }


  // Metodo de agregar nuevo /a 
  public function insertar()
  {

    $result = null;
    $valid_imagen = TRUE;

    if (isset($_FILES["imagen"]["name"]) and $this->input->post('imagen') !== '') {
      if ($_FILES["imagen"]["name"] !== '') {
        $result = $this->upload('imagen', 'jpg|png');

        if (isset($result['error'])) {
          $valid_imagen = FALSE;
        } else {
          $valid_imagen = TRUE;
        }
      }
    }

    $this->form_validation->set_rules('seccion_id', 'Pagina', 'required');
    $this->form_validation->set_rules('formato_id', 'Formato', 'required');

    if ($this->form_validation->run($this) == FALSE) {
      $data['accion']     = 'insertar';
      $data['paginas']    = $this->Paginas_model->getPorSitio();
      $data['formatos']   = $this->Formatos_model->getPorTheme();
      $data['files_css']  = array('animate.css', 'sweetalert2.min.css');
      $data['files_js']   = array('bloques.js?v=' . rand(), 'sweetalert2.min.js');
      $this->template->load('layout_back', 'bloques_form_view', $data);
    } else {
      //  Tomo todo lo que llegue
      $bloque['seccion_id']   = $this->input->post('seccion_id');
      $bloque['texto1']       = $this->input->post('texto1');
      $bloque['texto2']       = $this->input->post('texto2');
      $bloque['formato_id']   = $this->input->post('formato_id');
      $bloque['estado']       = 1;
      $bloque['imagen']     = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen');

      //  Inserto
      $this->Bloques_model->insertar($bloque);

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/bloques');
    }
  }




  // Metodo de agregar nuevo /a 
  public function editar($id = '')
  {
    $result = null;
    $valid_imagen = TRUE;

    if (isset($_FILES["imagen"]["name"]) and $this->input->post('imagen') !== '') {
      if ($_FILES["imagen"]["name"] !== '') {
        $result = $this->upload('imagen', 'jpg|png');

        if (isset($result['error'])) {
          $valid_imagen = FALSE;
        } else {
          $valid_imagen = TRUE;
        }
      }
    }

    $this->form_validation->set_rules('seccion_id', 'Pagina', 'required');
    $this->form_validation->set_rules('formato_id', 'Formato', 'required');

    if ($this->form_validation->run($this) == FALSE) {
      $data['accion']     = 'editar';
      $data['paginas']    = $this->Paginas_model->getPorSitio();
      $data['formatos']   = $this->Formatos_model->getPorTheme();
      $data['bloque']     = $this->Bloques_model->get($id);
      $data['files_css']  = array('animate.css', 'sweetalert2.min.css');
      $data['files_js']   = array('bloques.js?v=' . rand(), 'sweetalert2.min.js');
      $this->template->load('layout_back', 'bloques_form_view', $data);
    } else {
      $id = $this->input->post('id');

      //  Tomo todo lo que llegue
      $bloque['seccion_id']   = $this->input->post('seccion_id');
      $bloque['texto1']       = $this->input->post('texto1');
      $bloque['texto2']       = $this->input->post('texto2');
      $bloque['formato_id']   = $this->input->post('formato_id');
      $bloque['estado']       = 1;
      $bloque['imagen']     = (isset($result["file_name"])) ? $result["file_name"] : $this->input->post('imagen');

      //  Inserto
      $this->Bloques_model->actualizar($bloque, $id);

      // Si NamePortada está vacio hay que eliminar fisicamente la Anterior
      if (($this->input->post('NameImagen') == '') and ($this->input->post('ImagenOriginal') !== '')) {
        $this->deleteFile($this->input->post('ImagenOriginal'));
      }

      //  redireccionar a la vista de ABM (Listado)
      redirect('mipanel/bloques');
    }
  }


  // Elimina o no una página y Devuelve un JSON de status y mensaje
  public function eliminar()
  {
    $id = $this->input->post('Id');
    $this->load->model('Componentes_model');
    $componentes = $this->Componentes_model->getComponentesBloques($id);
    //var_dump($rendicion);

    // Si no tiene componentes asociados la elimino
    if (count($componentes) == 0) {

      if ($this->Bloques_model->eliminar($id)) {
        echo json_encode(array('status' => true, 'message' => 'Bloque eliminado con exito'));
      } else {
        echo json_encode(array('status' => false, 'message' => 'Ha ocurrido un error al eliminar el bloque'));
      }
    } else {
      // Mando un alert de No se puede eliminar    
      echo json_encode(array('status' => false, 'message' => 'No se puede eliminar el bloque por tener componentes asociados'));
    }
  }


  public function cambiarEstado()
  {

    $data['estado'] = ($this->input->post('Estado') == 1) ? '0' : '1';
    $id = $this->input->post('Id');
    $this->Bloques_model->actualizar($data, $id);
    echo json_encode(array('status' => TRUE, 'estado' => $data['estado']));
  }
}
