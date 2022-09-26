<section class="content-header">
    <h1>
        Backend
        <small>Listado de mensajes recibidos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Mensajes de contacto</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table id="componentesAbm" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="30">Cod</th>
                                <th>Fecha</th>
                                <th>Asunto</th>
                                <th>Nombre</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php foreach($mensajes as $mensaje): ?>
                              <td><?php echo $mensaje->id; ?></td>
                              <td><?php echo $mensaje->fecha; ?></td>
                              <td><?php echo $mensaje->asunto; ?></td>
                              <td><?php echo $mensaje->mensaje; ?></td>
                              <td><?php echo $mensaje->nombre; ?></td>
                            <?php endforeach; ?>
                          </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->