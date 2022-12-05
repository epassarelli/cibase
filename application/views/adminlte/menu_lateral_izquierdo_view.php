<!--         
  Si es Admin traigo los Items de Administracion central + Todos los bloques
  Sino, traigo todas las secciones que tenga activas con sus contenidos propios (Aca la duda me surge si es por seccion o bloque) 
-->

<ul class="sidebar-menu">

  <li class="header">Administracion</li>


  <?php if ($this->ion_auth->is_admin()) : ?>

    <?php $this->load->view('adminlte/menu_izquierdo_admin_view'); ?>

  <?php else : ?>

    <?php $this->load->view('adminlte/menu_izquierdo_user_view'); ?>

  <?php endif; ?>


  <li>
    <a href="<?php echo site_url('login/logout'); ?>">
      <i class="fa fa-fw fa-sign-out"></i> <span>Cerrar sesion</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

</ul>