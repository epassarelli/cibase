<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
	
	<div class="header-body border-color-primary border-bottom-0 box-shadow-none" data-sticky-header-style="{'minResolution': 0}" data-sticky-header-style-active="{'background-color': '#f7f7f7'}" data-sticky-header-style-deactive="{'background-color': '#FFF'}">
		
		<div class="header-top header-top-borders">
			<div class="container h-100">
				<div class="header-row h-100">

					<div class="header-column justify-content-start">
						<div class="header-row">
							<nav class="header-nav-top">
								<ul class="nav nav-pills">
									<li class="nav-item nav-item-borders py-2">
										<span class="pl-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i> <?php echo $this->session->userdata('direccion'); ?></span>
									</li>
									<li class="nav-item nav-item-borders py-2 d-none d-lg-inline-flex">
										<a href="tel:<?php echo $this->session->userdata('telefono'); ?>"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> <?php echo $this->session->userdata('telefono'); ?></a>
									</li>
									<li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
										<a href="mailto:<?php echo $this->session->userdata('correo'); ?>"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> <?php echo $this->session->userdata('correo'); ?></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					
					<!-- Menú TOP a la derecha  -->
<!-- 					<div class="header-column justify-content-end">
						<div class="header-row">
							<nav class="header-nav-top">
								<ul class="nav nav-pills">
									<li class="nav-item nav-item-anim-icon d-none d-md-block">
										<a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i> About Us</a>
									</li>
									<li class="nav-item nav-item-anim-icon d-none d-md-block">
										<a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> Contact Us</a>
									</li>
								
									<li class="nav-item dropdown nav-item-left-border d-none d-sm-block">
										<a class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<img src="img/blank.gif" class="flag flag-us" alt="English" /> English
											<i class="fas fa-angle-down"></i>
										</a>

										<div class="dropdown-menu" aria-labelledby="dropdownLanguage">
											<a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-us" alt="English" /> English</a>
											<a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-es" alt="English" /> Español</a>
											<a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-fr" alt="English" /> Française</a>
										</div> 
										
									</li>
									
								</ul>
							</nav>
						</div>
					</div> -->
					<!-- FIN menu TOP a la derecha -->

				</div>
			</div>
		</div>
		



		<div class="header-container container">
			<div class="header-row py-2">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="<?php echo site_url(); ?>">
								<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/'.$this->session->userdata('logo')); ?>">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<ul class="header-extra-info d-flex align-items-center mr-3">
							<li class="d-none d-sm-inline-flex">
								<div class="header-extra-info-text">
									<label>ENVIE UN EMAIL</label>
									<strong><a href="mailto:<?php echo $this->session->userdata('correo'); ?>"><?php echo $this->session->userdata('correo'); ?></a></strong>
								</div>
							</li>
							<li>
								<div class="header-extra-info-text">
									<label>LLAMENOS</label>
									<strong><a href="tel:<?php echo $this->session->userdata('telefono'); ?>"><?php echo $this->session->userdata('telefono'); ?></a></strong>
								</div>
							</li>
						</ul>
						
						<!-- Carrito en SESSION -->
						<?php if(parametro(1) == 'S'): ?>

						<div class="header-nav-features">
							<div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex ml-2" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'top': '78px'}" data-sticky-header-style-deactive="{'top': '0'}">
								<a href="<?php echo site_url('productos/carrito'); ?>">
									<img src="<?php echo site_url('assets/themes/porto76/img/icons/icon-cart-big.svg'); ?>" height="34" alt="" class="header-nav-top-icon-img">
									<span class="cart-info">
										<span class="cart-qty">0</span>
									</span>
								</a>
								
								<!-- 
								<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
									<ol class="mini-products-list">
										<li class="item">
											<a href="#" title="Camera X1000" class="product-image"><img src="img/products/product-1.jpg" alt="Camera X1000"></a>
											<div class="product-details">
												<p class="product-name">
													<a href="#">Camara X1000 </a>
												</p>
												<p class="qty-price">
													 1X <span class="price">$ 000</span>
												</p>
												<a href="#" title="Remover este Item" class="btn-remove"><i class="fas fa-times"></i></a>
											</div>
										</li>
									</ol>
									<div class="totals">
										<span class="label">Total:</span>
										<span class="price-total"><span class="price">$890</span></span>
									</div>
									<div class="actions">
										<a class="btn btn-dark" href="#">View Cart</a>
										<a class="btn btn-primary" href="#">Checkout</a>
									</div>
								</div> 
								-->

							</div>
						</div>

						<?php endif; ?>
					<!-- FIN de Carrito en SESSION -->

					</div>
				</div>
			</div>
		</div>



		<div class="container">
			<div class="header-nav-bar bg-color-light-scale-1 mb-3 px-3 px-lg-0">
				<div class="header-row">
					<div class="header-column">
						<div class="header-row justify-content-end">
							<div class="header-nav header-nav-links justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '150px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
								<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-arrow header-nav-main-effect-3 header-nav-main-sub-effect-1">
									<nav class="collapse">
										<ul class="nav nav-pills" id="mainNav">
											<?php 
							          // Mientras haya módulos recorro y agrego items
							          foreach ($this->session->userdata('items') as $m) 
							          {
							            $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
							            echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a>";
							          }

						          ?> 
						          <!-- Item con Dropdown -->
											<!-- 											
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle" href="index.html">
													Home
												</a>
												<ul class="dropdown-menu">
													<li>
														<a class="dropdown-item" href="index.html">
															Landing Page
														</a>
													</li>
													<li class="dropdown-submenu">
														<a class="dropdown-item" href="#">Classic</a>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="index-classic.html" data-thumb-preview="img/previews/preview-classic.jpg">Classic - Original</a></li>
															<li><a class="dropdown-item" href="index-classic-color.html" data-thumb-preview="img/previews/preview-classic-color.jpg">Classic - Color</a></li>
															<li><a class="dropdown-item" href="index-classic-light.html" data-thumb-preview="img/previews/preview-classic-light.jpg">Classic - Light</a></li>
															<li><a class="dropdown-item" href="index-classic-video.html" data-thumb-preview="img/previews/preview-classic-video.jpg">Classic - Video</a></li>
															<li><a class="dropdown-item" href="index-classic-video-light.html" data-thumb-preview="img/previews/preview-classic-video-light.jpg">Classic - Video - Light</a></li>
														</ul>
													</li>

												</ul>
											</li> 
											-->
											<!-- FIN de Item con Dropdown -->

										</ul>
									</nav>
								</div>
								<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
									<i class="fas fa-bars"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>

</header>