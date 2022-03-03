<!-- elements-process -->
<div class="container">
    <?php if(strlen($bloque->texto1) > 5): ?>
        <div class="row">
            <div class="col">
                <h4 class="mb-2 mt-5"><?php echo $bloque->texto1; ?></h4>
            </div>
        </div>
    <?php endif; ?>
    <?php
        if(count($componentes) > 0): 
            $i = 1;
            $delay = 200;
            foreach ($componentes as $comp):
                ?>
            <div class="process process-vertical py-4">
                <div class="process-step appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="<?php echo $delay; ?>">
                    <div class="process-step-circle">
                        <strong class="process-step-circle-content"><?php echo $i; ?></strong>
                    </div>
                    <div class="process-step-content">
                        <h4 class="mb-1 text-4 font-weight-bold"><?php echo $comp->texto1; ?></h4>
                        <p class="mb-0"><?php echo $comp->texto2; ?></p>
                    </div>
                </div>
             </div>
             <?php 
                $i++;
                $delay = $delay + 200;
            endforeach;
        endif; 
        ?>
 </div>

