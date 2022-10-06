<footer id="footer" ">
	<div class=" footer-copyright">
	<div class="container py-2">
		<div class="row py-4">

			<div class="col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
				<a href="<?php echo site_url(); ?>" class="logo pr-0 pr-lg-3">
					<img alt="<?php echo $this->session->userdata('sitio'); ?>" src="<?php echo site_url('assets/uploads/' . $this->config->item('sitio_id') . '/logo_footer.png'); ?>" class="opacity-8" height="33">
				</a>
			</div>

			<div class="col-lg-6 d-flex align-items-center justify-content-center mb-4 mb-lg-0">
				<p><strong><?php echo $this->session->userdata('sitio'); ?></strong> - &copy; Copyright <?php echo date('Y', time()) ?> - Todos los derechos reservados.</p>

			</div>

			<div class="col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-end">
				<p><a href="http://webpass.com.ar" target="_blank">Diseño y desarrollo web</a></p>
			</div>

		</div>
	</div>
	</div>
</footer>