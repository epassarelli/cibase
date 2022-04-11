<?php 
switch ($this->session->userdata('site_lang')) {
    case 'spanish':
        $menu = array(
                'item1'=>'inicio',
                'item2'=>'articulos',
                'item3'=>'libros',
                'item4'=>'entrevistas',
                'item5'=>'conferencias',
                'item6'=>'jurisprudencia-y-leyes',
                'item7'=>'mujeres-en-el-mundo',
                'item8'=>'contacto'
                );
        break;
    case 'english':
        $menu = array(
                'item1'=>'home',
                'item2'=>'books',
                'item3'=>'articles',
                'item4'=>'interviews',
                'item5'=>'conferences',
                'item6'=>'laws-and-case-law',
                'item7'=>'women-in-the-world',
                'item8'=>'contact'
                );
        break;    
    default:
        $menu = array(
                'item1'=>'inicio',
                'item2'=>'articulos',
                'item3'=>'libros',
                'item4'=>'entrevistas',
                'item5'=>'conferencias',
                'item6'=>'jurisprudencia-y-leyes',
                'item7'=>'mujeres-en-el-mundo',
                'item8'=>'contacto'
                );
        break;
}
?>
<style>
.headerClaudia{
  background-color: #000;
}
.idiomaClaudia{
  background-color: #a163f7 !important;
  border-top-color: #51327d;
  border-top-width: 5px;  
  border-top-style: solid;
}
.idiomaClaudia a, .idiomaClaudia a:hover{
    color: #fff;
}
.idiomaClaudia h1{
    color: #fff !important;
}
.accordion {
  width: 100%;
  max-width: 1170px;
  height: 240px;
  overflow: hidden;
  margin: 0px auto;
  padding: 10px 0;
}

.accordion ul {
  width: 100%;
  display: table;
  table-layout: fixed;
  margin: 0;
  padding: 0;
}

.accordion ul li {
  display: table-cell;
  vertical-align: bottom;
  position: relative;
  width: 16.666%;
  height: 220px;
  background-repeat: no-repeat;
  background-position: center center;
  transition: all 500ms ease;
}

.accordion ul li div {
  display: block;
  overflow: hidden;
  width: 100%;
}

.accordion ul li div a {
  display: block;
  height: 220px;
  width: 100%;
  position: relative;
  z-index: 3;
  vertical-align: bottom;
  padding: 15px 20px;
  box-sizing: border-box;
  color: #fff;
  text-decoration: none;
  font-family: Open Sans, sans-serif;
  transition: all 200ms ease;
}

.accordion ul li div a * {
  opacity: 0;
  margin: 0;
  width: 100%;
  text-overflow: ellipsis;
  position: relative;
  z-index: 5;
  white-space: nowrap;
  overflow: hidden;
  -webkit-transform: translateX(-20px);
  transform: translateX(-20px);
  -webkit-transition: all 400ms ease;
  transition: all 400ms ease;
}

.accordion ul li div a h2 {
  font-family: Montserrat, sans-serif;
  text-overflow: clip;
  font-size: 24px;
  text-transform: uppercase;
  margin-bottom: 2px;
  top: 160px;
  color: #FFF;
}

.accordion ul li div a p {
  top: 160px;
  font-size: 13.5px;
}

.accordion ul li:nth-child(1) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item1.jpg'); ?>'); }

.accordion ul li:nth-child(2) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item2.jpg'); ?>'); }

.accordion ul li:nth-child(3) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item3.jpg'); ?>'); }

.accordion ul li:nth-child(4) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item4.jpg'); ?>'); }

.accordion ul li:nth-child(5) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item5.jpg'); ?>'); }

.accordion ul li:nth-child(6) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item6.jpg'); ?>'); }

.accordion ul li:nth-child(7) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item7.jpg'); ?>'); }

.accordion ul li:nth-child(8) { background-image: url('<?php echo site_url('assets/images/claudia/menu/item8.jpg'); ?>'); }

.accordion ul:hover li { width: 8%; }

.accordion ul:hover li:hover { width: 30%; }

.accordion ul:hover li:hover a { background: rgba(0, 0, 0, 0.5); }

.accordion ul:hover li:hover a * {
  opacity: 1;
  -webkit-transform: translateX(0);
  transform: translateX(0);
}
 
 @media screen and (max-width: 600px) {

body { margin: 0; }

.accordion { height: auto; }

.accordion ul li,
.accordion ul li:hover,
.accordion ul:hover li,
.accordion ul:hover li:hover {
  position: relative;
  display: table;
  table-layout: fixed;
  width: 100%;
  -webkit-transition: none;
  transition: none;
}

#carousel-claudia div a div h2 {
  font-family: Montserrat, sans-serif;
  text-overflow: clip;
  font-size: 24px;
  text-transform: uppercase;
  margin-bottom: 2px;
  top: 160px;
  color: #FFF;
}

}

</style>

<div class="headerClaudia">
<div class="accordion hidden-xs">
  <ul>
    <li>
      <div> <a href="<?php echo site_url().$menu['item1']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item1']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item2']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item2']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item3']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item3']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item4']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item4']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item5']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item5']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item6']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item6']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item7']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item7']); ?></h2>
        </a> </div>
    </li>
    <li>
      <div> <a href="<?php echo site_url().$menu['item8']; ?>">
        <h2><?php echo str_replace('-',' ',$menu['item8']); ?></h2>
        </a> </div>
    </li>
  </ul>
</div>






<div id="carousel-claudia" class="carousel slide hidden-lg hidden-md hidden-sm" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-claudia" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-claudia" data-slide-to="1"></li>
    <li data-target="#carousel-claudia" data-slide-to="2"></li>
    <li data-target="#carousel-claudia" data-slide-to="3"></li>
    <li data-target="#carousel-claudia" data-slide-to="4"></li>
    <li data-target="#carousel-claudia" data-slide-to="5"></li>
    <li data-target="#carousel-claudia" data-slide-to="6"></li>
    <li data-target="#carousel-claudia" data-slide-to="7"></li>
    <li data-target="#carousel-claudia" data-slide-to="8"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
    <div class="item active">
      <a href="<?php echo site_url().$menu['item1']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item1.jpg'); ?>" alt="<?php echo $menu['item1']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item1']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item2']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item2.jpg'); ?>" alt="<?php echo $menu['item2']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item2']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item3']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item3.jpg'); ?>" alt="<?php echo $menu['item3']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item3']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item4']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item4.jpg'); ?>" alt="<?php echo $menu['item4']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item4']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item5']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item5.jpg'); ?>" alt="<?php echo $menu['item5']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item5']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item6']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item6.jpg'); ?>" alt="<?php echo $menu['item6']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item6']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item7']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item7.jpg'); ?>" alt="<?php echo $menu['item7']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item7']; ?></h2>
      </div>
      </a>
    </div>


    <div class="item">
      <a href="<?php echo site_url().$menu['item8']; ?>">
      <img src="<?php echo site_url('assets/images/claudia/menu/item8.jpg'); ?>" alt="<?php echo $menu['item8']; ?>">
      <div class="carousel-caption">
        <h2><?php echo $menu['item8']; ?></h2>
      </div>
      </a>
    </div>







  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>











</div>