<!--         
  Si es Admin traigo los Items de Administracion central + Todos los bloques
  Sino, traigo todas las secciones que tenga activas con sus contenidos propios (Aca la duda me surge si es por seccion o bloque) 
-->

<ul class="sidebar-menu">


  <li class="treeview">
    <a href="#">
      <i class="fa fa-gear"></i> <span>Configuración</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">

      <li>
        <a href="<?php echo site_url('mipanel/impuestos'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Impuestos</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/presentaciones'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Presentaciones</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>


      <li>
        <a href="<?php echo site_url('mipanel/categorias/productos'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Categorias</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <?php if (parametro(11) == 'S') : ?>

        <li>
          <a href="<?php echo site_url('mipanel/talles'); ?>">
            <i class="fa fa-fw fa-check"></i> <span>Talles</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

      <?php endif; ?>

      <?php if (parametro(11) == 'S') : ?>

        <li>
          <a href="<?php echo site_url('mipanel/colores'); ?>">
            <i class="fa fa-fw fa-check"></i> <span>Colores</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

      <?php endif; ?>

    </ul>

  </li>



  <li>
    <a href="<?php echo site_url('mipanel/stocks/unidadesStock'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Manejo de Existencias</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li>
    <a href="<?php echo site_url('mipanel/stocks'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Existencias en Stocks</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li>
    <a href="<?php echo site_url('mipanel/productos'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Productos</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li>
    <a href="<?php echo site_url('mipanel/pedidos'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Pedidos</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <?php if (parametro(13) == 'S') : ?>

    <li>
      <a href="<?php echo site_url('mipanel/pedidos/pedidosPendientes'); ?>">
        <i class="fa fa-fw fa-check"></i> <span>Pedidos sin Stock</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green"></small>
        </span>
      </a>
    </li>

  <?php endif; ?>

  <li>
    <a href="<?php echo site_url('mipanel/entregas'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Entregas</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li>
    <a href="<?php echo site_url('mipanel/publicaciones'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Publicaciones</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li>
    <a href="<?php echo site_url('mipanel/contactos'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Msjs de contacto</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>


</ul>