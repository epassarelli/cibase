<style type="text/css">

/**{
    box-sizing: border-box;
    margin:0px;
    padding:0px;
}
h1{
    margin-top: 20px;
    font-size:60px;
    color:blue;
    text-shadow: 2px 2px 2px black;;
}*/
.contenedor {
    /* display:grid;
    grid-template-columns:1200px;*/
    width:100%; 
    /* margin:auto; */
    height:250px;
    margin-top:20px;
    overflow: hidden;
}
.contenedor-list{
    height:250px;
    padding:0px 0px 10px 0px;
    overflow: hidden;
    list-style: none;
    /* 
    border-top:5px solid blue;
    border-bottom:5px solid blue;
    width:70%;
    margin:auto; 
    */
   
}
.list-item1,.list-item2,.list-item3,.list-item4,.list-item5,.list-item6,.list-item7,.list-item8{
    float:left;
    width:16.6%;
    list-style:inside none;
    overflow: hidden;
    box-shadow: 0px 0px 2px 2px white;
    /* border-right:2px solid rgba(255, 250, 250,0.5); */
}

.contenedor li a{
    width:400px;
    height:218px;
    display:block;
    background-size: contain;
    /* background-position: center; */
    background-repeat: no-repeat;
    overflow: hidden;
    /* box-shadow: 0px 0px 2px 2px white; */
}

.traslado{
    transform: translateX(250px);
    transition:.5s all ease-in-out;
}
.traslado2{
    transform: translateX(-250px);
    transition:.5s all ease-in-out;
}


.ancho{
    width:130px;
}
/* .traslado2{
    transform: translateX(155px);
    transition:.5s all ease-in-out;
} */
.item1{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/home.jpg'); ?>');
}
.item2{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/articulos.jpg'); ?>');
    /* border-left:3px solid transparent; */
}
.item3{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/libros.jpg'); ?>');
    /* border-left:3px solid transparent; */
}
.item4{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/entrevistas.jpg'); ?>');
}
.item5{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/conferencias.jpg'); ?>');
}
.item6{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/jurisprudencia-y-leyes.jpg'); ?>');
}
.item7{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/mujeres-en-el-mundo.jpg'); ?>');
}
.item8{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/contacto.jpg'); ?>');
}
@media only screen and (max-width:400px){
    h1{
        font-size:35px;
    }
    .contenedor{
        width:100%;
        height:120px;
        /* margin:auto; */
    }
    .contenedor-list{
        width:100%;
        height:120px;
        padding:13px 0px 10px 0px;
    }
    .contenedor li a{
        width:150px;
    }
    .traslado{
        transform: translateX(108px);
        transition:.5s all ease-in-out;
    }
    .ancho{
        width:38px;
    }
} 
@media only screen and (min-width:400px) and (max-width:768px){
    h1{
        font-size:50px;
    }
    .contenedor{
        width:100%;
        height:170px;
    }
    .contenedor-list{
        padding-top: 5px;
        height:170px;
    }
    .contenedor li a{
        width:200px;
        height:170px;
    }
    .traslado{
        transform: translateX(150px);
        transition:.5s all ease-in-out;
    }
    .ancho{
        width:38px;
    }
}  
</style>



    <!-- <div id="home" class="page-section" style="position:absolute;top:0;left:0;width:100%;height:100px;z-index:-2;"> -->
        
    
<div class="container-fluid dark">
    <!-- <section id="slider" class="slider-parallax full-screen with-header swiper_wrapper clearfix"> -->
    
    <section id="menuclaudia">
        <!-- <h1 class="container-fluid text-center">Menú Desplegable</h1> -->
        <nav class="contenedor container-fluid">
            <ul class="contenedor-list"onmouseleave="agrandarItem1()">
                <li class="list-item1"><a href="<?php echo site_url('home'); ?>" class="item1" onmouseover="agrandarItem1()"></a></li>
                <li class="list-item2"><a href="<?php echo site_url('articulos'); ?>" class="item2" onmouseover="agrandarItem2()"></a></li>
                <li class="list-item3"><a href="<?php echo site_url('libros'); ?>" class="item3" onmouseover="agrandarItem3()"></a></li>
                <li class="list-item4"><a href="<?php echo site_url('entrevistas'); ?>" class="item4" onmouseover="agrandarItem4()"></a></li>
                <li class="list-item5"><a href="<?php echo site_url('conferencias'); ?>" class="item5" onmouseover="agrandarItem5()"></a></li>
                <li class="list-item6"><a href="<?php echo site_url('jurisprudencia-y-leyes'); ?>" class="item6" onmouseover="agrandarItem6()"></a></li>
                <li class="list-item7"><a href="<?php echo site_url('mujeres-en-el-mundo'); ?>" class="item7" onmouseover="agrandarItem7()"></a></li>
                <li class="list-item8"><a href="<?php echo site_url('contacto'); ?>" class="item8" onmouseover="agrandarItem8()"></a></li>
                <li><a href=""></a></li>
            </ul>
        </nav> 

    </section>

</div>