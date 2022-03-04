<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="<?php echo site_url(); ?>">
								<img alt="<?php echo "Logo de ". $this->session->userdata('logo'); ?>" width="190" height="60" data-sticky-width="82" data-sticky-height="60" data-sticky-top="84" src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/'.$this->session->userdata('logo')); ?>" data-sticky-top="33">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row pt-3">
						<nav class="header-nav-top">
							<ul class="nav nav-pills">
								<li class="nav-item nav-item-anim-icon d-none d-md-block">
									<a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i> About Us</a>
								</li>
								<li class="nav-item nav-item-anim-icon d-none d-md-block">
									<a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> Contact Us</a>
								</li>
								<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
									<span class="ws-nowrap"><i class="fas fa-phone"></i> (123) 456-789</span>
								</li>
							</ul>
						</nav>
						<div class="header-nav-features">
							<div class="header-nav-feature header-nav-features-search d-inline-flex">
								<a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
								<div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
									<form role="search" action="page-search-results.html" method="get">
										<div class="simple-search input-group">
											<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
											<span class="input-group-append">
												<button class="btn" type="submit">
													<i class="fa fa-search header-nav-top-icon"></i>
												</button>
											</span>
										</div>
									</form>
								</div>
							</div>
							<div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
								<a href="<?php echo site_url('productos/carrito'); ?>">
									<img src="<?php echo site_url('assets/themes/porto76/img/icons/icon-cart-big.svg'); ?>" height="34" alt="" class="header-nav-top-icon-img">
									<span class="cart-info">
										<span class="cart-qty"><?php echo $_SESSION['carrito'][0]['cantidad']?></span>
									</span>
								</a>
<!-- 								<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
									<ol class="mini-products-list">
										<li class="item">
											<a href="#" title="Camera X1000" class="product-image"><img src="img/products/product-1.jpg" alt="Camera X1000"></a>
											<div class="product-details">
												<p class="product-name">
													<a href="#">Camera X1000 </a>
												</p>
												<p class="qty-price">
													 1X <span class="price">$890</span>
												</p>
												<a href="#" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
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
								</div> -->
							</div>
						</div>
					</div>
					<div class="header-row">
						<div class="header-nav pt-1">
							<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
									<?php 
					          // Mientras haya módulos recorro y agrego items
					          foreach ($this->session->userdata('items') as $m){
					            $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
					            echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a>";
					          }
				          ?> 
				        	</ul>
								</nav>
							</div>
							<ul class="header-social-icons social-icons d-none d-sm-block">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
								<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>