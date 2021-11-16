<header id="header" class="header-mobile-nav-only" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
	<div class="header-body">
		<div class="header-container container">
			<div class="header-row">
				
				<div class="header-column">
					<div class="header-logo">
						<a href="index.html">
							<img alt="Porto" width="150" height="60" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="<?php echo site_url('assets/images/logo.png'); ?>">
						</a>
					</div>
				</div>

				<div class="header-column">
					<div class="header-row">
						<div class="header-nav header-nav-stripe">
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
								<i class="fa fa-bars"></i>
							</button>
							<!-- Si Existen Redes sociales las listo
							<ul class="header-social-icons social-icons hidden-xs">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul> 
							-->
							<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
								
								<nav>
									<ul class="nav nav-pills" id="mainNav">

							          <?php
							          echo Run::Modules('menu/main',$seccion_id);		          
							          // Mientras haya módulos recorro y agrego items
										foreach ($items as $m) {
											$preSlug = ($landing) ? '#' : site_url();
							              # code...
							              if($m['menu']){
											$preSlug = ($landing) ? '#' : site_url();
							                echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a>";
							              }
							          	}
							          ?>

									</ul>
								</nav>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>