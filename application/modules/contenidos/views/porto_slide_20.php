<div class="container">        
        <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
        <?php $primera = 0; ?>
        <?php foreach ($componentes as $comp): ?>
          <?php if ($primera == 0): ?> 
              <li data-target="#demo" data-slide-to="<?php echo $primera; ?>" class="active"></li>
          <?php endif; ?>
          <?php if ($primera != 0): ?> 
              <li data-target="#demo" data-slide-to="<?php echo $primera; ?>"></li>
          <?php endif; ?>
        <?php $primera = $primera + 1; ?>
        <?php endforeach; ?>
        </ul>

 
        <!-- The slideshow -->
        <div class="carousel-inner">
        <?php $primera = 0; ?>
        <?php foreach ($componentes as $comp): ?>
          <?php if ($primera == 0): ?> 
              <div class="carousel-item active">
<<<<<<< HEAD
                <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$comp->imagen; ?>" width=100% height=auto alt="">
=======
                <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$comp->imagen; ?>" alt="Chicago">
>>>>>>> carrito
                 <div class="carousel-caption">
                    <h3 style="color: white;"><?php echo $comp->texto1; ?></h3>
                    <p style="color: orange;"><?php echo $comp->texto2; ?></p>
                </div>
              </div>
          <?php endif; ?>    
          <?php if ($primera != 0): ?> 
              <div class="carousel-item">
<<<<<<< HEAD
                <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$comp->imagen; ?>" width=100% height=auto alt="">
=======
                <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id')) .'/componentes/'.$comp->imagen; ?>" alt="Chicago">
>>>>>>> carrito
                 <div class="carousel-caption">
                    <h3 style="color: white;"><?php echo $comp->texto1; ?></h3>
                    <p style="color: orange;"><?php echo $comp->texto2; ?></p>
                </div>
              </div>
          <?php endif; ?>    

        <?php $primera = $primera + 1; ?>
        <?php endforeach; ?> 
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

        </div>
</div>        