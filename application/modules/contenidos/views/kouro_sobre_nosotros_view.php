<section class="section section-no-border m-0">
  <div id="demo" class="carousel slide d-none d-sm-block" data-ride="carousel">


    <ul class="carousel-indicators">

      <li data-target="#demo" data-slide-to="0" class=""></li>

      <li data-target="#demo" data-slide-to="1" class="active"></li>
      <li data-target="#demo" data-slide-to="2" class=""></li>
    </ul>


    <div class="carousel-inner">

      <div class="carousel-item">

        <img src="<?php echo site_url('assets/uploads/7/slider1.jpg'); ?>" width="100%" height="auto" alt="Slider">

        <div class="carousel-caption">
          <h1 style="color: white;"></h1>
          <p style="color: orange;"></p>
        </div>
      </div>

      <div class="carousel-item active">

        <img src="<?php echo site_url('assets/uploads/7/slider2.jpg'); ?>" width="100%" height="auto" alt="Slider">

        <div class="carousel-caption">
          <h1 style="color: white;"></h1>
          <p style="color: orange;"></p>
        </div>
      </div>

      <div class="carousel-item">

        <img src="<?php echo site_url('assets/uploads/7/slider3.jpg'); ?>" width="100%" height="auto" alt="Slider">

        <div class="carousel-caption">
          <h1 style="color: white;"></h1>
          <p style="color: orange;"></p>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>

</section>








<section class="section section-no-border m-0">
  <div class="container py-3 my-3">
    <div class="row">
      <div class="col-md-4 px-5 px-md-3">
        <div class="appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="0" data-appear-animation-duration="750" style="animation-delay: 0ms;">
          <div class="strong-shadow rounded strong-shadow-top-right">
            <img src="<?php echo site_url('assets/uploads/7/local1.jpg'); ?>" class="img-fluid border border-width-10 border-color-light rounded box-shadow-3" alt="Porto Admin">
          </div>
        </div>
      </div>
      <div class="col-md-1 px-5 px-md-3">
      </div>
      <div class="col-md-7 pr-md-5 mb-5 mb-md-0">
        <h2 class="font-weight-normal text-6 mb-3">¿Cómo surge <strong class="font-weight-extra-bold">Kouro Linea Fina</strong> y con qué propósito? </h2>
        <p class="text-4">A principio de los 90, Kouro fue comenzó con la confección de productos xxxx en forma artesanal que se comercialiban xxxx. En una segunda etapa, se creó o abrió el local</p>
        <p class="text-4">Nuestros productos son reconocidos por xxx xxxxx xxxxxxxxxxx xxxxxxxxxxx xxxxxx Atencion personalizada y conservando siempre la calidad xxxxxx .</p>
      </div>
    </div>
  </div>
</section>


<br>


<div class="container pb-5 mb-5">
  <div class="row align-items-center mb-5">
    <div class="col-lg-6 pr-xl-5 mb-5 mb-lg-0">
      <h2 class="font-weight-normal text-6 mb-3">¿Qué <strong class="font-weight-extra-bold">ofrecemos</strong>?</h2>
      <p class="ls-0 text-default fw-400 mb-5">Atención personalizada y especializada.</p>
      <div class="d-flex align-items-center border border-top-0 border-right-0 border-left-0 pb-4 mb-4">
        <i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 mr-3"></i>
        <p class="mb-0"><b class="text-color-dark">Otros productos -</b> Tenemos Cinturones, Billeteras, Paraguas y otros hermosos accesorios para vos o para regalar.</p>
      </div>
      <div class="d-flex align-items-center border border-top-0 border-right-0 border-left-0 pb-4 mb-4">
        <i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 mr-3"></i>
        <p class="mb-0"><b class="text-color-dark">Ventas minorista y mayorista -</b> Contamos con envíos a domicilio por moto en cercanías de los locales y por Andreani en el resto del pais.</p>
      </div>
      <div class="d-flex align-items-center pb-4 mb-4">
        <i class="fa fa-check text-color-primary bg-light rounded-circle box-shadow-4 p-2 mr-3"></i>
        <p class="mb-0"><b class="text-color-dark">Siempre a la Vanguardia -</b> Cuidamos nuestra selección de productos conservando la calidad pero adaptándonos a los colores y formas según las tendencias de cada temporada. .</p>
      </div>
    </div>
    <div class="col-lg-4 offset-lg-2">
      <img class="img-fluid" src="<?php echo site_url('assets/uploads/3/vitello_dots.png'); ?>" alt="" style="position: absolute; bottom: -2%; left: -43%; transform: rotate(90deg)">
      <img alt="Que ofrecemos" src="<?php echo site_url('assets/uploads/7/local2.jpg'); ?>" class="img-fluid border border-width-10 border-color-light rounded box-shadow-3 ml-5 appear-animation animated fadeInUp appear-animation-visible" data-appear-animation="fadeInUp" data-appear-animation-delay="200" style="width: 690px; max-width: none; animation-delay: 200ms;">
      <img alt="Vitello" src="<?php echo site_url('assets/uploads/7/localH.jpg'); ?>" class="img-fluid border border-width-10 rounded box-shadow-3 position-absolute appear-animation animated fadeInUp appear-animation-visible" data-appear-animation="fadeInUp" data-appear-animation-delay="700" style="left: -190px; bottom: 90px; animation-delay: 700ms;">
    </div>
  </div>
</div>


<?php if (isset($destacados)) : ?>

  <div class="container pb-3 mb-3">
    <div class="row">
      <div class="col">
        <h4 class="text-center">Alguno de nuestros productos destacados</h4>
        <div class="owl-carousel owl-theme show-nav-title show-nav-title-both-sides owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'items': 4, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}" style="height: auto;">

          <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-373px, 0px, 0px); transition: all 0.25s ease 0s; width: 1867px;">

              <?php foreach ($destacados as $item) : ?>

                <div class="owl-item" style="margin-right: 10px;">
                  <div>
                    <img alt="" class="img-fluid rounded" src="<?php echo site_url('assets/uploads/7/gallery1.jpg'); ?>">
                  </div>
                </div>

              <?php endforeach; ?>

            </div>
          </div>
          <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"></button><button type="button" role="presentation" class="owl-next"></button></div>
          <div class="owl-dots disabled"></div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>