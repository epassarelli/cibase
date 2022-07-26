<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{


  ##########################################################
  ### Trae el/los registro /s que coincida de la tabla/vista 
  ### con todos los parametros pasados (AND) y el orden especificado 
  ### Ej: $miTabla = 'vi_edu'
  ###     $misCampos = array();
  ###     $misParametros = 
  ###     $miOrden = 
  ### getBy('vi_edu', '','','') 

  public function getAllBy($tabla, $campos='', $parametros='', $orden='',$whereor = 0){
    
    if($campos !== ''){
      $this->db->select($campos);
    }

    if ($whereor == 0) { //si whereor es 0 el where es and
      if($parametros !== ''){
        foreach ($parametros as $key => $value) {
          (is_numeric($value)) ?  $this->db->where($key, intval($value)) : $this->db->like($key,$value);
        }
      }
    }else{
      if($parametros !== ''){
        foreach ($parametros as $key => $value) {
          (is_numeric($value)) ?  $this->db->or_where($key, intval($value)) : $this->db->like($key,$value);
        }
      }
    }
    

    if($orden !== ''){
      $this->db->order_by($orden);
    }

    $query = $this->db->get($tabla);
    return $query->result();
  }  


  public function getOneBy($tabla, $campos='', $parametros='', $orden='')
  {
    if($campos !== ''){
      $this->db->select($campos);
    }

    if($parametros !== ''){
      foreach ($parametros as $key => $value) {
        (is_numeric($value)) ?  $this->db->where($key, intval($value)) : $this->db->like($key,$value);
      }
    }

    if($orden !== ''){
      $this->db->order_by($orden);
    }

    $this->db->limit(1);

    $query = $this->db->get($tabla);
    //var_dump($query);
    //echo "<br>";
    //var_dump($this->db->last_query());
    return $query->row();
  }


##########################################################
### Inserta el registro y devuelve el ID del mismo

  function insertar($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

##########################################################
### Actualiza el registro que coincida con el ID

  function actualizar($data, $id) {
    $this->db->where('id', $id);
    $this->db->update($this->table, $data);
    return TRUE;
  }




}

/* End of file MY_Model.php */
/* Location: ./core/MY_Model.php */