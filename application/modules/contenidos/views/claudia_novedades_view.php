<div class="divider divider-short divider-center"><i class="icon-news"></i></div>

<div class="container clearfix">

  <div class="fancy-title title-bottom-border">
    <h3><span>Novedades</span></h3>
  </div>

  <?php foreach ($novedades as $novedad) :  ?>

    <h4><a href="<?php echo site_url('novedades/') . $novedad->slug; ?>"><?php echo $novedad->titulo; ?></a></h4>
    <p><?php echo substr($novedad->resumen, 0, 250) . '...'; ?></p>

  <?php endforeach; ?>

</div>
</div>