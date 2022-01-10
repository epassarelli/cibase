<!-- =========index-classic-color====================== -->
<?php if(count($componentes) > 0): ?>
<div class="container">
<div class="row">
	<div class="col">
		
		<div class="my-4 lightbox appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
			<div class="owl-carousel owl-theme pb-3" data-plugin-options="{'items': 4, 'margin': 35, 'loop': false}">
			
			<?php foreach ($componentes as $comp): ?>
            
				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$comp->imagen; ?>" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3"><?php echo $comp->texto1; ?></span>
								<span class="thumb-info-type"><?php echo $comp->texto2; ?></span>
							</span>
							<span class="thumb-info-action">
								<a href="<?php echo $comp->texto2; ?>" target="_blank">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$comp->imagen; ?>" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

			<?php endforeach; ?>

<!-- 				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-1.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto Watch</span>
								<span class="thumb-info-type">Media</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-1.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Identity</span>
								<span class="thumb-info-type">Logo</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto Screens</span>
								<span class="thumb-info-type">Website</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Three Bottles</span>
								<span class="thumb-info-type">Logo</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Company T-Shirt</span>
								<span class="thumb-info-type">Brand</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-6.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Mobile Mockup</span>
								<span class="thumb-info-type">Website</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-6.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-7.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto Label</span>
								<span class="thumb-info-type">Media</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-7.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-23.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Business Folders</span>
								<span class="thumb-info-type">Logo</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-23.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-24.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Tablet Screen</span>
								<span class="thumb-info-type">Website</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-24.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-25.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Black Watch</span>
								<span class="thumb-info-type">Media</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-25.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div>

				<div class="portfolio-item">
					<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-26.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Monitor Mockup</span>
								<span class="thumb-info-type">Website</span>
							</span>
							<span class="thumb-info-action">
								<a href="portfolio-single-wide-slider.html">
									<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
								</a>
								<a href="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')); ?>/componentes/c5ac6-cliente04-26.jpg" class="lightbox-portfolio">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
				</div> -->

			</div>
		</div>
	</div>
</div>
</div>
<?php endif; ?>