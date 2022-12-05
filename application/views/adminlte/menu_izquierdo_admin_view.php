<!--         
  Si es Admin traigo los Items de Administracion central + Todos los bloques
  Sino, traigo todas las secciones que tenga activas con sus contenidos propios (Aca la duda me surge si es por seccion o bloque) 
-->

<ul class="sidebar-menu">

  <li class="treeview">
    <a href="#">
      <i class="fa fa-gear"></i> <span>Administracion</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">

      <li>
        <a href="<?php echo site_url('mipanel/sitios'); ?>"><i class="fa fa-fw fa-globe"></i> <span>Sitios</span>
          <span class="pull-right-container"><small class="label pull-right bg-green"></small></span></a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/parametros'); ?>"><i class="fa fa-fw fa-globe"></i> <span>Parametros</span>
          <span class="pull-right-container"><small class="label pull-right bg-green"></small></span></a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/themes'); ?>"><i class="fa fa-fw fa-photo"></i> <span>Themes</span>
          <span class="pull-right-container"><small class="label pull-right bg-green"></small></span></a>
      </li>

      <!-- <li>
          <a href="<?php echo site_url('mipanel/formatos'); ?>">
            <i class="fa fa-fw fa-gear"></i> <span>Formatos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li> -->

      <li>
        <a href="<?php echo site_url('mipanel/modulos'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Módulos</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/usuarios'); ?>">
          <i class="fa fa-fw fa-user"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/roles'); ?>">
          <i class="fa fa-fw fa-users"></i> <span>Roles</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

    </ul>
  </li>


  <li>
    <a href="<?php echo site_url('mipanel/paginas'); ?>">
      <i class="fa fa-fw fa-check"></i> <span>Paginas</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>


  <!-- <li class="treeview">
      <a href="#">
        <i class="fa fa-gear"></i> <span>Paginas</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" style="display: none;">

        <li>
          <a href="<?php echo site_url('mipanel/bloques'); ?>">
            <i class="fa fa-fw fa-check"></i> <span>Bloques de paginas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('mipanel/componentes'); ?>">
            <i class="fa fa-fw fa-check"></i> <span>Componentes de bloques</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

      </ul>
    </li> -->



  <li class="treeview">
    <a href="#">
      <i class="fa fa-gear"></i> <span>Ecommerce</span>
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

      <li>
        <a href="<?php echo site_url('mipanel/talles'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Talles</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/colores'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Colores</span>
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
        <a href="<?php echo site_url('mipanel/pedidos'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Pedidos</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/pedidos/pedidosPendientes'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Pedidos sin Stock</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('mipanel/entregas'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Entregas</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>

    </ul>
  </li>




  <li class="treeview">
    <a href="#">
      <i class="fa fa-gear"></i> <span>Publicaciones</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">

      <li>
        <a href="<?php echo site_url('mipanel/categorias/publicaciones'); ?>">
          <i class="fa fa-fw fa-check"></i> <span>Categorias</span>
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

    </ul>

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