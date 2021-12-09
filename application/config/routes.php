<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 2 - webpass
// 3 - vittello
// 4 - claudia
// 5 - mutual

switch ($this->config->item('sitio_id')) {
	case 1:
		$route['login'] = 'login';
		$route['contacto'] = 'contacto';
		$route['mipanel'] = 'mipanel';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;
	
	case 2:
		$route['login'] = 'login';
		$route['contacto'] = 'contacto';
		$route['mipanel'] = 'mipanel';
		$route['login'] = 'login';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;	

	case 3:
		$route['login'] = 'login';
		$route['contacto'] = 'contacto';
		$route['mipanel'] = 'mipanel';
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;	

	case 4:
		$route['login'] = 'login';
		$route['contacto'] = 'contacto';
		$route['mipanel'] = 'mipanel';
		
		$route['articulos/(:any)'] 			= 'publicaciones/mostrar/$1';
		$route['articulos'] 				= 'publicaciones/categoria/articulos';
		
		$route['libros/(:any)'] 			= 'publicaciones/mostrar/$1';
		$route['libros'] 					= 'publicaciones/categoria/libros';
		
		$route['entrevistas/(:any)'] 			= 'publicaciones/mostrar/$1';
		$route['entrevistas'] 				= 'publicaciones/categoria/entrevistas';
		
		$route['jurisprudencia-y-leyes/(:any)'] 			= 'publicaciones/mostrar/$1';
		$route['jurisprudencia-y-leyes'] 	= 'publicaciones/categoria/jurisprudencia-y-leyes';
		
		$route['mujeres-en-el-mundo–reserva-en-argentina/(:any)'] 			= 'publicaciones/mostrar/$1';
		$route['mujeres-en-el-mundo–reserva-en-argentina'] = 'publicaciones/categoria/mujeres-en-el-mundo';
		
		$route['conferencias/(:any)'] 			= 'publicaciones/mostrar/$1';
		$route['conferencias'] 				= 'publicaciones/categoria/articulos';

		break;	
		
		$route['(:any)'] = 'contenidos/pagina/$1';
		break;	

	default:
		# code...
		break;
}

