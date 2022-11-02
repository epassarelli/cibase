    
$(document).ready(function inicio(){
        
    $('.list-item1').css({overflow:'visible'});
    $('li').nextAll().addClass('traslado');           
    $('li').addClass('ancho');
    setTimeout(inicio(), 1500);
});

function agrandarItem1(){
    $('.list-item1').css({overflow:'visible'});
    $('li').nextAll().addClass('traslado');  
}

function agrandarItem2(){
    $('.list-item2').css({overflow:'visible'});
    $('li').prevAll().removeClass('traslado').css({transition:'1s'});
    $('.list-item2').nextAll().addClass('traslado');
}

function agrandarItem3(){
    $('.list-item3').css({overflow:'visible'});
    $('li').prevAll().removeClass('traslado').css({transition:'1s'});
    $('.list-item3').nextAll().addClass('traslado');
}
function agrandarItem4(){
    $('.list-item4').css({overflow:'visible'});
    $('li').prevAll().removeClass('traslado').css({transition:'1s'});
    $('.list-item4').nextAll().addClass('traslado');
}
function agrandarItem5(){
    $('.list-item5').css({overflow:'visible'});
    $('li').prevAll().removeClass('traslado').css({transition:'1s'});
    $('.list-item5').nextAll().addClass('traslado');
}
function agrandarItem6(){
    $('.list-item6').css({overflow:'visible'});
    $('li').prevAll().removeClass('traslado').css({transition:'1s'});
    $('.list-item6').nextAll().addClass('traslado');
}
function agrandarItem7(){
    $('.list-item7').css({overflow:'visible'});
    $('li').prevAll().removeClass('traslado').css({transition:'1s'});
    $('.list-item7').nextAll().addClass('traslado');
}

