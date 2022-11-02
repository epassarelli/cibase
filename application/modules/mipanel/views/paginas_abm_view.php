<section class="content-header">
  <h1>
    Backend
    <small>Listado de paginas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Paginas</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Paginas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>
            <a type="button" href="<?php echo site_url('mipanel/paginas/insertar'); ?>" class="btn btn-primary margin insertar"><i class='fa fa-plus-circle fa-lg'></i> Insertar </a>
          </p>
          <table id="paginasAbm" class="table table-bordered">
            <thead>
              <tr>
                <th width="30">Cod</th>
                <th>Titulo</th>
                <th>Slug</th>
                <th>¿En menu?</th>
                <th>Orden</th>
                <th>Idioma</th>
                <th>Módulo</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
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