<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MX_Controller {

    var $data;

    function __construct() {
        parent::__construct();

        // if (!$this->ion_auth->logged_in()) {
        //     redirect('Login');
        // }
        $this->load->model('Install_model');
    }

	public function index() {
        // Insertar los grupos

        // Insertar user Admin + Empresa

        // Insertar un registro para empresa

        // Insertar un registro para nosotros        

        $this->template->load('layout_back', 'mipanel_dashboard_view', $this->data);
    }
}
