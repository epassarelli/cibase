<div class="container clearfix">

    <?php
    if(count($componentes) > 0): 
        $i = 0;
        foreach ($componentes as $comp):
            $i++;
            $resto = $i % 3;
            ?>

            <div class="col_one_third <?php if($resto == 0){ echo " col_last"; } ?>">
                <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
                    <div class="fbox-icon">
                        <a href="#"><?php echo $comp->icono; ?></a>
                    </div>
                    <h3><?php echo $comp->texto1; ?></h3>
                    <p><?php echo $comp->texto2; ?></p>
                </div>
            </div>

            <?php 
                if($resto == 0){ 
                    echo '<div class="clear"></div>'; 
                }

        endforeach;

    endif; 
    ?>

</div>