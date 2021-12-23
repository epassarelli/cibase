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
                'item5'=>'conference',
                'item6'=>'lawsbills-proposals',
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
<style type="text/css">
.contenedor {
    width:100%; 
    margin:auto;
    height:250px;
    overflow: hidden;
    background: #000000;
}
.contenedor-list{
    height:250px;
    padding:0px 0px 10px 0px;
    overflow: hidden;
    list-style: none;
    width:90%;
    margin:auto;
}
.list-item1,.list-item2,.list-item3,.list-item4,.list-item5,.list-item6,.list-item7,.list-item8{
    float:left;
    width:16.6%;
    list-style:inside none;
    overflow: hidden;
    box-shadow: 0px 0px 2px 2px white;
}
.contenedor .claudia a{
    width:400px;
    height:218px;
    display:block;
    background-size: contain;
    background-repeat: no-repeat;
    overflow: hidden;
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
.item1{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item1.jpg'); ?>');
}
.item2{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item2.jpg'); ?>');
}
.item3{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item3.jpg'); ?>');
}
.item4{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item4.jpg'); ?>');
}
.item5{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item5.jpg'); ?>');
}
.item6{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item6.jpg'); ?>');
}
.item7{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item7.jpg'); ?>');
}
.item8{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/item8.jpg'); ?>');
}
/*.item1{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item1'].'.jpg'); ?>');
}
.item2{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item2'].'.jpg'); ?>');
}
.item3{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item3'].'.jpg'); ?>');
}
.item4{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item4'].'.jpg'); ?>');
}
.item5{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item5'].'.jpg'); ?>');
}
.item6{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item6'].'.jpg'); ?>');
}
.item7{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item7'].'.jpg'); ?>');
}
.item8{
    background-image: url('<?php echo site_url('assets/images/claudia/menu/'.$menu['item8'].'.jpg'); ?>');
}*/
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
    .contenedor .claudia a{
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
    .contenedor .claudia a{
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

<header>
    <nav class="contenedor container-fluid">
        <ul class="contenedor-list"onmouseleave="agrandarItem1()">
            <li class="list-item1 claudia"><a href="<?php echo site_url().$menu['item1']; ?>" class="item1" onmouseover="agrandarItem1()"></a></li>
            <li class="list-item2 claudia"><a href="<?php echo site_url().$menu['item2']; ?>" class="item2" onmouseover="agrandarItem2()"></a></li>
            <li class="list-item3 claudia"><a href="<?php echo site_url().$menu['item3']; ?>" class="item3" onmouseover="agrandarItem3()"></a></li>
            <li class="list-item4 claudia"><a href="<?php echo site_url().$menu['item4']; ?>" class="item4" onmouseover="agrandarItem4()"></a></li>
            <li class="list-item5 claudia"><a href="<?php echo site_url().$menu['item5']; ?>" class="item5" onmouseover="agrandarItem5()"></a></li>
            <li class="list-item6 claudia"><a href="<?php echo site_url().$menu['item6']; ?>" class="item6" onmouseover="agrandarItem6()"></a></li>
            <li class="list-item7 claudia"><a href="<?php echo site_url().$menu['item7']; ?>" class="item7" onmouseover="agrandarItem7()"></a></li>
            <li class="list-item8 claudia"><a href="<?php echo site_url().$menu['item8']; ?>" class="item8" onmouseover="agrandarItem8()"></a></li>
            <li><a href=""></a></li>
        </ul>
    </nav> 
</header>