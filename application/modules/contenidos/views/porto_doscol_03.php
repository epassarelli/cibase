<!-- porto index-corporate -->
<hr class="solid my-5">

<div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
	<div class="col-md-8 pr-md-5 mb-5 mb-md-0">
		<h2 class="font-weight-normal text-6 mb-3"><?php echo $bloque->texto1; ?></h2>
		<p class="text-4"><?php echo $bloque->texto2; ?></p>

	</div>
	<div class="col-md-4 px-5 px-md-3">
		<img class="img-fluid scale-2 my-4" src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/bloques/').$bloque->imagen; ?>" alt="style switcher" />
	</div>
</div>