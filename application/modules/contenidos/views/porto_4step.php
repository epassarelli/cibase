<!-- elements-process -->
<div class="container py-2">
    <?php if(strlen($bloque->texto1) > 5): ?>
        <div class="row">
            <div class="col">
                <h4 class="mb-2"><?php echo $bloque->texto1; ?></h4>
            </div>
        </div>
    <?php endif; ?>
    <div class="row process mt-5">
        <?php
            if(count($componentes) > 0): 
                $i = 1;
                $delay = 200;
                foreach ($componentes as $comp):
        ?>
                    <div class="process-step col-md-6 col-lg-3 mb-5 mb-md-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="<?php echo $delay; ?>">
                        <div class="process-step-circle">
                            <strong class="process-step-circle-content"><?php echo $i; ?></strong>
                        </div>
                        <div class="process-step-content">
                            <h4 class="mb-0 text-4 font-weight-bold"><?php echo $comp->texto1; ?></h4>
                            <p class="mb-0"><?php echo $comp->texto2; ?></p>
                        </div>
                    </div>
                    <?php 
                    $i++;
                    $delay = $delay + 200;
                endforeach;
            endif; 
        ?>
     </div>   
</div>