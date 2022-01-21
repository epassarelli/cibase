<?php session_start(); ?>
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

    <!-- <link rel="stylesheet" href="<?php echo site_url('assets/css/menu_claudia.css');?>" type="text/css" /> -->

    
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/responsive.css" type="text/css" />
    
    <?php //$color1 = $this->session->userdata('color1'); ?>
    <?php //require_once 'assets/themes/'.$this->session->userdata('theme').'/css/colors.php'; ?>
    <?php switch ($this->config->item('sitio_id')) {
        case 1: $colors = 'color'.$this->config->item('sitio_id').'.php'; break;
        case 2: $colors = 'color'.$this->config->item('sitio_id').'.php'; break;
        case 3: $colors = 'color'.$this->config->item('sitio_id').'.php'; break;
        case 4: $colors = 'color'.$this->config->item('sitio_id').'.php'; break;
        case 5: $colors = 'color'.$this->config->item('sitio_id').'.php'; break;       
        default: $colors = 'colors.php'; break;
    } ?>  
    
    <link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme').'/css/'.$colors); ?>" type="text/css" />  

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <!-- <script type="text/javascript" src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/jquery.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    
    <script type="text/javascript" src="<?php echo site_url('assets/js/menu_claudia.js'); ?>"></script> 

    <!-- Document Title
    ============================================= -->
    <title><?php echo $this->session->userdata('nombre'); ?></title>

  
</head>

<body class="stretched">

    <?php //var_dump($this->session->userdata()); ?>


    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <?php if($this->config->item('sitio_id') == 4): ?>

            <?php echo $this->load->view('claudia_menu_avada_view'); ?>

        <?php else: ?>

            <?php echo $this->load->view('header_avada_view', '', FALSE); ?>
        
        <?php endif; ?>
        

        <?php if($this->config->item('sitio_id') == 4): ?>
            <section id="page-title" class="page-title-mini">
                <div class="container clearfix">
                    <img width="24" height="16" src="<?php echo site_url('assets/images/banderas/argentina.png'); ?>"> 
                    <a href="<?php echo site_url('contenidos/LanguageSwitcher/switchLang/spanish'); ?>">Español</a> | 
                    <img width="24" height="16" src="<?php echo site_url('assets/images/banderas/inglaterra.png'); ?>">
                    <a href="<?php echo site_url('contenidos/LanguageSwitcher/switchLang/english'); ?>">Ingles</a>
                </div>
            </section>
        <?php endif; ?>


        <?php echo $this->load->view($view); ?>


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