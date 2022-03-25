<section class="content-header">
    <h1>
        Backend
        <small>Listado de publicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
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
              <textarea class="form-control" id="resumen" name="resumen" rows="4"><?php echo set_value('resumen', @strip_tags(html_entity_decode($pub->resumen))); ?></textarea>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="portada" class="control-label">Portada</label>
              <input type="file" class="form-control" id="portada" name="portada" value="">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="publicacion" class="control-label">Publicacion</label>
              <input type="file" class="form-control" id="publicacion" name="publicacion" value="">
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
      </div>


      <div class="col-md-12">
          <div class="form-group">
            <input type="submit" value="Guardar" class="btn btn-success">
            <a href="<?php echo site_url('mipanel/publicaciones'); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Volver al listado</a>
          </div>
      </div>

			</div>
		</form>






    </div>

  </div>

</section>