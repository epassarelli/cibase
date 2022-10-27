<?php

class Pedidos_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
}  


public function getAll(){
    $ssql = "SELECT pedidos.id,
                    pedidos.fecha,
                    pedidos.apellido,
                    pedidos.nombre,
                    pedidos.email,
                    pedidos.telefono,
                    pedidos.total,
                    pedidos.estado_id,
                    estado_envios.nombre AS nomestado,
                    pedidos.status_mp,
                    pedidos.detail_mp,
                    pedidos.transac_mp 
                    FROM pedidos  LEFT JOIN estado_envios  ON pedidos.estado_id = estado_envios.id WHERE sitio_id = " . $this->config->item('sitio_id') . " ORDER BY pedidos.fecha desc  ";    

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
                      pedidos.entrega_id,
                      provincias.nombre as provincia,
                      pedidos_items.idcolor,
                      colores.descripcion as nomcolor,
                      pedidos_items.idtalle,
                      talles.descripcion as nomtalle
                      FROM pedidos_items
                      LEFT JOIN pedidos  ON pedidos.id = pedidos_items.pedido_id
                      LEFT JOIN localidades on pedidos.localidad_id = localidades.id
                      LEFT JOIN provincias on pedidos.provincia_id = provincias.id
                      LEFT JOIN estado_envios  ON pedidos.estado_id = estado_envios.id 
                      LEFT JOIN productos ON pedidos_items.producto_id = productos.id
                      LEFT JOIN entregas ON pedidos.entrega_id = entregas.id
                      LEFT JOIN talles  ON pedidos_items.idtalle = talles.id
                      LEFT JOIN colores ON pedidos_items.idcolor = colores.id
                      WHERE pedidos.sitio_id = " . $xsitio . " and pedidos.id = " . $id .  " ORDER BY pedidos.fecha desc  ";    

    $query = $this->db->query($ssql);
    return  $query->result();
}


public function deletePedidos($id)
{
    $this->db->where('id',$id);
    $this->db->delete('pedidos');

    $this->db->where('pedido_id',$id);
    $this->db->delete('pedidos_items');
}



public function update($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('pedidos', $data);
}



public function getPendientes(){
    $ssql = "SELECT stocks_pendientes.id,
                    stocks_pendientes.fecha,
                    stocks_pendientes.fec_response as respuesta,
                    stocks_pendientes.email,
                    stocks_pendientes.idproducto,
                    productos.titulo,
                    stocks_pendientes.idcolor,
                    colores.descripcion as nomcolor,
                    stocks_pendientes.idtalle,
                    talles.descripcion as nomtalle,
                    stocks_pendientes.texto_response as textorespuesta
                    FROM stocks_pendientes
                    LEFT JOIN productos  ON stocks_pendientes.idproducto = productos.id
                    LEFT JOIN talles     ON stocks_pendientes.idtalle   = talles.id
                    LEFT JOIN colores    ON stocks_pendientes.idcolor = colores.id
                    ORDER BY stocks_pendientes.fecha desc  ";    

    $query = $this->db->query($ssql);
    return  $query->result();
}

public function respuestaPendientes($id,$data){
        $this->db->where('id',$id);
        $this->db->update('stocks_pendientes', $data);
}


public function logMercadoPago($data){

    $this->db->insert('log_mercadop', $data);
}

}

