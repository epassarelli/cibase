<!--==avada_list_01.html/ original: index.html=== -->
<div class="container clearfix">

<div class="row topmargin-lg bottommargin-sm">

    <div class="heading-block center">
        <h2><?php echo $bloques->texto1; ?></h2>
        <span class="divcenter"><?php echo $bloques->texto2; ?></span>
    </div>
<!--==3 componentes izquierda== -->
    <div class="col-md-4 col-sm-6 bottommargin">
        <?php for ($i = 0; $i <= 3; $i++) : ?> 
            <div class="feature-box fbox-right topmargin" data-animate="fadeIn">
                <div class="fbox-icon"> 
                    <a href="#"><?php echo $comp->icono; ?></i></a>
                </div>
                <h3><?php echo $comp->texto1; ?></h3>
                <p><?php echo $comp->texto2 ; ?></p>
            </div>
        <?php endforeach; ?>   
    </div>
<!--==imagen del bloque en centro== -->
    <div class="col-md-4 hidden-sm bottommargin center">
        <img src=<?php echo $comp->imagen; ?> alt=<?php echo $comp->imagen; ?>>
    </div>
<!--==3 componentes derecha== -->
    <div class="col-md-4 col-sm-6 bottommargin">
        <?php for ($i = 0; $i <= 3; $i++) : ?> 
            <div class="feature-box topmargin" data-animate="fadeIn">
                <div class="fbox-icon">
                    <a href="#"><?php echo $comp->icono; ?></i></a>
                </div>
                <h3><?php echo $comp->texto1; ?></h3>
                <p><?php echo $comp->texto2 ; ?></p>
            </div>
        <?php endforeach; ?>   
    </div>

</div>
</div>

