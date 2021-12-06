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
                            <div class="entry-image">
                                <a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="<?php echo site_url() . $art->slug; ?>"><?php echo $art->titulo; ?></a></h2>
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
                                <p><?php echo substr($art->resumen, 300) . ' ...'; ?></p>
                                <a href="<?php echo site_url() . $art->slug; ?>"class="more-link">Leer más</a>
                            </div>
                        </div>
                    
                    <?php endforeach; ?>

                <?php else: ?>

                    <p>No hemos encontrado articulos para la categoria especificada</p>

                <?php endif; ?>


                </div><!-- #posts end -->

                <!-- Pagination
                ============================================= -->
                <!--
                <ul class="pager nomargin">
                    <li class="previous"><a href="#">&larr; Older</a></li>
                    <li class="next"><a href="#">Newer &rarr;</a></li>
                </ul> 
                -->
                <!-- .pager end -->

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin col_last clearfix">
                <div class="sidebar-widgets-wrap">

                    <!--
                    <div class="widget widget-twitter-feed clearfix">

                        <h4>Twitter Feed</h4>
                        <ul id="sidebar-twitter-list-1" class="iconlist">
                            <li></li>
                        </ul>

                        <a href="#" class="btn btn-default btn-sm fright">Follow Us on Twitter</a>

                        <script type="text/javascript">
                            jQuery( function($){
                                $.getJSON('include/twitter/tweets.php?username=envato', function(tweets){
                                    $("#sidebar-twitter-list-1").html(sm_format_twitter(tweets));
                                });
                            });
                        </script>

                    </div> 
                    -->

                    <!--                     
                    <div class="widget clearfix">

                        <h4>Flickr Photostream</h4>
                        <div id="flickr-widget" class="flickr-feed masonry-thumbs" data-id="613394@N22" data-count="16" data-type="group" data-lightbox="gallery"></div>

                    </div> -->

                    <div class="widget clearfix">

                        <h4>Otras categorias</h4>

                        <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <div id="popular-post-list-sidebar">

                                        <div class="spost clearfix">

                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                                </div>
                                                <!--
                                                 <ul class="entry-meta">
                                                    <li><i class="icon-comments-alt"></i> 35 Comments</li>
                                                </ul> 
                                                -->
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