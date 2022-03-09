<!-- Porto original elements-pricing-tables ----
Son 4 etiquetas,la 3ra destacada. funciona con los componentes y el botón va al contacto-->
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <?php if(strlen($bloque->texto1) > 5): ?>
                <h4 class="mb-2"><strong><?php echo $bloque->texto1; ?></strong></h4>
            <?php endif; ?>   
        </div>
    </div>
    <?php if(count($componentes) > 0):  
        $i = 0;  ?>
        <div class="pricing-table pricing-table-no-gap mb-4">
            <?php  foreach ($componentes as $comp): ?>
                 <div class="col-md-6 col-lg-3">
                    <?php if($i == 2): ?>  
                        <div class="plan plan-featured">
                            <div class="plan-header bg-primary"> 
                    <?php else: ?>                              
                        <div class="plan">
                            <div class="plan-header">
                    <?php endif; ?> 
                        <h3><?php echo $comp->texto1; ?></h3>
                    </div>
                        <div class="plan-price">
                            <span class="price"><span class="price-unit">$</span><?php echo $comp->texto2; ?></span>
                            <label class="price-label">ANUAL</label>
                        </div>
                        <div class="plan-features">
                            <ul>
                                 <li><?php echo $comp->texto3; ?></li>
                                 <li><?php echo $comp->texto4; ?></li>
                                <li><?php echo $comp->texto5; ?></li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <?php if($i == 2): ?>  
                                <a href="<?php echo base_url('/contacto')?>" class="btn btn-primary btn-modern py-2 px-4">Contactanos</a>
                            <?php else: ?>                              
                                <a href="<?php echo base_url('/contacto')?>" class="btn btn-dark btn-modern btn-outline py-2 px-4">Contactanos</a>
                            <?php endif; ?> 
                            
                        </div>
                    </div>
                </div>
        <?php      $i++;
        endforeach; ?>
    </div>
    <?php endif; ?>   
</div>

