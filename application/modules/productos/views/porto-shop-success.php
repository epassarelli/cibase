<?php

		// SDK de Mercado Pago
		require 'vendor/autoload.php';
		// Agrega credenciales
		MercadoPago\SDK::setAccessToken($this->config->item('access_token'));

		// Crea un objeto de preferencia
		$preference = new MercadoPago\Preference();

		// Crea un ítem en la preferencia

    $compra[] = null;
		$elementos = sizeof($carrito);
		for  ($i = 0; $i <= $elementos-1   ; $i++) {
			 if ($carrito[$i]['tipo']=='item'){
					$item = new MercadoPago\Item();
					$item->title = $carrito[$i]['titulo'];
					$item->quantity = $carrito[$i]['cantidad'];
					$item->unit_price = $carrito[$i]['totalitem'];
					$compra[] = $item;
				}  
			
		}
		 
		//$preference->items = array($item);
		$preference->items = $compra;

    
    $preference->notification_url = $this->config->item('url_post'); 

	  $preference->back_urls = array(
				"success" => base_url("productos/carrito/operacion/1"),
				"failure" => base_url("productos"),
				"pending" => base_url("productos")
			);
			$preference->auto_return = "approved";
    
		
    $preference->external_reference = $numero_pedido;

    $preference->save();
		

?>




<div class="alert alert-success" role="alert">
  <?php echo 'Gracias ' . $nombre . ' por tu compra. Tu número de pedido es el: ' . $numero_pedido ?>
  <?php echo $mensaje  ?>
  <!-- <a href="<?php //echo site_url('productos') ?>" class="alert-link">Continuar comprando.</a> -->
  <div class="mppago"></div>
  <p id='CuentaAtras'></p>

</div>


<!-- SDK MercadoPago.js V2 -->
<script src="https://sdk.mercadopago.com/js/v2"></script>



<script>
  const mp = new MercadoPago("<?php echo $this->config->item('public_key'); ?>", {
    locale: 'es-AR'
  });

  mp.checkout({
    preference: {
      id: "<?php echo $preference->id;?>"
    },
    render: {
      //container: '.cho-container',
      container: '.mppago',
			label: 'Pagar con Mercado Pago',
    }
  });
</script>


<script language="JavaScript">
 
 /* Determinamos el tiempo total en segundos */
 var totalTiempo=540;
 /* Determinamos la url donde redireccionar */
 var url="<?php echo base_url('productos'); ?>";

 function updateReloj()
 {
     
    //  document.getElementById('CuentaAtras').innerHTML = "Tiempo restante para efectuar el pago: "+totalTiempo+" segundos";

    //  if(totalTiempo==0)
    //  {
    //      window.location=url;
    //  }else{
    //      /* Restamos un segundo al tiempo restante */
    //      totalTiempo-=1;
    //      /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
    //      setTimeout("updateReloj()",1000);
    //  }
 }

 //window.onload=updateReloj;

 </script>