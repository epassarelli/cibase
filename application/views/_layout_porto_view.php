<!DOCTYPE html>
<html lang="es">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Porto - Responsive HTML5 Template 4.3.1</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/simple-line-icons/css/simple-line-icons.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/magnific-popup/magnific-popup.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/theme.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/theme-shop.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/theme-animate.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/rs-plugin/css/settings.css" media="screen">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/rs-plugin/css/layers.css" media="screen">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/rs-plugin/css/navigation.css" media="screen">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/circle-flip-slideshow/css/component.css" media="screen">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		
		<div class="body">
			
			<?php echo $this->load->view('header_porto_view', '', FALSE); ?>

			<div role="main" class="main">

				<?php echo $this->load->view($view, '', FALSE); ?>

			</div>

			<?php echo $this->load->view('footer_porto_view', '', FALSE); ?>

		</div>

		<!-- Vendor -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery/jquery.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.appear/jquery.appear.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.easing/jquery.easing.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/common/common.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.validation/jquery.validation.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/jquery.lazyload/jquery.lazyload.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/isotope/jquery.isotope.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/owl.carousel/owl.carousel.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/vide/vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/views/view.home.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>/js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

	</body>
</html>