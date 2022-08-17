<?php

class Productos_model extends MY_Model{

  
public function __construct(){
    parent::__construct();
}  

// Retorna 1 o mas registros dependiendo del parametro
public function getProductos($categoria = 0)
    {
        $sitio = $this->config->item('sitio_id');
        if ($categoria  !== 0) {
//          $comando =  'SELECT * FROM v_productos WHERE (categoria_id = ' . $categoria . ' or catpadre_id = ' . $categoria . ') AND sitio_id = ' . $sitio .  ' AND publicar = 1 order by titulo desc';

          $comando = 'SELECT   pcat.producto_id, pcat.categoria_id, prod.*, (SELECT imagen FROM productos_colores pcol WHERE pcol.idproducto = pcat.producto_id AND publicar = 1 LIMIT 1) AS imagen
                      FROM  productos_categorias pcat  LEFT JOIN productos prod ON pcat.producto_id=prod.id  
                       WHERE pcat.categoria_id = ' . $categoria . ' and  sitio_id = ' . $sitio .  ' AND publicar = 1 order by titulo desc';


        }else{
          $comando = 'SELECT * FROM v_productos WHERE sitio_id = ' . $sitio . ' AND publicar = 1 order by titulo desc';
          
        }    
        $query = $this->db->query($comando);
        return $query->result();
 
    }


public function getProdImg($idprod = 0)
{
    $sitio = $this->config->item('sitio_id');
    $comando = 'SELECT  * from productos_colores WHERE productos_colores.idproducto  = ' . $idprod . ' AND publicar = 1 order by idcolor desc';
    $query = $this->db->query($comando);
    return $query->result();

}


public function getCategorias($parametros = '')
    {
        $this->db->from('categorias');
        $this->db->where('sitio_id',$this->config->item('sitio_id'));
        $this->db->order_by('catpadre_id','orden');
        $query = $this->db->get();
        return $query->result();
    }

public function getCatsDelProducto($id='')
    {
        $this->db->select('c.categoria, c.slug')
                ->from('productos_categorias pc')
                ->join('categorias c', 'pc.categoria_id = c.categoria_id')
                ->where('pc.producto_id', $id);

        $query = $this->db->get();
        return $query->result();    
    }


public function getProducto($id)
    {
        $this->db->select('titulo,imagen,precioOF,precioLista,OfDesde,OfHasta,unidadvta')
                ->from('productos')
                ->where('id', $id)
                ->where('sitio_id', $this->config->item('sitio_id'));
        $query = $this->db->get();
        return $query->row();    
    }

public function getTallesDelProducto($id = '')
    {
        $this->db->select('t.id, t.descripcion')
            ->from('stocks s')
            ->join('talles t', 's.idtalle = t.id')
            ->where('idproducto', $id)
            ->group_by('t.id, t.descripcion');
        $query = $this->db->get();
        return $query->result(); 
    }

public function getColoresDelProducto($id = '')
    {
        $this->db->select('c.id, c.descripcion')
            ->from('stocks s')
            ->join('colores c', 's.idcolor = c.id')
            ->where('idproducto', $id)
            ->group_by('c.id, c.descripcion');;
        $query = $this->db->get();
        return $query->result();  
    }





}