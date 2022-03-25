


		<div role="main" class="main shop py-4">

				<div class="container">
<!-- Capaz acá dejar comentado para cuando tengamos el registro -->
					<div class="row">
						<div class="col">
							<?php if(parametro(2) =="S"): ?>
								<p>Ya está registrado? <a href="shop-login.html">Acceder.</a></p>
							<?php endif; ?>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-9">
							<div class="accordion accordion-modern" id="accordion">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Dirección para entrega
											</a>
										</h4>
									</div>
<div id="collapseOne" class="collapse show">
<div class="card-body">
<form method="post" action="<?php echo  base_url('productos/carrito/checkout_validation') ?>"id="frmBillingAddress">
<div class="form-row">
<div class="form-group col-lg-6">
	<label class="font-weight-bold text-dark text-2">Nombre *</label>
	<input type="text" value="<?php echo set_value('nombre',@$nombre); ?>" class="form-control" name="nombre" id="nombre" required>
	<?php if (!empty(form_error('nombre'))): ?> <?php  echo  form_error('nombre') ;?> <?php endif;?>
</div>
<div class="form-group col-lg-6">
	<label class="font-weight-bold text-dark text-2">Apellido *</label>
	<input type="text" value="<?php echo set_value('apellido',@$apellido); ?>" class="form-control" id="apellido" name="apellido" required>
	<?php if (!empty(form_error('apellido'))): ?> <?php  echo  form_error('apellido') ;?> <?php endif;?>
</div>
</div>
<div class="form-row">
<div class="form-group col-lg-6">
	<label class="font-weight-bold text-dark text-2">Email *</label>
	<input type="text" value="<?php echo set_value('email',@$email); ?>" class="form-control" id="email" name="email" required>
	<?php if (!empty(form_error('email'))): ?> <?php  echo  form_error('email') ;?> <?php endif;?>
</div>
<div class="form-group col-lg-6">
	<label class="font-weight-bold text-dark text-2">Teléfono *</label>
	<input type="text" value="<?php echo set_value('telefono',@$telefono); ?>" class="form-control"  id="telefono" name="telefono" required>
	<?php if (!empty(form_error('telefono'))): ?> <?php  echo  form_error('telefono') ;?> <?php endif;?>

</div>
</div>

<div class="form-row">
	<div class="form-group col-lg-6">
		<label class="font-weight-bold text-dark text-2">Forma de Entrega</label>
		<select class="form-control" 
				id="entrega_id" 
				name="entrega_id" 
				onchange="cambiaEntrega($(this.value))"
				>
			<?php 
				echo  "<option value=0>Seleccione una Forma de Entrega</option>";
				foreach ($entregas as $entrega) {
					if (set_value('entrega_id',@$entrega_id)==$entrega->id) { 
						echo '<option value="' .$entrega->id. '"" selected>' . $entrega->nombre  . ' '  . 
																			   $entrega->detalle . ' $ ' .
																			   $entrega->costo   . '  </option>';  
					}else
						echo '<option value="' .$entrega->id. '"">' . $entrega->nombre  . ' '  . 
																	  $entrega->detalle . ' $ ' .
																	  $entrega->costo   . '  </option>';  
					}
			?> 
			</select>               
			<?php if (!empty(form_error('entrega_id'))): ?> <?php  echo  form_error('entrega_id') ;?> <?php endif;?>

	</div>
</div>




<div class="form-row">
<div class="form-group col">
	<label class="font-weight-bold text-dark text-2" id="lblcalle">Dirección Calle</label>
	<input type="text" value="<?php echo set_value('calle',@$calle); ?>" class="form-control" id="calle" name="calle">
	<?php if (!empty(form_error('calle'))): ?> <?php  echo  form_error('calle') ;?> <?php endif;?>
</div>
</div>
<div class="form-row">
<div class="form-group col-lg-4">
	<label class="font-weight-bold text-dark text-2" id="lblnro">Nro</label>
	<input type="text" value="<?php echo set_value('nro',@$nro); ?>" class="form-control" id="nro" name="nro">
	<?php if (!empty(form_error('nro'))): ?> <?php  echo  form_error('nro') ;?> <?php endif;?>
</div>
<div class="form-group col-lg-4">
	<label class="font-weight-bold text-dark text-2">Piso</label>
	<input type="text" value="<?php echo set_value('piso',@$piso); ?>" class="form-control" id="piso" name="piso">
	<?php if (!empty(form_error('piso'))): ?> <?php  echo  form_error('piso') ;?> <?php endif;?>
</div>
<div class="form-group col-lg-4">
	<label class="font-weight-bold text-dark text-2">Dpto</label>
	<input type="text" value="<?php echo set_value('dpto',@$dpto); ?>" class="form-control" id="dpto" name="dpto">
	<?php if (!empty(form_error('dpto'))): ?> <?php  echo  form_error('dpto') ;?> <?php endif;?>
</div>
</div>
<div class="form-row">
<div class="form-group col-lg-6">
	<label class="font-weight-bold text-dark text-2" id="lblprovincia">Provincia</label>
	<select class="form-control" id="provincia" name="provincia" >
		<!-- Fijar Argentina -->
        <?php 
            echo  "<option value=0>Seleccione una Provincia</option>";
            foreach ($provincias as $prov) {
                 if (set_value('provincia',@$provincia)==$prov->id) { 
                    echo '<option value="' .$prov->id. '"" selected>' . $prov->nombre . '  </option>';  
                   }else
                     echo '<option value="' .$prov->id. '"">' . $prov->nombre . ' </option>';  
                 }
        ?> 
        </select>               
		<?php if (!empty(form_error('provincia'))): ?> <?php  echo  form_error('provincia') ;?> <?php endif;?>

</div>
<div class="form-group col-lg-6">
	<label class="font-weight-bold text-dark text-2" id="lbllocalidad">Localidad</label>
	<select class="form-control" id="localidad" name="localidad">
	<?php 
            echo  "<option value=0>Seleccione una Localidad</option>";
            foreach ($localidades as $loca) {
                 if (set_value('localidad',@$localidad)==$loca->id) { 
                    echo '<option value="' .$loca->id. '"" selected>' . $loca->nombre . '  </option>';  
                   }else
                     echo '<option value="' .$loca->id. '"">' . $loca->nombre . ' </option>';  
                 }
        ?> 

	</select>
	<?php if (!empty(form_error('localidad'))): ?> <?php  echo  form_error('localidad') ;?> <?php endif;?>

</div>
</div>                                              

												<div class="form-row">
													<div class="form-group col">
													<?php if(parametro(5) =="S"): ?>
														<input type="submit" value="Continuar" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-loading-text="Loading...">
														<?php else: ?>
															<div class="actions-continue">
																<input type="submit" value="Confirmar Compra" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
															</div>
														<?php endif; ?> 
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
									<?php if(parametro(5) =="S"): ?>
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												Pagar y Finalizar
											</a>
										</h4>
									<?php endif; ?>
									</div>
									<div id="collapseThree" class="collapse">
										<div class="card-body">
											<table class="shop_table cart">
												<thead>
													<tr>
														<th class="product-thumbnail">
															&nbsp;
														</th>
														<th class="product-name">
															Producto
														</th>
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
													<tr class="cart_table_item">
														<td class="product-thumbnail">
															<a href="shop-product-sidebar-left.html">
																<img width="100" height="100" alt="" class="img-fluid" src="img/products/product-grey-1.jpg">
															</a>
														</td>
														<td class="product-name">
															<a href="shop-product-sidebar-left.html">Lomo</a>
														</td>
														<td class="product-price">
															<span class="amount">$0</span>
														</td>
														<td class="product-quantity">
															1
														</td>
														<td class="product-subtotal">
															<span class="amount">0</span>
														</td>
													</tr>
													<tr class="cart_table_item">
														<td class="product-thumbnail">
															<a href="shop-product-sidebar-left.html">
																<img width="100" height="100" alt="" class="img-fluid" src="img/products/product-grey-2.jpg">
															</a>
														</td>
														<td class="product-name">
															<a href="shop-product-sidebar-left.html">Provoleta</a>
														</td>
														<td class="product-price">
															<span class="amount">$0</span>
														</td>
														<td class="product-quantity">
															1
														</td>
														<td class="product-subtotal">
															<span class="amount">$0</span>
														</td>
													</tr>
													
												</tbody>
											</table>
							
											<hr class="solid my-5">
							
											<h4 class="text-primary">Total Carrito</h4>
											<table class="cart-totals">
												<tbody>
													<tr class="cart-subtotal">
														<th>
															<strong class="text-dark">Subtotal Carrito</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">$0</span></strong>
														</td>
													</tr>
													<tr class="shipping">
														<th>
															Envio
														</th>
														<td>
															Envio Gratis<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
														</td>
													</tr>
													<tr class="total">
														<th>
															<strong class="text-dark"> Total Pedido</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">$0</span></strong>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<?php if (parametro(5)=="S") : ?> 			
								<div class="actions-continue">
									<input type="submit" value="Confirmar Compra" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
								</div>
							<?php endif; ?>	
						</div>
						<div class="col-lg-3">
							<h4 class="text-primary">Total carrito</h4>
							<table class="cart-totals">
								<tbody>
									<tr class="cart-subtotal">
										<th>
											<strong class="text-dark">Subtotal Carrito</strong>
										</th>
										<td>
											<strong id="subtotal" class="text-dark"><span class="amount">$0</span></strong>
										</td>
									</tr>
									<tr class="shipping">
										<th>
											Envio
										</th>
										<td id="envio">
											Envio Gratis<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
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
													<?php endif; ?>	

									<tr class="total">
										<th>
											<strong class="text-dark">Total del Pedido</strong>
										</th>
										<td>
											<strong id="total" class="text-dark"><span class="amount">$0</span></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</div>


		</div>

