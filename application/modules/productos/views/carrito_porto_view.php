<div role="main" class="main shop py-4">

	<div class="container">
	    <input type="hidden" id="url" value="<?php echo base_url();?>">
		<div class="row">
			<div class="col">

				<div class="featured-boxes">
					<div class="row">
						<div class="col">
							<div class="featured-box featured-box-primary text-left mt-2">
								<div class="box-content">
									<form method="post" action="">
										<table class="shop_table cart" id="shop_table">
											<thead>
												<tr>
													<th class="product-remove">
														&nbsp;
													</th>
													<th class="product-thumbnail">
														&nbsp;
													</th>
													<th class="product-name">
														Productos
													</th>
													<?php if (parametro(9)=="S"): ?> 
														<th class="product-vacio">
															Envasado al Vacio
														</th>
													<?php endif; ?>	
													<th class="product-color">
															<?php if(parametro(11) == 'S'): ?>
																	Color
															<?php endif; ?>		
													</th>
													<th class="product-talle">
													<?php if(parametro(11) == 'S'): ?>
																	Talle
															<?php endif; ?>															</th>
													<th class="product-price">
														Precio
													</th>
													<th class="product-quantity">
														Cantidad
													</th>
													<th class="product-subtotal">
														Total
													</th>
												</tr>
											</thead>
											<tbody>

<?php for ($i = 1; $i <= sizeof($_SESSION['carrito'])-1 ; $i++) : ?>
	<tr class="cart_table_item">
	<td class="product-remove">
		<a title="Remove this item" class="remove" href="#" onclick="eliminaItemCarro2(<?php echo $_SESSION['carrito'][$i]['codigo'] ?>,$(this))">
			<i class="fas fa-times"></i>
		</a>
	</td>
	<td class="product-thumbnail">
		<a href="shop-product-sidebar-left.html">
			<img width="100" height="100" alt="" class="img-fluid" 
			src="<?php echo $_SESSION['carrito'][$i]['imagen']; ?>">
		</a>
	</td>
	<td class="product-name">
	<a href="<?php echo site_url('productos/detalle/').$_SESSION['carrito'][$i]['codigo']; ?>"><?php echo $_SESSION['carrito'][$i]['titulo']; ?></a>
	</td>
	
	<?php if (parametro(9)=="S"): ?> 
		<td class="product-vacio">
            <div class='text-center'>
				<a href='#' 
				   onclick="cambiaVacio(<?php echo $_SESSION['carrito'][$i]['codigo'] ?>,
				   						$(this),<?php echo $_SESSION['carrito'][$i]['vacio'] ?>
										   )"  
				   >
				   <?php if ($_SESSION['carrito'][$i]['vacio']==0): ?>	  
				   		<i class='vacio fa  fa-toggle-off fa-2x text-green'></i></a>
					<?php else:  ?>
						<i class='vacio fa  fa-toggle-on fa-2x text-green'></i></a>
					<?php endif; ?>		   
			</div>
		</td>
	<?php endif; ?>	
	<td class="product-name">
		<?php if(parametro(11) == 'S'): ?>
					<span><?php echo $_SESSION['carrito'][$i]['nombre_color']; ?></span>
		<?php endif; ?>			
	</td>
	<td class="product-name">
		<?php if(parametro(11) == 'S'): ?>
			<span ><?php echo $_SESSION['carrito'][$i]['nombre_talle']; ?></span>
		<?php endif; ?>			
	</td>
	<td class="product-price">
		<span class="amount">$<?php echo $_SESSION['carrito'][$i]['precio']; ?></span>
	</td>
	<td class="product-quantity">
		<form enctype="multipart/form-data" method="post" class="cart">
			<div class="quantity">
				
				
				<input type="text"   
					onchange="cambiaCarro2($(this).val(),<?php echo $_SESSION['carrito'][$i]['codigo']; ?>,$(this))" 
					class="input-text qty text" 
					title="Qty" 
					value="<?php echo intval($_SESSION['carrito'][$i]['cantidad']); ?>" 
					name="quantity" 
					id="quantity"
					disabled >
				
		
			</div>
		</form>
	</td>
	<td class="product-subtotal">
		<span class="amount">$<?php echo $_SESSION['carrito'][$i]['totalitem']; ?></span>
	</td>
</tr>


<?php endfor; ?>	


												<tr>
													<td class="actions" colspan="6">
														<div class="actions-continue">
															<input type="submit" value="Actualizar" name="update_cart" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="featured-boxes">
					<div class="row">
						
						<div class="col-sm-6">
						
						</div>

						<div class="col-sm-6">
							<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
								<div class="box-content">
									<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Total</h4>
									<table class="cart-totals">
										<tbody>
											<tr class="cart-subtotal">
												<th>
													<strong class="text-dark">Subtotal</strong>
												</th>
												<td>
													<strong  class="text-dark"><span class="amount" id="subtotal">$431</span></strong>
												</td>
											</tr>
											<tr class="shipping">
												<th>
													Envío
												</th>
												<td id="envio">
													Sin costo de envío<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
												</td>
											</tr>
											
											<?php if(parametro(9) == 'S'): ?>
											<tr>
												<th>
													Envasado al Vacio
												</th>
												<td id="costovacio">
													Sin costo de envasado al vacio<input type="hidden" value="free_shipping" id="vacio_service" name="vacio_service">
												</td>
											</tr>	
											<?php endif; ?>	
												
											<tr class="total">
												<th>
													<strong class="text-dark">Total de la compra</strong>
												</th>
												<td>
													<strong class="text-dark"><span class="amount" id="total">$431</span></strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>


				<div class="row">
					<div class="col">
						<div class="actions-continue">
							<a href="<?php echo base_url('productos/carrito/checkout')?>" class="btn btn-primary btn-modern text-uppercase">Continuar Compra <i class="fas fa-angle-right ml-1"></i></a>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>



