<!--avada_list_05.html-->

<div class="section">
                    <div class="container clearfix">
                        <!--==titulo: bloque.texto1=== -->
                        <div class="row topmargin-sm">

                            <div class="heading-block center">
                                <h3><?php echo $bloque->texto1; ?></h3> 
                            </div>
                        <!--==titulofin=== -->
                        <?php 
                        if(count($componentes) > 0): 
                            $i = 0;
                            foreach ($componentes as $comp):
                                $i++;
                                $resto = $i % 4;
                                ?>

                            <div class="col-md-3 col-sm-6 bottommargin">

                                <div class="team">
                                    <div class="team-image">
                                         <img src="<?php echo site_url('assets/uploads/').$this->config->item('sitio_id').'/componentes/'.$comp->imagen;?>" alt="<?php echo $comp->texto1;?>">
                                    </div>
                                    <div class="team-desc team-desc-bg">
                                        <div class="team-title"><?php echo $comp->texto1; ?></h4><span><?php echo $comp->texto2; ?></span></div>
                                     
                                        <!--==por ahora no redes sociales 
                                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                            <i class="icon-gplus"></i>
                                            <i class="icon-gplus"></i>
                                        </a> -->
                                    </div>
                                </div>

                            </div>    
                            <?php 
                            if($resto == 0){ 
                                echo '<div class="clear"></div>'; 
                            }
                            endforeach;
                        endif; 
                        ?>                           
                    </div>
</div>