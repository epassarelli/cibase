<!-- Header
============================================= -->
<!-- <header id="header" class="transparent-header full-header" data-sticky-class="not-dark"> -->
<header id="header" class="full-header">

  <div id="header-wrap">

    <div class="container clearfix">

      <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

      <!-- Logo
      ============================================= -->
      <div id="logo">
          <a href="<?php echo site_url(); ?>" class="standard-logo" data-dark-logo="<?php echo site_url('assets/images/logo.png'); ?>">
            <img src="<?php echo site_url('assets/images/logo.png'); ?>" alt="Logo">
          </a>
          <a href="<?php echo site_url(); ?>" class="retina-logo" data-dark-logo="<?php echo site_url('assets/images/logo@2x.png'); ?>">
            <img src="<?php echo site_url('assets/images/logo@2x.png'); ?>" alt="Logo">
          </a>
      </div><!-- #logo end -->

      <!-- Primary Navigation
      ============================================= -->
      <nav id="primary-menu">
        <ul>
          <?php 
          
          // Mientras haya módulos recorro y agrego items
          foreach ($secciones as $m) {
            $preSlug = ($landing) ? '#' : site_url();
              # code...
              if($m['menu']){
                $preSlug = ($landing) ? '#' : site_url();
                echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a>";
              }
          }

          ?>                      
        </ul>

      </nav><!-- #primary-menu end -->

    </div>

  </div>

</header><!-- #header end -->
