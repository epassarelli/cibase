<!-- Footer
============================================= -->
<footer id="footer" class="dark">

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">

        <div class="container clearfix">

            <div class="col_half">
                <div class="copyrights-menu copyright-links clearfix">
                <?php                     
                    // Mientras haya módulos recorro y agrego items
                    foreach ($this->session->userdata('items') as $m) {
                        $preSlug = ($this->session->userdata('landing')) ? '#' : site_url();
                        # code...
                        //if($m['menu']){
                            //$preSlug = ($landing) ? '#' : site_url();
                        echo "<a href='" . $preSlug . '' . $m['slug'] . "'>" . $m['titulo'] . "</a>/";
                        //}
                    }
                ?> 
                
                </div>
               &copy; Copyright <?php echo date('Y',time())?> - Todos los derechos reservados.
            </div>

            <div class="col_half col_last tright">
                <div class="fright clearfix">
                    <!-- <a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
                        <i class="icon-pinterest"></i>
                        <i class="icon-pinterest"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
                        <i class="icon-vimeo"></i>
                        <i class="icon-vimeo"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-github">
                        <i class="icon-github"></i>
                        <i class="icon-github"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
                        <i class="icon-yahoo"></i>
                        <i class="icon-yahoo"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
                        <i class="icon-linkedin"></i>
                        <i class="icon-linkedin"></i>
                    </a> -->
                </div>
                <div>
                    <?php if($this->session->userdata('qr') !== ''): ?>

                        <img src="<?php echo site_url('assets/uploads/').$this->session->userdata('qr'); ?>" alt="QR">

                    <?php endif; ?>


                </div>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer><!-- #footer end -->