<!-- Original blog-grid-3-columns -->
<div class="container py-6">
    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <div class="row">
<!-- foreach -->
                    <?php
                    if(count($componentes) > 0): 
                    $i = 0;
                    foreach ($componentes as $comp):
                        $i++;
                    ?>

                    <div class="col-md-6">
                        <article class="post post-medium border-0 pb-0 mb-5">
                            <div class="post-image">
                                <a href="blog-post.html">
                                    <img src="<?php echo site_url('assets/uploads/').$this->config->item('sitio_id').'/componentes/'.$comp->imagen;?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                </a>
                            </div>

                            <div class="post-content">

                                <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><?php echo $comp->texto1; ?></h2>
                                <p><strong> <?php echo $comp->texto2; ?></strong></p>
                                <p><?php echo $comp->texto5; ?></p>
<!-- datos para un post 
                                <div class="post-meta">
                                    <span><i class="far fa-user"></i> By <a href="#">Bob Doe</a> </span>
                                    <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>
                                    <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                    <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                </div>
-->
                            </div>
                        </article>
                    </div>

                    <?php 
                endforeach;

                endif; 
                ?>
                 </div>
            </div>
        </div>  
    </div>
</div>
