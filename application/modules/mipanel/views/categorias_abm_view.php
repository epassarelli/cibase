<section class="content-header">
	<h1>
		Categorias
		<small>Listado de Categorias</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<!-- <li><a href="#">Tables</a></li> -->
		<li class="active">Categorias</li>
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
						<button type="button" class="btn btn-primary margin insertar" data-toggle="modal" data-target="#modalCategorias"><i class='fa fa-plus-circle fa-lg'></i> Insertar </button>
					</p>

					<table id="categoriasAbm" class="table table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th style="width: 30%">Descripcion</th>
								<th>Descripcion Larga</th>
								<th>Slug</th>
								<th style="width: 10%">Imagen</th>
								<th>Activa</th>
								<th>Action</th>
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

<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalTitle"><span class="titulo"></span></h4>
			</div>
			<div class="modal-body">
				<div id="sent" class="col-3"></div>
				<form action="<?php echo base_url('mipanel/categorias/accion'); ?>" id="formCategorias" method="post" enctype="multipart/form-data">
					<!-- DATOS DE CONDICIONES -->
					<input type="hidden" id="Opcion" name="Opcion" value="">
					<input type="hidden" id="categoria_id" name="categoria_id" value="">
					<input type="hidden" id="sitio_id" name="sitio_id" value="">
					<input type="hidden" id="tipocat" name="tipocat" value="<?php echo set_value('tipocat', $tipocat); ?>">
					<input type="hidden" class="form-control" id="modulo_id" name="modulo_id" value="">



					<div class="form-group has-feedback">
						<label for="catpadre_id" class="control-label">Categoria Padre</label>
						<select id="catpadre_id" name="catpadre_id" class="form-control">
							<?php
							echo  "<option value=0>Seleccione un Categoria Padre</option>";
							foreach ($cates as $cat) {
								if ($cat->catpadre_id == 0 || $cat->catpadre_id == null) {
									if (set_value('catpadre_id', @$catpadre_id) == $cat->catpadre_id) {
										echo '<option value="' . $cat->categoria_id . '"" selected>' . $cat->categoria . '  </option>';
									} else {
										echo '<option value="' . $cat->categoria_id . '"">' . $cat->categoria . ' </option>';
									}
								}
							}
							?>
						</select>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>


					<div class="form-group has-feedback">
						<label for="idioma_id" class="control-label">Idioma</label>
						<select id="idioma_id" name="idioma_id" class="form-control">
							<?php
							echo  "<option value=0>Seleccione un Idioma</option>";
							foreach ($idiomas as $idio) {
								if (set_value('idioma_id', @$idioma_id) == $idio->idioma_id) {
									echo '<option value="' . $idio->idioma_id . '"" selected>' . $idio->idioma . '  </option>';
								} else {
									echo '<option value="' . $idio->idioma_id . '"">' . $idio->idioma . ' </option>';
								}
							}
							?>
						</select>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>


					<div class="form-group has-feedback">
						<label for="categoria" class="control-label">Descripcion</label>
						<input type="text" class="form-control" id="categoria" name="categoria" value="">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>

					<div class="form-group has-feedback">
						<label for="description" class="control-label">Descripcion Larga</label>
						<input type="text" class="form-control" id="description" name="description" value="">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>

					<div class="form-group has-feedback">
						<label for="slug" class="control-label">Slug</label>
						<input type="text" class="form-control" id="slug" name="slug" value="">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>

					<div class="form-group has-feedback imagen">
						<label for="imagen" class="control-label">Imagen</label>
						<a id="deleteimagenicon" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>

						<div id="ocultaFile">
							<input type="file" id="File" name="File">
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<p class="help-block">Tipos JPG/PNG</p>
						</div>
						<div id="showImagen">
						</div>
						<input type="hidden" id="imagen" name="imagen">
					</div>

					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" id="menu" name="menu" value="">
						<div class='text-left'>
							<label class="control-label">Menu</label>
							<a class='activo'><i class='fa fa-toggle-off fa-2x text-green llave_menu' id='llave_menu'></i></a>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label for="orden" class="control-label">Orden</label>
						<input type="text" class="form-control" id="orden" name="orden" value="">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>

					<div class="form-group has-feedback">
						<label for="keywords" class="control-label">Keywords</label>
						<input type="text" class="form-control" id="keywords" name="keywords" value="">
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