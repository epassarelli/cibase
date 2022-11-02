<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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