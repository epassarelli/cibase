<?php if(count($componentes) > 0): ?>
    
<div class="row clearfix bottommargin-lg common-height">

    <?php 
    $colores = array('515875','576F9E','6697B9','88C3D8');
    $i = 0;
    foreach ($componentes as $comp): ?>

    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #<?php echo $colores[$i]; ?>;">
        <div>
            <?php echo $comp->icono; ?>
            <div class="counter counter-lined">
                <span data-from="100" data-to="<?php echo $comp->texto1; ?>" data-refresh-interval="50" data-speed="2000"></span>
            </div>
            <h5><?php echo $comp->texto2; ?></h5>
        </div>
    </div>

    <?php 
    $i++;
    endforeach; 
    ?>

</div>

<?php endif; ?>