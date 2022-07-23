<?php

class Productos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function setProducto($data,$categoria)
{
    $this->db->insert('productos', $data);

    $producto_id = $this->db->insert_id();
    
    $data_categoria['producto_id'] = $producto_id;
    $data_categoria['categoria_id'] = $categoria;
    $this->db->insert('productos_categorias', $data_categoria);

  
}

public function setProductoImagen($data)
{
    $this->db->insert('productos_colores', $data);
}


public function updateProductoImagen($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('productos_colores', $data);
}



public function deleteProductoImagen($id)
{
    $this->db->where('id',$id);
    $this->db->delete('productos_colores');
}


public function getAllById($id)
{
    $sitio = $this->config->item('sitio_id');

    $ssql = "select productos.*, productos_categorias.categoria_id from productos left join productos_categorias
            on productos_categorias.producto_id=productos.id where productos.id= " . $id . " and productos.sitio_id= " . 
            $sitio;
    $query = $this->db->query($ssql);
    return $query->row();




}



public function update($id,$data,$categoria)
{
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->update('productos', $data);

    $this->db->where('producto_id',$id);
    $query = $this->db->get('productos_categorias');
    $cantidad = $query->num_rows();

    if ($cantidad==0) {
        $data_categoria['producto_id'] = $id;
        $data_categoria['categoria_id'] = $categoria;
        $this->db->insert('productos_categorias', $data_categoria);
    }else{
        $data_categoria['categoria_id'] = $categoria;
        $this->db->where('producto_id',$id);
        $this->db->update('productos_categorias', $data_categoria);
    }


}


public function deleteProductos($id)
{
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->delete('productos');

    $this->db->where('producto_id',$id);
    $this->db->delete('productos_categorias');
}



public function cambioEstado($id,$publicar)
{
    $data['publicar'] = ($publicar == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->update('productos',$data);
    return $data['publicar'];
}



public function cambioEstadoI($id,$publicar)
{
    $data['publicar'] = ($publicar == 1) ? "0" : "1" ;
    $this->db->where('id',$id);
    $this->db->update('productos_colores',$data);
    return $data['publicar'];
}


// Retorna 1 o mas registros dependiendo del parametro
public function getProductosColores($id)
    {
      $comando =  'SELECT productos_colores.id,
                          productos_colores.idproducto,productos.titulo,
                          productos_colores.idcolor,colores.descripcion,
                          productos_colores.imagen,productos_colores.publicar from productos_colores 
                          left join productos on productos.id=productos_colores.idproducto 
                          left join colores on colores.id=productos_colores.idcolor 
                          where productos_colores.idproducto=' . $id;

      $query = $this->db->query($comando);

        return $query->result();
 
    }





    // Retorna 1 o mas registros dependiendo del parametro
public function getProductoColor($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('productos_colores');
        return $query->row();
 
    }

}
?>