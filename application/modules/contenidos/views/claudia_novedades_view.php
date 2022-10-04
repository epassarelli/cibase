<div class="divider divider-short divider-center"><i class="icon-news"></i></div>
<div class="container clearfix">

  <div class="fancy-title title-bottom-border">
    <h2><span>Novedades</span></h2>
  </div>

  <div id="posts" class="post-grid clearfix">

    <?php foreach ($novedades as $novedad) :  ?>

      <div class="entry clearfix">
        <div class="entry-title">
          <h2><a href="blog-single.html"><?php echo $novedad->titulo; ?></a></h2>
        </div>
        <!-- 
			<ul class="entry-meta clearfix">
				<li><i class="icon-calendar3"></i> 10th Feb 2014</li>
				<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
				<li><a href="#"><i class="icon-camera-retro"></i></a></li>
			</ul> 
			-->
        <div class="entry-content">
          <p><?php echo substr($novedad->resumen, 0, 250) . '...'; ?></p>
          <a href="blog-single.html" class="more-link">Leer más</a>
        </div>
      </div>

    <?php endforeach; ?>

  </div>
</div>