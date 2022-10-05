<section class="section section-default bg-color-light-scale-2 mt-0 mb-0">

	<div class="container">

		<div class="row">
			<div class="col-lg-9">

				<div class="masonry-loader masonry-loader-showing">
					<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

						<?php if (count($productos) > 0) : ?>

							<?php foreach ($productos as $prod) : ?>

								<?php $enOferta = enOferta($prod->precioOF, $prod->OfDesde, $prod->OfHasta); ?>

								<div class="col-sm-6 col-lg-4 product">
									<?php if ($enOferta) : ?>
										<a href="<?php echo site_url('productos/detalle/') . $prod->producto_id; ?>">
											<span class="onsale">Oferta</span>
										</a>
									<?php endif; ?>

									<span class="product-thumb-info border-0">
										<?php if (parametro(1) == 'S') : ?>
											<a href="#" onclick="agregarCarro(<?php echo $prod->producto_id ?>,<?php echo $prod->unidadvta ?>)" class="add-to-cart-product bg-color-primary">
												<span class="text-uppercase text-1">Agregar al carrito</span>
											</a>
										<?php endif; ?>

										<a href="<?php echo site_url('productos/detalle/') . $prod->producto_id; ?>">
											<span class="product-thumb-info-image">
												<img alt="" class="img-fluid" src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen; ?>">
											</span>
										</a>
										<span class="product-thumb-info-content product-thumb-info-content p-2 bg-color-light">
											<a href="<?php echo site_url('productos/detalle/') . $prod->producto_id; ?>">
												<h4 class="text-4 text-primary"><?php echo $prod->titulo; ?></h4>
												<span class="price">
													<?php if ($enOferta) : ?>
														<del><span class="amount">$ <?php echo $prod->precioLista; ?></span></del>
														<ins><span class="amount text-dark font-weight-semibold">$ <?php echo $prod->precioOF; ?></span></ins>
													<?php else : ?>
														<ins><span class="amount text-dark font-weight-semibold">$ <?php echo $prod->precioLista; ?></span></ins>
													<?php endif; ?>
												</span>
											</a>
										</span>
									</span>
								</div>

							<?php endforeach; ?>

						<?php else : ?>

							<div class="alert alert-danger alert-dismissible col-sm-12" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<strong><i class="fas fa-exclamation-triangle"></i>No!</strong> se encontraron productos.
								<ul>
									<li>Revise si viene de una dirección externa</li>
									<li>Contactenos por alguno de nuestros canales</li>
								</ul>
							</div>

						<?php endif; ?>


					</div>

				</div>
			</div>


			<div class="col-lg-3">

				<?php echo $this->load->view('productos_sidebar_' . $this->session->userdata('theme') . '_view'); ?>

			</div>
		</div>
	</div>

	</div>
</section>