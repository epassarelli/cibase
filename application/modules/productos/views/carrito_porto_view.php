
<script>


		function cambiaCarro2(cantidad,id) {
			if (cantidad > 0) {
							// Url Dinamico
			UrlBase = $('#url').val();


			//alert(UrlBase);
			/*
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
				});
			*/		
			// Ejecutamos la accion y la enviamos al servidor 
			$.ajax({
				url: UrlBase+'productos/carrito/cambiarCarrito',
				data: { producto_id: id,cantidad: cantidad },
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementsByClassName('cart-qty')[0].textContent=response.items
						
						calculaPie();

						alert('cambio ok');
						//Toast.fire({type: 'success',
						//	        title: 'Producto Agregado',
						//		  })
					}else{
						alert('cambio fallo ');
						//Toast.fire({type: 'error',
						//			title: 'No se pudo agregar el producto',
						//		   })
					}
			
				}, //success         
				error: function(response) {
					alert('error al cambiar');
				},
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
			}	
		}

		function eliminaItemCarro2(id,e) { 
			// Url Dinamico
			UrlBase = $('#url').val();
			
			var MyRow = e.closest('tr')[0].rowIndex-1;
			
			/*
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
				});
			*/		
			// Ejecutamos la accion y la enviamos al servidor 
			
			$.ajax({
				url: UrlBase+'productos/carrito/eliminarItemCarrito',
				data: { producto_id: id},
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementsByClassName('cart-qty')[0].textContent=response.items
						document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].remove();
						calculaPie();
						//alert('quitado ok');
						//Toast.fire({type: 'success',
						//	        title: 'Producto Agregado',
						//		  })
					}else{
						alert('quitado fallo ');
						//Toast.fire({type: 'error',
						//			title: 'No se pudo agregar el producto',
						//		   })
					}
			
				}, //success         
				error: function(response) {
					alert('error al quitar');
				},
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
			
		} 	
		
		function agregarCarro2(id,e) { 
			// Url Dinamico
			UrlBase = $('#url').val();

			var MyRow = e.closest('tr')[0].rowIndex-1;
			
			/*
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
				});
			*/		
			// Ejecutamos la accion y la enviamos al servidor 
			$.ajax({
				url: UrlBase+'productos/carrito/agregarCarrito',
				data: { producto_id: id,cantidad: 1 },
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementsByClassName('cart-qty')[0].textContent=response.items

						document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.totallastitem

						alert('agregado ok');

						calculaPie()
						//Toast.fire({type: 'success',
						//	        title: 'Producto Agregado',
						//		  })
					}else{
						alert('agregado fallo ');
						//Toast.fire({type: 'error',
						//			title: 'No se pudo agregar el producto',
						//		   })
					}
			
				}, //success         
				error: function(response) {
					alert('error al agregar');
				},
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
			
		} 

		function quitarCarro2(id,e) { 
			// Url Dinamico
			UrlBase = $('#url').val();
			
			var MyRow = e.closest('tr')[0].rowIndex-1;
			
			/*
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
				});
			*/		
			// Ejecutamos la accion y la enviamos al servidor 
			
			$.ajax({
				url: UrlBase+'productos/carrito/quitarCarrito',
				data: { producto_id: id,cantidad: 1 },
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementsByClassName('cart-qty')[0].textContent=response.items
						//este if es por si la cantidad es 1 y quiere decrementar el controlador no calcula
						if (response.totallastitem > 0) {
							document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.totallastitem
						}
						
						calculaPie();
						//alert('quitado ok');
						//Toast.fire({type: 'success',
						//	        title: 'Producto Agregado',
						//		  })
					}else{
						alert('quitado fallo ');
						//Toast.fire({type: 'error',
						//			title: 'No se pudo agregar el producto',
						//		   })
					}
			
				}, //success         
				error: function(response) {
					alert('error al quitar');
				},
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
			
		} 

		function calculaPie() { 
			// Url Dinamico
			UrlBase = $('#url').val();

			/*
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
				});
			*/		
			// Ejecutamos la accion y la enviamos al servidor 
			$.ajax({
				url: UrlBase+'productos/carrito/pieCarrito',
				data: { opeaacio: 'Calculo' },
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementById('subtotal').innerText=response.subtotal;
						document.getElementById('envio').innerText=response.envio;
						document.getElementById('total').innerText=response.total;						
						//Toast.fire({type: 'success',
						//	        title: 'Producto Agregado',
						//		  })
					}else{
						alert('refresca valores  fallo ');
						//Toast.fire({type: 'error',
						//			title: 'No se pudo agregar el producto',
						//		   })
					}
			
				}, //success         
				error: function(response) {
					alert('error al refrescar pie');
				},
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
			
		} 

</script>

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
	<td class="product-price">
		<span class="amount">$<?php echo $_SESSION['carrito'][$i]['precio']; ?></span>
	</td>
	<td class="product-quantity">
		<form enctype="multipart/form-data" method="post" class="cart">
			<div class="quantity">
				<input type="button" onclick="quitarCarro2(<?php echo $_SESSION['carrito'][$i]['codigo'] ?>,$(this))" class="minus" value="-">
				<input type="text"   onchange="cambiaCarro2($(this).val(),<?php echo $_SESSION['carrito'][$i]['codigo']; ?>)" class="input-text qty text" title="Qty" value="<?php echo $_SESSION['carrito'][$i]['cantidad']; ?>" name="quantity" min="1" step="1">
				<input type="button" onclick="agregarCarro2(<?php echo $_SESSION['carrito'][$i]['codigo'] ?>,$(this))"  class="plus" value="+">
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
							<?php if(parametro(3) != 0): ?>
							<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
								<div class="box-content">
									<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Calcular envío</h4>

									<form action="/" id="frmCalculateShipping" method="post">
										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark">Country</label>
												<select class="form-control">
													<option value="">Select a country</option>
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark">State</label>
												<input type="text" value="" class="form-control">
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark">Zip Code</label>
												<input type="text" value="" class="form-control">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<input type="submit" value="Actualizar Totales" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>
							</div>
							<?php endif; ?>
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
							<button type="submit" class="btn btn-primary btn-modern text-uppercase">Proceed to Checkout <i class="fas fa-angle-right ml-1"></i></button>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>



