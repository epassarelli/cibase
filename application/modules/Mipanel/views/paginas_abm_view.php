<section class="content-header">
    <h1>
        Backend
        <small>Listado de paginas</small>
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <p>
                        <button type="button" class="btn btn-primary margin insertar" data-toggle="modal" data-target="#modalSitios"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
                    </p>
                    <table id="paginasAbm" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Sitio</th>
                                <th>Titulo</th>
                                <th>Slug</th>
                                <th>En menu?</th>
                                <th>Pubicada?</th>
                                <th>Idioma</th>
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
    <div class="modal-dialog modal-lg" role="document">
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



                      <div class="row">

                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <label for="Sitio" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="Sitio" name="Sitio" value="">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group has-feedback">
                                <label for="Url" class="control-label">Url</label>
                                <input type="text" class="form-control" id="Url" name="Url" value="">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>                          

                        </div>
                        
                        <div class="col-md-3">

                            <div class="form-group has-feedback">
                                <label for="Theme_id" class="control-label">Tema</label>
                                <select id="Theme_id" name="Theme_id" class="form-control">
                                            <option value=0>Seleccione un Tema</option>
                                            <option value=1>Avada</option>
                                            <option value=2>Porto</option>  
                                </select>               
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                        </div>

                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label class="control-label">Landing Page</label>
                              <input type="hidden" class="form-control" id="Landing" name="Landing" value="">
                              <div class='text-left'>
                                  
                                  <a class='activo'><i class='fa fa-toggle-off fa-2x text-green llave_landing' id='llave_landing'></i></a>
                              </div>
                          </div>

                        </div>


                      </div>
                  


                      <div class="row">

                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="Razonsocial" class="control-label">Razon Social</label>
                              <input type="text" class="form-control" id="Razonsocial" name="Razonsocial" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="Direccion" class="control-label">Direccion</label>
                              <input type="text" class="form-control" id="Direccion" name="Direccion" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>                         

                        </div>
                        
                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="Cpostal" class="control-label">Codigo Postal</label>
                              <input type="text" class="form-control" id="Cpostal" name="Cpostal" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="UrlGMap" class="control-label">Url Google Maps</label>
                              <input type="text" class="form-control" id="UrlGMap" name="UrlGMap" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>

                        </div>


                      </div>



                      <div class="row">

                        <div class="col-md-3">
                          <div class="form-group has-feedback">
                              <label for="Telefono" class="control-label">Telefono</label>
                              <input type="text" class="form-control" id="Telefono" name="Telefono" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div> 
                        </div>

                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="Correo" class="control-label">Correo</label>
                              <input type="text" class="form-control" id="Correo" name="Correo" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>                     

                        </div>
                        
                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="Facebook" class="control-label">Facebook</label>
                              <input type="text" class="form-control" id="Facebook" name="Facebook" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="form-group has-feedback">
                              <label for="Instagram" class="control-label">Instagram</label>
                              <input type="text" class="form-control" id="Instagram" name="Instagram" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div> 

                        </div>

                      </div>



                      <div class="row">

                        <div class="col-md-4">

                          <div class="form-group has-feedback">
                              <label for="Pais" class="control-label">Pais</label>
                              <input type="text" class="form-control" id="Pais" name="Pais" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>

                        </div>

                        <div class="col-md-4">

                          <div class="form-group has-feedback">
                              <label for="Provincia" class="control-label">Provincia</label>
                              <input type="text" class="form-control" id="Provincia" name="Provincia" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>                       

                        </div>
                        
                        <div class="col-md-4">

                          <div class="form-group has-feedback">
                              <label for="Localidad" class="control-label">Localidad</label>
                              <input type="text" class="form-control" id="Localidad" name="Localidad" value="">
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>

                        </div>

                      </div>


                    
                    




                      <div class="row">

                        <div class="col-md-4">
                          <div class="form-group has-feedback imagen">
                              <label for="Logo" class="control-label">Logo</label>
                              <a id="deletelogoicon" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>

                              <div id="ocultaFile" >
                                  <input type="file" id="File" name="File">
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                  <p class="help-block">Tipos JPG/PNG</p>
                              </div>
                              <div id="showImagen">
                              </div>
                              <input type="hidden" id="Logo" name="Logo">
                          </div>   
                        </div>

                        <div class="col-md-4">

                          <div class="form-group has-feedback imagen">
                              <label for="Icon" class="control-label">Icono</label>
                              <a id="deleteiconicon" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>

                              <div id="ocultaFile1">
                                  <input type="file" id="File1" name="File1" >
                                  <p class="help-block">Tipos ICO/SVG</p>
                              </div>
                              <div id="showImagen1">
                              </div>
                              <input type="hidden" id="Icon" name="Icon">
                          </div>                   

                        </div>
                        
                        <div class="col-md-3">

                          <div class="form-group has-feedback imagen">
                              <label for="Qr" class="control-label">Qr</label>
                              <a id="deleteqricon" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>
                              <div id="ocultaFile2">
                                  <input type="file" id="File2" name="File2" >
                                  <p class="help-block">Tipos JPG/PNG</p>
                              </div>
                              <div id="showImagen2">
                              </div>
                              <input type="hidden" id="Qr" name="Qr">
                          </div>

                        </div>

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
