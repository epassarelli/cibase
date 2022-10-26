<section class="content-header">
    <h1>
        Servicios
        <small>Listado de servicios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Servicios</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <p>
                        <button type="button" class="btn btn-primary margin insertar" data-toggle="modal" data-target="#modalServicio"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
                    </p>
                    <div class="table-responsive">
                    <table id="serviciosAbm" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    </div>
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

<!-- --------------------- -->
<!-- MODAL DE FORMULARIO -->
<!-- --------------------- -->

<div class="modal fade" id="modalServicio" tabindex="-1" role="dialog" aria-labelledby="modalServicio">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span> Servicio</h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/servicios/accion');?>" id="formServicios" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                    <input type="hidden" id="Id" name="Id" value="">
                    <div class="form-group has-feedback">
                        <label for="Titulo" class="control-label">Titulo</label>
                        <input type="text" class="form-control" id="Titulo" name="Titulo" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="Descripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" id="Descripcion" name="Descripcion" value=""></textarea>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>                      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary titulo"></button>
            </div>
                </form>
        </div>
    </div>
</div>

   
