<?php  //echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' ?>

<!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>Productos</h1>
                <span>Hacé tu pedido de los productos más frescos</span>
                <ol class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <!-- <li class="active">Shop</li> -->
                </ol>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
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
                                    <a href="#"><img src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen  ?>" alt="Slim Fit Chinos"></a>
                                    <a href="#"><img src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen2  ?>" alt="Slim Fit Chinos"></a>
                                    <?php if ($prod->precioOF != 0) : ?>
                                        <div class="sale-flash">Oferta</div>                       
                                    <?php  endif ?>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#"><?php echo $prod->titulo ?></a></h3></div>
                                    <?php if ($prod->precioOF != 0) : ?>
                                       <div class="product-price">$ <?php echo  '<del>' . $prod->precioLista . '</del>  $ <ins>' . $prod->precioOF . '</ins>' ?></div>
                                    <?php  endif ?>
                                    <?php if ($prod->precioOF == 0) : ?>
                                       <div class="product-price">$ <?php echo  $prod->precioLista ?></div>
                                    <?php  endif ?>

<!--
                                       <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                    -->
                                </div>
                            </div>
            <?php endforeach;  ?>  
            </div><!-- #shop end -->        
        </div><!-- .postcontent end -->
                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4>Categorias</h4>
                                <ul>
                                <?php foreach ($categorias as $cat) : ?>
                                    <?php if ($cat->catpadre_id == null) : ?>
                                        <li><a href="#"><?php echo $cat->categoria?></a></li>
                                    <?php endif; ?>   
                                <?php endforeach; ?>
                                </ul>

                            </div>
                      </div>

                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                         var ocClients = $("#oc-clients-full");
                                ocClients.owlCarousel({
                                items: 1,
                                margin: 10,
                                loop: true,
                                nav: false,
                                autoplay: true,
                                dots: false,
                                autoplayHoverPause: true
                                        });
                                    });
                    </script>
                            </div>
                        </div>
                    </div><!-- .sidebar end -->
                </div>
            </div>

        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="col_one_third">
                            
                            <div class="widget clearfix">

                                <img src="images/footer-widget-logo.png" alt="" class="footer-logo">

                                <h4> Vitello Carnes</h4> 
                                <strong>Boutique</strong> 

                                <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                    <address>
                                        <strong>Dirección:</strong><br>
                                        Av. Mitre  599<br>
                                        Rafaela,  CP 2300 - Santa Fe<br>
                                    </address>
                                    <abbr title="Phone Number"><strong>Phone:</strong></abbr> (99) 999 9999<br>
                                    <abbr title="Email Address"><strong>Email:</strong></abbr> vitello.carnes.rafaela@gmail.com
                                </div>

                            </div>

                        </div>
<!-- 
                        <div class="col_one_third">
                            
                            <div class="widget widget_links clearfix">

                                <h4>Blogroll</h4>

                                <ul>
                                    <li><a href="http://codex.wordpress.org/">Documentation</a></li>
                                    <li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
                                    <li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
                                    <li><a href="http://wordpress.org/support/">Support Forums</a></li>
                                    <li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
                                    <li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
                                    <li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
                                </ul>

                            </div>

                        </div>

                       <div class="col_one_third col_last">

                            <div class="widget clearfix">
                                <h4>Recent Posts</h4>

                                <div id="post-list-footer">
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>10th July 2014</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>10th July 2014</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>10th July 2014</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                                
                    <div class="col_one_third col_last">

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <div class="row">

                                <div class="col-md-6 bottommargin-sm">
                                    <div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                    <h5 class="nobottommargin">Total Downloads</h5>
                                </div>

                                <div class="col-md-6 bottommargin-sm">
                                    <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                    <h5 class="nobottommargin">Clients</h5>
                                </div>

                            </div>

                        </div>
-->
                        <div class="widget subscribe-widget clearfix">
                            <h5><strong>Subscribite</strong> para recibir novedades</h5>
                            <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Subscribite</button>
                                    </span>
                                </div>
                            </form>
                            <script type="text/javascript">
                                $("#widget-subscribe-form").validate({
                                    submitHandler: function(form) {
                                        $(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                        $(form).ajaxSubmit({
                                            target: '#widget-subscribe-form-result',
                                            success: function() {
                                                $(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                                $('#widget-subscribe-form').find('.form-control').val('');
                                                $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                                                SEMICOLON.widget.notifications($('#widget-subscribe-form-result'));
                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <div class="row">

                                <div class="col-md-6 clearfix bottommargin-sm">
                                    <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                                </div>
                                <div class="col-md-6 clearfix">
                                    <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-rss"></i>
                                        <i class="icon-rss"></i>
                                    </a>
                                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                        <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <a href="#" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-vimeo">
                                <i class="icon-vimeo"></i>
                                <i class="icon-vimeo"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-github">
                                <i class="icon-github"></i>
                                <i class="icon-github"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-yahoo">
                                <i class="icon-yahoo"></i>
                                <i class="icon-yahoo"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                        </div>

                        <div class="clear"></div>

                        <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>

</body>
</html>