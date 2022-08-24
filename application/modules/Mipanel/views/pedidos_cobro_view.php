
<h4>Cobrar Pedido <?php  echo  $pedidonro; ?></h4>
<h4>Importe a Cobrar <?php  echo  $pedidoimporte; ?></h4>

<?php 
  
  

  	// SDK de Mercado Pago
		require 'vendor/autoload.php';
		// Agrega credenciales
		MercadoPago\SDK::setAccessToken($this->config->item('access_token'));

		// Crea un objeto de preferencia
		$preference = new MercadoPago\Preference();

		// Crea un ítem en la preferencia
         $item = new MercadoPago\Item();
         $item->title = 'Pago Pedido ' . $pedidonro;
         $item->quantity = 1;
         $item->unit_price = $pedidoimporte;
         $compra[] = $item;


   	    $preference->items = $compra;

    
	  $preference->back_urls = array(
				"success" => "http://localhost/cibase/mipanel/pedidos",
				"failure" => "http://localhost/cibase/mipanel/pedidos",
				"pending" => "http://localhost/cibase/mipanel/pedidos"
			);
			$preference->auto_return = "approved";
    
		
     $preference->external_reference = $pedidonro;
 
     $preference->save();
		
     //$preference->init_point;
?>

<a href="<?php echo $preference->init_point; ?>" class='btn btn-xs'>Cobro con Mercadopago</a> 



