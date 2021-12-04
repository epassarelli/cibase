<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

switch ($this->config->item('sitio_id')) {
	case 1:
		$route['mipanel'] = 'mipanel';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;
	
	case 2:
		$route['mipanel'] = 'mipanel';
		$route['login'] = 'login';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;	

	case 3:
		$route['mipanel'] = 'mipanel';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;	

	case 4:
		$route['mipanel'] = 'mipanel';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;	

	default:
		# code...
		break;
}