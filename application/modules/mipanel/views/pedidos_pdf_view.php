
   <head>
     <style>
       table, th, td {
             border: 1px solid black;
              border-collapse: collapse;
              padding: 5px;
      }

       th {
        background-color: gray;
      } 
     </style>
   </head>


             <form id="formpedidos" action=""  method="post" enctype="multipart/form-data">
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
                               $provincia = $pedido[0]->provincia;
                               $localidad = $pedido[0]->localidad;
                               $entrega_id = $pedido[0]->entrega_id;
                               $email       = $pedido[0]->email;
                               $telefono    = $pedido[0]->telefono;
                               $nomentrega   = $pedido[0]->nomentrega;

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
    
                            
                <h1 align="center">Pedido</h1>            
                </p>
                <table style="width: 80%; margin-bottom: 20px" class="table table-bordered">
                  <tr>
                    <th>Número de Pedido</th>
                    <td><?php echo $id; ?></td>
                  </tr>
                  <tr>
                    <th>Fecha de Solicitud</th>
                    <td><?php echo $fecha; ?></td>
                  </tr>
                  <tr>
                    <th>Forma de Entrega</th>
                    <td><?php echo $nomentrega; ?></td>
                  </tr>
                  </table>

                <table style="width: 80%; text-align=left;" class="table table-bordered">
                  <tr>
                    <th>Apellido</th>
                    <td><?php echo $apellido; ?></td>
                    <th>Nombre</th>
                    <td><?php echo $nombre; ?></td>
                  </tr>                         
                  <tr>
                    <th>Calle</th>
                    <td><?php echo $calle; ?></td>
                    <th>Número</th>
                    <td><?php echo $nro; ?></td>
                  </tr>                                  
                  <tr>  
                    <th>Piso</th>
                    <td><?php echo $piso; ?></td>
                    <th>Depto.</td>
                    <td><?php echo $dpto; ?></td>
                  </tr>                        
                  <tr>
                    <th>Provincia</th>
                    <td><?php echo $provincia; ?></td>
                    <th>Localidad</th>
                    <td><?php echo $localidad; ?></td>
                  </tr>             
                  <tr>
                    <th>Teléfono</th>
                    <td><?php echo $telefono; ?></td>
                    <th>E-Mail</th>
                    <td><?php echo $email; ?></td>
                  </tr>          
                </table>                            
                </p>
                <h2 align="center">Detalle de Productos</h2>            
                </p>


                <table  id="detallepedidos" style="width: 80%;" class="table table-bordered">
                        <thead>
                            <tr>
                                <th align="center">Producto</th>
                                <?php if ($usa_vacio=="S"): ?> 
                                    <th align="center">Al Vacío</th>
                                <?php endif; ?>    
                                <th align="center">Precio</th>
                                <th align="center">Cantidad</th>
                                <th align="center">Total</th>
                              </tr>
                        </thead>
                        <tbody>
                          <?php if (isset($pedido) & $pedido != null): ?> 
                            <?php foreach ($pedido as $a): ?>
                                <tr>
                                    <td><?php echo $a->titulo; ?></td>
                                    <?php if ($usa_vacio=="S"): ?> 
                                          <td  align="center"> 
                                            <?php if ($a->vacio==0): ?>	  
                                                  <h4>No</h4>
                                                <?php else:  ?>
                                                  <h4>Si</h4>
                                              <?php endif; ?>		   
                                          </td>
                                    <?php endif; ?>    
                                    <td  align="right"><?php echo $a->preciounit; ?></td>
                                    <td  align="right"><?php echo $a->cantidad; ?></td>
                                    <td  align="right"><?php echo $a->precioitem; ?></td>
                                </tr>

                            <?php endforeach; ?>    
                          <?php endif; ?>       
                        </tbody>
                </table>

                </p>
                <h2 align="left">Totales</h2>        
                </p>
                   
                    <table style="width: 40%;" class="table table-bordered">
                      <tr>
                        <th align="left" >Subtotal</th>
                        <td align="right"><?php echo $subtotal;  ?></td>
                      </tr>
                      <tr>
                        <th align="left">Envio</th>
                        <td align="right"><?php echo $delivery;  ?></td>
                      </tr>
                      <tr>
                        <th align="left">Envasado Vacío</th>
                        <td align="right"><?php echo $env_vacio;  ?></td>
                      </tr>
                      <tr>
                        <th align="left"><strong>TOTAL</strong></td>
                        <td align="right"><h4><strong><?php echo $total;  ?></h4></strong></td>

                      </tr>



                    </table>
             </form>
              



