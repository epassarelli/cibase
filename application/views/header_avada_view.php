<!-- Header
============================================= -->
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

  <div id="header-wrap">

    <div class="container clearfix">

      <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

      <!-- Logo
      ============================================= -->
      <div id="logo">
          <a href="index.html" class="standard-logo" data-dark-logo="assets/images/generic-logo.png"><img src="assets/images/generic-logo.png" alt="Generic Logo"></a>
          <a href="index.html" class="retina-logo" data-dark-logo="images/generic-logo@2x.png"><img src="images/generic-logo@2x.png" alt="Logo"></a>
      </div><!-- #logo end -->

      <!-- Primary Navigation
      ============================================= -->
      <nav id="primary-menu">
        <ul>
          <?php 
          
          // Mientras haya módulos recorro y agrego items
          foreach ($this->config->item('modulos') as $m) {
              # code...
              if($m['menu']){
                $preSlug = ($this->config->item('landing')) ? '#' : site_url();
                echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a>";
              }
          }

          ?>                      
        </ul>

      </nav><!-- #primary-menu end -->

    </div>

  </div>

</header><!-- #header end -->
