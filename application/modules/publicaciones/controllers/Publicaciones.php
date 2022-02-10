<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends MX_Controller {

  public function __construct() {
        
    parent::__construct();
    
    switch (ENVIRONMENT){
        case 'development': $this->output->enable_profiler(TRUE); break;           
        case 'testing': $this->output->enable_profiler(TRUE); break;
        case 'production': $this->output->enable_profiler(FALSE); break;
    }          

    $this->load->model('Publicaciones_model');
  }

  public function index()
  {
    $data['articulos'] = $this->Publicaciones_model->getArticulosPor($params);  
    $data['view']      = 'publicaciones_list_'.$this->session->userdata('theme').'_1_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }



  public function mostrar($slugArticulo)
  {   
    $data['articulo'] = $this->Publicaciones_model->getBySlug($slugArticulo);
    // var_dump($data['articulo']);die();

    $params = array(
        'categoria_id' => intval($data['articulo']->categoria_id),
        //'slug'  => $slug,
        'publicacion_id !='  => intval($data['articulo']->publicacion_id), 
        'estado' => 1
    ); 
    //var_dump($params);die(); 
    $data['title'] = 'Publicacion'; 
     
    $data['relacionados'] = $this->Publicaciones_model->getArticulosPor($params);
    //var_dump($data['articulo']);die();

    $data['view']       = 'publicaciones_single_'.$this->session->userdata('theme').'_1_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }



  public function categoria($slugCategoria='')
  {
    $data['title'] = 'Publicaciones';

    $params = array(
        'slug' => $slugCategoria
    );    
    $rsCats = $this->Publicaciones_model->getCategoriasPor($params);
    $categoria = $rsCats[0];
    $idCategoria = $categoria->categoria_id;
    $data['categoria'] = $categoria->categoria;
    //var_dump($idCategoria);

    $params2 = array(
        'categoria_id' => $idCategoria,
        //'estado' => 1 ¿ Por que no funciona si pongo estado?
    );
    $data['articulos'] = $this->Publicaciones_model->getArticulosPor($params2);
    //var_dump($data['articulos']);die();
    
    //$articulo = $data['articulos'][0];
    //var_dump($data['articulo']);die();
    if($this->session->userdata('site_lang') == 'spanish'){
    $idIdioma = 1;
    }
    else{
    $idIdioma = 2;        
    }

    $params3 = array(
        'categoria_id !=' => $idCategoria,
        'idioma_id' => $idIdioma,
        'sitio_id' => $this->session->userdata('sitio_id'),
        'modulo_id' => 2
    );    
    $data['otrasCategorias'] = $this->Publicaciones_model->getCategoriasPor($params3);


    //$data['otrasCategorias'] = $this->Publicaciones_model->getOtrasCategorias($idCategoria, $idIdioma);
    //var_dump($data['otrasCategorias']);die();
    //var_dump(count($data['otrasCategorias']));die();

    $data['view']       = 'publicaciones_list_'.$this->session->userdata('theme').'_1_view';
    $this->load->view('layout_'.$this->session->userdata('theme').'_view', $data);
  }





public function slugc()
  {
    $params = array(
        'estado' => 1
    );  
    $categorias = $this->Publicaciones_model->getCategoriasPor($params);
    //var_dump($categorias);
    foreach ($categorias as $cat) {
      echo "Cat.ID: ".$cat->categoria_id." - Slug: ".url_title($cat->nombre,$separator = '-',$lowercase = TRUE)."<br>";
      $cate['slug'] = url_title($cat->nombre, $separator = '-', $lowercase = TRUE);
      $id = $cat->categoria_id;
      $this->Publicaciones_model->actualizarCategoria('categorias',$cate,$id);
    }
  }




  
  public function slugp()
  {
    $params = array(
        'estado' => 1
    );  
    $publicaciones = $this->Publicaciones_model->getArticulosPor($params);
    foreach ($publicaciones as $p) {
      $slug = $this->eliminar_tildes($p->titulo);
      $slug = url_title($slug,$separator = '-',$lowercase = TRUE);
      //var_dump($slug);
      
      //var_dump($slug);
      echo "Pub. Slug:  ". $slug ."<br>";
      $id = $p->publicacion_id;
      $pub['slug'] = $slug;

      $this->Publicaciones_model->actualizarPublicacion('publicaciones',$pub,$id);
    }    
  }




  public function eliminar_tildes($cadena){

      //Codificamos la cadena en formato utf8 en caso de que nos de errores
      //$cadena = utf8_decode($cadena);

      //Ahora reemplazamos las letras
      $cadena = str_replace(
          array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
          array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
          $cadena
      );

      $cadena = str_replace(
          array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
          array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
          $cadena );

      $cadena = str_replace(
          array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
          array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
          $cadena );

      $cadena = str_replace(
          array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
          array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
          $cadena );

      $cadena = str_replace(
          array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
          array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
          $cadena );

      $cadena = str_replace(
          array('ñ', 'Ñ', 'ç', 'Ç'),
          array('n', 'N', 'c', 'C'),
          $cadena
      );

      return $cadena;
  }





}