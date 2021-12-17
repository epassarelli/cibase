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
                    </div>       
                </div>
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

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
