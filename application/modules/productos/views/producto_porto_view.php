<div role="main" class="main shop py-4">

	<div class="container">
	<input type="hidden" id="url" value="<?php echo base_url();?>">

		<div class="row">
			<div class="col-lg-9">

				<?php if(!isset($producto)): ?>

					<h1>No existe el producto que está intentando ver</h1>

				<?php else: ?>

				<?php $enOferta = enOferta($producto->precioOF, $producto->OfDesde, $producto->OfHasta); ?>

				<div class="row">
					<div class="col-lg-6">

						<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10}">
							
							<?php if(strlen($producto->imagen) > 4): ?>
							<div>
								<img alt="<?php echo $producto->titulo; ?>" height="300" class="img-fluid" src="<?php echo site_url('assets/uploads/') . $this->config->item('sitio_id') . '/productos/' . $producto->imagen; ?>">
							</div>
							<?php endif; ?>

							<?php if(strlen($producto->imagen2) > 4): ?>
							<div>
								<img alt="<?php echo $producto->titulo; ?>" height="300" class="img-fluid" src="<?php echo site_url('assets/uploads/') . $this->config->item('sitio_id') . '/productos/' . $producto->imagen2; ?>">
							</div>
							<?php endif; ?>

							<?php if(strlen($producto->imagen3) > 4): ?>
							<div>
								<img alt="<?php echo $producto->titulo; ?>" height="300" class="img-fluid" src="<?php echo site_url('assets/uploads/') . $this->config->item('sitio_id') . '/productos/' . $producto->imagen3; ?>">
							</div>
							<?php endif; ?>

						</div>

					</div>

					<div class="col-lg-6">

						<div class="summary entry-summary">

							<h1 class="mb-0 font-weight-bold text-7"><?php echo $producto->titulo; ?></h1>

							<?php if(isset($reviews)): ?>
							<div class="pb-0 clearfix">
								<div title="Rated 3 out of 5" class="float-left">
									<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
								</div>

								<div class="review-num">
									<span class="count" itemprop="ratingCount">2</span> reviews
								</div>
							</div>
							<?php endif; ?>

							<p class="price">
								
								<?php if ($enOferta): ?>
									<del><span class="amount">$ <?php echo $producto->precioLista; ?></span></del>
									<ins><span class="amount text-dark font-weight-semibold">$ <?php echo $producto->precioOF; ?></span></ins>
								<?php else: ?>
									<span class="amount text-dark font-weight-semibold">$ <?php echo $producto->precioLista; ?></span>
								<?php endif; ?>

							</p>

							<p class="mb-5"><?php echo $producto->descCorta; ?> </p>



							<?php if(parametro(1) == 'S'): ?>
							<form enctype="multipart/form-data" method="post" class="cart">
								
								<div class="row">

									<div class="col-md-6">
									<?php if(isset($tallesProducto)): ?>
										<label for="talle">Talle</label>
										<select class="form-control" name="talle" id="subject" required="">
											<option value="0">...</option>
											<?php foreach ($tallesProducto as $talle): ?>
												<option value="<?php echo $talle->id; ?>"><?php echo $talle->descripcion; ?></option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
									</div>

									<div class="col-md-6">
									<?php if(isset($coloresProducto)): ?>
										<label for="color">Color</label>
										<select class="form-control" name="color" id="subject" required="">
											<option value="0">...</option>
											<?php foreach ($coloresProducto as $color): ?>
												<option value="<?php echo $color->id; ?>"><?php echo $color->descripcion; ?></option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>											
									</div>

								</div>

								
								<br>


								<div class="quantity quantity-lg">
									
									<input type="button" 
											class="minus" 
											value="-"
											onclick="restaritem(<?php echo $producto->unidadvta ?>)"
											>									
									<input type="text" 
											class="input-text qty text" 
											title="Qty" 
											value="<?php echo $producto->unidadvta ?>" 
											id="quantity" 
											name="quantity" min="1" step="1" disabled
									>
									<input type="button" 
										   class="plus" 
										   value="+"
										   onclick="sumaritem(<?php echo $producto->unidadvta ?>)"
										   >
								</div>

								<button href="javascript:void(0);" onclick="agregarCarro3(<?php echo $producto->id ?>)" class="btn btn-primary btn-modern text-uppercase">Agregar al carrito</button>
							</form>

							<?php endif; ?>

							<?php if(isset($catsProducto)): ?>
								<div class="product-meta">
									<span class="posted-in">Categorias: 
										<?php foreach($catsProducto as $cp): ?>
											<a rel="tag" href="<?php echo site_url('productos/categorias/'.$cp->slug) ?>"><?php echo $cp->categoria; ?></a>, 
										<?php endforeach; ?>
									</span>
								</div>						
							<?php endif; ?>

						</div>


					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="tabs tabs-product mb-2">
							<ul class="nav nav-tabs">
								<li class="nav-item active"><a class="nav-link py-3 px-4" href="#productDescription" data-toggle="tab">Descripcion</a></li>
							</ul>
							<div class="tab-content p-0">
								<div class="tab-pane p-4 active" id="productDescription">
									<p><?php echo $producto->descLarga; ?></p>
								</div>


							</div>
						</div>
					</div>
				</div>

				<hr class="solid my-5">

				<?php if(isset($relacionados)): ?>

				<h4 class="mb-3">Productos <strong>relacionados</strong></h4>
				<div class="masonry-loader masonry-loader-showing">
					<div class="row products product-thumb-info-list mt-3" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
						
						<div class="col-12 col-sm-6 col-lg-3 product">
							<span class="product-thumb-info border-0">
								<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
									<span class="text-uppercase text-1">Add to Cart</span>
								</a>
								<a href="shop-product-sidebar-left.html">
									<span class="product-thumb-info-image">
										<img alt="" class="img-fluid" src="img/products/product-grey-1.jpg">
									</span>
								</a>
								<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
									<a href="shop-product-sidebar-left.html">
										<h4 class="text-4 text-primary">Photo Camera</h4>
										<span class="price">
											<del><span class="amount">$325</span></del>
											<ins><span class="amount text-dark font-weight-semibold">$299</span></ins>
										</span>
									</a>
								</span>
							</span>
						</div>


					</div>
				</div>

				<?php endif; ?>
				<!-- Fin de Relacionados -->

			<?php endif; ?>

			</div>
			


			<div class="col-lg-3">

				<?php echo $this->load->view('productos_sidebar_' . $this->session->userdata('theme') . '_view'); ?>

			</div>
		</div>
	</div>

</div>

