<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">

      <div class="postcontent nobottommargin clearfix">

        <div class="fancy-title title-double-border">
          <h1><?php echo $categoria; ?></h1>
        </div>

        <div id="posts">

          <?php if (count($articulos) > 0) : ?>

            <?php foreach ($articulos as $art) : ?>

              <div class="entry clearfix bounceInRight animated">

                <div class="entry-title">
                  <h2><a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $art->slug; ?>"><?php echo $art->titulo; ?></a></h2>
                </div>

                <div class="entry-content">
                  <p><?php echo substr($art->resumen, 0, 300) . ' ...'; ?></p>
                  <a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $art->slug; ?>" class="more-link"><?php echo $this->lang->line('leerMas'); ?></a>
                </div>
              </div>

            <?php endforeach; ?>

          <?php else : ?>

            <p>No hemos encontrado articulos para la categoria especificada</p>

          <?php endif; ?>


        </div>

      </div>

      <?php $this->load->view('publicaciones_sidebar_' . $this->session->userdata('theme') . '_view'); ?>


    </div>

  </div>

</section>