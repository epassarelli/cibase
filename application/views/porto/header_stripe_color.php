<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
  <div class="header-body border-top-0">
    <div class="header-container container">
      <div class="header-row">
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo mt-0 mb-0">
              <a href="<?php echo site_url(); ?>">
                <img alt="Porto" width="190" height="60" data-sticky-width="130" data-sticky-height="40" src="<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/'.$this->session->userdata('logo')); ?>">
              </a>
            </div>
          </div>
        </div>
        <div class="header-column justify-content-end">
          <div class="header-row">
            <div class="header-nav header-nav-stripe">
              <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                <nav class="collapse">
                  <ul class="nav nav-pills" id="mainNav">
                  <?php 
					          // Mientras haya módulos recorro y agrego items
					          foreach ($this->session->userdata('items') as $m){
					            $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
					            echo "<li class='dropdown dropdown-full-color dropdown-primary gradientBRD2'><a  class='dropdown-item dropdown-toggle' href='" . $preSlug . '' . $m['slug'] . "'><div>" . $m['titulo'] . "</div></a>";
					          }
				          ?> 
                  </ul>
                </nav>
              </div>
              <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
                <a href="<?php echo site_url('productos/carrito'); ?>">
									<img src="<?php echo site_url('assets/themes/porto76/img/icons/icon-cart-big.svg'); ?>" height="34" alt="" class="header-nav-top-icon-img">
									<span class="cart-info">
										<span class="cart-qty"><?php echo $_SESSION['carrito'][0]['cantidad']?></span>
									</span>
								</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</header>