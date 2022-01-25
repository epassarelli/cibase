<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}


if (!isset($_SESSION['carrito'])) {
    if (parametro(1) == 'S') { 
        $_SESSION['carrito'][] = array('tipo' => 'info','cantidad' => 0);
    }
}

?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title><?php if(isset($title)){ echo $title;}else{ echo "Sin titulo";} ?></title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/fontawesome-free/css/all.min.css">
				
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/simple-line-icons/css/simple-line-icons.min.css">
		
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/owl.carousel/assets/owl.theme.default.min.css">
		 
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/bootstrap-star-rating/css/star-rating.min.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/css/theme.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/css/theme-shop.css">
		
		<!-- Demo CSS -->


		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/css/skins/default.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/modernizr/modernizr.min.js"></script>

		<?php if(isset($files_css)){
		
		foreach ($files_css as $file_css) {
			# code...
			echo "<script src='".site_url("assets/$file_css")."'></script>"; 
		}
	
		}?>



	</head>
	<body>

		<div class="body">

			<?php echo $this->load->view('header_porto_view', '', FALSE); ?>
			
			<div role="main" class="main shop py-4">

				<?php echo $this->load->view($view, '', FALSE); ?>

			</div>

			<?php echo $this->load->view('footer_porto_view', '', FALSE); ?>	

		</div>

		<!-- Vendor -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery/jquery.min.js"></script>
 		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/popper/umd/popper.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/bootstrap/js/bootstrap.min.js"></script>
 		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/common/common.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/vide/jquery.vide.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/vivus/vivus.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/js/theme.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/js/views/view.shop.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo site_url('assets/themes/'.$this->session->userdata('theme')); ?>76/js/theme.init.js"></script>

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

		 <input type="hidden" id="url" value="<?php echo base_url();?>">

		<!-- CONDICIONAL PARA CARGAR LOS SCRIPT DESDE EL CONTROLLER -->
		<?php if(isset($files_js)){
		
			foreach ($files_js as $file_js) {
				# code...
				echo "<script src='".site_url("assets/$file_js")."'></script>"; 
			}
		
		}?>

		
</body>




</html>


