
<section class="content-header">
    <h1>
        Entregas
        <small>Formas de Entrega</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Formas de Entrega</li>
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
                        <button type="button" class="btn btn-primary margin insertar" data-toggle="modal" data-target="#modalEntregas"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
                       
                    </p>
                    <table id="entregasAbm" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;text-align: center">Id</th>
                                <th style="width: 30%;text-align: center">Nombre</th>
                                <th style="width: 30%;text-align: center">Detalle</th>
                                <th style="width: 5%;text-align: center">Costo</th>
                                <th style="width: 5%;text-align: center">Direccion</th>
                                <th style="width: 5%;text-align: center">Estado</th>

                                <th style="width: 5%;text-align: center">Accion</th>
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

<div class="modal fade" id="modalEntregas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span></h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/entregas/accion');?>" id="formEntregas" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                    <input type="hidden" id="id" name="id" value="">

                    
                    <div class="form-group has-feedback">
                        <label for="entregas_id" class="control-label">Tip de Entrega</label>
                        <select id="entregas_id" name="entregas_id" class="form-control">
                        <?php 
                                  echo  "<option value=0>Seleccione un Tipo de Entrega</option>";
                                  foreach ($tipos as $pres) {
                                       if (set_value('entregas_id',@$entregas_id)==$pres->_id) { 
                                            echo '<option value="' .$pres->id. '"" selected>' . $pres->nombre . '  </option>';  
                                        }else
                                            echo '<option value="' .$pres->id. '"">' . $pres->nombre . ' </option>';  
                                    }
                                  ?> 

                        </select>               
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    
                    
                    <div class="form-group has-feedback">
                        <label for="detalle" class="control-label">Detalle</label>
                        <input type="text" class="form-control" id="detalle" name="detalle" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="costo" class="control-label">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" value="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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
