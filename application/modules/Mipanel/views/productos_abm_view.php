
<section class="content-header">
    <h1>
        Productos
        <small>Listado de Productos</small>
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
                    <table id="productosAbm" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th style="width: 30%">Titulo</th>
                                <th>Imagen</th>
                                <th>Imagen</th>
                                <th>Imagen</th>
                                <th>Precio Lista</th>
                                <th>Precio Oferta</th>
                                <th>Publicar</th>
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
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span>Productos</h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/productos/accion');?>" id="formSitios" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" id="sitio_id" name="sitio_id" value="">
                   
               
                    <div class="form-group has-feedback">
                        <label for="titulo" class="control-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                   
                    <div class="form-group has-feedback">
                        <label for="descLarga" class="control-label">Descripcion Larga</label>
                        <input type="text" class="form-control" id="descLarga" name="descLarga" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="descCorta" class="control-label">Descripcion Corta</label>
                        <input type="text" class="form-control" id="descCorta" name="descCorta" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="codigo" class="control-label">Codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback imagen">
                        <label for="imagen" class="control-label">Imagen 1</label>
                        <a id="deleteimagenicon" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>

                        <div id="ocultaFile" >
                            <input type="file" id="File" name="File">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <p class="help-block">Tipos JPG/PNG</p>
                        </div>
                        <div id="showImagen">
                        </div>
                        <input type="hidden" id="imagen" name="imagen">
                    </div>                    

                    <div class="form-group has-feedback imagen">
                        <label for="imagen2" class="control-label">Imagen 2</label>
                        <a id="deleteimagen2con" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>

                        <div id="ocultaFile1">
                            <input type="file" id="File1" name="File1" >
                            <p class="help-block">Tipos ICO/SVG</p>
                        </div>
                        <div id="showImagen2">
                        </div>
                        <input type="hidden" id="imagen2" name="imagen2">
                    </div>                    

                    <div class="form-group has-feedback imagen">
                        <label for="imagen3" class="control-label">Imagen 3</label>
                        <a id="deleteimagen3icon" href="javascript:void(0);"><i class="fa fa-trash text-red"></i></a>
                        <div id="ocultaFile2">
                            <input type="file" id="File2" name="File2" >
                            <p class="help-block">Tipos JPG/PNG</p>
                        </div>
                        <div id="showImagen3">
                        </div>
                        <input type="hidden" id="imagen3" name="imagen3">
                    </div>                


                    <div class="form-group has-feedback">
                        <label for="precioLista" class="control-label">Precio de Lista</label>
                        <input type="text" class="form-control" id="precioLista" name="precioLista" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="precioOF" class="control-label">Precio de Oferta</label>
                        <input type="text" class="form-control" id="precioOF" name="precioOF" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="OfDesde" class="control-label">Oferta Valida desde</label>
                        <input type="date" class="form-control" id="OfDesde" name="OfDesde" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="OfHasta" class="control-label">Oferta Valida desde</label>
                        <input type="date" class="form-control" id="OfHasta" name="OfHasta" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="impuesto_id" class="control-label">Impuesto</label>
                        <select id="impuesto_id" name="impuesto_id" class="form-control">
                                  <?php 
                                  echo  "<option value=0>Seleccione un Impuesto</option>";
                                  foreach ($impuestos as $imp) {
                                       if (set_value('impuesto_id',@$impuesto_id)==$imp->impuesto_id) { 
                                            echo '<option value="' .$imp->impuesto_id. '"" selected>' . $imp->titulo . '  </option>';  
                                        }else
                                            echo '<option value="' .$imp->impuesto_id. '"">' . $imp->titulo . ' </option>';  
                                    }
                                  ?> 
                                </select>               
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>


                    <div class="form-group has-feedback">
                        <label for="presentacion_id" class="control-label">Presentacion</label>
                        <select id="presentacion_id" name="presentacion_id" class="form-control">
                        <?php 
                                  echo  "<option value=0>Seleccione una Presentacion</option>";
                                  foreach ($presentaciones as $pres) {
                                       if (set_value('presentacion_id',@$presentacion_id)==$pres->presentacion_id) { 
                                            echo '<option value="' .$pres->presentacion_id. '"" selected>' . $pres->titulo . '  </option>';  
                                        }else
                                            echo '<option value="' .$pres->presentacion_id. '"">' . $pres->titulo . ' </option>';  
                                    }
                                  ?> 

                        </select>               
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    

                    <div class="form-group has-feedback">
                        <input type="hidden" class="form-control" id="destacar_id" name="destacar_id" value="">
                        <div class='text-left'>
                            <label class="control-label">Destacar Producto</label>
                            <a class='activo'><i class='fa fa-toggle-off fa-2x text-green llave_destacar' id='llave_destacar'></i></a>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="etiquetas" class="control-label">Etiquetas</label>
                        <input type="text" class="form-control" id="etiquetas" name="etiquetas" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="peso" class="control-label">Peso</label>
                        <input type="text" class="form-control" id="peso" name="peso" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="tamano" class="control-label">Tamaño</label>
                        <input type="text" class="form-control" id="tamano" name="tamano" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <label for="link" class="control-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="orden" class="control-label">Orden</label>
                        <input type="text" class="form-control" id="orden" name="orden" value="">
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