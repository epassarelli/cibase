<?php

class Pedidos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function getAll(){
    $ssql = "SELECT pedidos.id,pedidos.fecha,pedidos.apellido,pedidos.nombre,pedidos.email,pedidos.telefono,pedidos.total,estado_envios.nombre AS nomestado FROM pedidos  LEFT JOIN estado_envios  ON pedidos.estado_id = estado_envios.id WHERE sitio_id = " . $this->config->item('sitio_id') . " ORDER BY pedidos.fecha desc  ";    

    $query = $this->db->query($ssql);
    return  $query->result();
}


public function getPedido($id){
    $xsitio = $this->config->item('sitio_id');
    $ssql = "SELECT   pedidos_items.cantidad,
                      pedidos_items.producto_id,
                      productos.titulo,
                      pedidos_items.preciounit,
                      pedidos_items.precioitem,
                      pedidos_items.vacio,		
                      pedidos.id,
                      pedidos.fecha,
                      pedidos.apellido,
                      pedidos.nombre,
                      pedidos.email,
                      pedidos.telefono,
                      pedidos.del_calle as calle,
                      pedidos.del_nro as nro,
                      pedidos.del_dpto as dpto,
                      pedidos.del_piso as piso,
                      pedidos.subtotal,
                      pedidos.del_costo as delivery,
                      pedidos.env_vacio,
                      pedidos.total,
                      localidades.nombre as localidad,
                      estado_envios.nombre AS nomestado,
                      entregas.nombre as nomentrega,
                      pedidos.localidad_id,
                      pedidos.provincia_id,
                      provincias.nombre as provincia
                      FROM pedidos_items
                      LEFT JOIN pedidos  ON pedidos.id = pedidos_items.pedido_id
                      LEFT JOIN localidades on pedidos.localidad_id = localidades.id
                      LEFT JOIN provincias on pedidos.provincia_id = provincias.id
                      LEFT JOIN estado_envios  ON pedidos.estado_id = estado_envios.id 
                      LEFT JOIN productos ON pedidos_items.producto_id = productos.id
                      LEFT JOIN entregas ON pedidos.entrega_id = entregas.id
                      WHERE pedidos.sitio_id = " . $xsitio . " and pedidos.id = " . $id .  " ORDER BY pedidos.fecha desc  ";    

    $query = $this->db->query($ssql);
    return  $query->result();
}


public function deletePedidos($id)
{
    $this->db->where('id',$id);
    $this->db->delete('pedidos');

    $this->db->where('parametro_id',$id);
    $this->db->where('sitio_id',$this->config->item('sitio_id'));
    $this->db->delete('pedidos_sitios');
}


}
?>