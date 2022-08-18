		
<div role="main" class="main shop py-4">

	<div class="container">

		<div class="row">
			<div class="col-lg-12">

				<div class="masonry-loader masonry-loader-showing">
					<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
         
						<?php if(count($categorias) > 0): ?>

						<?php foreach ($categorias as $cat) : ?>

							<div class="col-md-6 col-lg-4 isotope-item product">
								<div class="portfolio-item">
									<a href="<?php echo site_url('productos/categorias/') . $cat->slug;?>">
										<span class="thumb-info thumb-info-lighten border-radius-0">
											<span class="thumb-info-wrapper border-radius-0">
												<img src="<?php echo site_url('assets/uploads/') . $this->config->item('sitio_id') . '/categorias/' . $cat->imagen; ?>" class="img-fluid border-radius-0" alt="">

												<span class="thumb-info-title">
													<span class="thumb-info-inner"><?php echo $cat->categoria; ?></span>
													<!-- <span class="thumb-info-type"><?php echo $cat->categoria; ?></span> -->
												</span>
												<span class="thumb-info-action">
													<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
												</span>
											</span>
										</span>
									</a>
								</div>
							</div>

						<?php endforeach; ?>

						<?php else: ?>

							<h1>No existen categorías aún</h1>

						<?php endif; ?> 

					</div>

				</div>
			</div>
			
		</div>
	</div>

</div>

