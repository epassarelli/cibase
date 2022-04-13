<section class="content-header">
    <h1>
        Pedidos
        <small>Edicion</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Pedidos</li>
    </ol>
</section>
<section class="content">
             <form action="<?php echo base_url('mipanel/pedidos/accion');?>"  method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                        
    
                    <?php 
                          if (isset($pedido)) {
                               $id       = $pedido[0]->id;
                               $fecha    = $pedido[0]->fecha;
                               $apellido = $pedido[0]->apellido;
                               $nombre   = $pedido[0]->nombre;
                               $calle    = $pedido[0]->calle;
                               $nro      = $pedido[0]->nro;
                               $piso     = $pedido[0]->piso;
                               $dpto     = $pedido[0]->dpto;
                               $provincia_id = $pedido[0]->provincia_id;
                               $localidad_id = $pedido[0]->localidad_id;
                               $entrega_id = $pedido[0]->entrega_id;
                               $email       = $pedido[0]->email;
                               $telefono      = $pedido[0]->telefono;
                            }else{
                              $id       = '';
                              $fecha    = '';
                              $apellido = '';
                              $nombre   = '';
                              $calle    = '';
                              $nro      = '';
                              $piso     = '';
                              $dpto     = '';
                              $provincia_id = '';
                              $localidad_id = '';
                              $entrega_id = '';
                              $email       = '';
                              $telefono      = '';

                            }

                           

                             
                ?>
    
    
    
                    <div class="row">
                            <div class="col-md-2 col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="id" class="control-label">Id</label>
                                        <input type="text" class="form-control" id="id" name="id" name="nombre"  value="<?php echo set_value('id',@$id); ?>" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="fecha" class="control-label">Fecha</label>
                                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo set_value('fecha',@$fecha); ?>" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                  <label class="font-weight-bold text-dark text-2">Forma de Entrega</label>
                                  <select class="form-control" 
                                      id="entrega_id" 
                                      name="entrega_id" 
                                      onchange="cambiaEntrega($(this.value))"
                                      >
                                    <?php 
                                      echo  "<option value=0>Seleccione una Forma de Entrega</option>";
                                      foreach ($entregas as $entrega) {
                                        if (set_value('entrega_id',@$entrega_id)==$entrega->id) { 
                                          echo '<option value="' .$entrega->id. '"" selected>' . $entrega->nombre  . ' '  . 
                                                                      $entrega->detalle . ' $ ' .
                                                                      $entrega->costo   . '  </option>';  
                                        }else
                                          echo '<option value="' .$entrega->id. '"">' . $entrega->nombre  . ' '  . 
                                                                  $entrega->detalle . ' $ ' .
                                                                  $entrega->costo   . '  </option>';  
                                        }
                                    ?> 
                                    </select>               
                                    <?php if (!empty(form_error('entrega_id'))): ?> <?php  echo  form_error('entrega_id') ;?> <?php endif;?>

                                </div>
                              </div>


                    </div>
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12">
                                <div class="form-group has-feedback">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo set_value('apellido',@$apellido); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre',@$nombre); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-6 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_calle" class="control-label">Calle</label>
                                    <input type="text" class="form-control" id="del_calle" name="del_calle" value="<?php echo set_value('calle',@$calle); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>        
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_nro" class="control-label">Numero</label>
                                    <input type="text" class="form-control" id="del_nro" name="del_nro" value="<?php echo set_value('nro',@$nro); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-2 col-sm-12">                                                                
                                <div class="form-group has-feedback">
                                    <label for="del_piso" class="control-label">Piso</label>
                                    <input type="text" class="form-control" id="del_piso" name="del_piso" value="<?php echo set_value('piso',@$piso); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_dpto" class="control-label">Dpto.</label>
                                    <input type="text" class="form-control" id="del_dpto" name="del_dpto" value="<?php echo set_value('dpto',@$dpto); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>                                                                                        
                    </div>
                    <div class="row">
                       <div class="col-md-6 col-sm-12">                                                                                        
                            <div class="form-group has-feedback">
                                    <label class="form-group has-feedbak id="lblprovincia">Provincia</label>
                                    <select class="form-control" id="provincia" name="provincia" >
                                    <?php  
                                         echo  "<option value=0>Seleccione una Provincia</option>"; 
                                         foreach ($provincias as $prov) {
                                            if (set_value('provincia_id',@$provincia_id)==$prov->id) { 
                                               echo '<option value="' .$prov->id. '"" selected>' . $prov->nombre . '  </option>';  
                                             }else{
                                               echo '<option value="' .$prov->id. '"">' . $prov->nombre . ' </option>';  
                                            }
                                          }   
                                    ?> 
                                    </select>               
                                    <?php if (!empty(form_error('provincia'))): ?> <?php  echo  form_error('provincia') ;?> <?php endif;?>
                                </div>
                        </div>     
                        
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group has-feedback">   
                                <label class="form-group has-feedbak" id="lbllocalidad">Localidad</label>
                                <select class="form-control" id="localidad" name="localidad">
                                <?php  
                                         echo  "<option value=0>Seleccione una Localidad</option>"; 
                                         foreach ($localidades as $loc) {
                                            if (set_value('localidad_id',@$localidad_id)==$loc->id) { 
                                                  echo '<option value="' .$loc->id. '"" selected>' . $loc->nombre . '  </option>';  
                                               }else{
                                                  echo '<option value="' .$loc->id. '"">' . $loc->nombre . ' </option>';  
                                               }   
                                         }
                                    ?>                                 
                                
                                  </select>
                                <?php if (!empty(form_error('localidad'))): ?> <?php  echo  form_error('localidad') ;?> <?php endif;?>
                            </div>
                        </div>     
                    </div>                                      
                    <div class="row">
                        <div class="col-md-6 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="telefono" class="control-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono',@$telefono); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>                      
                        <div class="col-md-6 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="email" class="control-label">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email',@$email); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>                                
                    </div>

                    <p>
                        <button type="button" class="btn btn-primary margin insertar" ><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
                    </p>

                    <table id="detallepedidos" class="table table-bordered">
                        <thead>
                            <tr>
                                <th align="center">Producto</th>
                                <th align="center">Envasado Vacio</th>
                                <th align="center">Precio</th>
                                <th align="center">Cantidad</th>
                                <th align="center">Total</th>
                                <th align="center">Accion</th> 
                                <th align="center"  style="display: none;" >Vacio</th> 
                                <th align="center"  style="display: none;">Producto_id</th> 
                              </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedido as $a): ?>
                                <tr>
                                    <td><?php echo $a->titulo ?></td>
                                    <td  align="center"> 
                                       <?php if ($a->vacio==0): ?>	  
				   		                              <i class='vacio fa  fa-toggle-off fa-2x text-green'></i></a>
					                                <?php else:  ?>
						                                <i class='vacio fa  fa-toggle-on fa-2x text-green'></i></a>
					                              <?php endif; ?>		   
                                    </td>
                                    <td  align="right"><?php echo $a->preciounit ?></td>
                                    <td  align="right"><?php echo $a->cantidad ?></td>
                                    <td  align="right"><?php echo $a->precioitem ?></td>
                                    <td  align="center">
                                            <a href="javascript:void(0);"  onclick="Editar($(this))"  class='editar btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a>
                                            <a href="javascript:void(0);" class='eliminar btn btn-xs'  ><i class='fa fa-trash fa-2x text-red'></i></a>
                                    </td>
                                    <td style="display: none;">
                                      <?php echo $a->vacio; ?>
                                    </td>
                                    <td style="display: none;">
                                      <?php echo $a->producto_id; ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>    
                        </tbody>
                    </table>
                    <table style="width: 20%;" class="table table-bordered">
                      <tr>
                        <td align="left" >Sutotal</td>
                        <td align="right" ><?php echo $pedido[0]->subtotal ?></td>
                      </tr>
                      <tr>
                        <td>Envio</td>
                        <td  align="right"><?php echo $pedido[0]->delivery ?></td>
                      </tr>
                      <tr>
                        <td>Envasado Vacio</td>
                        <td  align="right"><?php echo $pedido[0]->env_vacio ?></td>
                      </tr>
                      <tr>
                        <td><h4><strong>Total</h4></strong></td>
                        <td  align="right"><h4><strong><?php echo $pedido[0]->total ?><strong><h4></td>
                      </tr>



                    </table>

                    <div class="footer">
                            <button type="button" class="btn btn-default">Cerrar</button>
                            <button type="submit" class="btn btn-primary titulo">Grabar</button>
                    </div>
                </form>
</section>                


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

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group has-feedback">   
                                <label class="control-label">Producto</label>
                                <select class="form-control" id="producto_id" name="producto_id" onchange="cambiaProducto()">
                                    <?php 
                                      echo  "<option value=0>Seleccione un Producto</option>";
                                      foreach ($productos as $prod) {
                                          echo '<option value="' .$prod->producto_id. '"" >' . $prod->titulo . '</option>';  
                                      }
                                    ?>                                     
                                </select>
                                <?php if (!empty(form_error('producto_id'))): ?> <?php  echo  form_error('producto_id') ;?> <?php endif;?>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="preciounit" class="control-label">Precio</label>
                                    <input type="text" class="form-control" id="preciounit" name="preciounit" value="<?php echo set_value('preciounit',@$preciounit); ?>" readonly>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div> 
                        
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="cantidad" class="control-label">Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo set_value('cantidad',@$cantidad); ?>" onchange="cambiaProducto()">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>                          
                        
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="total" class="control-label">Total</label>
                                    <input type="text" class="form-control" id="total" name="total" value="<?php echo set_value('total',@$total); ?>" readonly>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>       

                    </div>    
                    <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                  <button type="button" class="btn btn-primary titulo" onclick="aceptar()">Aceptar</button>
            </div>     

               
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
