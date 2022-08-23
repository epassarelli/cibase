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



<div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

             <form id="formpedidos" action="<?php echo base_url('mipanel/pedidos/pedidoValidation');?>"  method="post" enctype="multipart/form-data">
                    <!-- DATOS DE CONDICIONES -->
                        
    
                    <?php 
                            $accion = $operacion;   
                            if ($accion == 'E') {
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
                               $telefono    = $pedido[0]->telefono;

                               $subtotal = $pedido[0]->subtotal ;
                               $env_vacio = $pedido[0]->env_vacio ;
                               $delivery = $pedido[0]->delivery ;
                               $total = $pedido[0]->total ;

                            }else{
                              $id       = '';
                              $fecha    = date('Y-m-d H:i:s');
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

                              $subtotal = "0.00";
                              $env_vacio = "0.00";
                              $delivery = "0.00";
                              $total = "0.00";

                            }

                           

                             
                ?>
    
                    <input type="hidden" class="form-control" id="domicilio_requerido"  name="domicilio_requerido"  value="<?php echo set_value('id',@$id); ?>" readonly>
    
                    <div class="row">
                            <div class="col-md-2 col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="id" class="control-label">Id</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?php echo set_value('id',@$id); ?>" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <input type="hidden" class="form-control" id="accion" name="accion" value="<?php echo set_value('accion',@$accion); ?>" readonly>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="fecha" class="control-label">Fecha</label>
                                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo set_value('fecha',@$fecha); ?>" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        
                                    </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <label for="entrega_id" class="font-weight-bold text-dark text-2">Forma de Entrega</label>
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
                    <div class="row">
                        
                        <div class="col-md-3 col-sm-12">
                                <div class="form-group has-feedback">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo set_value('apellido',@$apellido); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <?php if (!empty(form_error('apellido'))): ?> <?php  echo  form_error('apellido') ;?> <?php endif;?>
                        </div>
                        <div class="col-md-3 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre',@$nombre); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-4 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label id="lblcalle" for="del_calle" class="control-label">Calle</label>
                                    <input type="text" class="form-control" id="del_calle" name="del_calle" value="<?php echo set_value('calle',@$calle); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <?php if (!empty(form_error('del_calle'))): ?> <?php  echo  form_error('del_calle') ;?> <?php endif;?>
                                </div>
                        </div>        
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label id='lblnro' for="del_nro" class="control-label">Numero</label>
                                    <input style="align=right;" type="text" class="form-control" id="del_nro" name="del_nro" value="<?php echo set_value('nro',@$nro); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <?php if (!empty(form_error('del_nro'))): ?> <?php  echo  form_error('del_nro') ;?> <?php endif;?>
                                </div>
                        </div>
                        <div class="col-md-2 col-sm-12">                                                                
                                <div class="form-group has-feedback">
                                    <label for="del_piso" class="control-label">Piso</label>
                                    <input  type="text" class="form-control" id="del_piso" name="del_piso" value="<?php echo set_value('piso',@$piso); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <?php if (!empty(form_error('del_piso'))): ?> <?php  echo  form_error('del_piso') ;?> <?php endif;?>
                                </div>
                        </div>
                        <div class="col-md-2 col-sm-12">                                                                                        
                                <div class="form-group has-feedback">
                                    <label for="del_dpto" class="control-label">Dpto.</label>
                                    <input type="text" class="form-control" id="del_dpto" name="del_dpto" value="<?php echo set_value('dpto',@$dpto); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <?php if (!empty(form_error('del_dpto'))): ?> <?php  echo  form_error('del_dpto') ;?> <?php endif;?>
                                </div>
                        </div>                                                                                        
                    </div>
                    <div class="row">
                       <div class="col-md-3 col-sm-12">                                                                                        
                            <div class="form-group has-feedback">
                                    <label  class="form-group has-feedbak" id="lblprovincia" >Provincia</label>
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
                        
                        
                        <div class="col-md-3 col-sm-12">
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
                        <div class="col-md-3 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="telefono" class="control-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono',@$telefono); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <?php if (!empty(form_error('telefono'))): ?> <?php  echo  form_error('telefono') ;?> <?php endif;?>
                                </div>
                        </div>                      
                        <div class="col-md-3 col-sm-12">                                                        
                                <div class="form-group has-feedback">
                                    <label for="email" class="control-label">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email',@$email); ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <?php if (!empty(form_error('email'))): ?> <?php  echo  form_error('email') ;?> <?php endif;?>
                                </div>
                        </div>                                
                    </div>

                    <p>
                        <button type="button" class="btn btn-primary margin insertar" onclick="Agregar()"><i class='fa fa-plus-circle fa-lg'></i>    Insertar </button>
                    </p>

                    <table id="detallepedidos" class="table table-bordered">
                        <thead>
                            <tr>
                                <th align="center">Producto</th>
                                <th align="center">Color</th>
                                <th align="center">Talle</th>
                                <th align="center">Precio</th>
                                <th align="center">Cantidad</th>
                                <th align="center">Total</th>
                                <th align="center">Accion</th> 
                                <th align="center"  style="display: none;">Producto_id</th> 
                                <th align="center"  style="display: none;">idcolor</th> 
                                <th align="center"  style="display: none;">idtalle</th> 
                              </tr>
                        </thead>
                        <tbody>
                          <?php if (isset($pedido) & $pedido != null): ?> 
                            <?php foreach ($pedido as $a): ?>
                                <tr>
                                    <td class="col-md-3 col-sm-12"><input readonly type="text" class="form-control"  name="titulo[]"  value="<?php echo $a->titulo; ?>"></td>
                                    <td class="col-md-2 col-sm-12"><input readonly type="text" class="form-control"  name="nomcolor[]"  value="<?php echo $a->nomcolor; ?>"></td>
                                    <td class="col-md-1 col-sm-12"><input readonly type="text" class="form-control"  name="nomtalle[]"  value="<?php echo $a->nomtalle; ?>"></td>
                                    <td  class="col-md-2 col-sm-12" align="right"><input readonly type="text" class="form-control dinero"  name="preciounit[]"  value="<?php echo $a->preciounit; ?>"></td>
                                    <td  class="col-md-2 col-sm-12" align="right"><input readonly type="text" class="form-control dinero"  name="cantidad[]"  value="<?php echo $a->cantidad; ?>"></td>
                                    <td  class="col-md-2 col-sm-12" align="right"><input readonly type="text" class="form-control dinero"  name="precioitem[]"  value="<?php echo $a->precioitem; ?>"></td>
                                    <td  align="center">
                                        <a href="javascript:void(0);"  onclick="Editar($(this))"  class='editar btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a>
                                        <a href="javascript:void(0);"  onclick="Eliminar($(this))"  class='eliminar btn btn-xs'  ><i class='fa fa-trash fa-2x text-red'></i></a>
                                    </td>
                                    <td style="display:none">
                                        <input type="text" class="form-control"  name="producto_id[]"  value="<?php echo $a->producto_id; ?>">
                                    </td>
                                    <td style="display:none">
                                        <input type="text" class="form-control"  name="idcolor[]"  value="<?php echo $a->idcolor; ?>">
                                    </td>
                                    <td style="display:none">
                                        <input type="text" class="form-control"  name="idtalle[]"  value="<?php echo $a->idtalle; ?>">
                                    </td>

                                </tr>
                            <?php endforeach; ?>    
                          <?php endif; ?>       
                        </tbody>
                    </table>
                    
                    <input type="hidden" class="form-control" id="cost_unit_vacio" name="cost_unit_vacio" value="<?php echo set_value('cost_unit_vacio',@$cost_unit_vacio); ?>" >
                    
                    <table style="width: 20%;" class="table table-bordered">
                      <tr>
                        <td align="left" >Subtotal</td>
                        <td align="right"><input  readonly type="text" class="form-control dinero"  name="subtotal" id="subtotal"  value="<?php echo set_value('subtotal',@$subtotal);  ?>"></td>
                      </tr>
                      <tr>
                        <td>Envio</td>
                        <td align="right"><input readonly type="text" class="form-control dinero"  name="delivery"  id="delivery" value="<?php echo set_value('delivery',@$delivery);  ?>"></td>
                      </tr>
                      <tr>
                        <td><h4><strong>Total</h4></strong></td>
                        <td align="right"><input  readonly type="text" class="form-control dinero"  name="total" id="total"  value="<?php echo set_value('total',@$total);  ?>"></td>

                      </tr>



                    </table>

                    <div class="footer">
                             <a href="<?php echo site_url('mipanel/pedidos'); ?>"  class="btn btn-default" role="button"> Cerrar</a>
                            <button type="button" class="btn btn-primary titulo" onclick="grabarPedido()">Grabar</button>
                    </div>
             </form>
              


<!-- --------------------- -->
<!-- MODAL DE FORMULARIO -->
<!-- --------------------- -->

<div class="modal fade" id="modalPedidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span>Producto.<small id='operacion'></small></h4>
                 </h1>
            </div>
            <div class="modal-body">
                    <div id="sent" class="col-3" ></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group has-feedback">   
                                    <label class="control-label">Producto</label>
                                    <select class="form-control" id="m_producto_id" name="m_producto_id" onchange="cambiaProducto()">
                                        <?php 
                                        echo  "<option value=0>Seleccione un Producto</option>";
                                        foreach ($productos as $prod) {
                                            echo '<option value="' .$prod->producto_id. '"" >' . $prod->titulo . '</option>';  
                                        }
                                        ?>                                     
                                    </select>
                                    <?php if (!empty(form_error('m_producto_id'))): ?> <?php  echo  form_error('m_producto_id') ;?> <?php endif;?>
                                </div>
                            </div>
                            <input type="hidden" id="titulo" name="titulo" value="">
                            <div class="col-md-2 col-sm-12">                                                                                        
                                    <div class="form-group has-feedback">
                                        <label for="m_preciounit" class="control-label">Precio</label>
                                        <input type="text" class="form-control" id="m_preciounit" name="m_preciounit" value="<?php echo set_value('preciounit',@$preciounit); ?>" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div> 
                            
                            <div class="col-md-2 col-sm-12">                                                                                        
                                    <div class="form-group has-feedback">
                                        <label for="m_cantidad" class="control-label">Cantidad</label>
                                        <input type="text" class="form-control" id="m_cantidad" name="m_cantidad" value="<?php echo set_value('cantidad',@$cantidad); ?>" onchange="cambiaProducto()">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div>                          
                            
                            <div class="col-md-2 col-sm-12">                                                                                        
                                    <div class="form-group has-feedback">
                                        <label for="m_total" class="control-label">Total</label>
                                        <input type="text" class="form-control" id="m_total" name="m_total" value="<?php echo set_value('total',@$total); ?>" readonly>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                            </div>       
                        </div>    


                        <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group has-feedback">                                       
                                            <label class="control-label">Color</label>
                                            <select class="form-control" 
                                                            name="color" 
                                                                id="color" 
                                                                required=""
                                                                onchange="checkStock()">
                                                    <option value="0">Seleccione Color</option>
                                                    <?php foreach ($colores as $color): ?>
                                                        <option value="<?php echo $color->id; ?>"><?php echo $color->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>                    

                                    <div class="col-md-3 col-sm-12">
                                        <label for="talle">Talle</label>
                                        <select class="form-control" 
                                                    name="talle" 
                                                        id="talle" 
                                                        required=""
                                                        onchange="checkStock()">
                                    
                                            <option value="0">Seleccione Talle</option>
                                            <?php foreach ($talles as $talle): ?>
                                                <option value="<?php echo $talle->id; ?>"><?php echo $talle->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                        </div>
                    </div>    
                    <div class="modal-footer">
                        <div class="row" style="float: left;">
                            <small>Los campos producto,talle,color y cantidad son obligatorios</small>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="button" id="additempedido" class="btn btn-primary titulo" onclick="aceptar()" disabled >Aceptar</button>
                     </div>     
            </div>
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
</section>  