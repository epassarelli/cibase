<!-- Header
============================================= -->
<!-- <header id="header" class="transparent-header full-header" data-sticky-class="not-dark"> -->
<header id="header" class="full-header dark">

  <div id="header-wrap">

    <div class="container clearfix">

      <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

      <?php //if($this->config->item('sitio_id') == 4): ?>

        <!-- <h2>Claudia</h2> -->

      <?php //else: ?>

      <!-- Logo
      ============================================= -->
      <div id="logo">
          
          <a href="<?php echo site_url(); ?>" class="standard-logo" data-dark-logo="<?php echo site_url('assets/images/logo.png'); ?>">
              <?php if($this->session->userdata('logo') !== ''): ?>
                <img src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/'.$this->session->userdata('logo')); ?>" alt="<?php echo $this->session->userdata('sitio'); ?>">
              <?php else: ?>
                <img src="<?php echo site_url('assets/images/logo.png'); ?>" alt="Logo">
              <?php endif; ?>           
          </a>

          <!--           
          <a href="<?php echo site_url(); ?>" class="retina-logo" data-dark-logo="<?php echo site_url('assets/images/logo@2x.png'); ?>">
            <img src="<?php echo site_url('assets/images/logo@2x.png'); ?>" alt="Logo">
          </a> 
        -->
      </div><!-- #logo end -->

      <!-- Primary Navigation
      ============================================= -->
      <nav id="primary-menu">
        <ul>
          <?php 
          //echo Run::Modules('menu/main',$seccion_id);
          
          // Mientras haya módulos recorro y agrego items
          foreach ($this->session->userdata('items') as $m) {
            //var_dump($m);
            //echo "<hr>";
            $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
              # code...
              //if($m['menu']){
                //$preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
                echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a></li>";
              //}
          }

          ?>   


          <li><a href="#"><div>Actual: <?php echo $this->session->userdata('sitio'); ?></div></a>
            <ul>                  
              <li><a href="<?php echo site_url('contenidos/switchSite/1'); ?>"><div> Cibase</div></a></li>
              <li><a href="<?php echo site_url('contenidos/switchSite/2'); ?>"><div> Webpass</div></a></li>
              <li><a href="<?php echo site_url('contenidos/switchSite/3'); ?>"><div> Vitello</div></a></li>
              <li><a href="<?php echo site_url('contenidos/switchSite/4'); ?>"><div> Claudia</div></a></li>
            </ul>
          </li>



        </ul>

      </nav><!-- #primary-menu end -->

    <?php //endif; ?>

    </div>

  </div>

</header><!-- #header end -->
