<section class="content-header">
    <h1>
        Backend
        <small>Listado de paginas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Páginas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Páginas</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">

		<form method="POST" action="<?php echo site_url('mipanel/paginas/'.$accion); ?>"  enctype="multipart/form-data" >
		  <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <label for="modulo_id" class="control-label">Módulo</label>

          <select class="form-control" id="modulo_id" name="modulo_id" required>
            <option value=""> Seleccione una opción</option>
              <?php foreach ($modulos as $mod): ?>
                <option value="<?php echo $mod->modulo_id; ?>" <?php if( (isset($pag)) and ($mod->modulo_id == $pag->modulo_id) ) echo "selected"; ?> ><?php echo $mod->modulo; ?></option> 
              <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="idioma_id" class="control-label">Idioma</label>

          <select class="form-control" id="idioma_id" name="idioma_id" required>
            <option value=""> Seleccione un idioma</option>
              <?php foreach ($idiomas as $i): ?>
                <option value="<?php echo $i->idioma_id; ?>" <?php if( (isset($pag)) and ($i->idioma_id == $pag->idioma_id) ) echo "selected"; ?> ><?php echo $i->idioma; ?></option> 
              <?php endforeach; ?>
          </select>
        </div>
      </div>

		  <div class="col-md-6">
		      <div class="form-group">
		          <label for="titulo" class="control-label">Titulo</label>
		          <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo set_value('titulo', @$pag->titulo); ?>">
		          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
		      </div>
		  </div>


      <div class="col-md-3">
          <div class="form-group">
              <label for="menu" class="control-label">¿Va al menú ?</label>
              <br>
              <?php if($accion == 'editar'): ?>
              <input type="radio" id="menu" name="menu" value="1" <?php echo set_value('menu', $pag->menu) == 1 ? "checked" : ""; ?>>
              <label for="1">Si </label>
              <input type="radio" id="menu" name="menu" value="0" <?php echo set_value('menu', $pag->menu) == 0 ? "checked" : ""; ?>>
              <label for="0">No </label>

              <?php else: ?>
                <input type="radio" id="menu" name="menu" value="1">
              <label for="1">Si </label>
              <input type="radio" id="menu" name="menu" value="0">
              <label for="0">No </label>
              <?php endif; ?>

              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group">
              <label for="orden" class="control-label">Orden en el menú </label>
              <input type="number" class="form-control" id="orden" name="orden" value="<?php echo set_value('orden', @$pag->orden); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>








      <div class="col-md-12">
          <div class="form-group">
            
            <?php if($accion == 'editar'): ?>
              <input type="hidden" id="id" name="id" value="<?php echo set_value('id', @$pag->seccion_id); ?>">
            <?php endif; ?>
            
            <input type="submit" value="Guardar" class="btn btn-success">
            
            <a href="<?php echo site_url('mipanel/paginas'); ?>" class="btn btn-default">
              <i class="fa fa-reply"></i> Volver al listado
            </a>
          </div>
      </div>

			</div>
		</form>






    </div>

  </div>

</section>


<!-- INICIO myModal  -->
<!-- <div class="modal fade" id="modalFile" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalFileLabel" aria-hidden="true"> -->
<!-- 
<div class="modal fade" id="modalFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="modalFileLabel"><i class="fa fa-exclamation-triangle text-danger"></i> Advertencia</h3>        

      </div>
      <div class="modal-body">
        <p class="font-weight-normal">¿Está seguro que desea eliminar el documento?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="botonAcepto" class="btn btn-danger Eliminar">Eliminar</button>
        <button type="button" id="botonNoAcepto" class="btn btn-secondary" data-dismiss="modal">No acepto</button>
      </div>     
    </div>
  </div>
</div> 
-->
<!-- FIN myModal  --> 