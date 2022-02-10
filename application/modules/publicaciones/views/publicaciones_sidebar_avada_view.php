      <div class="sidebar nobottommargin col_last clearfix">
          <div class="sidebar-widgets-wrap">

            <?php if(isset($relacionados)): ?>
            <div class="widget  widget_links clearfix">

                <h4><span>Relacionadas</span></h4>

                  <ul>

                    <?php if(count($relacionados)>0): ?>

                      <?php foreach ($relacionados as $r): ?>

                        <li><a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $r->slug; ?>"><?php echo $r->titulo; ?></a>
                        </li>

                      <?php endforeach; ?>

                    <?php endif; ?>

                  </ul>

                </div>

            <?php endif; ?>







            <?php if(isset($otrasCategorias)): ?>
            <div class="widget  widget_links clearfix">

                <h4><span>Otras categorias</span></h4>

                  <ul>

                    <?php if(count($otrasCategorias)>0): ?>

                      <?php foreach ($otrasCategorias as $c): ?>

                        <li><a href="<?php echo site_url().$c->slug; ?>"><?php echo $c->categoria; ?></a>
                        </li>

                      <?php endforeach; ?>

                    <?php endif; ?>

                  </ul>

                </div>

            <?php endif; ?>


        </div>

      </div>