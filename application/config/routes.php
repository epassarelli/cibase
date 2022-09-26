<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'contenidos'; // Por default carga una pagina con slug "home"
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//$route['login'] = 'login';
$route['contacto'] = 'contacto';
$route['contact'] = 'contacto';		

$route['auth'] = 'auth/index';
$route['auth/login'] = 'auth/login';
$route['auth/change_password'] = 'auth/change_password';
$route['auth/change_password'] = 'auth/register';

$route['mipanel'] = 'mipanel';

$route['articulos/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['articulos'] 				= 'publicaciones/categoria/articulos';

$route['libros/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['libros'] 					= 'publicaciones/categoria/libros';

$route['entrevistas/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['entrevistas'] 				= 'publicaciones/categoria/entrevistas';

$route['jurisprudencia-y-leyes/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['jurisprudencia-y-leyes'] 	= 'publicaciones/categoria/jurisprudencia-y-leyes';

$route['mujeres-en-el-mundo/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['mujeres-en-el-mundo'] = 'publicaciones/categoria/mujeres-en-el-mundo';

$route['conferencias/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['conferencias'] 				= 'publicaciones/categoria/conferencias';

$route['books/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['books'] 				= 'publicaciones/categoria/books';

$route['articles/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['articles'] 					= 'publicaciones/categoria/articles';

$route['interviews/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['interviews'] 				= 'publicaciones/categoria/interviews';

$route['laws-and-case-law/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['laws-and-case-law'] 	= 'publicaciones/categoria/laws-and-case-law';

$route['women-in-the-world/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['women-in-the-world'] = 'publicaciones/categoria/women-in-the-world';

$route['conferences/(:any)'] 			= 'publicaciones/mostrar/$1';
$route['conferences'] 				= 'publicaciones/categoria/conferences';

$route['(:any)'] = 'contenidos/pagina/$1';


