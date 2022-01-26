<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends MX_Controller {

 	public function __construct() {
    parent::__construct();
    
    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(TRUE);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }
      $this->color1 = $this->config->item('color1');
  }

	public function indexOld(){
    $data['seccion']    = 'contacto';
    $data['title']    = 'Contacto';

    
    $modulos = $this->config->item('modulos');
    
    $data['view']       = 'contacto_' . $this->session->userdata('theme') . '_1';    
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);

	}


  public function index(){

    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('name', 'Nombre', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');  
    $this->form_validation->set_rules('subject', 'Asunto', 'required');
    $this->form_validation->set_rules('message', 'Mensaje', 'required');  

    if($this->form_validation->run()){
      $from = '';
      $to = '';

      $this->load->library('email');
      $this->email->from($from, 'Contacto desde el portal Web');
      $this->email->to($to, 'info@webpass.com.ar');
        
      $this->email->subject($_POST['subject']);
      

      $this->email->message($_POST['name']. " con e-mail: " . $_POST['email'] . ", se ha puesto en contacto contigo y te ha dicho: ".$_POST['message']);
              
        // Send email
        if($this->email->send())
        {
          $data['breadcrumb'] = array(
                'Inicio' => base_url()
              );    
          
          // Insertamos el mensaje en la Base de Datos
          //$this->Contacto_model->insertar($nombre,$email,$asunto,$mensaje);

          redirect('contacto/exitoso');
        }
        else
          {
          $data['breadcrumb'] = array(
                'Inicio' => base_url()
              );    
          redirect('contacto');

          }
      
    }
    else{
      $data['title']        = "Contacto";
      
      $data['view']       = 'contacto_' . $this->session->userdata('theme') . '_1'; 

      $data['breadcrumb'] = array(
              'Inicio' => base_url()
            );
      $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
    }   
  }


  public function partial($seccion_id, $slug, $titulo, $bajada, $bloque){
    $data['slug']   = $slug;
    $data['titulo'] = $titulo;
    $data['bajada'] = $bajada;

    $modulos = $this->config->item('modulos');
    
    $viewTheme = 'contacto_' . $this->session->userdata('theme') . '_' . $bloque;
    $this->load->view($viewTheme, $data);
	}

}