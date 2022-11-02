<!-- avada blog grid 2 col 
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?php echo $bloque->texto1; ?></h1>
                <span><?php echo $bloque->texto2; ?></span>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Posts  
                    ============================================= -->
                <?php
                    if(count($componentes) > 0): 
                    $i = 0;
                    foreach ($componentes as $comp):
                        $i++;
                ?>

                    <div id="posts" class="post-grid grid-2 clearfix">

                        <div class="entry clearfix">
                            <div class="entry-image">
                                <a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="<?php echo site_url('assets/uploads/').$this->config->item('sitio_id').'/componentes/'.$comp->imagen;?>"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="blog-single.html"><?php echo $comp->texto1; ?></a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> <?php echo $comp->texto2; ?></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p><?php echo $comp->texto5; ?></p>
                                <a href="blog-single.html"class="more-link">Leer más</a>
                            </div>
                        </div>
                    </div>

                <?php 
                endforeach;

                endif; 
                ?>

                </div>
            </div>
        </section>
