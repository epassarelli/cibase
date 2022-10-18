<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/themes/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/themes/adminlte/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/themes/adminlte/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/themes/adminlte/css/skins/_all-skins.min.css">

    <?php
    if (isset($files_css)) {
        foreach ($files_css as $file) {
            # code...
            echo "<link href='" . site_url("assets/themes/adminlte/css/$file") . "' rel='stylesheet' type='text/css' />";
        }
    } ?>
    <?php
    if (isset($css_files)) {
        foreach ($css_files as $file) : ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach;
    }
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">


        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url('mipanel'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>CI</b>B</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>CI</b>Basic</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!-- Menú a la derecha del encabezado -->
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>


            </nav>
        </header>







        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo site_url('assets/themes/adminlte/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $this->session->userdata('username'); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!--         
        Si es Admin traigo los Items de Administracion central + Todos los bloques
        Sino, traigo todas las secciones que tenga activas con sus contenidos propios (Aca la duda me surge si es por seccion o bloque) -->
                <!-- sidebar menu: : style can be found in sidebar.less -->

                <?php //echo Modules::run('./menu/menubackend',$this->session->userdata('username')); 
                ?>




                <ul class="sidebar-menu">
                    <li class="header">Administracion</li>

                    <?php if ($this->ion_auth->is_admin()) : ?>

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
                                    <a href="<?php echo site_url('mipanel/admin/themes'); ?>"><i class="fa fa-fw fa-photo"></i> <span>Themes</span>
                                        <span class="pull-right-container"><small class="label pull-right bg-green"></small></span></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/formatos'); ?>">
                                        <i class="fa fa-fw fa-gear"></i> <span>Formatos</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/modulos'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Módulos</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/usuarios'); ?>">
                                        <i class="fa fa-fw fa-user"></i> <span>Usuarios</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/roles'); ?>">
                                        <i class="fa fa-fw fa-users"></i> <span>Roles</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gear"></i> <span>Paginas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li>
                                    <a href="<?php echo site_url('mipanel/paginas'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Paginas</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

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
                        </li>



                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gear"></i> <span>Productos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">

                                <li>
                                    <a href="<?php echo site_url('mipanel/entregas'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Entregas</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

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
                            <a href="<?php echo site_url('mipanel/admin/contactos'); ?>">
                                <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>



                    <?php else : ?>

                        <?php

                        switch ($this->config->item('sitio_id')) {
                            case 1:
                        ?>

                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/contactos'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

                            <?php
                                break;


                            case 2:


                            ?>

                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/contactos'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

                            <?php
                                break;

                            case 3:
                            ?>

                                <li>
                                    <a href="<?php echo site_url('mipanel/entregas'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Entregas</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

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

                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/contactos'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>


                            <?php
                                break;

                            case 4:


                            ?>

                                <li>
                                    <a href="<?php echo site_url('mipanel/publicaciones'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Publicaciones</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/contactos'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

                            <?php
                                break;


                            case 5:

                            ?>

                                <li>
                                    <a href="<?php echo site_url('mipanel/admin/contactos'); ?>">
                                        <i class="fa fa-fw fa-check"></i> <span>Contacto</span>
                                        <span class="pull-right-container">
                                            <small class="label pull-right bg-green"></small>
                                        </span>
                                    </a>
                                </li>

                        <?php
                                break;

                            default:
                                # code...
                                break;
                        }
                        ?>


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

















            </section>
            <!-- /.sidebar -->
        </aside>




        <!-- =============================================== -->





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            if (isset($contents)) :
                echo $contents;

            elseif (isset($output)) :
            ?>
                <!-- Main content -->
                <section class="content">
                    <?php echo $output; ?>
                </section>

            <?php endif; ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.8
            </div>
            <strong>Copyright &copy; <?php echo date('Y', time()); ?> <a href="http://webpass.com.ar">Desarrollo Web</a>.</strong> Todos los derechos reservados.
        </footer>





        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <!--            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul> -->
                    <!-- /.control-sidebar-menu -->

                    <!--             <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul> -->
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->

                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">

                    <ul class="sidebar-menu">




                        <li>
                            <a href="<?php echo site_url('mipanel/admin/sitios'); ?>">
                                <i class="fa fa-fw fa-globe"></i> <span>Sitios</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('mipanel/admin/themes'); ?>">
                                <i class="fa fa-fw fa-photo"></i> <span>Themes</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('mipanel/admin/formatos'); ?>">
                                <i class="fa fa-fw fa-gear"></i> <span>Formatos</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('mipanel/admin/modulos'); ?>">
                                <i class="fa fa-fw fa-check"></i> <span>Módulos</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('mipanel/admin/usuarios'); ?>">
                                <i class="fa fa-fw fa-user"></i> <span>Usuarios</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('mipanel/admin/roles'); ?>">
                                <i class="fa fa-fw fa-users"></i> <span>Roles</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>


                    </ul>
                    <!--             <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div> -->
                    <!-- /.form-group -->

                    <!--                 <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div> -->
                    <!-- /.form-group -->

                    <!--                 <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div> -->
                    <!-- /.form-group -->

                    <!--                 <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div> -->
                    <!-- /.form-group -->

                    <!--                 <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div> -->
                    <!-- /.form-group -->

                    <!--                 <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div> -->
                    <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->



        <!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/themes/adminlte/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "NingÃºn dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Ultimo",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }

            });
        });
    </script>


    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
    <!-- CONDICIONAL PARA CARGAR LOS SCRIPT DESDE EL CONTROLLER -->
    <?php if (isset($files_js)) {
        foreach ($files_js as $file_js) {
            # code...
            echo "<script src='" . site_url("assets/themes/adminlte/js/$file_js") . "'></script>";
        }
    }
    ?>



    <?php
    if (isset($js_files)) {
        foreach ($js_files as $file) : ?>
            <script src="<?php echo $file; ?>"></script>
    <?php endforeach;
    }
    ?>
    <script>
        $(document).ready(function() {
            UrlBase = $('#url').val();

            Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

        });
    </script>







</body>

</html>