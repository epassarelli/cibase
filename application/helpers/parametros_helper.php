<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('parametro')) {
  function parametro($id_parametro)
  {

    $valor = '';
    $ci = &get_instance();
    //verificamos si el parametro existe
    $ssql = "select * from parametros where id = " . $id_parametro;
    $query = $ci->db->query($ssql);
    $row = $query->row();
    if (isset($row) && $row != null) {
      //buscamos si esta seteado para ese sitio
      $ssql2 = "select * from parametros_sitios  where parametro_id = " . $id_parametro
        . " and sitio_id= " . $ci->config->item('sitio_id');
      $query2 = $ci->db->query($ssql2);
      $row2 = $query2->row();
      if (isset($row2) && $row2 != null) {
        //toma el valor seteado para el sitio 
        $valor = $row2->valor;
      } else {
        //toma el valor default del parametro
        $valor = $row->default;
      }
    } else {
      $valor = 'Parametro no definido';
    }

    return $valor;
  }
}
