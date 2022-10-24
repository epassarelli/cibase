<section class="content-header">
    <h1>
        Backend
        <small>Listado de publicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Publicaciones</li>
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
            
          <p>
              <a class="btn btn-primary margin insertar" href="<?php echo site_url('mipanel/publicaciones/insertar') ?>"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </a>
          </p>
          <table id="publicacionesAbm" class="table table-bordered">
              <thead>
                <tr>
                  <th width="30">Cod</th>
                  <th>Categoría</th>
                  <th>Título</th>
                  <th>Publicar</th>
                  <th>Editar</th>
                  <th>Eliminar</th>

                </tr>
              </thead>
              <tbody></tbody>
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



<?php 
//if(empty($publicaciones)):
  //foreach ($publicaciones as $pub) {
    ?>
      <!-- <tr>
        <td><?php //echo $pub->publicacion_id; ?></td>
        <td><?php //echo $pub->categoria; ?></td>
        <td><?php //echo $pub->titulo; ?></td>
        <td width="150" align="right">
          <a href="javascript:void(0);" data-id="<?php //echo $pub->publicacion_id; ?>" class="cambiarEstado btn btn-xs" title="Cambiar estado">
            <?php //echo ($pub->estado == 1) ? '<i class="fa fa-toggle-on fa-2x text-green"></i>' : '<i class="fa fa-toggle-on fa-2x text-green"></i>'; ?>                                            
          </a>
          <a href="<?php //echo site_url('mipanel/publicaciones/editar/'.$pub->publicacion_id); ?>" class="editar btn btn-xs" title="Editar">
            <i class="fa fa-pencil fa-2x text-yellow"></i>
          </a>
          <a href="javascript:void(0);" data-id="<?php //echo $pub->publicacion_id; ?>" class="eliminarPub btn btn-xs" title="Eliminar">
            <i class="fa fa-trash fa-2x text-red"></i>
          </a>
        </td>

      </tr> -->
    <?php
  //}
//endif;
?>