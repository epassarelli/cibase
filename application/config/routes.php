<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

switch ($this->config->item('sitio_id')) {
	case 1:
		
		break;
	
	case 2:
		
		break;	
	
	default:
		# code...
		break;
}