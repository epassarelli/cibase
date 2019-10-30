<section id="servicios" class="page-section full-screen section dark nopadding nomargin noborder ohidden" style="background-color: rgb(34, 34, 34); height: 907px;">
	<div class="vertical-middle" style="position: absolute; top: 50%; width: 100%; padding-top: 0px; padding-bottom: 0px; margin-top: -310.5px;">
		<div class="container clearfix">

			<div class="heading-block center bottommargin-lg">
				<h2>Servicios</h2>
				<!-- <span>We provide wide range of Flexible &amp; Useful Services.</span> -->
			</div>

			<?php if(count($servicios) > 0 ): ?>

			
				<?php 
				$i = 1;
				foreach ($servicios as $s): 

					// Si es el tercero modifico clase
					$clase = fmod($i,3)==0 ? "col_one_third" : "col_one_third col_last";
				?>

				<div class="<?php echo $clase; ?>">
					<div class="feature-box fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-ok"></i></a>
						</div>
						<h3><?php echo $s->titulo; ?></h3>
						<p><?php echo $s->descripcion; ?></p>
					</div>
				</div>

				<?php 
					if(fmod($i,3)==0) echo '<div class="clear"></div>';
					$i++;
				endforeach; 
				?>


			<?php endif; ?>	


		</div>
	</div>
</section>