<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="author" />
    <meta name="title" content="title">

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
                            <li><a href="#nosotros"><div>Nosotros</div></a>
                            <li><a href="#servicios"><div>Servicios</div></a>
                            <li><a href="#contacto"><div>Contacto</div></a>                       
                        </ul>

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
         
        <?php echo Modules::run('slider'); ?>

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

              
                <?php echo Modules::run('nosotros'); ?>


                <?php echo Modules::run('servicios'); ?>


                <?php echo Modules::run('contacto'); ?>


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