<aside class="sidebar">
	
	<!-- 					
	<form action="page-search-results.html" method="get">
		<div class="input-group mb-3 pb-1">
			<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
			<span class="input-group-append">
				<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
			</span>
		</div>
	</form> -->

	<h5 class="font-weight-bold pt-3">Buscador</h5>
	<form action="<?php echo base_url('productos'); ?>" id="formBusqueda" method="post" enctype="multipart/form-data">
		<div class="input-group">
			<input type="text" id="articulobuscado" name="articulobuscado" value="<?php echo set_value('articulobuscado', @$articulobuscado); ?>" class="form-control col-sm-10" placeholder="Búsqueda de productos" />
			<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
		</div>
	</form>

	


	<h5 class="font-weight-bold pt-3">Categorias</h5>
	<ul class="nav nav-list flex-column">


      <?php foreach ($categorias as $cat): ?>

      	<li class="nav-item"><a class="nav-link" href="<?php echo site_url('productos/categorias/') . $cat->slug; ?>"><?php echo $cat->categoria; ?></a></li>

      <?php endforeach; ?>

	</ul>

	<!-- 					
	<h5 class="font-weight-bold pt-5">Tags</h5>
	<div class="mb-3 pb-1">
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Nike</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Travel</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Sport</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">TV</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Books</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Tech</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Adidas</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Promo</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Reading</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Social</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Books</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">Tech</span></a>
		<a href="#"><span class="badge badge-dark badge-sm badge-pill text-uppercase px-2 py-1 mr-1">New</span></a>
	</div> 
	-->

	<!-- 					
	<div class="row mb-5">
		<div class="col">
			<h5 class="font-weight-bold pt-5">Top Rated Products</h5>
			<ul class="simple-post-list">
				<li>
					<div class="post-image">
						<div class="d-block">
							<a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>">
								<img alt="" width="60" height="60" class="img-fluid" src="img/products/product-grey-1.jpg">
							</a>
						</div>
					</div>
					<div class="post-info">
						<a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>">Photo Camera</a>
						<div class="post-meta text-dark font-weight-semibold">
							$299
						</div>
					</div>
				</li>
				<li>
					<div class="post-image">
						<div class="d-block">
							<a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>">
								<img alt="" width="60" height="60" class="img-fluid" src="img/products/product-grey-4.jpg">
							</a>
						</div>
					</div>
					<div class="post-info">
						<a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>">Luxury bag</a>
						<div class="post-meta text-dark font-weight-semibold">
							$199
						</div>
					</div>
				</li>
				<li>
					<div class="post-image">
						<div class="d-block">
							<a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>">
								<img alt="" width="60" height="60" class="img-fluid" src="img/products/product-grey-8.jpg">
							</a>
						</div>
					</div>
					<div class="post-info">
						<a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>">Military Rucksack</a>
						<div class="post-meta text-dark font-weight-semibold">
							$49
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div> 
	-->


</aside>