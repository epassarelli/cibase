<!-- porto elements-image-frame -->
<div class="row mt-lg-5">
  <div class="col-lg-6">
  <?php
      if(count($componentes) == 2): ?>

          <h5 class="text-uppercase mt-4"><?php echo $componentes[0]->texto1; ?></h5>
          <span class="thumb-info thumb-info-side-image thumb-info-no-zoom">
            <span class="thumb-info-side-image-wrapper">
              <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$componentes[0]->imagen; ?>"   class="img-fluid" alt="" style="width: 200px;">
            </span>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26257.300585700024!2d-58.636603460624244!3d-34.650597000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc766ccb08501%3A0x8be78c8a0de27125!2sKouro%20Linea%20Fina%20-%20Cuero%20Argentino!5e0!3m2!1ses!2sar!4v1661177578104!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            <span class="thumb-info-caption">
              <span class="thumb-info-caption-text">
                <h5 class="text-uppercase mb-1"> <?php echo $componentes[0]->texto2; ?></h5>
                <p><?php echo $componentes[0]->texto3; ?></p>
              </span>
            </span>
          </span>
        <!-- segundo bloque -->
          <h5 class="text-uppercase mt-4 text-right"><?php echo $componentes[1]->texto1; ?></h5>
          <span class="thumb-info thumb-info-side-image thumb-info-side-image-right thumb-info-no-zoom">
          <span class="thumb-info-side-image-wrapper">
            <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$componentes[1]->imagen; ?>" class="img-fluid" alt="" style="width: 200px;">
          </span>
          <span class="thumb-info-caption">
          <span class="thumb-info-caption-text">
            <h5 class="text-uppercase mb-1"><?php echo $componentes[1]->texto2; ?></h5>
            <p><?php echo $componentes[1]->texto3; ?></p>      </span>
            </span>
          </span>
        </div>
    <?php  endif; 
    ?>
  </div>
  </div>
-->