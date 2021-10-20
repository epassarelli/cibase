<footer id="footer">

	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				
			<div class="col-md-1">
					<a href="index.html" class="logo">
						<img alt="Porto Website Template" class="img-responsive" src="<?php echo site_url('assets/images/logo.png'); ?>">
					</a>
				</div>
				
				<div class="col-md-7">
					<p>&copy;  Copyright <?php echo date('Y',time())?> - Todos los derechos reservados.</p>
				</div>
				
				<div class="col-md-4">
					<nav id="sub-menu">
						<ul>
							<?php			          
							// Mientras haya módulos recorro y agrego items
							foreach ($secciones as $m) {
							$preSlug = ($landing) ? '#' : site_url();
									# code...
									if($m['menu']){
										$preSlug = ($landing) ? '#' : site_url();
										echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'>" . $m['titulo'] . "</a></li>";
									}
								}
							?>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</div>

</footer>