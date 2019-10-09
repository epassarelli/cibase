<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MX_Controller {

	// Carga el slider para el front
	public function index()
	{
		$this->load->view('slider_home_view');
	}


}
