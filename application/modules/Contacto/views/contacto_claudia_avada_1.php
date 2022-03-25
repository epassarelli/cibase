<section id="content">

  <div class="content-wrap">
    
    <div class="container clearfix">

    <!-- Contact Form
    ============================================= -->
    <div <?php if($this->session->userdata('urlGMap') !== ''){ echo 'class="col_half"';} ?>>

        <div class="fancy-title title-dotted-border">
            <h3><?php echo $this->lang->line('get_in_touch'); ?></h3>
        </div>

        <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="" method="post" novalidate="novalidate">

            <div class="form-process"></div>

            <div class="col_one_third">
                <label for="template-contactform-name"><?php echo $this->lang->line('name'); ?> <small>*</small></label>
                <input type="text" id="name" name="name" value="" class="sm-form-control required" aria-required="true">
            </div>

            <div class="col_one_third">
                <label for="template-contactform-email"><?php echo $this->lang->line('email'); ?> <small>*</small></label>
                <input type="email" id="email" name="email" value="" class="required email sm-form-control" aria-required="true">
            </div>

            <!-- <div class="col_one_third col_last">
                <label for="template-contactform-phone"><?php echo $this->lang->line('phone'); ?></label>
                <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control">
            </div> -->

            <div class="clear"></div>

            <div class="col_two_third">
                <label for="subject"><?php echo $this->lang->line('subject'); ?> <small>*</small></label>
                <input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
            </div>

            <!--

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
                <label for="template-contactform-message"><?php echo $this->lang->line('message'); ?> <small>*</small></label>
                <textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30" aria-required="true"></textarea>
            </div>

            <div class="col_full hidden">
                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
            </div>

            <div class="col_full">
                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin"><?php echo $this->lang->line('send_message'); ?></button>
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

            <section id="google-map" class="gmap" style="height: 410px;">
                <iframe src="<?php echo $this->session->userdata('urlGMap'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>
        </div>
        <!-- Google Map End -->   

    <?php endif; ?>

    <div class="clear"></div>

    <!-- Contact Info
    ============================================= -->
    <div class="row clear-bottommargin topmargin">

        <div class="col-md-3 col-sm-6 bottommargin clearfix">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="https://instagram.com/<?php echo $this->session->userdata('instagram'); ?>" target="_blank"><i class="icon-instagram"></i></a>
                </div>
                <h3>Instagram</h3>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 bottommargin clearfix">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="https://twitter.com/<?php echo $this->session->userdata('telefono'); ?>" target="_blank"><i class="icon-twitter"></i></a>
                </div>
                <h3>Twitter</h3>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 bottommargin clearfix">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="mailto:<?php echo $this->session->userdata('correo'); ?>" target="_blank"><i class="icon-email3"></i></a>
                </div>
                <h3>Email</h3>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 bottommargin clearfix">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="https://facebook.com/<?php echo $this->session->userdata('facebook'); ?>" target="_blank"><i class="icon-facebook"></i></a>
                </div>
                <h3>Facebook</h3>
            </div>
        </div>

    </div><!-- Contact Info End -->

</div>

<!-- </div> -->
</div>

</section>