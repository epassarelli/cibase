<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">

      <!-- Post Content
      ============================================= -->
      <div class="postcontent nobottommargin clearfix">

          <!-- Posts
          ============================================= -->
          <div id="posts">

          <?php if(count($articulos) > 0): ?>
              
            <?php foreach ($articulos as $art): ?>  

              <div class="entry clearfix">
                <!--
                <div class="entry-image">
                    <a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
                </div>
                -->

                <div class="entry-title">
                    <h2><a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $art->slug; ?>"><?php echo $art->titulo; ?></a></h2>
                </div>
                <!--
                <ul class="entry-meta clearfix">
                    <li><i class="icon-calendar3"></i> 10th February 2014</li>
                    <li><a href="#"><i class="icon-user"></i> admin</a></li>
                    <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
                    <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                </ul> 
                -->
                <div class="entry-content">
                    <p><?php echo substr($art->resumen, 0, 300) . ' ...'; ?></p>
                    <a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $art->slug; ?>"class="more-link">Leer más</a>
                </div>
              </div>
            
            <?php endforeach; ?>

          <?php else: ?>

              <p>No hemos encontrado articulos para la categoria especificada</p>

          <?php endif; ?>


          </div><!-- #posts end -->

      </div><!-- .postcontent end -->

      <!-- Sidebar
      ============================================= -->
      <div class="sidebar nobottommargin col_last clearfix">
          <div class="sidebar-widgets-wrap">

            <div class="widget clearfix">

                <h4>Otras categorias</h4>

                <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                  <div class="tab-container">

                    <div class="tab-content clearfix" id="tabs-1">
                      <div id="popular-post-list-sidebar">

                        <div class="spost clearfix">

                          <div class="entry-c">

                            <?php if(count($otrasCategorias)>0): ?>

                              <?php foreach ($otrasCategorias as $c): ?>

                                <div class="entry-title">
                                    <h4><a href="<?php echo site_url().$c->slug; ?>"><?php echo $c->categoria; ?></a></h4>
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

</section><!-- #content end