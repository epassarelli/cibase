<section class="content-header">
    <h1>
        Backend
        <small>Listado de publicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Publicaciones</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Publicaciones</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">

		<form method="POST" action="<?php echo site_url('mipanel/publicaciones/'.$accion); ?>"  enctype="multipart/form-data" >
		  <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <label for="categoria" class="control-label">Categoria</label>

          <select class="form-control" id="categoria" name="categoria" required>
            <option value=""> Seleccione una opción</option>
              <?php foreach ($categorias as $cat): ?>
                <option value="<?php echo $cat->categoria_id; ?>" <?php if( (isset($pub)) and ($cat->categoria_id == $pub->categoria_id) ) echo "selected"; ?> ><?php echo $cat->categoria; ?></option> 
              <?php endforeach; ?>
          </select>
        </div>
      </div>


		  <div class="col-md-9">
		      <div class="form-group">
		          <label for="titulo" class="control-label">Titulo</label>
		          <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo set_value('titulo', @$pub->titulo); ?>">
		          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
		      </div>
		  </div>

      <div class="col-md-3">
          <div class="form-group">
              <label for="anio" class="control-label">Año</label>
              <input type="number" class="form-control" id="anio" name="anio" value="<?php echo set_value('anio', @$pub->anio); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group">
              <label for="isbn" class="control-label">ISBN</label>
              <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo set_value('isbn', @$pub->isbn); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group">
              <label for="paginas" class="control-label">Cant. Páginas</label>
              <input type="number" class="form-control" id="paginas" name="paginas" value="<?php echo set_value('paginas', @$pub->paginas); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-3">
          <div class="form-group">
              <label for="editor" class="control-label">Editor</label>
              <input type="text" class="form-control" id="editor" name="editor" value="<?php echo set_value('editor', @$pub->editor); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="formato" class="control-label">Formato</label>
              <input type="text" class="form-control" id="formato" name="formato" value="<?php echo set_value('formato', @$pub->formato); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="enlace" class="control-label">Enlace externo</label>
              <input type="text" class="form-control" id="enlace" name="enlace" value="<?php echo set_value('enlace', @$pub->enlace); ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <label for="resumen" class="control-label">Resumen</label>
              <textarea class="form-control" id="resumen" name="resumen" rows="10"><?php echo set_value('resumen', @strip_tags(html_entity_decode($pub->resumen))); ?></textarea>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>


      <!-- Portada JPG -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="col">
          <div class="col-form-label pt-0 text-dark">Adjuntar portada <span class="text-danger">*</span></div>
            
          <!-- insertar portada -->
            <div id="subirPortada" class="botonFile color-scheme-recursos">
              <label for="portada" class="btn btn-success"> 
              <i class="fa fa-upload text-white" aria-hidden="true" title="Subir portada" alt="Subir portada"></i> 
              <span class="sr-only"> Adjuntar portada</span> </label>
              <span class="fileIconPortada titleAdPortada ml-1 text-recursos"> 
                  <!-- trae el nombre del portada en JPG del js/publicaciones.js --> 
              </span><br>
              <?php echo form_error('portada');?>
            </div>   
            
            <!-- delete portada -->
            <div id="borrarPortada" class="botonDelete"> 
              <input type="hidden" id="NamePortada" name="NamePortada" value="<?php echo set_value('portada', @$pub->portada); ?>" class="form-control-file">
                <button type="button" class="btn btn-danger eliminar" data-campo="portada" data-file="<?php echo @$pub->portada; ?>">
                  <i class="fa fa-trash" aria-hidden="true" title="eliminar portada" alt="eliminar portada"></i>
                  <span class="sr-only">Eliminar portada</span>
                </button>
                <span class="ml-1 h6"><?php echo set_value('portada', @$pub->portada); ?> </span> 
            </div>

          </div>  
        </div>
      </div>      


      <!-- Publicacion PDF -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="col">
          <div class="col-form-label pt-0 text-dark">Adjuntar publicacion <span class="text-danger">*</span></div>
            
          <!-- insertar publicacion -->
            <div id="subirPublicacion" class="botonFile color-scheme-recursos">
              <label for="publicacion" class="btn btn-success"> 
              <i class="fa fa-upload text-white" aria-hidden="true" title="Subir publicacion" alt="Subir publicacion"></i> 
              <span class="sr-only"> Adjuntar publicacion</span> </label>
              <span class="fileIconPublicacion titleAdPublicacion ml-1 text-recursos"> 
                  <!-- trae el nombre de la publicacion en PDF de js/publicaciones.js --> 
              </span><br>
              <?php echo form_error('publicacion');?>
            </div>   
            
            <!-- delete publicacion -->
            <div id="borrarPublicacion" class="botonDelete"> 
              <input type="hidden" id="NamePublicacion" name="NamePublicacion" value="<?php echo set_value('publicacion', @$pub->publicacion); ?>" class="form-control-file">
                <button type="button" class="btn btn-danger eliminar" data-campo="publicacion" data-file="<?php echo @$pub->publicacion; ?>">
                  <i class="fa fa-trash" aria-hidden="true" title="eliminar publicacion" alt="eliminar publicacion"></i>
                  <span class="sr-only">Eliminar publicacion</span>
                </button>
                <span class="ml-1 h6"><?php echo set_value('publicacion', @$pub->publicacion); ?> </span> 
            </div>

          </div>  
        </div>
      </div>




      <div class="col-md-12">
          <div class="form-group">
            
            <?php if($accion == 'editar'): ?>
              <input type="hidden" id="id" name="id" value="<?php echo set_value('id', @$pub->publicacion_id); ?>">
              <input type="hidden" id="PortadaOriginal" name="PortadaOriginal" value="<?php echo set_value('portada', @$pub->portada); ?>" class="form-control-file">
              <input type="hidden" id="PublicacionOriginal" name="PublicacionOriginal" value="<?php echo set_value('publicacion', @$pub->publicacion); ?>" class="form-control-file">
            <?php endif; ?>

            <input type="file" name="portada" id="portada" class="sr-only form-control-file">
            <input type="file" name="publicacion" id="publicacion" class="sr-only form-control-file">
            
            <input type="submit" value="Guardar" class="btn btn-success">
            
            <a href="<?php echo site_url('mipanel/publicaciones'); ?>" class="btn btn-default">
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