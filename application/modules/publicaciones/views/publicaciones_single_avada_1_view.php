<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<div class="postcontent nobottommargin clearfix">

				<div class="single-post nobottommargin">

					<div class="entry clearfix">

						<div class="entry-title">
							<h2><?php echo $articulo->titulo; ?></h2>
							<hr>
						</div>

						<div class="entry-content notopmargin">

							<p><?php echo str_replace("\n", '</p><p>', $articulo->resumen); ?></p>

							<?php if (intval($articulo->categoria_id) !== 32) : // Categoria 32 = Novedades 
							?>

								<div class="ievent clearfix bottommargin">
									<div class="row">
										<div class="col-md-3">
											<?php if (file_exists('assets/uploads/4/publicaciones/' . $articulo->portada)) : ?>

												<img src="<?php echo site_url('assets/uploads/4/publicaciones/') . $articulo->portada; ?>">

											<?php else : ?>

												<img src="<?php echo site_url('assets/uploads/Imagen-no-disponible.png'); ?>">

											<?php endif; ?>

										</div>
										<div class="col-md-6">
											<p>
												<?php echo $this->lang->line('editorial'); ?>: <?php echo $articulo->editorial; ?>
												<br><?php echo $this->lang->line('editor'); ?>: <?php echo $articulo->editor; ?>
												<br><?php echo $this->lang->line('isbn'); ?>: <?php echo $articulo->isbn; ?>
												<br><?php echo $this->lang->line('paginas'); ?>: <?php echo $articulo->paginas; ?>
												<br><?php echo $this->lang->line('formato'); ?>: <?php echo $articulo->formato; ?>
											</p>

										</div>

										<div class="col-md-3">

											<?php if (strlen($articulo->publicacion) > 5) : ?>
												<a href="<?php echo site_url('assets/uploads/' . $this->config->item('sitio_id') . '/publicaciones/' . $articulo->publicacion); ?>" target="_blank" class="button button-mini"><i class="icon-gift"></i><?php echo $this->lang->line('leerMas'); ?></a>
											<?php endif; ?>

										</div>

									</div>
								</div>

							<?php else : ?>

								<?php if (file_exists('assets/uploads/4/publicaciones/' . $articulo->portada)) : ?>

									<img src="<?php echo site_url('assets/uploads/4/publicaciones/') . $articulo->portada; ?>">

								<?php endif; ?>

								<?php if (strlen($articulo->publicacion) > 5) : ?>

									<p class="text-right">
										<a href="<?php echo site_url('assets/uploads/' . $this->config->item('sitio_id') . '/publicaciones/' . $articulo->publicacion); ?>" target="_blank" class="button button-mini"><i class="icon-gift"></i>::Abrir PDF ::</a>
									</p>

								<?php endif; ?>

							<?php endif; ?>

							<div class="clear"></div>

							<div class="clear"></div>

							<div class="si-share noborder clearfix">
								<span><?php echo $this->lang->line('compartir'); ?>:</span>
								<div>
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" class="social-icon si-borderless si-facebook">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="https://twitter.com/intent/tweet?text=<?php echo current_url(); ?>&url=<?php echo current_url(); ?>" class="social-icon si-borderless si-twitter">
										<i class="icon-twitter"></i>
										<i class="icon-twitter"></i>
									</a>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<?php $this->load->view('publicaciones_sidebar_' . $this->session->userdata('theme') . '_view'); ?>

		</div>
	</div>
</section>