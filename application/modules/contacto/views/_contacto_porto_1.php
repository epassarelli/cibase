<section class="section section-default bg-color-light-scale-2 mt-0 mb-0">
<div class="container"> 
	<?php if(strlen($this->session->userdata('urlGMap')) > 20): ?>
		<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
		<div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div>
	<?php endif; ?>



		<div class="row py-4">
			<div class="col-lg-3">
				<?php if($this->session->flashdata('message')):;?>
					<div class="row">
					    <div class="col-sm-12">
					        <div id="errores" aria-live="polite" class="alert alert-<?php echo $this->session->flashdata('message')['alert'];?>">
					            <p><?php echo $this->session->flashdata('message')['message'];?></p>
					        </div>
					    </div>
					</div>
				<?php endif;?>

				<form id="contactForm" class="contact-form" action="" method="POST">
					
<!-- 					<?php if(!empty($status)){ ?>
			    	<div class="status <?php echo $status['type']; ?>"><?php echo $status['msg']; ?></div>
			    <?php } ?>

    			<div class="contact-form-success alert alert-success d-none mt-4" id="contactSuccess">
						<strong>Success!</strong> Your message has been sent to us.
					</div>
				
					<div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">
						<strong>Error!</strong> There was an error sending your message.
						<span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
					</div> -->
					
					<div class="form-row">
						<div class="form-group col-lg-6">
							<label class="required font-weight-bold text-dark text-2">Nombre completo</label>
							<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
							<?php echo form_error('name','<p class="field-error">','</p>'); ?>
						</div>
						<div class="form-group col-lg-6">
							<label class="required font-weight-bold text-dark text-2">Correo</label>
							<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
							<?php echo form_error('email','<p class="field-error">','</p>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label class="font-weight-bold text-dark text-2">Asunto</label>
							<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
							<?php echo form_error('subject','<p class="field-error">','</p>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label class="required font-weight-bold text-dark text-2">Mensaje</label>
							<textarea maxlength="5000" data-msg-required="Ingrese un mensaje válido" rows="5" class="form-control" name="message" id="message" required></textarea>
							<?php echo form_error('message','<p class="field-error">','</p>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<input type="hidden" id="g-recaptcha" name="g-recaptcha" class="mb-2" data-site-key="<?php echo @$this->data_captcha_google['site_key']; ?>">
							<?php //echo form_error('g-recaptcha'); ?>
							<?php echo form_error('g-recaptcha','<p class="field-error">','</p>'); ?>
							<input type="submit" value="Enviar" class="btn btn-primary btn-modern" data-loading-text="Loading...">
						</div>
					</div>
				</form>

			</div>
			<div class="col-lg-3">

				<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
					<h4 class="mt-2 mb-1">Datos de <strong>contacto</strong></h4>
					<ul class="list list-icons list-icons-style-2 mt-2">
						<li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Dirección:</strong> <?php echo $this->session->userdata('direccion'); ?></li>
						<li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Teléfono:</strong> <?php echo $this->session->userdata('telefono'); ?></li>
						<li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:<?php echo $this->session->userdata('correo'); ?>"><?php echo $this->session->userdata('correo'); ?></a></li>
					</ul>
			</div>
			<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
					<h4 class="pt-5">Nuestras <strong>redes</strong></h4>
					<!-- <ul class="list list-icons social-icons"> -->
					<ul class="list list-icons list-icons-style-2 mt-2">
						<!-- Facebook -->
						<li>
							<a href="https://www.facebook.com/lineafinacueros/" target="_blank" data-toggle="tooltip" data-placement="top" title="Kouro en Facebook">
								<i class="text-dark fab fa-facebook"></i>
								Facebook
							</a>
						</li>
						<!-- Instagram -->
						<li>
							<a href="https://www.instagram.com/kouro_leather/" target="_blank" data-toggle="tooltip" data-placement="top" title="Kouro en Instagram">
								<i class="text-dark fab fa-instagram"></i>
								Instagram
							</a>
						</li>
						<!-- Pinterest -->
						<li>
							<a href="https://www.youtube.com/channel/UCJuA_udzof0yqMuJEDTu9tA" target="_blank" data-toggle="tooltip" data-placement="top" title="Vitello carnes en Youtube">
								<i class="text-dark fab fa-youtube"></i>
								??Cual
							</a>
						</li>
					</ul>
				</div>
				<!-- 
				<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
					<h4 class="pt-5">Business <strong>Hours</strong></h4>
					<ul class="list list-icons list-dark mt-2">
						<li><i class="far fa-clock top-6"></i> Monday - Friday - 9am to 5pm</li>
						<li><i class="far fa-clock top-6"></i> Saturday - 9am to 2pm</li>
						<li><i class="far fa-clock top-6"></i> Sunday - Closed</li>
					</ul>
				</div>
				-->

				<!-- 
				<h4 class="pt-5">Get in <strong>Touch</strong></h4>
				<p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
				-->

			</div>
			<div class="col-lg-3">
				<img alt="Kouro" src="<?php echo site_url('assets/uploads/7/contacto.jpg'); ?>" class="img-fluid border border-width-10 rounded box-shadow-3 position-absolute appear-animation animated fadeInUp appear-animation-visible" data-appear-animation="fadeInUp" data-appear-animation-delay="700" style="animation-delay: 700ms;">
			</div>
		</div>

	</div>

 </div> 
</section>
<!-- 
<section class="call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-lg-9">
				<div class="call-to-action-content">
					<h2 class="font-weight-normal text-6 mb-0">Porto is <strong class="font-weight-extra-bold">everything</strong> you need to create an <strong class="font-weight-extra-bold">awesome</strong> website!</h2>
					<p class="mb-0">The <strong class="font-weight-extra-bold">Best</strong> HTML Site Template on ThemeForest</p>
				</div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="call-to-action-btn">
					<a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="top: -40px; left: 70%;"></span>
				</div>
			</div>
		</div>
	</div>
</section> 
-->
