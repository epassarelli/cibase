<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mipanel extends MX_Controller {

    var $data;

    function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }

    }

	public function index() {
        $this->template->load('layout_back', 'mipanel_dashboard_view', $this->data);
    }
}
