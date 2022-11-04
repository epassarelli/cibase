<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacto extends MX_Controller
{

  public function __construct()
  {
    parent::__construct();

    switch (ENVIRONMENT) {
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
    $this->load->library(array('form_validation', 'my_form_validation'));
    $this->load->model('Contacto_model');
    $this->config->load('captcha');
    $this->lang->load('contact', $this->session->userdata('site_lang'));
    $this->data_captcha_google = $this->config->item('data_captcha_google');
  }


  public function index()
  {
    $data['titulo'] = 'Contacto';
    $this->load->library(array('form_validation', 'my_form_validation'));
    $this->form_validation->run($this);
    $data['files_js'] = array('js/re-captcha-google.js');
    if ($this->input->post()) {
      $this->form_validation->set_rules(
        'g-recaptcha',
        'Google ReCaptcha V3',
        'required|callback_valid_captcha',
        //esta regla de form validation llama a la funcion declarada abajo.
        array(
          'valid_captcha' => 'El campo {field} no pudo ser validado correctamente, recargue la página e intente nuevamente.',
        )
      );
      //$this->form_validation->set_rules('g-recaptcha', 'Google ReCaptcha V3', 'required|callback_valid_captcha');
      $this->form_validation->set_rules('name', 'Nombre', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('subject', 'Asunto', 'required');
      $this->form_validation->set_rules('message', 'Mensaje', 'required');
    }

    if ($this->form_validation->run()) {

      // Tomar los datos del Form
      $contacto['fecha']    =  date('Y-m-d', time());
      $contacto['nombre']   = $this->input->post('name');
      $contacto['correo']   = $this->input->post('email');
      $contacto['asunto']   = $this->input->post('subject');
      $contacto['mensaje']  = $this->input->post('message');
      $contacto['sitio_id'] = $this->session->userdata('sitio_id');

      // Guardar los datos en la BDD
      //$this->Contacto_model->insertar($contacto);

      // Enviar un correo
      // $config = array(
      //   'protocol' => 'smtp',
      //   'smtp_host' => 'smtp.1and1.com',
      //   'smtp_port' => 25,
      //   'smtp_user' => 'barackobama@misitio.com',
      //   'smtp_pass' => '12345',
      //   'charset' => 'utf-8',
      //   'priority' => 1
      // );

      //Establecemos esta configuración
      //$this->email->initialize($config);

      $from = 'info@vitello.com.ar';
      $to = 'consultas@webpass.com.ar';

      $this->load->library('email');
      $this->email->from($from, 'Vitello Carnes');
      $this->email->to($to);
      $this->email->bcc('epassarelli@gmail.com');

      $this->email->subject($_POST['subject']);


      $this->email->message($_POST['name'] . " con e-mail: " . $_POST['email'] . ", se ha puesto en contacto contigo y te ha dicho: " . $_POST['message']);

      // Send email
      if ($this->email->send()) {

        // Insertamos el mensaje en la Base de Datos
        //$this->Contacto_model->insertar($nombre,$email,$asunto,$mensaje);

        $message = array(
          'message' => 'Se envió el correo exitosamente',
          'alert' => 'success'
        );

        redirect('contacto');
      } else {
        $data['breadcrumb'] = array(
          'Inicio' => base_url()
        );
        $message = array(
          'message' => 'NO se pudo enviar el correo. Comuníquese con el administrador del sitio',
          'alert' => 'danger'
        );
      }

      $this->session->set_flashdata('message', $message);
    } else {
      $data['title']    = "Contacto";
      if ($this->config->item('sitio_id') == 4) {
        $data['view']     = 'contacto_claudia_' . $this->session->userdata('theme') . '_1';
      } else {
        $data['view']     = 'contacto_' . $this->session->userdata('theme') . '_1';
      }


      if ($this->input->post()) {
        $message = array(
          'message' => 'Revise los datos obligatorios',
          'alert' => 'danger'
        );
        $this->session->set_flashdata('message', $message);
      }
      // else{
      //   $message = array(
      //     'message' => 'Entro x 1ra vez',
      //     'alert' => 'danger'
      //   ); 
      // }
      //$this->session->set_flashdata('message',$message);
      $this->load->view('layout_' . $this->session->userdata('theme') . '_view', $data);
    }
  }



  public function partial($seccion_id, $slug, $titulo, $bajada, $bloque)
  {
    $data['slug']   = $slug;
    $data['titulo'] = $titulo;
    $data['bajada'] = $bajada;

    $modulos = $this->config->item('modulos');

    $viewTheme = 'contacto_' . $this->session->userdata('theme') . '_' . $bloque;
    $this->load->view($viewTheme, $data);
  }


  private function sendEmail($mailData)
  {
    // Load the email library
    $this->load->library('email');

    // Mail config
    $to           = 'recipient@gmail.com';
    $from         = 'codexworld@gmail.com';
    $fromName     = 'CodexWorld';
    $mailSubject  = 'Contact Request Submitted by ' . $mailData['name'];

    // Mail content
    $mailContent  = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>' . $mailData['name'] . '</p>
            <p><b>Email: </b>' . $mailData['email'] . '</p>
            <p><b>Subject: </b>' . $mailData['subject'] . '</p>
            <p><b>Message: </b>' . $mailData['message'] . '</p>
        ';

    $config['mailtype'] = 'html';
    $this->email->initialize($config);
    $this->email->to($to);
    $this->email->from($from, $fromName);
    $this->email->subject($mailSubject);
    $this->email->message($mailContent);

    // Send email & return status
    return $this->email->send() ? true : false;
  }



  public function valid_captcha($captcha)
  {
    $recaptcha_response = $captcha;
    $recaptcha = file_get_contents($this->data_captcha_google['site_verify'] . '?secret=' . $this->data_captcha_google['secret_key'] . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    if (!$recaptcha->success) {
      return false;
    } else {
      return true;
    }
  }

  // Mensaje de prueba para asegurarse que anda el envio de correo 
  public function prueba()
  {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "info@vitello.com.ar";
    $to = "epassarelli@gmail.com";
    $subject = "Prueba de PHP mail";
    $message = "PHP mail funciona bien";
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    echo "El mensaje de correo fue enviado.";
  }
}
