<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">

      <!-- Post Content
      ============================================= -->
      <div class="postcontent nobottommargin clearfix">

        <div class="single-post nobottommargin">

          <!-- Single Post
          ============================================= -->
          <div class="entry clearfix">

            <!-- Entry Title
            ============================================= -->
            <div class="entry-title">
              <h2><?php echo $articulo->titulo; ?></h2>
            </div><!-- .entry-title end -->

            <!-- Entry Meta
            ============================================= -->
            <ul class="entry-meta clearfix">
              <!--
                <li><i class="icon-calendar3"></i> 1999</li>
                <li><a href="#"><i class="icon-user"></i> Claudia Hasanbegovic</a></li>
                <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
                <li><a href="#"><i class="icon-camera-retro"></i></a></li> 
                -->
            </ul><!-- .entry-meta end -->

            <!-- Entry Image
            ============================================= -->
            <!-- <div class="entry-image">
                <a href="#"><img src="images/blog/full/1.jpg" alt="Blog Single"></a>
            </div> -->
            <!-- .entry-image end -->

            <!-- Entry Content
            ============================================= -->
            <div class="entry-content notopmargin">

              <?php echo $articulo->resumen; ?>
              <p></p>
              <!-- Post Single - Content End -->

              <!-- Portada
                ============================================= -->
              <div class="ievent clearfix bottommargin">
                <div class="row">
                  <div class="col-md-3">
                    <?php if (file_exists('assets/uploads/4/publicaciones/' . $articulo->portada)) : ?>

                      <img src="<?php echo site_url('assets/uploads/4/publicaciones/') . $articulo->portada; ?>">

                    <?php else : ?>

                      <img src="<?php echo site_url('assets/uploads/Imagen-no-disponible.png'); ?>">

                    <?php endif; ?>

                  </div>
                  <div class="col-md-6">
                    <p>
                      <?php echo $this->lang->line('editorial'); ?>: <?php echo $articulo->editorial; ?>
                      <br><?php echo $this->lang->line('editor'); ?>: <?php echo $articulo->editor; ?>
                      <br><?php echo $this->lang->line('isbn'); ?>: <?php echo $articulo->isbn; ?>
                      <br><?php echo $this->lang->line('paginas'); ?>: <?php echo $articulo->paginas; ?>
                      <br><?php echo $this->lang->line('formato'); ?>: <?php echo $articulo->formato; ?>
                    </p>

                  </div>

                  <div class="col-md-3">

                    <?php if (strlen($articulo->publicacion) > 5) : ?>
                      <a href="<?php echo site_url('assets/uploads/' . $this->config->item('sitio_id') . '/publicaciones/' . $articulo->publicacion); ?>" target="_blank" class="button button-mini"><i class="icon-gift"></i><?php echo $this->lang->line('leerMas'); ?></a>
                    <?php endif; ?>

                  </div>

                </div>
              </div><!-- .portada end -->

              <div class="clear"></div>

              <!-- Tag Cloud
                ============================================= -->
              <!-- <div class="tagcloud clearfix bottommargin">
                    <a href="#">general</a>
                    <a href="#">information</a>
                    <a href="#">media</a>
                    <a href="#">press</a>
                    <a href="#">gallery</a>
                    <a href="#">illustration</a>
                </div> -->
              <!-- .tagcloud end -->

              <div class="clear"></div>

              <!-- Post Single - Share
                ============================================= -->
              <div class="si-share noborder clearfix">
                <span><?php echo $this->lang->line('compartir'); ?>:</span>
                <div>
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" class="social-icon si-borderless si-facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                  </a>
                  <a href="https://twitter.com/intent/tweet?text=<?php echo current_url(); ?>&url=<?php echo current_url(); ?>" class="social-icon si-borderless si-twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                  </a>
                  <!-- 
                        <a href="#" class="social-icon si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-rss">
                            <i class="icon-rss"></i>
                            <i class="icon-rss"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-email3">
                            <i class="icon-email3"></i>
                            <i class="icon-email3"></i>
                        </a> 
                        -->
                </div>
              </div><!-- Post Single - Share End -->

            </div>
          </div><!-- .entry end -->
        </div>
      </div>








      <!-- Sidebar
      ============================================= -->
      <?php $this->load->view('publicaciones_sidebar_' . $this->session->userdata('theme') . '_view'); ?>
      <!-- .sidebar end -->



    </div>
  </div>
</section>