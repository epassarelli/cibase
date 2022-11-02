<section class="content-header">
    <h1>
        Backend
        <small>Form de bloques</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Bloques</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Bloques</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">

		<form method="POST" action="<?php echo site_url('mipanel/bloques/'.$accion); ?>"  enctype="multipart/form-data" >
		  <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <label for="pagina_id" class="control-label">Pagina</label>

          <select class="form-control" id="pagina_id" name="pagina_id" required>
            <option value=""> Seleccione una opción</option>
              <?php foreach ($paginas as $pag): ?>
                <option value="<?php echo $pag->pagina_id; ?>" <?php if( (isset($bloque)) and ($pag->pagina_id == $bloque->pagina_id) ) echo "selected"; ?> ><?php echo $pag->categoria; ?></option> 
              <?php endforeach; ?>
          </select>
        </div>
      </div>


      <div class="col-md-3">
          <div class="form-group">
              <label for="texto1" class="control-label">Texto 1</label>
              <input type="text" class="form-control" id="texto1" name="texto1" value="<?php echo set_value('texto1', @$comp->texto1); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>


      <div class="col-md-12">
          <div class="form-group">
              <label for="texto2" class="control-label">Texto 2</label>
              <textarea class="form-control" id="texto2" name="texto2" rows="4"><?php echo set_value('texto2', @strip_tags(html_entity_decode($comp->texto2))); ?></textarea>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>


      <!-- Portada JPG -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="col">
          <div class="col-form-label pt-0 text-dark">Adjuntar imagen <span class="text-danger">*</span></div>
            
          <!-- insertar imagen -->
            <div id="subirImagen" class="botonFile color-scheme-recursos">
              <label for="imagen" class="btn btn-success"> 
              <i class="fa fa-upload text-white" aria-hidden="true" title="Subir imagen" alt="Subir imagen"></i> 
              <span class="sr-only"> Adjuntar imagen</span> </label>
              <span class="fileIconImagen titleAdImagen ml-1 text-recursos"> 
                  <!-- trae el nombre del imagen en JPG del js/publicaciones.js --> 
              </span><br>
              <?php echo form_error('imagen');?>
            </div>   
            
            <!-- delete imagen -->
            <div id="borrarImagen" class="botonDelete"> 
              <input type="hidden" id="NameImagen" name="NameImagen" value="<?php echo set_value('imagen', @$pub->imagen); ?>" class="form-control-file">
                <button type="button" class="btn btn-danger eliminar" data-campo="imagen" data-file="<?php echo @$pub->imagen; ?>">
                  <i class="fa fa-trash" aria-hidden="true" title="eliminar imagen" alt="eliminar imagen"></i>
                  <span class="sr-only">Eliminar imagen</span>
                </button>
                <span class="ml-1 h6"><?php echo set_value('imagen', @$comp->imagen); ?> </span> 
            </div>

          </div>  
        </div>
      </div>      



      <div class="col-md-12">
          <div class="form-group">
            
            <?php if($accion == 'editar'): ?>
              <input type="hidden" id="id" name="id" value="<?php echo set_value('id', @$pub->publicacion_id); ?>">
              <input type="hidden" id="ImagenOriginal" name="ImagenOriginal" value="<?php echo set_value('imagen', @$pub->imagen); ?>" class="form-control-file">
            <?php endif; ?>

            <input type="file" name="imagen" id="imagen" class="sr-only form-control-file">
            
            <input type="submit" value="Guardar" class="btn btn-success">
            
            <a href="<?php echo site_url('mipanel/bloques'); ?>" class="btn btn-default">
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