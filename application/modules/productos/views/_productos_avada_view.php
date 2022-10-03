<!-- #page-title end -->
<section id="content">

<div class="content-wrap">

    <div class="container clearfix">

        <!-- Post Content
        ============================================= -->
        <div class="postcontent nobottommargin">

          <!-- Shop
          ============================================= -->
          <div id="shop" class="product-3 clearfix">
            
            <?php  foreach ($productos as $prod) : ?>

                <div class="product clearfix">
                  <div class="product-image">
                      <a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>"><img src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen  ?> " alt="<?php echo $prod->titulo ?>"></a>
                      <a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>"><img src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen2  ?>" alt="<?php echo $prod->titulo ?>"></a>
                      <?php if ($prod->precioOF != 0) : ?>
                          <div class="sale-flash">Oferta</div>
                      <?php  endif ?>
                      <div class="product-overlay">
                          <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Agregar al carro</span></a>
                          <a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Ver más</span></a>
                      </div>
                  </div>

                  <div class="product-desc center">
                      <div class="product-title"><h3><a href="<?php echo site_url('productos/detalle/').$prod->producto_id; ?>"><?php echo $prod->titulo ?></a></h3></div>
                      <?php if ($prod->precioOF != 0) : ?>
                          <div class="product-price">$ <?php echo  '<del>' . $prod->precioLista . '</del>  $ <ins>' . $prod->precioOF . '</ins>' ?></div>
                      <?php  endif ?>
                      <?php if ($prod->precioOF == 0) : ?>
                          <div class="product-price">$ <?php echo  $prod->precioLista ?></div>
                      <?php  endif ?>
                  </div>
                </div>

            <?php endforeach;  ?>

         </div><!-- #shop end -->
    </div><!-- .postcontent end -->
                    
    <!-- Sidebar
    ============================================= -->
    <div class="sidebar nobottommargin col_last">
      <?php echo $this->load->view('productos_sidebar_' . $this->session->userdata('theme') . '_view'); ?>
    </div>

</div>

</section>