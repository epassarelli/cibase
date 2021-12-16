<!-- 
Siempre me va a venir desde el controller
------------------------------------------
$bloque
$componentes 
-->


<!--==Index.html=== -->
<div class="container clearfix">

    <?php 
    if(count($componentes) > 0): 
        $i == 0;
        foreach ($componentes as $comp):
            $ii++;
            $resto = $i % 3;
            ?>

            <div class="col_one_third <?php if($resto == 0){ echo " col_last"; } ?>">
                <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
                    <div class="fbox-icon">
                        <a href="#"><?php echo $comp->icono; ?></i></a>
                    </div>
                    <h3><?php echo $comp->text1; ?></h3>
                    <p><?php echo $comp->text2; ?></p>
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