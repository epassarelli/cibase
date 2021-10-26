<section class="content-header">
    <h1>
        Sitios
        <small>Listado de sitios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Sitios</li>
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
                        <button type="button" class="btn btn-primary margin insertar" data-toggle="modal" data-target="#modalSitios"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
                    </p>
                    <table id="sitiosAbm" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Url</th>
                                <th>Razon Social</th>
                                <th>Correo</th>
                                <th>Estado</th>
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

<div class="modal fade" id="modalSitios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span> Sitios</h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/sitios/accion');?>" id="formSitios" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                    <input type="hidden" id="Id" name="Id" value="">
                   
               
                    <div class="form-group has-feedback">
                        <label for="Nombre" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                   
                    <div class="form-group has-feedback">
                        <label for="Url" class="control-label">Url</label>
                        <input type="text" class="form-control" id="Url" name="Url" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Theme_id" class="control-label">Tema</label>
                        <input type="numeric" class="form-control" id="Theme_id" name="Theme_id" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Landing" class="control-label">Landing Page</label>
                        <input type="numeric" class="form-control" id="Landing" name="Landing" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Razonsocial" class="control-label">Razon Social</label>
                        <input type="text" class="form-control" id="Razonsocial" name="Razonsocial" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Direccion" class="control-label">Direccion</label>
                        <input type="text" class="form-control" id="Direccion" name="Direccion" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Cpostal" class="control-label">Codigo Postal</label>
                        <input type="text" class="form-control" id="Cpostal" name="Cpostal" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <label for="Localidad" class="control-label">Localidad</label>
                        <input type="text" class="form-control" id="Localidad" name="Localidad" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Provincia" class="control-label">Provincia</label>
                        <input type="text" class="form-control" id="Provincia" name="Provincia" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Pais" class="control-label">Pais</label>
                        <input type="text" class="form-control" id="Pais" name="Pais" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="UrlGMap" class="control-label">Url Google Maps</label>
                        <input type="text" class="form-control" id="UrlGMap" name="UrlGMap" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <label for="Telefono" class="control-label">Telefono</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Correo" class="control-label">Correo</label>
                        <input type="text" class="form-control" id="Correo" name="Correo" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Facebook" class="control-label">Facebook</label>
                        <input type="text" class="form-control" id="Facebook" name="Facebook" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Instagram" class="control-label">Instagram</label>
                        <input type="text" class="form-control" id="Instagram" name="Instagram" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback imagen">
                        <label for="Logo" class="control-label">Logo</label>
                        <div id="ocultaFile" >
                            <input type="file" id="File" name="File" >
                            <p class="help-block">Solo JPG 3000x3000</p>
                        </div>
                        <div id="showImagen">
                        </div>
                        <input type="hidden" id="Logo" name="Logo">
                    </div>                    

                    <div class="form-group has-feedback imagen">
                        <label for="Icon" class="control-label">Icono</label>
                        <div id="ocultaFile1">
                            <input type="file" id="File1" name="File1" >
                            <p class="help-block">Solo JPG 3000x3000</p>
                        </div>
                        <div id="showImagen1">
                        </div>
                        <input type="hidden" id="Icon" name="Icon">
                    </div>                    

                    <div class="form-group has-feedback imagen">
                        <label for="Qr" class="control-label">Qr</label>
                        <div id="ocultaFile2">
                            <input type="file" id="File2" name="File2" >
                            <p class="help-block">Solo JPG 3000x3000</p>
                        </div>
                        <div id="showImagen2">
                        </div>
                        <input type="hidden" id="Qr" name="Qr">
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
