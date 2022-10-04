<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contenidos extends MX_Controller
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

		$this->load->model(array('Secciones_model', 'Bloques_model', 'Componentes_model', 'publicaciones/Publicaciones_model'));
	}

	// Carga el Nosotros para el front
	public function index()
	{
		$data['title'] = 'Bienvenidas /os';

		switch ($this->session->userdata('site_lang')) {
			case 'spanish':
				$pagIncial = 'inicio';
				break;
			case 'english':
				$pagIncial = 'home';
				break;
			default:
				$pagIncial = 'inicio';
				break;
		}

		$params = array(
			'sitio_id' => $this->session->userdata("idSitio"),
			'slug'  => $pagIncial,
			'estado' => 1
		);

		$secciones = $this->Secciones_model->getSeccionesPor($params);

		if ($secciones) {

			$seccion = $secciones[0];
			$params2 = array(
				'b.seccion_id' => $seccion->seccion_id,
				'b.estado' => 1
			);

			$data['bloques']    = $this->Bloques_model->getBloquesPor($params2);
			$data['view'] = 'contenidos_view';
		} else {
			$data['view'] = '404' . $this->session->userdata('theme') . '_view';
		}

		if ($pagIncial == 'inicio') {

			$params3 = array(
				'categoria_id' => 32,
				'estado' => 1
			);
			$novedades  = $this->Publicaciones_model->getNovedades(4);
			if (count($novedades) > 0) {
				$data['novedades'] = $novedades;
			}
		}

		$this->load->view('layout_' . $this->session->userdata('theme') . '_view', $data);
	}

	// Devuelve la página o seccion solicitada por el slug de la URL
	public function pagina($slug = '')
	{
		$params = array(
			'sitio_id' => $this->session->userdata("idSitio"),
			'slug'  => $slug,
			'estado' => 1
		);

		$seccion = $this->Secciones_model->getOneBy('secciones', $campos = '', $params, $orden = '');

		if ($seccion) {
			$data['title'] = $seccion->titulo;

			$params2 = array(
				'b.seccion_id' => $seccion->seccion_id,
				'b.estado' => 1
			);

			$data['bloques']    = $this->Bloques_model->getBloquesPor($params2);

			$novedades  = $this->Publicaciones_model->getNovedades(4);
			if (count($novedades) > 0) {
				$data['novedades'] = $novedades;
			}

			$data['view'] = 'contenidos_view';
		} else {
			$data['view'] = '404_' . $this->session->userdata('theme') . '_view';
		}

		$this->load->view('layout_' . $this->session->userdata('theme') . '_view', $data);
	}

	// Impresion parcial de los bloques de una seccion
	public function bloque($bloque_id = '', $vista = '')
	{

		$bloque = $this->Bloques_model->getBloque($bloque_id);

		$params2 = array(
			'bloque_id' => $bloque->bloque_id,
			'estado' => 1
		);
		$data['bloque']     = $bloque;
		$data['componentes'] = $this->Componentes_model->getComponentesPor($params2);

		// Carga la vista parcial del bloque
		$this->load->view($vista, $data);
	}
}
