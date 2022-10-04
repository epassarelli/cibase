<!-- Header
============================================= -->
<header id="header" class="full-header dark">

  <div id="header-wrap">

    <div class="container clearfix">

      <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

      <!-- Logo
      ============================================= -->
      <div id="logo">

        <a href="<?php echo site_url(); ?>" class="standard-logo" data-dark-logo="<?php echo site_url('assets/images/logo.png'); ?>">
          <?php if ($this->session->userdata('logo') !== '') : ?>
            <img src="<?php echo site_url('assets/uploads/' . $this->config->item('sitio_id') . '/' . $this->session->userdata('logo')); ?>" alt="<?php echo $this->session->userdata('sitio'); ?>">
          <?php else : ?>
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
          // Mientras haya módulos recorro y agrego items
          foreach ($this->session->userdata('items') as $m) {
            $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
            # code...
            echo "<li><a href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a></li>";
          }
          ?>

          <?php
          if (parametro(6) == 'S') : // Pregunto si es multiidioma

            switch ($this->session->userdata('site_lang')) {
              case 'spanish':
                echo "<li><img width='24' height='16' src='" . site_url('assets/images/banderas/inglaterra.png') . "'><a href='" . site_url('contenidos/LanguageSwitcher/switchLang/english') . "'> Switch to english</a></li>";
                break;
              case 'english':
                echo "<li><img width='24' height='16' src='" . site_url('assets/images/banderas/argentina.png') . "''><a href='" . site_url('contenidos/LanguageSwitcher/switchLang/spanish') . "'> Cambiar a español</a></li>";
                break;
              default:
                echo "<li><img width='24' height='16' src='" . site_url('assets/images/banderas/inglaterra.png') . "'><a href='" . site_url('contenidos/LanguageSwitcher/switchLang/english') . "'> Switch to english</a></li>";
                break;
            }
          endif;
          ?>


          <?php if ($this->ion_auth->is_admin() and ENVIRONMENT == 'development') : ?>
            <li><a href="#">
                <div>Actual: <?php echo $this->session->userdata('sitio'); ?></div>
              </a>
              <ul>
                <li><a href="<?php echo site_url('contenidos/switchSite/1'); ?>">
                    <div> Cibase</div>
                  </a></li>
                <li><a href="<?php echo site_url('contenidos/switchSite/2'); ?>">
                    <div> Webpass</div>
                  </a></li>
                <li><a href="<?php echo site_url('contenidos/switchSite/3'); ?>">
                    <div> Vitello</div>
                  </a></li>
                <li><a href="<?php echo site_url('contenidos/switchSite/4'); ?>">
                    <div> Claudia</div>
                  </a></li>
                <li><a href="<?php echo site_url('contenidos/switchSite/0'); ?>">
                    <div> Cabañas EI</div>
                  </a></li>
              </ul>
            </li>
          <?php endif; ?>



        </ul>

      </nav><!-- #primary-menu end -->

      <?php //endif; 
      ?>

    </div>

  </div>

</header><!-- #header end -->