<div style="padding-top: 150px; background: #f9f9f9; width: 100%" id="<?php echo $slug; ?>">
 <div class="container clearfix">
    <div class="heading-block center">
        <h2><?php echo $titulo; ?></h2>
        <span><?php echo $bajada; ?></span>
    </div>

        <!-- Contact Form
        ============================================= -->
        <div <?php if($this->session->userdata('urlGMap') !== ''){ echo 'class="col_half"';} ?>>

            <div class="fancy-title title-dotted-border">
                <h3>Mandanos un email</h3>
            </div>

            <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

            <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post" novalidate="novalidate">

                <div class="form-process"></div>

                <div class="col_one_third">
                    <label for="template-contactform-name">Nombre <small>*</small></label>
                    <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" aria-required="true">
                </div>

                <div class="col_one_third">
                    <label for="template-contactform-email">Email <small>*</small></label>
                    <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" aria-required="true">
                </div>

                <div class="col_one_third col_last">
                    <label for="template-contactform-phone">Teléfono</label>
                    <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control">
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
                    <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30" aria-required="true"></textarea>
                </div>

                <div class="col_full hidden">
                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
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

        <?php if($this->session->userdata('urlGMap') !== ''): ?>
            <!-- Google Map
            ============================================= -->
            <div class="col_half col_last">

                <section id="google-map" class="gmap" style="height: 410px;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0272290824646!2d-58.37684288423676!3d-34.603472964993166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacda843d817%3A0xc2ad9185a06cb900!2sSan%20Mart%C3%ADn%20439%2C%20C1004%20CABA!5e0!3m2!1ses-419!2sar!4v1635368043785!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div><!-- Google Map End -->        
        <?php endif; ?>

</section>

                    
                    



<div class="clear"></div>

<!-- Contact Info
============================================= -->
<div class="row clear-bottommargin">

    <div class="col-md-3 col-sm-6 bottommargin clearfix">
        <div class="feature-box fbox-center fbox-bg fbox-plain">
            <div class="fbox-icon">
                <a href="https://www.google.com.ar/maps/place/Lihuen+Cuyen/@-38.0835232,-61.9426463,15.21z/data=!4m5!3m4!1s0x95ecf32a1a8bed07:0x47e384c645943271!8m2!3d-38.082313!4d-61.935519"><i class="icon-map-marker2"></i></a>
            </div>
            <h3>Nuestra ubicación<span class="subtitle"><?php echo $this->session->userdata('direccion'); ?></span></h3>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 bottommargin clearfix">
        <div class="feature-box fbox-center fbox-bg fbox-plain">
            <div class="fbox-icon">
                <a href="#"><i class="icon-phone3"></i></a>
            </div>
            <h3>Llamanos<span class="subtitle"><?php echo $this->session->userdata('telefono'); ?></span></h3>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 bottommargin clearfix">
        <div class="feature-box fbox-center fbox-bg fbox-plain">
            <div class="fbox-icon">
                <a href="#"><i class="icon-email3"></i></a>
            </div>
            <h3>Mandanos un mail<span class="subtitle"><?php echo $this->session->userdata('correo'); ?></span></h3>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 bottommargin clearfix">
        <div class="feature-box fbox-center fbox-bg fbox-plain">
            <div class="fbox-icon">
                <a href="<?php echo $this->session->userdata('facebook'); ?>" target="_blank"><i class="icon-facebook"></i></a>
            </div>
            <h3>Seguinos en Facebook</h3>
        </div>
    </div>

</div><!-- Contact Info End -->

</div>

</div>