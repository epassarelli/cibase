<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


if (!isset($_SESSION['carrito'])) {
    if (parametro(3) == 'S') { 
        $_SESSION['carrito'] = array('sitio_id' => $this->config->item('sitio_id'));
    }
}

 
?>
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
    
 	<?php if(isset($files_css)){
		
		foreach ($files_css as $file_css) {
			# code...
			echo "<script src='".site_url("assets/$file_css")."'></script>"; 
		}
	
		}?>


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

    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo @$this->data_captcha_google['site_key']; ?>&hl=es-419"></script>
    <!--FIN Google Recaptcha -->

    <?php //if($this->session->userdata('sitio_id') == 4 ): ?>
        <!-- <script type="text/javascript" src="<?php echo site_url('assets/js/menu_claudia.js'); ?>"></script> -->
    <?php //endif; ?>

    <!-- Document Title
    ============================================= -->
    <title><?php echo $this->session->userdata('nombre'); ?></title>

  
</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <?php if($this->config->item('sitio_id') == 4): ?>

            <?php echo $this->load->view('claudia_menu2_avada_view'); ?>

        <?php else: ?>

            <?php echo $this->load->view('header_avada_view', '', FALSE); ?>
        
        <?php endif; ?>
       

        <?php if(parametro(6) == 'S'): // Pregunto si es multiidioma ?>
            <section id="page-title" class="page-title-mini idiomaClaudia">
                <div class="container clearfix">
                  <h1>Claudia Hasanbegovic</h1>
                  <ol class="breadcrumb">
                  <?php 
                    switch ($this->session->userdata('site_lang')) {
                        case 'spanish':
                            echo "<li><img width='24' height='16' src='".site_url('assets/images/banderas/inglaterra.png')."'><a href='".site_url('contenidos/LanguageSwitcher/switchLang/english')."'> Switch to english</a></li>";
                            break;
                        case 'english':
                            echo "<li><img width='24' height='16' src='".site_url('assets/images/banderas/argentina.png')."''><a href='".site_url('contenidos/LanguageSwitcher/switchLang/spanish')."'> Cambiar a español</a></li>";
                            break;    
                        default:
                            echo "<li><img width='24' height='16' src='".site_url('assets/images/banderas/inglaterra.png')."'><a href='".site_url('contenidos/LanguageSwitcher/switchLang/english')."'> Switch to english</a></li>";
                            break;
                    }
                   ?>
                   </ol>                     
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

    <input type="hidden" id="url" value="<?php echo base_url();?>">
		 
         <script>
			 $(document).ready(function () {
			 		UrlBase = $('#url').val();
		 			
					Toast =  Swal.mixin({
						            toast: true,
            						position: 'top-end',
            						showConfirmButton: false,
            						timer: 3000
            		});
		
			});
		</script>	



		 

		<!-- CONDICIONAL PARA CARGAR LOS SCRIPT DESDE EL CONTROLLER -->
		<?php if(isset($files_js)){
		
			foreach ($files_js as $file_js) {
				# code...
				echo "<script src='".site_url("assets/$file_js")."'></script>"; 
			}
		
		}?>


</body>

</html>    