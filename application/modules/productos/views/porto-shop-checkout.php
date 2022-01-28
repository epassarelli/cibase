<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Checkout | Confirmar Pedido</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.min.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="vendor/bootstrap-star-rating/css/star-rating.min.css">
		<link rel="stylesheet" href="vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
		
		<!-- Demo CSS -->


		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	<body>
			<div role="main" class="main shop py-4">

				<div class="container">
<!-- Capaz acá dejar comentado para cuando tengamos el registro -->
					<div class="row">
						<div class="col">
							<p>Ya está registrado? <a href="shop-login.html">Acceder.</a></p>
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
											<form action="/" id="frmBillingAddress" method="post">
												<!--<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Pais</label>
														<select class="form-control">
                                                             Fijar Argentina o lo sacamos?
															<option value="">Seleccione pais</option>
														</select>
													</div>
												</div>-->
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Nombre</label>
														<input type="text" value="" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Apellido</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Email</label>
														<input type="text" value="" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Teléfono</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<!-- <div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Company Name</label>
														<input type="text" value="" class="form-control">
													</div>
												</div> -->
     <!-- Podríamos preguntar si el negocio hace delivery poner obligatorio los campos dirección y sino no? -->                                           
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Dirección Calle </label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label class="font-weight-bold text-dark text-2">Nro</label>
														<input type="text" value="" class="form-control">
													</div>
													<div class="form-group col-lg-4">
														<label class="font-weight-bold text-dark text-2">Piso</label>
														<input type="text" value="" class="form-control">
													</div>
													<div class="form-group col-lg-4">
														<label class="font-weight-bold text-dark text-2">Dpto</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
		                                       <div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Provincia</label>
														<select class="form-control">
                                                            <!-- Fijar Argentina -->
															<option value="">Seleccione provincia</option>
														</select>
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Localidad</label>
														<select class="form-control">
                                                            <!-- Fijar Argentina -->
															<option value="">Seleccione Localidad</option>
														</select>
													</div>
												</div>                                              
         
												<div class="form-row">
													<div class="form-group col">
														<input type="submit" value="Continuar" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-loading-text="Loading...">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
            <!-- 
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Direccion de envio
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="collapse">
										<div class="card-body">
											<form action="/" id="frmShippingAddress" method="post">
												<div class="form-row">
													<div class="col">
														<div class="custom-control custom-checkbox pb-3">
															<input type="checkbox" class="custom-control-input" id="shipbillingaddress">
															<label class="custom-control-label" for="shipbillingaddress">Ship to billing address?</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Country</label>
														<select class="form-control">
															<option value="">Select a country</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">First Name</label>
														<input type="text" value="" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Last Name</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Company Name</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Address </label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">City </label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<input type="submit" value="Continue" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-loading-text="Loading...">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
            -->
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												Pagar y Finalizar
											</a>
										</h4>
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
															<span class="amount">$899</span>
														</td>
														<td class="product-quantity">
															1
														</td>
														<td class="product-subtotal">
															<span class="amount">$899</span>
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
															<span class="amount">$372</span>
														</td>
														<td class="product-quantity">
															1
														</td>
														<td class="product-subtotal">
															<span class="amount">$372</span>
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
															<strong class="text-dark"><span class="amount">$1271</span></strong>
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
															<strong class="text-dark"><span class="amount">$1271</span></strong>
														</td>
													</tr>
												</tbody>
											</table>
	<!--foreach con metodos de pago						
											<hr class="solid my-5">
							
											<h4 class="text-primary">Payment</h4>
							
											<form action="/" id="frmPayment" method="post">
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentdirectbank">
															<label class="custom-control-label" for="paymentdirectbank">Direct Bank Transfer</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentcheque">
															<label class="custom-control-label" for="paymentcheque">Cheque Payment</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentpaypal">
															<label class="custom-control-label" for="paymentpaypal">Paypal</label>
														</div>
													</div>
												</div>
											</form>
                                        -->
										</div>
									</div>
								</div>
							</div>
							
							<div class="actions-continue">
								<input type="submit" value="Confirmar Compra" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
							</div>

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
											<strong class="text-dark"><span class="amount">$1271</span></strong>
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
											<strong class="text-dark">Total del Pedido</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">$1271</span></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</div>


		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/common/common.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/jquery.vide.min.js"></script>
		<script src="vendor/vivus/vivus.min.js"></script>
		<script src="vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
		<script src="vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="js/views/view.shop.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

	</body>
</html>
