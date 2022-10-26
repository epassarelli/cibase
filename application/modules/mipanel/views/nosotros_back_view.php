<section class="content-header">
    <h1>
        Nosotros
        <small>Quiene somos - Mision - Vision</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mi Panel</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Nosotros</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <div class="box-body">

 <div class="row">
 <form action="<?php echo base_url('mipanel/nosotros/accion');?>" id="formNosotros" method="POST" enctype="multipart/form-data">
    <!-- PRIMER PANEL NOSOTROS-->
<div class="col-sm-6 col-md-4">
        <h3>Quienes Somos</h3>
<div class="box">
    <div class="box-body">  
    <div class="thumbnail">
      <div class="form-group has-feedback imagen1">
          <label for="Imagen" class="control-label">Imagen</label>
          <a href="javascript:void(0)">  
            <img src="<?php echo base_url('assets/images/400x300.jpg');?>" class="img-responsive" alt="Responsive image" id="imagen1F" width="400" height="300">
          </a>
        <input type="hidden" name="Fileqs" id="Fileqs" class="FileQs" value="">
        <input type="file" id="FileQs" name="FileQs" class="file">
      </div>
 
      <div class="caption">
       <div class="form-group has-feedback">
            <label for="TituloQs" class="control-label">Titulo</label>
            <input type="text" class="form-control" id="TituloQs" name="TituloQs" value="">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="SubtituloQs" class="control-label">Subtitulo</label>
            <input type="text" class="form-control" id="SubtituloQs" name="SubtituloQs" value="">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="TextoQs" class="control-label">Descripcion</label>
            <textarea class="form-control" id="TextoQs" rows="6" name="TextoQs" value=""></textarea>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        </div><!-- caption -->
            </div><!-- Thumbnail -->
    </div><!-- box-body 1 panel -->
</div><!-- Box 1 panel -->
</div><!-- Tamaño del box 1 -->
<!-- FIN PANEL NOSOTROS-->

<!-- SEGUNDO PANEL MISION-->
<div class="col-sm-6 col-md-4">
        <h3>Mision</h3>
<div class="box">
    <div class="box-body">  
   <div class="thumbnail">
      <div class="form-group has-feedback imagen2">
          <label for="Imagen" class="control-label">Imagen</label>
          <a href="javascript:void(0)">  
            <img src="<?php echo base_url('assets/images/400x300.jpg');?>" class="img-responsive" alt="Responsive image" id="imagen2F" width="400" height="300">
          </a>
          <input type="file" id="FileM" name="FileM" class="file">
        <input type="hidden" name="Filem" id="Filem" class="FileM" value="">
      </div>
      <div class="caption">
       <div class="form-group has-feedback">
            <label for="TituloM" class="control-label">Titulo</label>
            <input type="text" class="form-control" id="TituloM" name="TituloM" value="">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="SubtituloM" class="control-label">Subtitulo</label>
            <input type="text" class="form-control" id="SubtituloM" name="SubtituloM" value="">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="TextoM" class="control-label">Descripcion</label>
            <textarea class="form-control" id="TextoM" rows="6" name="TextoM" value=""></textarea>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        </div><!-- caption -->
      </div><!-- Thumbnail -->    
    </div><!-- box-body 2 panel -->
</div><!-- Box 2 panel -->
</div><!-- Tamaño del box 2 -->
<!-- FIN PANEL MISION-->

<!-- TERCER PANEL  VISION-->
<div class="col-sm-6 col-md-4">
        <h3>Vision</h3>
<div class="box">
    <div class="box-body">  
    <div class="thumbnail">
      <div class="form-group has-feedback imagen3">
          <label for="Imagen" class="control-label">Imagen</label>
          <a href="javascript:void(0)">  
            <img src="<?php echo base_url('assets/images/400x300.jpg');?>" class="img-responsive" alt="Responsive image" id="imagen3F" width="400" height="300">
          </a>
           <input type="file" id="FileV" name="FileV" class="file">
           <input type="hidden" name="Filev" id="Filev" class="FileV" value="">
      </div>
      <div class="caption">
       <div class="form-group has-feedback">
            <label for="TituloV" class="control-label">Titulo</label>
            <input type="text" class="form-control" id="TituloV" name="TituloV" value="">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="SubtituloV" class="control-label">Subtitulo</label>
            <input type="text" class="form-control" id="SubtituloV" name="SubtituloV" value="">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="TextoV" class="control-label">Descripcion</label>
            <textarea class="form-control" id="TextoV" rows="6" name="TextoV" value=""></textarea>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        </div><!-- caption -->
      </div><!-- Thumbnail -->
    </div><!-- box-body 3 panel -->
</div><!-- Box 3 panel -->
</div><!-- Tamaño del box 3 -->
<!-- FIN PANEL VISION -->
</div><!-- /.row paneles -->
<div class="row">   
<div class="col-md-3 col-md-offset-10">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar Contenido</button>
    </div>
</div>
</div><!-- row submit -->

</form>
     </div><!-- /.box-body principal -->
    </div><!-- /.box principal-->
   </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
