<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct()
	{
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




	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function sliders()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('slider');
		$crud->set_subject('Slides');
		$crud->set_relation('seccion_id','secciones','titulo');
		$crud->set_field_upload('imagen','assets/uploads');

		// $crud->display_as('canc_titulo','Titulo')
		// 	->display_as('canc_alias','Alias')
		// 	->display_as('canc_contenido','Contenido');

		// $crud->required_fields('inte_id','canc_titulo','canc_contenido');
		// $crud->set_relation('inte_id','interprete','inte_nombre');
		// $crud->set_relation_n_n('discos', 'album_cancion', 'album', 'canc_id', 'albu_id', 'albu_titulo');

		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function modulos()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('modulos');
		$crud->set_subject('módulo');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function nosotros()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('nosotros');
		$crud->set_subject('Componente - Bloque 2');
		$crud->set_relation('seccion_id','secciones','titulo');
		$crud->set_field_upload('imagen','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function servicios()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('servicios');
		$crud->set_subject('servicio');
		$crud->set_relation('seccion_id','secciones','Sitio {sitio_id} - {titulo}');
		$crud->set_field_upload('imagen','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function impuestos()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('impuestos');
		$crud->set_subject('Impuesto');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function presentaciones()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('presentaciones');
		$crud->set_subject('presentacion');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function categoriasprod()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('categias');

		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('categoria');
		$crud->set_relation('sitio_id','sitios','nombre');
		$crud->set_relation('slide_id','slider','titulo');
		$crud->set_field_upload('imagen','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function productos()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('productos');
		$crud->set_subject('producto');
		$crud->set_relation('impuesto_id','impuestos','titulo');			
		$crud->set_relation('presentacion_id','presentaciones','titulo');	
		$crud->set_field_upload('imagen','assets/uploads');
		$crud->set_field_upload('imagen2','assets/uploads');
		$crud->set_field_upload('imagen3','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function contactos()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('contactos');
		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}
		$crud->set_relation('sitio_id','sitios','nombre');	
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function roles()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('groups');
		$crud->set_subject('rol');		
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function usuarios()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('users');
		$crud->set_subject('usuario');
		$crud->columns('first_name','last_name','username','email','roles','sitios');	
		$crud->set_relation_n_n('roles', 'users_groups', 'groups', 'group_id', 'user_id', 'name');
		$crud->set_relation_n_n('sitios', 'users_sitios', 'sitios', 'sitio_id', 'user_id', 'nombre');

		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function categoriaspub()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('categorias');
		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('categoria');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function publicaciones()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('publicaciones');
		$crud->set_relation('categoria_id', 'categorias', '{sitio_id}');
		
		if ($this->ion_auth->is_admin()) {
			$crud->where('sitio_id',$this->config->item('sitio_id'));
		}


		$crud->set_subject('publicacion');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function sitios()
	{
		
		//echo 'Es admin ' . ($this->ion_auth->is_admin());
		//echo 'Sitio ' . $this->config->item('sitio_id');
		
		$crud = new grocery_CRUD();
		$crud->set_table('sitios');
		if ($this->ion_auth->is_admin()) {
			$crud->where('sitios.sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('sitio');
		$crud->set_relation('theme_id','themes','theme');
		$crud->set_field_upload('logo','assets/uploads');
		$crud->set_field_upload('icon','assets/uploads');
		$crud->set_field_upload('qr','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function secciones()
	{

		$crud = new grocery_CRUD();
		$crud->set_table('secciones');
	
		if ($this->ion_auth->is_admin()) {
			$crud->where('secciones.sitio_id',$this->config->item('sitio_id'));
		}

		$crud->set_subject('seccion');
		$crud->display_as('sitio_id','Sitio')
		 	->display_as('modulo_id','Módulo');
		$crud->columns('sitio_id','modulo_id','titulo','slug','menu','orden');
		$crud->set_relation('modulo_id','modulos','modulo');
		$crud->set_relation('sitio_id','sitios','nombre');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function bloques()
	{
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
		$crud->set_relation('formato_id','formatos','formato');

		$crud->set_field_upload('imagen','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	function getSitio($entorno,$row) {
        $sql = "SELECT sitio_id FROM secciones WHERE seccion_id = " . $row->seccion_id ;
        $result = $this->db->query($sql)->row();
        $sitio_id = $result->sitio_id;              
        return $sitio_id;
	}   



	public function formatos()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('formatos');
		$crud->set_subject('formato');
		$crud->set_relation('theme_id','themes','theme');
		$crud->set_field_upload('imagen','assets/images/formatos');
		$output = $crud->render();
		$this->_example_output($output);
	}	

	public function componentes()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('componentes');
		$crud->set_subject('componente');
		
		$crud->set_relation('bloque_id', 'bloques', '{seccion_id}');
		
		//$crud->set_relation('seccion_id', 'secciones', '{sitio_id}');
		//if ($this->ion_auth->is_admin()) {
		//	$crud->where('sitio_id',$this->config->item('sitio_id'));
		//}

		$crud->set_relation('bloque_id','bloques','texto1');
		$crud->set_field_upload('imagen','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}	


	public function themes()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('themes');
		$crud->set_subject('theme');
		//$crud->set_relation('bloque_id','bloques','texto1');
		$crud->set_field_upload('imagen','assets/uploads');
		$output = $crud->render();
		$this->_example_output($output);
	}























































	public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

}
