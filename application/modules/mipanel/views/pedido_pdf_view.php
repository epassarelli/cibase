<div class="container" >
       <div class="row" >
   
          <h1 style="text-align: center;">Pedido Numero: <?php echo $pedido[0]->id ?></h1>
        
          
          <p>Fecha: <?php echo $pedido[0]->fecha ?> </p>
          <p>Nombre: <?php echo trim($pedido[0]->apellido) . ' ' . trim($pedido[0]->nombre) ?></p>
          <p>Mail: <?php echo trim($pedido[0]->email)?> </p>
          <p>Telefono: <?php echo trim($pedido[0]->telefono)?></p> 

          <p>Domicilio</p>
          <p>Calle: <?php echo trim($pedido[0]->calle)?></p>
          <p>Numero: <?php echo trim($pedido[0]->nro)?></p>
          <p>Piso: <?php echo trim($pedido[0]->piso)?></p>
          <p>Dpto: <?php echo trim($pedido[0]->dpto)?></p>
          <p>Localidad: <?php echo trim($pedido[0]->localidad)?></p>
          <p>Provincia: <?php echo trim($pedido[0]->provincia)?></p>


          <p>Entrega: <?php echo $pedido[0]->nomentrega ?></p>
       </div> 



       <div class="row" >
                  <table class="table table-hover table-condensed table-bordered"> 
                      <thead class="datahead" >
                          <tr>
                              <th>Cantidad</th>
                              <th>Producto</th>
                              <th>Unitario</th>
                              <th>Total</th>
                              <th>Env.Vacio</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($pedido as $lineas): ?>
                              <tr>
                                <td><?php echo $lineas->cantidad; ?></td>
                                <td><?php echo $lineas->titulo; ?></td>
                                <td><?php echo $lineas->preciounit; ?></td>
                                <td><?php echo $lineas->precioitem; ?></td>
                                <td><?php if ($lineas->vacio==1) { echo  'Si'; }  ; ?></td>
                              </tr> 
                        <?php endforeach; ?>
                      </tbody>
                  </table>
        </div>
        <div class="row">
            <p>Sub-Total: <?php echo $pedido[0]->subtotal ?></p>
            <p>Envasado: <?php echo $pedido[0]->env_vacio ?></p>
            <p>Delivery: <?php echo $pedido[0]->delivery ?></p>
            <h3>Total: <?php echo $pedido[0]->total ?></h3>
        </div>
      
  



</div>       