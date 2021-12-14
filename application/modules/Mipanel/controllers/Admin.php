<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct()	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
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
		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('layout_back.php',(array)$output);
	}



	public function index()	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


/*********************************************************************
*
* Configuraciones inicial
* 
**********************************************************************/

	public function sitios()	{		
		$crud = new grocery_CRUD();
		$crud->set_table('sitios');
		if (!$this->ion_auth->is_admin()) {
			$crud->where('sitios.sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('sitio');
		$crud->set_relation('theme_id','themes','theme');
		$crud->set_field_upload('logo','assets/uploads/'.$this->config->item('sitio_id'));
		$crud->set_field_upload('icon','assets/uploads/'.$this->config->item('sitio_id'));
		$crud->set_field_upload('qr','assets/uploads/'.$this->config->item('sitio_id'));
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function themes()	{
		$crud = new grocery_CRUD();
		$crud->set_table('themes');
		$crud->set_subject('theme');
		//$crud->set_relation('bloque_id','bloques','texto1');
		$crud->set_field_upload('imagen','assets/images/themes');
		$output = $crud->render();
		$this->_example_output($output);
	}


	public function modulos()	{
		$crud = new grocery_CRUD();
		$crud->set_table('modulos');
		$crud->set_subject('módulo');
		$output = $crud->render();
		$this->_example_output($output);
	}


	public function roles()	{
		$crud = new grocery_CRUD();
		$crud->set_table('groups');
		$crud->set_subject('rol');		
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function usuarios()	{
		$crud = new grocery_CRUD();
		$crud->set_table('users');
		$crud->set_subject('usuario');
		$crud->columns('first_name','last_name','username','email','roles','sitios');	
		$crud->set_relation_n_n('roles', 'users_groups', 'groups', 'group_id', 'user_id', 'name');
		$crud->set_relation_n_n('sitios', 'users_sitios', 'sitios', 'sitio_id', 'user_id', 'sitio');

		$output = $crud->render();
		$this->_example_output($output);
	}	


/*********************************************************************
*
* Contenidos
* 
**********************************************************************/

	public function secciones()	{
		$crud = new grocery_CRUD();
		$crud->set_table('secciones');
	
		if (!$this->ion_auth->is_admin()) {
			$crud->where('secciones.sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('seccion');
		$crud->display_as('sitio_id','Sitio')
		 	->display_as('modulo_id','Módulo');
		$crud->columns('sitio_id','modulo_id','titulo','slug','menu','orden');
		$crud->set_relation('modulo_id','modulos','modulo');
		$crud->set_relation('sitio_id','sitios','sitio');
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function formatos()	{
		$crud = new grocery_CRUD();
		$crud->set_table('formatos');
		$crud->set_subject('formato');
		$crud->set_relation('theme_id','themes','theme');
		$crud->set_field_upload('imagen','assets/images/formatos');
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function bloques()	{
		$crud = new grocery_CRUD();
		$crud->set_table('bloques');
		$crud->set_subject('bloque');
		$crud->set_relation('seccion_id', 'secciones', '{sitio_id}');
		$crud->columns('sitio_id_callback','seccion_id','texto1','texto2','imagen','formato_id','estado');
		$crud->display_as('sitio_id_callback','Sitio');
		$crud->display_as('seccion_id','Seccion');
		
		$crud->callback_column('sitio_id_callback',array($this,'getSitio'));

		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_relation('seccion_id','secciones','Sitio {sitio_id} - {titulo}');
		$crud->set_relation('formato_id','formatos','view');

		$crud->set_field_upload('imagen','assets/uploads/'.$this->config->item('sitio_id').'/bloques');
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function componentes()	{
		$crud = new grocery_CRUD();
		$crud->set_table('componentes');
		$crud->set_subject('componente');
		
		$crud->set_relation('bloque_id', 'bloques', '{seccion_id}');
		
		//$crud->set_relation('seccion_id', 'secciones', '{sitio_id}');
		//if ($this->ion_auth->is_admin()) {
		//	$crud->where('sitio_id',$this->config->item('sitio_id'));
		//}

		$crud->set_relation('bloque_id','bloques','texto1');
		$crud->set_field_upload('imagen','assets/uploads/'.$this->config->item('sitio_id').'/componentes');
		$output = $crud->render();
		$this->_example_output($output);
	}	



/*********************************************************************
*
* Publicaciones
* 
**********************************************************************/

	public function publicaciones()	{
		$crud = new grocery_CRUD();
		$crud->set_table('publicaciones');
		$crud->set_relation('categoria_id', 'categorias', 'categoria', array('categorias.sitio_id' => $this->config->item('sitio_id')));
		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('publicacion');
		$output = $crud->render();
		$this->_example_output($output);
	}	



/*********************************************************************
*
* Productos y carrito
* 
**********************************************************************/

	public function impuestos()	{
		$crud = new grocery_CRUD();
		$crud->set_table('impuestos');
		$crud->set_subject('Impuesto');
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function presentaciones()	{
		$crud = new grocery_CRUD();
		$crud->set_table('presentaciones');
		$crud->set_subject('presentacion');
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function productos()	{
		$crud = new grocery_CRUD();
		$crud->set_table('productos');
		$crud->set_subject('producto');
		$crud->set_relation('sitio_id','sitios','sitio');	
		$crud->set_relation('impuesto_id','impuestos','titulo');			
		$crud->set_relation('presentacion_id','presentaciones','titulo');	

		$crud->set_relation_n_n('categorias', 'productos_categorias', 'categorias', 'producto_id', 'categoria_id', 'categoria', array('categorias.sitio_id' => $this->config->item('sitio_id')));


		$crud->set_field_upload('imagen','assets/uploads/'.$this->config->item('sitio_id').'/productos');
		$crud->set_field_upload('imagen2','assets/uploads/'.$this->config->item('sitio_id').'/productos');
		$crud->set_field_upload('imagen3','assets/uploads/'.$this->config->item('sitio_id').'/productos');

		$output = $crud->render();
		$this->_example_output($output);
	}	


/*********************************************************************
*
* Categorias generales
* 
**********************************************************************/

	public function categorias()	{
		$crud = new grocery_CRUD();
		$crud->set_table('categorias');
		
		$crud->set_relation('catpadre_id','categorias','nombre');
		$crud->set_relation('idioma_id','idiomas','idioma');
		$crud->set_relation('sitio_id','sitios','sitio');
		$crud->set_relation('modulo_id','modulos','modulo');

		if (!$this->ion_auth->is_admin()) {
			$crud->where('categorias.sitio_id',$this->config->item('sitio_id'));
		}
		
		$crud->set_field_upload('imagen','assets/uploads/'.$this->config->item('sitio_id').'/categorias');
		
		$output = $crud->render();
		$this->_example_output($output);
	}	






	public function contactos()	{
		$crud = new grocery_CRUD();
		$crud->set_table('contactos');
		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}
		$crud->set_relation('sitio_id','sitios','nombre');	
		$output = $crud->render();
		$this->_example_output($output);
	}	











	public function getSitio($entorno,$row) {
        $sql = "SELECT sitio_id FROM secciones WHERE seccion_id = " . $row->seccion_id ;
        $result = $this->db->query($sql)->row();
        $sitio_id = $result->sitio_id;              
        return $sitio_id;
	}   













}
