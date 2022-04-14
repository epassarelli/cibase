$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();
    indice = 0;
    operacion = '';  //E=Edicion  //N=New




//Configuramos las alerts
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  });


/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////




function Eliminar(e) {
  indice = e.parents("tr").index();
  miTabla = document.getElementsByTagName("table")[0];
  mibody = miTabla.getElementsByTagName("tbody")[0];
  mibody.deleteRow(indice);
  calculaPie();
}

$("#provincia").on('change', function () {
  $("#provincia option:selected").each(function () {
      provincia=$(this).val();
      $.ajax({
                  url: UrlBase+'mipanel/localidades/getLocalidadesJson',
                  data: { provincia: provincia },
                  type: 'POST',
                  dataType: 'json',
                  success: function (response) {

                          $('#localidad').empty();
                          var $select = $('#localidad');
                          $select.append('<option value="0">Selecciona una Localidad</option>');
                          $.each(response, function(id, registro) {
                              $select.append('<option value=' + registro.id + '>' + registro.nombre + '</option>');
                          });
                 
                 
                      }, //success         
                  error: function(response) {
                      Toast.fire({type: 'success',
                      title: 'Error lista de localidades',
                    })                        },
                  // código a ejecutar sin importar si la petición falló o no
                  complete : function(xhr, status) {
                      //alert('Petición realizada');
                  }
                          
      });//ajax

  });
});


function calculaPie() {
  
  var rowCount = $("#detallepedidos tr th").length;
  var subt = 0;
  var cant_vacio = 0;
  var totvacio = 0;
  var cost_unit_vacio = parseFloat(document.getElementById("cost_unit_vacio").value,10)
  var envio = 0
  
  $('#detallepedidos tbody').find('tr').each(function () {
             
    //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )     
    subt     += parseFloat($(this).find('td').eq(4).text());
    cant_vacio += parseFloat($(this).find('td').eq(6).text());
            
});

miTabla = document.getElementsByTagName("table")[1];
miBody = miTabla.getElementsByTagName("tbody")[0];

envio = parseFloat(miBody.getElementsByTagName("tr")[1].getElementsByTagName("td")[1].innerText,10)
totvacio = cant_vacio * cost_unit_vacio;


miBody.getElementsByTagName("tr")[0].getElementsByTagName("td")[1].innerText=subt.toFixed(2)
miBody.getElementsByTagName("tr")[2].getElementsByTagName("td")[1].innerText=(totvacio).toFixed(2)
miBody.getElementsByTagName("tr")[3].getElementsByTagName("td")[1].innerText=(subt+totvacio+envio).toFixed(2)



}

// Funcion para tomar los datos de la edicion y asignarlos a los imputs
function Editar(e) {

         operacion = "E";
         $('#operacion').html('Edicion');   // Titulo del form   
     
         var idproducto = e.parents("tr").find("td:eq(7)").text()
         var preciounit = e.parents("tr").find("td:eq(2)").text()
         var cantidad   = e.parents("tr").find("td:eq(3)").text()
         var total      = e.parents("tr").find("td:eq(4)").text()
         var titulo     = e.parents("tr").find("td:eq(0)").text()
         


         document.getElementById('producto_id').value=parseInt(idproducto,10)
         document.getElementById('preciounit').value=parseFloat(preciounit,10)
         document.getElementById('cantidad').value=parseFloat(cantidad,10)
         document.getElementById('total').value=parseFloat(total,10)
         document.getElementById('titulo').value=titulo
         
          //indice es el numero de fila de la table
         indice = e.parents("tr").index();
         $("#modalPedidos").modal("show");  
 
  }



//cambio estado llave landing formulario alta y edicion 
function cambiaVacio(e)  {
  
  indice = e.parents("tr").index();
  var vacio = parseInt(e.parents("tr").find("td:eq(6)").text())
  miTabla = document.getElementsByTagName("table")[0];
  mibody = miTabla.getElementsByTagName("tbody")[0];
  miFila = mibody.getElementsByTagName("tr")[indice];
  miObjeto = miFila.getElementsByTagName("td")[1].getElementsByTagName('i')[0];
  
  if (vacio==0) {
        miObjeto.classList.remove('fa-toggle-off')
        miObjeto.classList.add('fa-toggle-on')
        miFila.getElementsByTagName("td")[6].innerHTML=1
    }else{
        miObjeto.classList.remove('fa-toggle-on')
        miObjeto.classList.add('fa-toggle-off')
        miFila.getElementsByTagName("td")[6].innerHTML=0
  }

  calculaPie();

}  

 
function Agregar() {


    operacion = "N";
    $('#operacion').html('Nuevo');   // Titulo del form   
    document.getElementById('producto_id').value=parseInt(0,10)
    document.getElementById('preciounit').value=parseFloat(0,10)
    document.getElementById('cantidad').value=parseFloat(0,10)
    document.getElementById('total').value=parseFloat(0,10)
    document.getElementById('titulo').value=''
    
    $("#modalPedidos").modal("show");  
        
 
}


function cambiaProducto() {
   id=document.getElementById('producto_id').value;
  $.ajax({
    type: "POST",
    url: UrlBase+'mipanel/productos/getProductoJson',
    data: { Id: id},
    dataType: "json",
    success: function (response) {
        //Asignamos los valores de cada input para que se muestren en el form
        $("#preciounit").val(response['data'].precioventa)
        $('#titulo').val(response['data'].titulo)
       // $('#cantidad').val(response['data'].unidadvta)

        uni = parseFloat($("#preciounit").val())
        can = parseFloat($("#cantidad").val())
        tot = parseFloat(uni*can)

        $("#preciounit").val(uni.toFixed(2))
        $("#cantidad").val(can.toFixed(2))
        $("#total").val(tot.toFixed(2))
        

      
  
      },//success
        error: function(xhr, textStatus, error){
        console.log(xhr.statusText);
        console.log(textStatus);
        console.log(error);
    } //error 
  });//ajax  

}



function aceptar() {
   
   // tomo los datos del modal
   producto_id=parseInt(document.getElementById('producto_id').value,10)
   preciounit=parseFloat(document.getElementById('preciounit').value,10)
   cantidad=parseFloat(document.getElementById('cantidad').value,10)
   total=parseFloat(document.getElementById('total').value,10)
   producto_nombre=document.getElementById('titulo').value

  if (operacion == "E") {

    //cambio los valores en la fila de la tabla del formulario
    miTabla = document.getElementsByTagName("table")[0];
    mibody = miTabla.getElementsByTagName("tbody")[0];
    miFila = mibody.getElementsByTagName("tr")[indice];
    
    miFila.getElementsByTagName("td")[0].innerHTML=producto_nombre;
    miFila.getElementsByTagName("td")[2].innerHTML=preciounit.toFixed(2);
    miFila.getElementsByTagName("td")[3].innerHTML=cantidad.toFixed(2);
    miFila.getElementsByTagName("td")[4].innerHTML=total.toFixed(2);
    miFila.getElementsByTagName("td")[7].innerHTML=producto_id;
    //miCelda = miFila.getElementsByTagName("td")[0];
    //miDato = miCelda.firstChild.nodeValue;
  }else{
    //tomo la primer tabla
    var table = document.getElementsByTagName("table")[0]; 
    var row = table.insertRow();
    var col0 = '<td>'+ producto_nombre  +'</td>';
    var col1 = '<td align="center"><i class="vacio fa  fa-toggle-off fa-2x text-green" onclick="cambiaVacio($(this))"></i></a></td>';
    var col2 = '<td align="right">'+ preciounit.toFixed(2) +'</td>';
    var col3 = '<td align="right">'+ cantidad.toFixed(2) +'</td>';
    var col4 = '<td align="right">'+ total.toFixed(2) +'</td>';
    var col5 = '<td align="center"><a href="javascript:void(0);"  onclick="Editar($(this))"  class="editar btn btn-xs"><i class="fa fa-pencil fa-2x text-yellow"></i></a><a href="javascript:void(0);" class="eliminar btn btn-xs" onclick="Eliminar($(this))" ><i class="fa fa-trash fa-2x text-red"></i></a></td>';
    var col6 = '<td style="display: none;">0</td>';
    var col7 = '<td style="display: none;">'+ producto_id +'</td>';
    
    row.innerHTML = col0 + col1 + col2 + col3 + col4 + col5 + col6 + col7;

  }
  
  $("#modalPedidos").modal("hide");  

  calculaPie();
}

   
function cambiaEntrega(e) { 

    var MyEntregaID = document.getElementById('entrega_id').options[entrega_id.selectedIndex].value;

    // Ejecutamos la accion y la enviamos al servidor 
    
    $.ajax({
        url: UrlBase+'productos/carrito/cambiaEntrega',
        data: { entrega_id: MyEntregaID },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            if (response.success == 'OK') {
                if (Number(response.costo_entrega) > 0) {
                    document.getElementById('envio').innerText=parseFloat(response.costo_entrega).toFixed(2);
                    //objeto.removeAttribute('class');
                }else{    
                    document.getElementById('envio').innerText="0.00";
                }    
                calculaPie();
                   // objeto.setAttribute('class','vacio fa  fa-toggle-on fa-2x text-green');
                if (response.pidedirec == 0)   {
                    document.getElementById('lblcalle').innerHTML='Dirección Calle'
                    document.getElementById('lblnro').innerHTML='Nro'
                    document.getElementById('lblprovincia').innerHTML='Provincia'
                    document.getElementById('lbllocalidad').innerHTML='Localidad'
                }else{
                    document.getElementById('lblcalle').innerHTML='Dirección Calle *'
                    document.getElementById('lblnro').innerHTML='Nro *'
                    document.getElementById('lblprovincia').innerHTML='Provincia *'
                    document.getElementById('lbllocalidad').innerHTML='Localidad *'

                }                  
            }else{
                Toast.fire({type: 'error',
                    title: 'No se pudo calcular envio',
                       })
            }
    
        }, //success         
        error: function(response) {
            alert('error al modificar el servicio');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        }
                
    });//ajax
    
} 


