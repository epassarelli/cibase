
<section class="content-header">
    <h1>
        Stocks
        <small>Listado de Stock</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Stocks</li>
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

                    <table id="stocksAbm" class="table table-bordered">
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

<div class="modal fade" id="modalHistoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle"><span class="titulo"></span></h4>
            </div>
            <div class="modal-body">
     
            <table id="stocksHistoria" class="table table-bordered">
                        <thead>
                            <tr>
                        <!--         <th style="width: 5%;text-align: center">Id Producto</th>
                                <th style="width: 30%;text-align: center">Descripcion</th> -->
                                <th style="width: 5%;text-align: center">Id Talle</th>
                                <th style="width: 15%;text-align: center">Talle</th>
                                <th style="width: 5%;text-align: center">Id Color</th>
                                <th style="width: 15%;text-align: center">Color</th>
                                <th style="width: 10%">Cantidad</th> 
                                <th style="width: 10%">Fecha</th> 
                                <th style="width: 10%">Usuario</th> 
                                <th style="width: 30%">Tipo</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
