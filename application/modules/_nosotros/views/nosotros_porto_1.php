<section class="section section-no-background section-no-border mt-md section-footer" id="nosotros">
	<div class="container">
		<div class="row mt-xl">

			<?php foreach ($nosotros as $n): ?>

				<div class="col-md-4">
					<?php if($n->imagen !== ''): ?>
					
						<img class="img-responsive" src="<?php echo site_url('assets/images/nosotros/') . $n->imagen; ?>" alt="Foto">
					
					<?php endif; ?>

					<div class="recent-posts mt-md mb-lg">
						<article class="post">
							<h4><?php echo $n->titulo; ?></h4>
							<h5><?php echo $n->subtitulo; ?></h5>
							<p><?php echo $n->descripcion; ?></p>

						</article>
					</div>
					
				</div>

			<?php endforeach ?>

		</div>
	</div>
</section>