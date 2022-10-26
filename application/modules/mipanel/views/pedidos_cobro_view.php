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

<section class="content-header">
    <h1>
        Pedidos
        <small>Cobranza</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('mipanel')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('mipanel/pedidos')?>">Pedidos</a></li>
        <li class="active">Cobranza de Pedidos</li>
    </ol>
</section>

<section class="content">
  <div class="col-md-2 col-sm-12">
      <div class="form-group has-feedback">
        <label for="pedido" class="control-label">Numero de Pedido</label>
        <input type="text" class="form-control" id="pedido"  value="<?php echo $pedidonro ?>" readonly>
      </div>
  </div>    
  <div class="col-md-2 col-sm-12">
    <div class="form-group has-feedback">
        <label for="importe" class="control-label">Importe a Cobrar</label>
        <input type="text" class="form-control" id="importe"  value="<?php echo $pedidoimporte ?>" readonly>
    </div>
  </div>
 <!--  <div class="row">
    <a href="<?php //echo $preference->init_point; ?>" class='btn btn-xs'>Cobro con Mercadopago</a> 
  </div>  -->
  <div class="row">
  </div>  
  <div class="mppago"></div>
</section>


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


