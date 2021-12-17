<?php  //echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' ?>

<!-- Page Title
============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Productos</h1>
            <span>La mejor calidad y productos más frescos</span>
            <ol class="breadcrumb">
                 <li><a href="#">Inicio</a></li>
                  <!-- <li class="active">Shop</li> -->
            </ol>
        </div>
    </section>
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
                        <a href="#"><img src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen  ?> " alt="<?php echo $prod->titulo ?>"></a>
                        <a href="#"><img src="<?php echo base_url() . 'assets/uploads/' . $this->config->item('sitio_id') . '/productos/' . $prod->imagen2  ?>" alt="<?php echo $prod->titulo ?>"></a>
                        <?php if ($prod->precioOF != 0) : ?>
                            <div class="sale-flash">50% Off*</div>
                        <?php  endif ?>
                        <div class="product-overlay">
                            <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Agregar al carro</span></a>
                            <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Ver más</span></a>
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
                        <!-- <div class="product-rating">
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star-half-full"></i>
                        </div> -->
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

                                <h4>Categorías</h4>
                                <ul>
                                <?php foreach ($categorias as $cat) : ?>
                                    <?php if ($cat->catpadre_id == null) : ?>
                                        <li><a href="#"><?php echo $cat->categoria?></a></li>
                                    <?php endif; ?>   
                                <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="widget clearfix">

                                <h4>Combos</h4>
                                <div id="post-list-footer">
<!--foreach para prod cat=43 combos  -->
                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#"><img src="images/shop/small/1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Combo</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li class="color">$29.99</li>
                                                <!-- <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .combos -->

                    </div><!-- sidebar -->

    </div>
</div>
</section>
