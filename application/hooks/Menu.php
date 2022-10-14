<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MX_Controller
{


  public function cargarSitio($sitio_id)
  {
    $this->load->model('mipanel/Sitios_model');

    if ($this->session->has_userdata("idSitio")) {
      $sitio_id = $this->session->userdata("idSitio");
    } else {
      $sitio_id = $this->config->item('sitio_id');
      $this->session->set_userdata("idSitio", $sitio_id);
    }

    $data['sitio'] = $this->Sitios_model->getInfoSitio2($sitio_id);

    // Si encontré un sitio para esa url
    if ($data['sitio']) {
      // Guardo todos los datos del sitio en session
      foreach ($data['sitio'] as $key => $value) {
        $this->session->set_userdata($key, $value);
      }
    }

    if (!$this->session->has_userdata("idioma_id")) {
      $this->session->set_userdata("idioma_id", 1);
    }
  }



  public function armarMenu()
  {
    // Si NO estoy dentro del Backend armo el menu del front
    if ($this->uri->segment(1) !== 'mipanel') {
      $this->load->model('contenidos/Secciones_model');
      $items = $this->Secciones_model->getItemsMenu();
      $this->session->set_userdata('items', $items);
    }
  }
}
