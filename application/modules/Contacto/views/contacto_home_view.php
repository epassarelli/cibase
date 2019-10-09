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