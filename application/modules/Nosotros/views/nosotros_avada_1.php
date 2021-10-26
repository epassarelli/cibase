<!-- Site Content
============================================= -->
<section id="<?php echo $slug; ?>" style="padding: 75px 0;">

    <div class="content-wrap">

    <div class="container clearfix" id="cabanas">

    <div class="heading-block center bottommargin-lg">
        <h2><?php echo $titulo; ?></h2>
        <span><?php echo $bajada; ?></span>
    </div>

    <?php foreach ($nosotros as $n): ?>
    
    <!-- <div class="col_one_third nobottommargin"> -->

    <div class="col-xs-4 nobottommargin">
        <div class="feature-box media-box">
            
            <?php if($n->imagen !== ''): ?>
                <div class="fbox-media">
                <a href="#"><img src="<?php echo site_url('assets/images/nosotros/') . $n->imagen; ?>" alt="Quienes"></a>
                </div>
            <?php endif; ?>
            
            <div class="fbox-desc">
                <h3><?php echo $n->titulo; ?><span class="subtitle"><?php echo $n->subtitulo; ?></span></h3>
                <p><?php echo $n->descripcion; ?></p>
            </div>
            
        </div>
    </div>
    
    <?php endforeach ?>


    <div class="clear"></div>

</div>

</div>

</section>