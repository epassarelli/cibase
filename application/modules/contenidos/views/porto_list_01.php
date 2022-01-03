<!-- =========index-classic-color====================== -->
<div class="row pt-3">
    <?php
    if(count($componentes) > 0): 
        $i = 0;
        foreach ($componentes as $comp):
            $i++;
            $resto = $i % 3;

                if($resto == 0){ 
                    echo '</div><div class="row mt-lg-4 pb-5">'; 
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
            endforeach;
    endif; 
    ?>

</div>				
