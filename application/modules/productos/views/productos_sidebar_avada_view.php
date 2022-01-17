<div class="sidebar-widgets-wrap">
    <div class="widget widget_links clearfix">
      <h4>Categorías</h4>
      <?php 
         foreach ($categorias as $cat) {
              if ($cat->catpadre_id == null) {
                  echo '<ul>';
                  echo '<li><a href="'. base_url() . 'productos/categorias/' . $cat->slug . '">' . $cat->categoria  . '</a>';
                      foreach ($categorias as $subcat) {
                              $haysubcat = 0;
                              if ($subcat->catpadre_id == $cat->categoria_id) { 
                                  $haysubcat=1;
                                  echo '<ul>';
                                  echo '<li><a href="'. base_url() . 'productos/categorias/' . $subcat->slug . '">' . $subcat->categoria  . '</a></li>';
                              } 
                              if ($haysubcat = 1) {
                                  echo '</ul>';
                                  $haysubcat=0;
                              }
                      }
                  echo '</li></ul>';
              }        
          }
      ?>
    </div>
</div><!-- sidebar -->