<section class="content-header">
    <h1>
        Empresa
        <small>Datos de la empresa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Empresa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <form method="post" id="formEmpresa" action="<?php echo site_url('mipanel/empresa/accion') ?>">
                    <div class="row">
                    <div class="form-group has-feedback col-lg-12">
                        <h3>Nombre</h3>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <label for="Nombre">Razon Social</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre de la empresa">
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-lg-12">
                            <h3>Dirección</h3>
                        </div>
                    <div class="form-group has-feedback col-lg-3">
                        <label for="Pais">Pais</label>
                        <input type="text" class="form-control" id="Pais" name="Pais" placeholder="País">
                        <!-- <select class="form-control" name="Pais">
                          <option>Argentina</option>
                          <option>Brasil</option>
                          <option>Peru</option>
                          <option>Chile</option>
                          <option>Venezuela</option>
                        </select> -->
                    </div>
                    <div class="form-group has-feedback col-lg-3">
                        <label for="Provincia">Provincia</label>
                        <input type="text" class="form-control" id="Provincia" name="Provincia" placeholder="Provincia">
                        <!-- <select class="form-control" name="Provincia">
                          <option>Buenos Aires</option>
                          <option>Ramos Mejia</option>
                          <option>Vicente Lopez</option>
                          <option>Moron</option>
                          <option>Castelar</option>
                        </select> -->
                    </div>
                    <div class="form-group has-feedback col-lg-3">
                        <label for="Localidad">Localidad</label>
                        <input type="text" class="form-control" id="Localidad" name="Localidad" placeholder="Localidad">
                        <!-- <select class="form-control" name="Localidad">
                          <option>Buenos Aires</option>
                          <option>Ramos Mejia</option>
                          <option>Vicente Lopez</option>
                          <option>Moron</option>
                          <option>Castelar</option>
                        </select> -->
                    </div>
                    <div class="form-group has-feedback col-lg-3">
                        <label for="CodigoP">Codigo Postal</label>
                        <input type="text" class="form-control" id="CodigoP" name="CodigoP" placeholder="Codigo Postal">
                    </div>
                    <div class="form-group has-feedback col-lg-8">
                        <label for="Direccion">Dirección</label>
                        <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Calle / Av.  Casa / Dpto.">
                    </div>
                    <div class="form-group has-feedback col-lg-4">
                        <label for="Coordenadas">Coordenadas</label>
                        <input type="text" class="form-control" id="Coordenadas" name="Coordenadas" placeholder="00°00'00.0'' N    0°00'00.0''E">
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-lg-12">
                            <h3>Contacto</h3>
                        </div>
                        <div class="form-group has-feedback col-lg-3">
                            <label for="Telefono1">Telefono</label>
                            <input type="text" class="form-control" id="Telefono1" name="Telefono1" placeholder="(011) 0000000000">
                        </div>
                        <div class="form-group has-feedback col-lg-3">
                            <label for="Telefono2">Telefono Alternativo</label>
                            <input type="text" class="form-control" id="Telefono2" placeholder="(011) 0000000000">
                        </div>
                        <div class="form-group has-feedback col-lg-5">
                            <label for="Correo">Email</label>
                            <input type="email" class="form-control" id="Correo" name="Correo" placeholder="cibase@example.com">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-lg-12">
                            <h3>Sociales</h3>
                        </div>
                        <div class="form-group has-feedback col-lg-3">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="Facebook" name="Facebook" placeholder="cibase">
                        </div>
                        <div class="form-group has-feedback col-lg-3">
                            <label for="Instagram">Instagram</label>
                            <input type="text" class="form-control" id="Instagram" name="Instagram" placeholder="@cibase">
                        </div>
                    </div>
                     <div class="form-group col-lg-3">
                        <button type="submit" class="btn btn-primary">Guardar Contenido</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->