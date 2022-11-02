<ul class="sidebar-menu">
    <li class="header">Admin. Central</li>
        
        <?php if ($this->ion_auth->is_admin()): ?>

                    
            <li>
                <a href="<?php echo site_url('mipanel/admin/sitios');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Sitios</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('mipanel/admin/secciones');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Secciones</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo site_url('mipanel/admin/bloques');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Bloques</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('mipanel/admin/componentes');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Componentes</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/themes');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Themes</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li> 
            <li>
                <a href="<?php echo site_url('mipanel/admin/formatos');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Formatos</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('mipanel/admin/modulos');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Módulos</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('mipanel/admin/usuarios');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Usuarios</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('mipanel/admin/roles');?>">
                    <i class="fa fa-fw fa-industry"></i> <span>Roles</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>                                                     
            
            <li>
                <a href="<?php echo site_url('mipanel/admin/impuestos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Impuestos</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/presentaciones');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Presentaciones</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/categorias');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Categorias</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/productos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Productos</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/contactos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/publicaciones');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Publicaciones</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

        <?php else: ?>

            <li>
                <a href="<?php echo site_url('mipanel/admin/impuestos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Impuestos</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/presentaciones');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Presentaciones</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/categorias');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Categorias</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/productos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Productos</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/contactos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/publicaciones');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Publicaciones</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('mipanel/admin/contactos');?>">
                    <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

        
        <?php endif; ?>




            <li>
                <a href="<?php echo site_url('login/logout');?>">
                    <i class="fa fa-fw fa-sign-out"></i> <span>Cerrar sesion</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>
        </ul>