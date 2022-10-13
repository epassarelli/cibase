	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	


	  <title>Detalle pedido cliente</title>	




    <link rel="stylesheet" href="<?php echo base_url('assets/themes/adminlte/css/pedidopdf.min.css') ?>" />


	</head>
	<body>
	 
		<div class="body">
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
				<div class="header-body border-color-primary border-bottom-0 box-shadow-none" data-sticky-header-style="{'minResolution': 0}" data-sticky-header-style-active="{'background-color': '#f7f7f7'}" data-sticky-header-style-deactive="{'background-color': '#FFF'}">
					<div class="header-container container">
						<div class="header-row py-2">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="index.html">
											<img alt="Pedido" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="img/logo.png">
											<!-- aca traer logo del sitio -->
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

	<div role="main" class="main shop py-4">
			<div class="container" style="text-align:center;">
					<div class="row">
							<div class="col-lg-6">
								<div class="heading text-tertiary heading-border heading-bottom-border">
									<h1>Pedido Nro <strong class="font-weight-extra-bold"><?php echo $pedido[0]->id ?></strong></h1>
								</div>
							</div>
							<div class="col-lg-6">
									<h2> Fecha: <?php echo $pedido[0]->fecha ?></h2>
								</div>
							</div>
			</div>
			<div class="container" style="text-align:center;">
					<div class="row">
						<div class="col-lg-9">
							<div class="accordion accordion-modern" id="accordion">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												DATOS CLIENTE
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="collapse show" style="text-align:left ;">
										<div class="card-body">
											<form action="/" id="frmBillingAddress" method="post">
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Nombre</label>
														<input type="text" value=" <?php echo trim($pedido[0]->nombre) ?>" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Apellido</label>
														<input type="text" value=" <?php echo trim($pedido[0]->apellido) ?>" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Email</label>
														<input type="text" value="<?php echo trim($pedido[0]->email)?>" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Teléfono</label>
														<input type="text" value="<?php echo trim($pedido[0]->telefono)?>" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Dirección Calle </label>
														<input type="text" value=" <?php echo trim($pedido[0]->calle)?>" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label class="font-weight-bold text-dark text-2">Nro</label>
														<input type="text" value="<?php echo trim($pedido[0]->nro)?>" class="form-control">
													</div>
													<div class="form-group col-lg-4">
														<label class="font-weight-bold text-dark text-2">Piso</label>
														<input type="text" value="<?php echo trim($pedido[0]->piso)?>" class="form-control">
													</div>
													<div class="form-group col-lg-4">
														<label class="font-weight-bold text-dark text-2">Dpto</label>
														<input type="text" value="<?php echo trim($pedido[0]->dpto)?>" class="form-control">
													</div>
												</div>
		                                       <div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Provincia</label>
														<input type="text" value="<?php echo trim($pedido[0]->provincia)?>" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Localidad</label>
														<input type="text" value="<?php echo trim($pedido[0]->localidad)?>" class="form-control">
													</div>
												<div>                                       
											</form>
										</div>
									</div>
								</div>
							</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"  href="#collapseOne" aria-expanded="true">
												DETALLE PEDIDO
											</a>
										</h4>
									</div>
									<div id="collapseThree"  class="collapse show">
										<div class="card-body">
											<table class="shop_table cart">
												<thead>
													<tr>
					
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
												<?php foreach ($pedido as $lineas): ?>
																<tr class="cart_table_item">
																		<td class="product-name">
																			<a href="#"><?php echo $lineas->titulo; ?></a>
																		</td>
																		<td class="product-price">
																			<span class="amount">$<?php echo $lineas->preciounit; ?></span>
																		</td>
																		<td class="product-quantity">
																		<?php echo $lineas->cantidad; ?>
																		</td>
																		<td class="product-subtotal">
																			<span class="amount">$<?php echo $lineas->precioitem; ?></span>
																		</td>
																	</tr>
												<?php endforeach; ?>

												</tbody>
											</table>
							
											<hr class="solid my-5">
							
	
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>	
						<div class="col-lg-3">
							<h4 class="text-primary">IMPORTE</h4>
							<table class="cart-totals" style="text-align:left ;">
								<tbody> 
									
									<tr class="cart-subtotal">
										<th>
											<strong class="text-dark">Subtotal</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">$<?php echo $pedido[0]->subtotal ?></span></strong>
										</td>
									</tr>
									
									<tr class="cart-subtotal">
										<th>
											<strong class="text-dark">Envasado</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">$<?php echo $pedido[0]->env_vacio ?></span></strong>
										</td>
									</tr>
							


									<tr class="shipping">
										<th>
											Envio
										</th>
										<td>
											<input type="hidden" value="<?php echo $pedido[0]->delivery ?>" id="shipping_method" name="shipping_method">
										</td>
									</tr>

									<tr class="total">
										<th>
											<strong class="text-dark">Total del Pedido</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">$<?php echo $pedido[0]->total ?></span></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
		</div>
</div>
	</body>

