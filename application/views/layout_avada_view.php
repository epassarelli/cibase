<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="author" />
    <meta name="title" content="title">

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/plugins.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/include/rs-plugin/css/settings.css" media="screen" />

      <?php if($this->session->userdata('icon') !== ''): ?>
        <link rel="icon" type="image/png" href="<?php echo site_url('assets/uploads/'.$this->session->userdata('icon')); ?>" />
      <?php else: ?>
        <link rel="icon" type="image/png" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/images/favicon.png" />
      <?php endif; ?> 
    
 

    <!-- Document Title
    ============================================= -->
    <title><?php echo $this->session->userdata('nombre'); ?></title>

  
</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <?php echo $this->load->view('header_avada_view', '', FALSE); ?>


              
                <?php echo $this->load->view($view); ?>

            <!-- </div> -->

        </section><!-- #content end -->

        <?php echo $this->load->view('footer_avada_view', '', FALSE); ?>

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/functions.js"></script>

</body>
</html>    