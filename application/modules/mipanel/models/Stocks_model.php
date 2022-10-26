<?php

class Stocks_model extends MY_Model{
  
public function __construct() {
    parent::__construct();
    $this->table = 'stocks';
}  


public function getStocks() {

    $ssql = "SELECT stocks.idproducto,productos.titulo,stocks.idtalle, talles.descripcion as talle,stocks.idcolor,
                    colores.descripcion as color,stocks.cantidad from stocks left join productos on productos.id = stocks.idproducto
                    left join talles on talles.id = stocks.idtalle left join colores on colores.id = stocks.idcolor ";
    $query = $this->db->query($ssql);
    return $query->result();

}


public function getStocksHistoria($producto,$talle,$color) {

    $ssql = "SELECT stocks.idproducto,productos.titulo,stocks.idtalle, talles.descripcion as talle,stocks.idcolor,
                    colores.descripcion as color,stocks.cantidad,stocks.fecha,stocks.usuario,tipo_moves.descripcion as tipo from stocks_historia as stocks left join productos on productos.id = stocks.idproducto
                    left join talles on talles.id = stocks.idtalle left join colores on colores.id = stocks.idcolor  
                    left join tipo_moves  on tipo_moves.id = stocks.idtipomove" .
                     " where " . "idproducto=" .  $producto . " and   idtalle=" .  $talle . " and 
                     idcolor=" . $color . ' order by stocks.fecha desc ';

    $query = $this->db->query($ssql);
    return $query->result();

}


public function getTipoMoves() {

    $this->db->select('*')
              ->from('tipo_moves');
    $query = $this->db->get();
    return $query->result();

}


function actualizarStock($data) {
    $ssql = "update stocks set cantidad=cantidad + " . $data['cantidad'] . " where " . 
            "idproducto=" .  $data['idproducto'] . " and " . 
            "idtalle=" .  $data['idtalle'] . " and " . 
            "idcolor=" . $data['idcolor'];
    
            $query = $this->db->query($ssql);
    return TRUE;
}

public function cuentaStock($data) {
    $ssql = "select count(*) as cuantos  from stocks where  " . 
            "idproducto=" .  $data['idproducto'] . " and " . 
            "idtalle=" .  $data['idtalle'] . " and " . 
            "idcolor=" . $data['idcolor'];
    
    $query = $this->db->query($ssql);
    return $query->row();
}

public function historiaStocks($data) {
    $this->db->insert('stocks_historia', $data);
}

}
?>