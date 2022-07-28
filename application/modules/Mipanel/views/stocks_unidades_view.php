
<section class="content-header">
    <h1>
        Stock 
        <small>Administracion de Stock</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Administracion de Stocks</li>
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

                    <div class="row">
                      <div class="form-group has-feedback col-lg-3 col-md-3 col-sm-12">
                            <label for="producto_id" class="control-label">Producto</label>
                            <select id="producto_id" name="producto_id" id="producto_id" class="form-control chzn-select">
                            <?php 
                                      echo  "<option value=0>Seleccione un Producto</option>";
                                      foreach ($productos as $pres) {
                                          if (set_value('producto_id',@$producto_id)==$pres->id) { 
                                                echo '<option value="' .$pres->id. '"" selected>' . $pres->titulo . '  </option>';  
                                            }else
                                                echo '<option value="' .$pres->id. '"">' . $pres->titulo . ' </option>';  
                                        }
                                      ?> 
                            </select>               
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="row">
                          <div class="form-group has-feedback col-lg-2 col-md-2 col-sm-12">
                              <label for="talle_id" class="control-label">Talle</label>
                              <select id="talle_id" name="talle_id" class="form-control chzn-select">
                              <?php 
                                        echo  "<option value=0>Seleccione un Talle</option>";
                                        foreach ($talles as $pres) {
                                            if (set_value('talle_id',@$talle_id)==$pres->id) { 
                                                  echo '<option value="' .$pres->id. '"" selected>' . $pres->descripcion . '  </option>';  
                                              }else
                                                  echo '<option value="' .$pres->id. '"">' . $pres->descripcion . ' </option>';  
                                          }
                                        ?> 
                              </select>               
                              <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                          </div>
                          <div class="form-group has-feedback col-lg-2 col-md-2 col-sm-12">
                              <label for="color_id" class="control-label">Color</label>
                              <select id="color_id" name="color_id" class="form-control chzn-select">
                              <?php 
                                        echo  "<option value=0>Seleccione un Color</option>";
                                        foreach ($colores as $pres) {
                                            if (set_value('color_id',@$color_id)==$pres->id) { 
                                                  echo '<option value="' .$pres->id. '"" selected>' . $pres->descripcion . '  </option>';  
                                              }else
                                                  echo '<option value="' .$pres->id. '"">' . $pres->descripcion . ' </option>';  
                                          }
                                        ?> 
                              </select>               
                              <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                          </div>
                          <div class="form-group has-feedback col-lg-2 col-md-2 col-sm-12">
                              <label for="cantidad" class="control-label">Cantidad</label>
                               <input type="number" class="form-control" id="cantidad" name="etiquetas" value="1" min="-1000" max="1000">
                          </div>
                          <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->


                          <div class="form-group has-feedback col-lg-4 col-md-4 col-sm-12">
                              <label for="tipo_moves_id" class="control-label">Tipo Movimiento</label>
                              <select id="tipo_moves_id" name="color_id" class="form-control chzn-select">
                              <?php 
                                        echo  "<option value=0>Seleccione un Tipo</option>";
                                        foreach ($tipo_moves as $pres) {
                                            if (set_value('tipo_moves_id',@$tipo_moves_id)==$pres->id) { 
                                                  echo '<option value="' .$pres->id. '"" selected>' . $pres->descripcion . '  </option>';  
                                              }else
                                                  echo '<option value="' .$pres->id. '"">' . $pres->descripcion . ' </option>';  
                                          }
                                        ?> 
                              </select>               
                            </div>
                            <div class="form-group has-feedback col-lg-2 col-md-2 col-sm-12">
                              <button type="button" class="btn btn-primary margin insertar"><i class='fa fa-plus-circle fa-lg'></i> Agregar Item</button>
                              <button type="button" class="btn btn-success margin grabar"><i class='fa-solid fa-save fa-lg'></i> Terminar </button>
                            </div>

                    </div>                

                    
                    <table id="stocksMoves" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;text-align: center">Id Producto</th>
                                <th style="width: 30%;text-align: center">Descripcion</th>
                                <th style="width: 5%;text-align: center">Id Color</th>
                                <th style="width: 30%;text-align: center">Color</th>
                                <th style="width: 5%;text-align: center">Id Talle</th>
                                <th style="width: 30%;text-align: center">Talle</th>
                                <th style="width: 10%">Cantidad</th> 
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

<div class="modal fade" id="modalColores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span></h4>
            </div>
            <div class="modal-body">
            <div id="sent" class="col-3"></div>
                <form action="<?php echo base_url('mipanel/colores/accion');?>" id="formColores" method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                    <input type="hidden" id="Opcion" name="Opcion" value="">
                    <input type="hidden" id="id" name="id" value="">

                    <div class="form-group has-feedback">
                        <label for="description" class="control-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
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
