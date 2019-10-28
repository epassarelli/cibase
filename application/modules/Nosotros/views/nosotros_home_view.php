<!-- Site Content
============================================= -->
<section id="nosotros">

    <div class="content-wrap">

<div class="container clearfix" id="cabanas">

    <div class="heading-block center bottommargin-lg">
        <h2>Acerca de nosotros</h2>
        <!-- <span>We provide wide range of Flexible &amp; Useful Services.</span> -->
    </div>


    <div class="col_one_third nobottommargin">
        <div class="feature-box media-box">
            <?php if($nosotros->quienesfoto !== ''): ?>
            <div class="fbox-media">
                <a href="#"><img src="<?php echo site_url('assets/nosotros/images') . $nosotros->quienesfoto; ?>" alt="Quienes"></a>
            </div>
            <?php endif; ?>
            <div class="fbox-desc">
                <h3><?php echo $nosotros->quienestitulo; ?><span class="subtitle"><?php echo $nosotros->quienessubtitulo; ?></span></h3>
                <p><?php echo $nosotros->quienestexto; ?></p>
            </div>
        </div>
    </div>

    <div class="col_one_third nobottommargin">
        <div class="feature-box media-box">
            <?php if($nosotros->nosotrosfoto !== ''): ?>
            <div class="fbox-media">
                 <a href="#"><img src="<?php echo site_url('assets/nosotros/images') . $nosotros->nosotrosfoto; ?>" alt="Mision"></a>
            </div>
            <?php endif; ?>
            <div class="fbox-desc">
                <h3><?php echo $nosotros->nosotrostitulo; ?><span class="subtitle"><?php echo $nosotros->nosotrossubtitulo; ?></span></h3>
                <p><?php echo $nosotros->nosotrostexto; ?></p>
            </div>
        </div>
    </div>

    <div class="col_one_third nobottommargin col_last">
        <div class="feature-box media-box">
            <?php if($nosotros->visionfoto !== ''): ?>
            <div class="fbox-media">
               <a href="#"><img src="<?php echo site_url('assets/nosotros/images') . $nosotros->visionfoto; ?>" alt="Vision"></a>
            </div>
            <?php endif; ?>
            <div class="fbox-desc">
                <h3><?php echo $nosotros->visiontitulo; ?><span class="subtitle"><?php echo $nosotros->visionsubtitulo; ?></span></h3>
                <p><?php echo $nosotros->visiontexto; ?></p>
            </div>
        </div>
    </div>

    <div class="clear"></div>

</div>

</div>

</section>