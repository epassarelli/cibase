<!-- porto index-classic-video -->
<section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
	<div class="container">
		
		<div class="row">
			<div class="col">
				<h2 class="font-weight-normal text-center text-6 pb-3"><?php echo $bloque->texto1; ?></h2>
			</div>
		</div>
		
		<div class="row mb-lg-4">
        <?php
        if(count($componentes) > 0): 
            $i = 0;
            foreach ($componentes as $comp):
                
                $resto = $i % 3;

                    if($resto == 0){ 
                        echo '</div><div class="row">'; 
                    }
                ?>

    			<div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
    				<div class="feature-box feature-box-style-2">
    					<div class="feature-box-icon">
    						<?php echo $comp->icono; ?>
    					</div>
    					<div class="feature-box-info">
    						<h4 class="font-weight-bold mb-2"><?php echo $comp->texto1; ?></h4>
    						<p><?php echo $comp->texto2; ?></p>
    					</div>
    				</div>
    			</div>

                <?php 
                $i++;
                endforeach;
        endif; 
        ?>

		</div>

	</div>
</section>
