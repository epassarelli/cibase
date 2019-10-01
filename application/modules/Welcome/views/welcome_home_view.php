<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Gaby Aru - Mariano Hiriart" />
    <meta name="Title" content="Caba&ntilde;as Lihuen Cuyen">

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/plugins.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="assets/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="assets/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/include/rs-plugin/css/settings.css" media="screen" />

    <link rel="icon" type="image/png" href="<?php echo site_url(); ?>assets/images/favicon.png" />
 

    <!-- Document Title
    ============================================= -->
    <title>Producto Base</title>

  
</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="index.html" class="standard-logo" data-dark-logo="assets/images/generic-logo.png"><img src="assets/images/generic-logo.png" alt="Generic Logo"></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="images/generic-logo@2x.png"><img src="images/generic-logo@2x.png" alt="Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul>
                            <li><a href="#cabanas"><div>Nosotros</div></a>
                            <li><a href="#servicios"><div>Servicios</div></a>
                            <li><a href="#galeria"><div>Productos</div></a>
                            <li><a href="#contacto"><div>Contacto</div></a>
                           
                        </ul>

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->

       <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark" style="background-image: url('assets/images/slider/01.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">BIENVENIDOS A NUESTRA EMPRESA</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">SEGUNDA LINEA DE REFUERZO</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide dark" style="background-image: url('assets/images/slider/02.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">TITULARES DESTACADOS</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">SUBTITULOS REFORZANDO</p>
                            </div>
                        </div>
                        <!--<div class="video-wrap">
                            <video poster="images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
                                <source src='images/videos/explore.mp4' type='video/mp4' />
                                <source src='images/videos/explore.webm' type='video/webm' />
                            </video>
                            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                        </div>-->
                    </div>
                    <div class="swiper-slide" style="background-image: url('assets/images/slider/03.jpg'); background-position: center top;">
                        <div class="container clearfix">
                            <div class="slider-caption">
                                <h2 data-caption-animate="fadeInUp">TODO EL TEXTO NECESARIO</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Y MUCHO MAS AQUI</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
            </div>

            <script>
                jQuery(document).ready(function($){
                    var swiperSlider = new Swiper('.swiper-parent',{
                        paginationClickable: false,
                        slidesPerView: 1,
                        grabCursor: false,
                        loop: true,
                        onSwiperCreated: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeStart: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeEnd: function(swiper){
                            $('#slider').find('.swiper-slide').each(function(){
                                if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                                if($(this).find('.yt-bg-player').length > 0) { $(this).find('.yt-bg-player').pauseYTP(); }
                            });
                            $('#slider').find('.swiper-slide:not(".swiper-slide-active")').each(function(){
                                if($(this).find('video').length > 0) {
                                    if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
                                }
                                if($(this).find('.yt-bg-player').length > 0) {
                                    $(this).find('.yt-bg-player').getPlayer().seekTo( $(this).find('.yt-bg-player').attr('data-start') );
                                }
                            });
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('video').get(0).play(); }
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').playYTP(); }

                            $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                        }
                    });

                    $('#slider-arrow-left').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipePrev();
                    });

                    $('#slider-arrow-right').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipeNext();
                    });
                });
            </script>

        </section>

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

              
                <div class="container clearfix" id="cabanas">

                    <div class="col_one_third nobottommargin">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <a href="#"><img src="assets/images/400x300.jpg" alt="Caba&ntilde;a Luna Llena"></a>
                            </div>
                            <div class="fbox-desc">
                                <h3>QUIENES SOMOS<span class="subtitle">REFUERZO SEGUNDA LINEA</span></h3>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third nobottommargin">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                 <a href="#"><img src="assets/images/400x300.jpg" alt="Caba&ntilde;a Luna Creciente"></a>
                            </div>
                            <div class="fbox-desc">
                                <h3>NUESTRA MISION<span class="subtitle">REFUERZO SEGUNDA LINEA</span></h3>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third nobottommargin col_last">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                               <a href="#"> <img src="assets/images/400x300.jpg" alt="Luna Nueva"></a>
                            </div>
                            <div class="fbox-desc">
                                <h3>NUESTRA VISION<span class="subtitle">REFUERZO SEGUNDA LINEA</span></h3>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor.</p>
                            </div>
                        </div>
                    </div>

                    <div class="clear"></div>

                </div>



                <div  style=" margin: 50px 0; background: #f9f9f9; width: 100%">
                <div class="container clearfix" id="servicios">

                    <div class="row topmargin-lg bottommargin-sm">

                        <div class="heading-block center">
                            <h2>Amplios servicios</h2>
                            <span class="divcenter">Contamos con los mejores servicios en el mercado.</span>
                        </div>

                        <div class="col-md-4 col-sm-6 bottommargin">

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-wifi-full icons"></i></a>
                                </div>
                                <h3>Servicio 1</h3>
                               
                            </div>

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-fire icons"></i></a>
                                </div>
                                <h3>Servicio 2</h3>
                               
                            </div>

                            <div class="feature-box fbox-right topmargin" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-tv2"></i></a>
                                </div>
                                <h3>Servicio 3</h3>
                                
                            </div>

                        </div>

                        <div class="col-md-4 hidden-sm bottommargin center">
                            <img src="assets/images/iphone7.png" alt="iphone 2">
                        </div>

                        <div class="col-md-4 col-sm-6 bottommargin">

                            <div class="feature-box topmargin" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-food2"></i></a>
                                </div>
                                <h3>Servicio 4</h3>
                              
                            </div>

                            <div class="feature-box topmargin" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line2-drop"></i></a>
                                </div>
                                <h3>Servicio 5</h3>
                               
                            </div>

                            <div class="feature-box topmargin" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-line-sun"></i></a>
                                </div>
                                <h3>Servicio 6</h3>
                                
                            </div>

                        </div>

                    </div>

                </div>
                </div>
              

               
               
                <div class="container clearfix" id="galeria">

                    <div class="heading-block center">
                        <h3>Galer&iacute;a de productos</h3>
                        
                    </div>

                    <div id="oc-portfolio" class="owl-carousel portfolio-carousel portfolio-nomargin">

                        <div class="oc-item">
                            <div class="iportfolio">
                                <div class="portfolio-image">
                            <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div class="slide"><a href="portfolio-single-gallery.html"><img src="assets/images/400x300.jpg" alt="Texto ALT"></a></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-overlay" data-lightbox="gallery">
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                               <!-- <a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>-->
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-gallery.html">Categoría 1</a></h3>
                           <!-- <span><a href="#"><a href="#">Icons</a>, <a href="#">Illustrations</a></span>-->
                        </div>
                            </div>
                        </div>



                        <div class="oc-item">
                            <div class="iportfolio">
                               <div class="portfolio-image">
                            <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div class="slide"><a href="portfolio-single-gallery.html"><img src="assets/images/400x300.jpg" alt="Texto ALT"></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-overlay" data-lightbox="gallery">
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>                              
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-gallery.html">Categoría 2</a></h3>
                           
                        </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="iportfolio">
                                 <div class="portfolio-image">
                            <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div class="slide"><a href="portfolio-single-gallery.html"><img src="assets/images/400x300.jpg" alt="Texto ALT"></a></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-overlay" data-lightbox="gallery">
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-gallery.html">Categoría 3</a></h3>
                            
                        </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="iportfolio">
                                <div class="portfolio-image">
                            <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div class="slide"><a href="portfolio-single-gallery.html"><img src="assets/images/400x300.jpg" alt="Texto ALT"></a></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-overlay" data-lightbox="gallery">
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <a href="<?php echo site_url(); ?>assets/images/1140x500.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single-gallery.html">Categoría 4</a></h3>
                           
                        </div>
                            </div>
                        </div>

                       

                        

                    </div>

                    <script type="text/javascript">

                        jQuery(document).ready(function($) {

                            var ocPortfolio = $("#oc-portfolio");

                            ocPortfolio.owlCarousel({
                                margin: 1,
                                autoplay: true,
                                autoplayHoverPause: true,
                                dots: false,
                                nav: false,
                                navText : ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                responsive:{
                                    0:{ items:1 },
                                    600:{ items:2 },
                                    1000:{ items:3 },
                                    1200:{ items:4 }
                                }
                            });

                        });

                    </script>

                </div>



                <div  style="margin-top: 150px; background: #f9f9f9; width: 100%">
                 <div class="container clearfix" id="contacto">
                    <div class="heading-block center">
                        <h3>Contacto</h3>
                        <span>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</span>
                    </div>

                    <!-- Contact Form
                    ============================================= -->
                    <div class="col_half">

                        <div class="fancy-title title-dotted-border">
                            <h3>Mandanos un email</h3>
                        </div>

                        <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

                            <div class="form-process"></div>

                            <div class="col_one_third">
                                <label for="template-contactform-name">Nombre <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                            </div>

                            <div class="col_one_third">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-phone">Tel&eacute;fono</label>
                                <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                            </div>

                            <div class="clear"></div>

                           <!-- <div class="col_two_third">
                                <label for="template-contactform-subject">Subject <small>*</small></label>
                                <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-service">Services</label>
                                <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                    <option value="">-- Select One --</option>
                                    <option value="Wordpress">Wordpress</option>
                                    <option value="PHP / MySQL">PHP / MySQL</option>
                                    <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                </select>
                            </div>-->

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Mensaje <small>*</small></label>
                                <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                            </div>

                            <div class="col_full">
                                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Enviar</button>
                            </div>

                        </form>

                        <script type="text/javascript">

                            $("#template-contactform").validate({
                                submitHandler: function(form) {
                                    $('.form-process').fadeIn();
                                    $(form).ajaxSubmit({
                                        target: '#contact-form-result',
                                        success: function() {
                                            $('.form-process').fadeOut();
                                            $('#template-contactform').find('.sm-form-control').val('');
                                            $('#contact-form-result').attr('data-notify-msg', $('#contact-form-result').html()).html('');
                                            SEMICOLON.widget.notifications($('#contact-form-result'));
                                        }
                                    });
                                }
                            });

                        </script>

                    </div><!-- Contact Form End -->

                    <!-- Google Map
                    ============================================= -->
                    <div class="col_half col_last">

                        <section id="google-map" class="gmap" style="height: 410px;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10872.647268349576!2d-61.94264628457864!3d-38.08352316297414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95ecf32a1a8bed07%3A0x47e384c645943271!2sLihuen+Cuyen!5e0!3m2!1ses!2sar!4v1489674831751" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

                        
                        

                    </div><!-- Google Map End -->

                    <div class="clear"></div>

                    <!-- Contact Info
                    ============================================= -->
                    <div class="row clear-bottommargin">

                        <div class="col-md-3 col-sm-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="https://www.google.com.ar/maps/place/Lihuen+Cuyen/@-38.0835232,-61.9426463,15.21z/data=!4m5!3m4!1s0x95ecf32a1a8bed07:0x47e384c645943271!8m2!3d-38.082313!4d-61.935519"><i class="icon-map-marker2"></i></a>
                                </div>
                                <h3>Nuestra ubicaci&oacute;n<span class="subtitle">Calle Nro 3500, Bs. As.</span></h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-phone3"></i></a>
                                </div>
                                <h3>Llamanos<span class="subtitle">(011) 15-1234-1234 </span></h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-email3"></i></a>
                                </div>
                                <h3>Mandanos un mail<span class="subtitle">micorreo@gmail.com</span></h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="https://www.facebook.com/Lihuencuyen/"><i class="icon-facebook"></i></a>
                                </div>
                                <h3>Seguinos en Facebook</h3>
                            </div>
                        </div>

                    </div><!-- Contact Info End -->

                </div>

                </div>




            </div>

        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

           

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                   

                    <div class=" col_last tright">
                        <div class="fright clearfix">
                            <a href="https://www.facebook.com/MiPagina/" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                          
                        </div>

                        <div class="clear"></div>

                        <i class="icon-envelope2"></i> micorreo@gmail.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> (011) 15-1234-1234 - (011) 15-2345-2345 <span class="middot">&middot;</span>
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
    <script type="text/javascript" src="assets/js/functions.js"></script>

</body>
</html>