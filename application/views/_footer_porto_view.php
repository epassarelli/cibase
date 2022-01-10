<footer id="footer">

	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				
			<div class="col-md-1">
					<?php if($this->session->userdata('qr') !== ''): ?>

                        <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/'.$this->session->userdata('qr')); ?>" alt="QR"  class="img-responsive">

                    <?php endif; ?>

				</div>
				
				<div class="col-md-7">
					<p>&copy;  Copyright <?php echo date('Y',time())?> - Todos los derechos reservados.</p>
				</div>
				
				<div class="col-md-4">
					<nav id="sub-menu">
						<ul>
			                <?php                     
			                    // Mientras haya módulos recorro y agrego items
			                    foreach ($this->session->userdata('items') as $m) {
			                        $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
			                        # code...
			                        //if($m['menu']){
			                            //$preSlug = ($landing) ? '#' : site_url();
			                        echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'>" . $m['titulo'] . "</a> </li>";
			                        //}
			                    }
			                ?> 
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</div>

</footer>