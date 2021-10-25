<section class="content-header">
    <h1>
        Secciones
        <small>Listado de secciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Secciones</li>
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
            <button type="button" class="btn btn-primary margin insertar" data-toggle="modal" data-target="#modalSecciones"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
          </p>
          <table id="seccionesAbm" class="table table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Sitio</th>
                <th>Titulo</th>
                <th>Modulo</th>
                <th></th>
                <th></th>
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

<!-- --------------------- -->
<!-- MODAL DE FORMULARIO -->
<!-- --------------------- -->

<div class="modal fade" id="modalSecciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span> Secciones</h4>
            </div>

            <div class="modal-body">
                <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/nosotros/accion');?>" id="formSecciones" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                    <input type="hidden" id="Id" name="Id" value="">

                    <div class="form-group has-feedback">
                        <label for="Modulo" class="control-label">Modulo</label>
                        <?php $attrModulo = array('class'=>'form-control'); ?>
                        <?php echo form_dropdown('Modulo', $modulos,'',$attrModulo); ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Titulo" class="control-label">Titulo</label>
                        <input type="text" class="form-control" id="Titulo" name="Titulo" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="Slug" class="control-label">Slug</label>
                        <input type="text" class="form-control" id="Slug" name="Slug" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="Bajada" class="control-label">Bajada</label>
                        <input type="text" class="form-control" id="Bajada" name="Bajada" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>


                    <div class="form-group has-feedback">
                        <label for="Menu" class="control-label">Menu</label>
                        <input type="text" class="form-control" id="Menu" name="Menu" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="Orden" class="control-label">Orden</label>
                        <input type="text" class="form-control" id="Orden" name="Orden" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="Bloque" class="control-label">Bloque</label>
                        <input type="text" class="form-control" id="Bloque" name="Bloque" value="">
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

<!-- --------------------- -->
<!-- MODAL DE CONFIRMACION -->
<!-- --------------------- -->

<!-- Modal HTML -->
<div id="modalConfirm" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Estas Seguro ?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Se perderan todos los datos de la seleccion y no habra forma de recuperar la información</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" id="confirmar">Delete</button>
			</div>
		</div>
	</div>
</div>   
