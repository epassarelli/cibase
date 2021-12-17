<!--==avada_doscol_01 -Index.html=== -->
<section id="content">
    <div class="content-wrap">

<div class="container clearfix">
    <div class="row clearfix">

        <div class="col-lg-5">
            <div class="heading-block topmargin">
                <h1><?php echo $bloque->texto1; ?></h1>
            </div>
            <p class="lead"><?php echo $bloque->texto2; ?></p>
        </div>

        <div class="col-lg-7">

            <div style="position: relative; margin-bottom: -60px; height: 567px;" class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183">
                <!-- <img src="images/services/main-fbrowser.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Chrome" class="fadeInUp animated"> -->
                <img src="<?php echo site_url('assets/uploads/').$this->config->item('sitio_id').'/bloques/'.$bloque->imagen;?>" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100">
                <!-- <img src="images/services/main-fmobile.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="iPad" class="fadeInUp animated"> -->
            </div>

        </div>

    </div>
</div>

    </div>
</section>