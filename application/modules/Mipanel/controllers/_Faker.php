<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faker extends MX_Controller {
  
  var $data;

  function __construct() {
    parent::__construct();
    require_once 'vendor/autoload.php';
    $this->load->model('Secciones_model');
    $this->load->model('Bloques_model');
    $this->load->model('Componentes_model');
    $this->load->model('Impuestos_model');
    $this->load->model('Presentaciones_model');
    $this->load->model('Contactos_model');
    $this->load->model('Productos_model');

    switch (ENVIRONMENT){
      case 'development':
          $this->output->enable_profiler(FALSE);
          break;           
      case 'testing':
          $this->output->enable_profiler(TRUE);
          break;
      case 'production':
          $this->output->enable_profiler(FALSE);
          break;
      }      
  }

  
  public function index(){      
    echo "<h1>Bienvenido a Faker</h1>";
    echo "<h4>faker/fake_secciones: Genera datos a la tabla secciones</h4>";
    echo "<h4>faker/fake_bloques: Genera datos a la tabla bloques</h4>";
    echo "<h4>faker/fake_componentes: Genera datos a la tabla componentes</h4>";
    echo "<h4>faker/fake_impuestos: Genera datos a la tabla impuestos</h4>";
    echo "<h4>faker/fake_presentaciones: Genera datos a la tabla presentaciones</h4>";
    echo "<h4>faker/fake_contactos: Genera datos a la tabla contactos</h4>";
    echo "<h4>faker/fake_productos: Genera datos a la tabla productos</h4>";


}

    
 public function fake_secciones()
  {
    $faker = Faker\Factory::create();
  
    for ($i = 0; $i < 30; $i++) {
      $seccion['sitio_id'] = $faker -> numberBetween($min = 1, $max = 5);
      $seccion['titulo']   = $faker -> text($maxNbChars = 30);
      $seccion['bajada']   = $faker -> text($maxNbChars = 255);
      $seccion['slug']     = $faker -> text($maxNbChars = 30);
      $seccion['menu']     = $faker -> numberBetween($min = 0, $max = 1);
      $seccion['orden']    = $faker -> randomDigitNotNull;
      $seccion['bloquenumero'] = 1;
      $seccion['modulo']   = $faker -> text($maxNbChars = 45);
      $seccion['estado'] = $faker -> numberBetween($min = 0, $max = 1);
      $this->Secciones_model->setSecciones($seccion);
    }
    echo '<h1>Finalizado Secciones</h1>';
  }

  public function fake_bloques()
  {
    $faker = Faker\Factory::create();
  
    for ($i = 0; $i < 120; $i++) {
      $bloque['seccion_id'] = $faker -> numberBetween($min = 8, $max = 37);
      $bloque['texto1']     = $faker -> text($maxNbChars = 255);
      $bloque['texto2']     = $faker -> text($maxNbChars = 255);
      $bloque['imagen']     = $faker -> imageUrl($width = 640, $height = 480, 'cats', true, 'Faker');
      $bloque['formato_id'] = 1;
      $seccion['estado']    =  $faker -> numberBetween($min = 0, $max = 1);
      $this->Bloques_model->setBloques($bloque);
    }
    echo '<h1>Finalizado Bloques</h1>';
  }
   
  public function fake_componentes()
  {
    $faker = Faker\Factory::create();
  
    for ($i = 0; $i < 220; $i++) {
      $componente['bloque_id']  = $faker -> numberBetween($min = 1, $max = 241);
      $componente['icono']      = $faker -> imageUrl($width = 640, $height = 480, 'cats', true, 'Faker');
      $componente['imagen']     = $faker -> imageUrl($width = 640, $height = 480, 'cats', true, 'Faker');
      $componente['texto1']     = $faker -> text($maxNbChars = 255);
      $componente['texto2']     = $faker -> text($maxNbChars = 255);
      $componente['texto3']     = $faker -> text($maxNbChars = 255);
      $componente['texto4']     = $faker -> text($maxNbChars = 255);
      $componente['texto5']     = $faker -> paragraph($nbSentences = 10, $variableNbSentences = true);
      $componente['estado']    =  $faker -> numberBetween($min = 0, $max = 1);
      $this->Componentes_model->setComponente($componente);
    }
    echo '<h1>Finalizado Componentes</h1>';
  }

  public function fake_impuestos()
  {
    $faker = Faker\Factory::create();
  
    for ($i = 0; $i < 20; $i++) {
      $impuesto['titulo']  = $faker -> text($maxNbChars = 50);
      $impuesto['porcentaje'] = $faker -> randomFloat($decimals = 1 , $min = 1, $max = 100);
      $impuesto['pais']    =  $faker -> numberBetween($min = 0, $max = 20);
      $this->Impuestos_model->setImpuesto($impuesto);
    }
    echo '<h1>Finalizado Impuestos</h1>';
  }
  
  public function fake_presentaciones()
  {
    $faker = Faker\Factory::create();
  
    for ($i = 0; $i < 20; $i++) {
      $presentacion['titulo']  = $faker -> text($maxNbChars = 50);
      $presentacion['sigla']  = $faker -> text($maxNbChars = 10);
      $this->Presentaciones_model->setPresentacion($presentacion);
    }
    echo '<h1>Finalizado Presentacion</h1>';
  }

  
  public function fake_contactos()
  {
    $faker = Faker\Factory::create();
  
    for ($i = 0; $i < 30; $i++) {
      $contacto['sitio_id'] = $faker -> numberBetween($min = 1, $max = 5);
      $contacto['asunto']   = $faker -> text($maxNbChars = 150);
      $contacto['mensaje']   = $faker -> text($maxNbChars = 255);
      $this->Contactos_model->setContacto($contacto);
    }
    echo '<h1>Finalizado Contactos</h1>';
  }

    
 public function fake_productos()
 {
   $faker = Faker\Factory::create();
 
   for ($i = 0; $i < 400; $i++) {
     $data['sitio_id']     = $faker -> numberBetween($min = 1, $max = 5);
     $data['titulo']       = $faker -> text($maxNbChars = 50);
     $data['descLarga']    = $faker -> text($maxNbChars = 500);
     $data['descCorta']    = $faker -> text($maxNbChars = 200);
     $data['codigo']       = $faker -> text($maxNbChars = 30);
     $data['imagen']       = $faker -> imageUrl($width = 640, $height = 480, 'cats', true, 'Faker');
     $data['imagen2']      = $faker -> imageUrl($width = 640, $height = 480, 'cats', true, 'Faker');
     $data['imagen3']      = $faker -> imageUrl($width = 640, $height = 480, 'cats', true, 'Faker');
     $data['precioLista']  = $faker -> randomFloat($decimals = 1 , $min = 300, $max = 1500);
     $data['precioOF']     = $faker -> randomFloat($decimals = 1 , $min = 300, $max = 1500);
     $data['OfDesde']      = $faker -> iso8601();
     $data['OfHasta']      = $faker -> iso8601();
     $data['impuesto_id']  = $faker -> numberBetween($min = 41, $max = 60);
     $data['presentacion_id']  = $faker -> numberBetween($min = 1, $max = 20);
     $data['destacar_id']  = $faker -> numberBetween($min = 0, $max = 1);
     $data['etiquetas']    = $faker -> text($maxNbChars = 100);
     $data['peso']         = $faker -> text($maxNbChars = 15);
     $data['tamano']       = $faker -> text($maxNbChars = 20);
     $data['link']         = $faker -> text($maxNbChars = 100);
     $data['orden']        = $faker -> numberBetween($min = 1, $max = 35635);
     $data['publicar']     = $faker -> numberBetween($min = 0, $max = 1);
     $this->Productos_model->setProducto($data);
   }
   echo '<h1>Finalizado Productos</h1>';
 }
}