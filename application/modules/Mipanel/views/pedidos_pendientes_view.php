 <section class="content-header">
    <h1>
        Pedidos 
        <small>Listado de Pedidos Pendientess</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Pedidos</li>
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
                   
                    <table id="example2" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha Solicitud</th>
                                <th>Fecha Respuesta</th>
                                <th>E-Mail</th>
                                <th>Producto</th>
                                <th>Color</td>
                                <th>Talle</td>
                                <th>Action</th>
                                <!-- style="display: none;" -->
                                <th>Respuesta</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidos as $a): ?>
                                <tr>
                                    <td><?php echo $a->id ?></td>
                                    <td><?php echo $a->fecha ?></td>
                                    <td><?php echo $a->respuesta ?></td>
                                    <td><?php echo $a->email ?></td>
                                    <td><?php echo $a->titulo ?></td>
                                    <td><?php echo $a->nomcolor ?></td>
                                    <td><?php echo $a->nomtalle ?></td>
                                    <td>
                                        <div class='text-center'>
                                            <a href='javascript:void(0);' class='btn btn-xs'><i class='fa fa-comments fa-2x text-red' onclick="contestaPedido($(this))" ></i></a>
                                        </div>
                                    </td>
                                    <td><?php echo $a->textorespuesta; ?></td>
                                </tr>

                            <?php endforeach; ?>    
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






<!-- ------------------------ -->
<!-- MODAL CAMBIOS DE ESTADO       -->
<!-- ------------------------ -->
<div class="modal fade" id="modalEstados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span>Envio de Respuesta</h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/pedidos/cambioEstado');?>" id="formEstados" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" class="form-control" id="idpedido"  name="idpedido"  value="<?php echo set_value('idpedido',@$idpedido); ?>" readonly>
                   
                    <div class="form-group has-feedback">
                        <label for="textorespuesta" class="control-label">Respuesta</label>
                        <textarea class="form-control" name="textorespuesta" id="textorespuesta" cols="30" rows="10"></textarea>
                    </div>

                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary titulo">Enviar Respuesta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- --------------------- -->
<!-- MODAL DE FORMULARIO -->
<!-- --------------------- -->

<div class="modal fade" id="modalPedidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span>Pedidos</h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3" ></div>
                <form action="<?php echo base_url('mipanel/pedidos/accion');?>" id="formPedidos" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                        <div class="row col-lg-12">
                            <div class="col-md-2 col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="id" class="control-label">Id</label>
                                        <input type="text" class="form-control" id="id" name="id" value="" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="fecha" class="control-label">Fecha</label>
                                        <input type="text" class="form-control" id="fecha" name="fecha" value="" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div>
                        </div>



                        
                        <div class="col-md-6 col-sm-12">
                                <div class="form-group has-feedback">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_calle" class="control-label">Calle</label>
                                    <input type="text" class="form-control" id="del_calle" name="del_calle" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>        
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_nro" class="control-label">Numero</label>
                                    <input type="text" class="form-control" id="del_nro" name="del_nro" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-2 col-sm-12">                                                                
                                <div class="form-group has-feedback">
                                    <label for="del_piso" class="control-label">Piso</label>
                                    <input type="text" class="form-control" id="del_piso" name="del_piso" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_dpto" class="control-label">Dpto.</label>
                                    <input type="text" class="form-control" id="del_dpto" name="del_dpto" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>                                                                                        

                       <div class="col-md-6 col-sm-12">                                                                                        
                            <div class="form-group has-feedback">
                                    <label class="form-group has-feedbak id="lblprovincia">Provincia</label>
                                    <select class="form-control" id="provincia" name="provincia" >
                                    <?php   echo  "<option value=0>Seleccione una Provincia</option>"; ?> 
                                    </select>               
                                    <?php if (!empty(form_error('provincia'))): ?> <?php  echo  form_error('provincia') ;?> <?php endif;?>
                                </div>
                        </div>     
                        
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group has-feedback">   
                                <label class="form-group has-feedbak" id="lbllocalidad">Localidad</label>
                                <select class="form-control" id="localidad" name="localidad">
                                    <?php  echo  "<option value=0>Seleccione una Localidad</option>"; ?> 
                                </select>
                                <?php if (!empty(form_error('localidad'))): ?> <?php  echo  form_error('localidad') ;?> <?php endif;?>
                            </div>
                        </div>     



                        <div class="col-md-6 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="telefono" class="control-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>                      
                        <div class="col-md-6 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="email" class="control-label">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="">
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







