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
                <li><i class="icon-calendar3"></i> 1999</li>
                <li><a href="#"><i class="icon-user"></i> Claudia Hasanbegovic</a></li>
                <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
<!--                 <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
                <li><a href="#"><i class="icon-camera-retro"></i></a></li> -->
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

                <?php echo nl2br($articulo->resumen); ?>
                <p></p>
                <!-- Post Single - Content End -->

                <!-- Portada
                ============================================= -->
                <div class="tagcloud clearfix bottommargin">
                    <div class="row">
                        <div class="col-md-3">
                            
                            <img src="<?php echo site_url('assets/uploads/claudia/publicaciones/') . $articulo->portada; ?>">
                            
                        </div>
                        <div class="col-md-9">
                            <p>
                            Editorial: <?php echo $articulo->editorial; ?>
                            <br>Editor: <?php echo $articulo->editor; ?>
                            <br>ISBN: <?php echo $articulo->isbn; ?>
                            <br>Páginas: <?php echo $articulo->paginas; ?>
                            <br>Formato: <?php echo $articulo->formato; ?>
                            </p>

                        </div>    

                    </div>
                </div><!-- .portada end -->

                <div class="clear"></div>

                <!-- Tag Cloud
                ============================================= -->
                <div class="tagcloud clearfix bottommargin">
                    <a href="#">general</a>
                    <a href="#">information</a>
                    <a href="#">media</a>
                    <a href="#">press</a>
                    <a href="#">gallery</a>
                    <a href="#">illustration</a>
                </div><!-- .tagcloud end -->

                <div class="clear"></div>

                <!-- Post Single - Share
                ============================================= -->
                <div class="si-share noborder clearfix">
                    <span>Share this Post:</span>
                    <div>
                        <a href="#" class="social-icon si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
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
                    </div>
                </div><!-- Post Single - Share End -->

            </div>
          </div><!-- .entry end -->
        </div>
      </div>










      <!-- Sidebar
      ============================================= -->
      <div class="sidebar nobottommargin col_last clearfix">
          <div class="sidebar-widgets-wrap">

            <div class="widget clearfix">

                <h4>Relacionadas</h4>

                <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                  <div class="tab-container">

                    <div class="tab-content clearfix" id="tabs-1">
                      <div id="popular-post-list-sidebar">

                        <div class="spost clearfix">

                          <div class="entry-c">

                            <?php if(count($relacionados)>0): ?>

                              <?php foreach ($relacionados as $r): ?>

                                <div class="entry-title">
                                    <h4><a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $r->slug; ?>"><?php echo $r->titulo; ?></a></h4>
                                    <br>
                                </div>

                              <?php endforeach; ?>

                            <?php endif; ?>

                          </div>

                        </div>

                      </div>
                    </div>

                </div>

              </div>

            </div>


        </div>

      </div><!-- .sidebar end -->










    </div>
  </div>
</section>