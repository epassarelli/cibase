<!--==Index.html=== -->
<div class="row clearfix common-height">

    <div class="col-md-6 center col-padding" style="background: url('<?php echo site_url('assets/uploads/'.$this->config->item('sitio_id').'/bloques/').$bloque->imagen; ?>') center center no-repeat; background-size: cover;">
        <div>&nbsp;</div>
    </div>

    <div class="col-md-6 center col-padding" style="background-color: #F5F5F5;">
        <div>
            <div class="heading-block nobottomborder">
                <!-- <span class="before-heading color">Easily Understandable &amp; Customizable.</span> -->
                <h3><?php echo $bloque->texto1; ?></h3>
            </div>

            <!-- 
            <div class="center bottommargin">
                <a href="http://vimeo.com/101373765" data-lightbox="iframe" style="position: relative;">
                    <img src="images/services/video.jpg" alt="Video">
                    <span class="i-overlay nobg"><img src="images/icons/video-play.png" alt="Play"></span>
                </a>
            </div> 
            -->
            <p class="lead nobottommargin"><?php echo $bloque->texto2; ?></p>
        </div>
    </div>

</div>
<?php if(count($componentes) > 0): ?>
<div class="row clearfix bottommargin-lg common-height">

    <?php 
    $colores = array('515875','576F9E','6697B9','88C3D8');
    $i = 0;
    foreach ($componentes as $comp): ?>

    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #<?php echo $colores[$i]; ?>;">
        <div>
            <?php echo $comp->icono; ?>
            <div class="counter counter-lined">
                <span data-from="100" data-to="<?php echo $comp->texto1; ?>" data-refresh-interval="50" data-speed="2000"></span>
            </div>
            <h5><?php echo $comp->texto2; ?></h5>
        </div>
    </div>

    <!--     
    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #515875;">
        <div>
            <i class="i-plain i-xlarge divcenter icon-line2-directions"></i>
            <div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K</div>
            <h5>Lines of Codes</h5>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #576F9E;">
        <div>
            <i class="i-plain i-xlarge divcenter icon-line2-graph"></i>
            <div class="counter counter-lined"><span data-from="3000" data-to="21500" data-refresh-interval="100" data-speed="2500"></span></div>
            <h5>KBs of HTML Files</h5>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #6697B9;">
        <div>
            <i class="i-plain i-xlarge divcenter icon-line2-layers"></i>
            <div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25" data-speed="3500"></span></div>
            <h5>No. of Templates</h5>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: #88C3D8;">
        <div>
            <i class="i-plain i-xlarge divcenter icon-line2-clock"></i>
            <div class="counter counter-lined"><span data-from="60" data-to="1400" data-refresh-interval="30" data-speed="2700"></span></div>
            <h5>Hours of Coding</h5>
        </div>
    </div> 
    -->

    <?php 
    $i++;
    endforeach; 
    ?>

</div>

<?php endif; ?>