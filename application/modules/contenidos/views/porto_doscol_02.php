<!-- porto index-corporate -->
<div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
	<div class="col-md-4 mb-4 mb-md-0">
		<img class="img-fluid scale-2 pr-5 pr-md-0 my-4" src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/bloques/').$bloque->imagen; ?>" alt="layout styles" />
	</div>
	<div class="col-md-8 pl-md-5">
		<h2 class="font-weight-normal text-6 mb-3"><?php echo $bloque->texto1; ?></h2>
		<p class="text-4"><?php echo $bloque->texto2; ?></p>
	</div>
</div>