<?php defined('BASEPATH') OR exit('No direct script access allowed');  

class Menu extends MX_Controller {  


  public function cargarSitio()
  {
    // Si No existe ya la SESSION del SITIO
    if(!$this->session->userdata('nombre1')){
      //echo "No existe la session del sitio<hr>";
      
      $this->load->model('mipanel/Sitios_model');
      $data['sitio'] = $this->Sitios_model->getInfoSitio();
      // var_dump($data['sitio']);
      // Si encontré un sitio para esa url
      if($data['sitio']){

          // Guardo todos los datos del sitio en session
          foreach ($data['sitio'] as $key => $value) {
              $this->session->set_userdata($key, $value);
          }
        }
    }
  }


  public function armarMenu()
  {
    // Si NO estoy dentro del Backend armo el menu del front
    if($this->uri->segment(1) !== 'mipanel'){
      
      // Si No existe ya la SESSION con los ITEMS
      //if($this->session->userdata('items')){
        
        // Si se trata de una landing cargo los bloque seccion Home        
        //if($this->session->userdata('landing')){
          // $this->load->model('contenidos/Bloques_model');
          // $items = $this->Bloques_model->getItemsMenu();
          $this->load->model('contenidos/Secciones_model');
          $items = $this->Secciones_model->getItemsMenu();
          $this->session->set_userdata('items', $items);
          //echo "Items de bloques<hr>";
        //}
        //else{      
          // SINO, cargo los items en base a las secciones que tengan MENU = true
          // $this->load->model('contenidos/Secciones_model');
          // $items = $this->Secciones_model->getItemsMenu();
          // $this->session->set_userdata('items', $items);
          //echo "Items de secciones<hr>";
        //}

      //}
    }
    //var_dump($items);
    //return $items;
  }
  
}