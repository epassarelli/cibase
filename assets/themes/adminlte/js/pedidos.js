$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();
    indice = 0;
    operacion = '';  //E=Edicion  //N=New
    domicilio_requerido=0;
    // se ejecuta esta funcion para que coloque los asterisco 
    // en los inputs obligatorios segun la forma de entrega
    cambiaEntrega();
   

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

function grabarPedido() {

  apellido  = document.getElementById('apellido').value;
  nombre    = document.getElementById('nombre').value;
  calle     = document.getElementById('del_calle').value;
  numero    = document.getElementById('del_nro').value;
  provincia = parseInt(document.getElementById('provincia').value);
  localidad = parseInt(document.getElementById('localidad').value);
  formaentrega = parseInt(document.getElementById('entrega_id').options[entrega_id.selectedIndex].value);
  cantidad_productos = $("#detallepedidos tbody tr").length;


  
  
  if (apellido=='' || nombre=='') {
     Toast.fire({type: 'error',title: 'Debe ingresar el Apellido y el nombre',})
     return
  }
  if (domicilio_requerido==1) {
      if (calle=='' || numero=='' || provincia==0 || localidad ==0){
        Toast.fire({type: 'error',title: 'Debe ingresar calle, numero, provincia y localidad',})
        return
      }    
  }
  if (formaentrega==0) {
    Toast.fire({type: 'error',title: 'Debe seleccionar una forma de entrega',})
    return
 }
 if (cantidad_productos==0) {
  Toast.fire({type: 'error',title: 'No hay productos seleccionados',})
  return
}


     
    
  
    document.forms["formpedidos"].submit()
    //Toast.fire({type: 'success', title: 'Cargado con Exito !', })


 
}  //grabar pedido 




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
  
  var rowCount = $("#detallepedidos tbody tr" ).length;
  console.log('cantidad de filas: ', rowCount);
  var subt = 0;
  var cant_vacio = 0;
  var totvacio = 0;
  //var cost_unit_vacio = parseFloat(document.getElementById("cost_unit_vacio").value,10)
  var envio = 0

  miTabla = document.getElementsByTagName("table")[0];
  miBody = miTabla.getElementsByTagName("tbody")[0];
    
 
 /*
  $('#detallepedidos tbody').find('tr').each(function () {
    //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )     
    subt     += parseFloat($(this).find('td').eq(4).value);
    cant_vacio += parseFloat($(this).find('td').eq(6)('input').value);
  });
  */

  for(let i=0; i<rowCount; i++){
     subt = subt + parseFloat(miBody.getElementsByTagName("tr")[i].getElementsByTagName("td")[5].getElementsByTagName("input")[0].value);
     //cant_vacio = cant_vacio + parseFloat(miBody.getElementsByTagName("tr")[i].getElementsByTagName("td")[6].getElementsByTagName("input")[0].value);
  }

  miTabla = document.getElementsByTagName("table")[1];
  miBody = miTabla.getElementsByTagName("tbody")[0];
  envio = parseFloat(miBody.getElementsByTagName("tr")[1].getElementsByTagName("td")[1].getElementsByTagName("input")[0].value,10)
  totvacio = cant_vacio * cost_unit_vacio;

  miBody.getElementsByTagName("tr")[0].getElementsByTagName("td")[1].getElementsByTagName("input")[0].value=subt.toFixed(2)
 // miBody.getElementsByTagName("tr")[2].getElementsByTagName("td")[1].getElementsByTagName("input")[0].value=(totvacio).toFixed(2)
   miBody.getElementsByTagName("tr")[2].getElementsByTagName("td")[1].getElementsByTagName("input")[0].value=(subt+envio).toFixed(2)



}

// Funcion para tomar los datos de la edicion y asignarlos a los imputs
function Editar(e) {
         operacion = "E";
         indice = e.parents("tr").index();
         $('#operacion').html('Edicion');   // Titulo del form   
     
        // var idproducto = e.parents("tr").find("td:eq(7)").text()
        // var preciounit = e.parents("tr").find("td:eq(2)").text()
        // var cantidad   = e.parents("tr").find("td:eq(3)").text()
        // var total      = e.parents("tr").find("td:eq(4)").text()
        // var titulo     = e.parents("tr").find("td:eq(0)").text()

        miFila = document.getElementsByTagName("table")[0].getElementsByTagName("tbody")[0].getElementsByTagName("tr")[indice]
        
         
         var idproducto = miFila.getElementsByTagName("td")[7].getElementsByTagName("input")[0].value
         var preciounit = miFila.getElementsByTagName("td")[2].getElementsByTagName("input")[0].value
         var cantidad   = miFila.getElementsByTagName("td")[3].getElementsByTagName("input")[0].value
         var total      = miFila.getElementsByTagName("td")[4].getElementsByTagName("input")[0].value
         var titulo     = miFila.getElementsByTagName("td")[0].getElementsByTagName("input")[0].value
         



         document.getElementById('m_producto_id').value=parseInt(idproducto,10)
         document.getElementById('m_preciounit').value=parseFloat(preciounit,10)
         document.getElementById('m_cantidad').value=parseFloat(cantidad,10)
         document.getElementById('m_total').value=parseFloat(total,10)
         
         
          //indice es el numero de fila de la table
         indice = e.parents("tr").index();

          $("#modalPedidos").modal("show");  

 
  }

//elimina pedido del listado  
function eliminar(e) {

    // Obtenemos los datos del row
    //var datos = table.row($(this).parents("tr")).data();

    indice = e.parents("tr").index();
    miTabla = document.getElementsByTagName("table")[0];
    mibody = miTabla.getElementsByTagName("tbody")[0];
    miFila = document.getElementsByTagName("table")[0].getElementsByTagName("tbody")[0].getElementsByTagName("tr")[indice]
    var idpedido = miFila.getElementsByTagName("td")[0].innerText;

    //Configuracion de botones del alert con clase de bootstrap
    const swalButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    // Abrimos alerta de confirmacion
    swalButtons.fire({
      title: 'Estas Seguro ?',
      text: "No podrás revertir esto!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar esto!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        // Ejecutamos la accion y la enviamos al servidor 
        //console.log('ejecutamos');  
        $.ajax({
            type: "POST",
            url: UrlBase+'mipanel/pedidos/deletePedido',
            data: { Id: idpedido},
            dataType: "json",
            success: function (response) {
              if (response.success == true) {
               swalButtons.fire(
                  'Eliminado!',
                  'Su registro ha sido eliminado.',
                  'success'
                );
                //table.ajax.reload();
                mibody.deleteRow(indice);
              }
            }//success
          });//ajax  
          //console.log('ejecutamos 3'); 
        } else if (
        /* Read more about handling dismissals below */
         result.dismiss === Swal.DismissReason.cancel
      ) {
        swalButtons.fire(
          'Cancelado',
          'Tu registro está seguro',
          'error'
        )
      }
    })

  }


//cambio estado llave landing formulario alta y edicion 
function cambiaVacio(e)  {
  
 /*  indice = e.parents("tr").index();
  //var vacio = parseInt(e.parents("tr").find("td:eq(6)").text())

  miTabla = document.getElementsByTagName("table")[0];
  mibody = miTabla.getElementsByTagName("tbody")[0];
  miFila = mibody.getElementsByTagName("tr")[indice];
  var vacio = parseInt(miFila.getElementsByTagName("td")[6].getElementsByTagName("input")[0].value)
  miObjeto = miFila.getElementsByTagName("td")[1].getElementsByTagName('i')[0];
  
  if (vacio==0) {
        miObjeto.classList.remove('fa-toggle-off')
        miObjeto.classList.add('fa-toggle-on')
        miFila.getElementsByTagName("td")[6].getElementsByTagName("input")[0].value=1
    }else{
        miObjeto.classList.remove('fa-toggle-on')
        miObjeto.classList.add('fa-toggle-off')
        miFila.getElementsByTagName("td")[6].getElementsByTagName("input")[0].value=0
  }

  calculaPie(); */

}  

 
function Agregar() {


    operacion = "N";
    $('#operacion').html('Nuevo');   // Titulo del form   

    document.getElementById('m_producto_id').value=parseInt(0,10)
    document.getElementById('m_preciounit').value=parseFloat(0,10)
    document.getElementById('m_cantidad').value=parseFloat(0,10)
    document.getElementById('m_total').value=parseFloat(0,10)
         


    $("#modalPedidos").modal("show");  
        
 
}


function cambiaProducto() {
   id=document.getElementById('m_producto_id').value;
  $.ajax({
    type: "POST",
    url: UrlBase+'mipanel/productos/getProductoJson',
    data: { Id: id},
    dataType: "json",
    success: function (response) {
        //Asignamos los valores de cada input para que se muestren en el form
        $("#m_preciounit").val(response['data'].precioventa)
        $('#m_titulo').val(response['data'].titulo)
       // $('#cantidad').val(response['data'].unidadvta)

        uni = parseFloat($("#m_preciounit").val())
        can = parseFloat($("#m_cantidad").val())
        tot = parseFloat(uni*can)

        $("#m_preciounit").val(uni.toFixed(2))
        $("#m_cantidad").val(can.toFixed(2))
        $("#m_total").val(tot.toFixed(2))
        

      
  
      },//success
        error: function(xhr, textStatus, error){
        console.log(xhr.statusText);
        console.log(textStatus);
        console.log(error);
    } //error 
  });//ajax  
  
  checkStock();

}



function aceptar() {
   
   // tomo los datos del modal
   producto_id=parseInt(document.getElementById('m_producto_id').value,10)
   preciounit=parseFloat(document.getElementById('m_preciounit').value,10)
   cantidad=parseFloat(document.getElementById('m_cantidad').value,10)
   total=parseFloat(document.getElementById('m_total').value,10)
   talle=parseFloat(document.getElementById('talle').value,10)
   color=parseFloat(document.getElementById('color').value,10)

   //producto_nombre=document.getElementById('m_titulo').value
   micombo=document.getElementById("m_producto_id")
   producto_nombre=micombo.options[micombo.selectedIndex].text

   micombo=document.getElementById("talle")
   nomtalle=micombo.options[micombo.selectedIndex].text
   micombo=document.getElementById("color")
   nomcolor=micombo.options[micombo.selectedIndex].text
   




   if (isNaN(producto_id)) { 
            producto_id= 0; 
            document.getElementById('preciounit').value=producto_id.toFixed(2);

    }
   if (isNaN(preciounit)) { 
              preciounit= 0; 
              document.getElementById('preciounit').value=preciounit.toFixed(2);
    }

   if (isNaN(cantidad)) { 
             cantidad= 0; 
             document.getElementById('cantidad').value=cantidad.toFixed(2);
    }


    if (isNaN(talle)) { 
      talle= 0; 
      document.getElementById('cantidad').value=talle.toFixed(2);
    }

    if (isNaN(color)) { 
      color= 0; 
      document.getElementById('cantidad').value=color.toFixed(2);
    }




   if (isNaN(total)) { total= 0; }
   //este control es porque si no da enter en la 
   //cantidad no calcula el total del item 

   if (total == 0) {
     total = cantidad*preciounit;
   }

   
   if (producto_id != 0 && cantidad != 0 && talle != 0 && color != 0) {

            if (operacion == "E") {

              //cambio los valores en la fila de la tabla del formulario
              miTabla = document.getElementsByTagName("table")[0];
              mibody = miTabla.getElementsByTagName("tbody")[0];
              miFila = mibody.getElementsByTagName("tr")[indice];
              
              //miFila.getElementsByTagName("td")[0].innerHTML=producto_nombre;
              //miFila.getElementsByTagName("td")[2].innerHTML=preciounit.toFixed(2);
              //miFila.getElementsByTagName("td")[3].innerHTML=cantidad.toFixed(2);
              //miFila.getElementsByTagName("td")[4].innerHTML=total.toFixed(2);
              //miFila.getElementsByTagName("td")[7].innerHTML=producto_id;
              
              miFila.getElementsByTagName("td")[0].getElementsByTagName("input")[0].value=producto_nombre;
              miFila.getElementsByTagName("td")[2].getElementsByTagName("input")[0].value=preciounit.toFixed(2);
              miFila.getElementsByTagName("td")[3].getElementsByTagName("input")[0].value=cantidad.toFixed(2);
              miFila.getElementsByTagName("td")[4].getElementsByTagName("input")[0].value=total.toFixed(2);
              miFila.getElementsByTagName("td")[7].getElementsByTagName("input")[0].value=producto_id;
              
              
              //miCelda = miFila.getElementsByTagName("td")[0];
              //miDato = miCelda.firstChild.nodeValue;
            }else{
              //tomo la primer tabla
              var table = document.getElementsByTagName("table")[0]; 
              //var row = table.insertRow();
              var col0 = '<td><input readonly type="text" class="form-control"  name="titulo[]"  value="'+  producto_nombre   +'"></td>';
              var col1 = '<td class="col-md-2 col-sm-12"><input readonly type="text" class="form-control"  name="nomcolor[]"  value="' + nomcolor + '"></td>';
              var col2 = '<td class="col-md-1 col-sm-12"><input readonly type="text" class="form-control"  name="nomtalle[]"  value="' + nomtalle +  '"></td>';
              var col3 = '<td align="right"><input readonly type="text" class="form-control dinero"  name="preciounit[]"  value="'+ preciounit.toFixed(2) + '"></td>';
              var col4 = '<td align="right"><input readonly type="text" class="form-control dinero"  name="cantidad[]"  value="'  + cantidad.toFixed(2)   + '"></input></td>';
              var col5 = '<td align="right"><input readonly type="text" class="form-control dinero" name="precioitem[]"  value="' + total.toFixed(2) + '"></input></td>'
              var col6 = '<td align="center"><a href="javascript:void(0);"  onclick="Editar($(this))"  class="editar btn btn-xs"><i class="fa fa-pencil fa-2x text-yellow"></i></a><a href="javascript:void(0);" class="eliminar btn btn-xs" onclick="Eliminar($(this))" ><i class="fa fa-trash fa-2x text-red"></i></a></td>';
              var col7 = '<td style="display:none;"><input type="text" class="form-control"  name="producto_id[]"  value="'+ producto_id + '"></input></td>'
              //row.innerHTML = col0 + col1 + col2 + col3 + col4 + col5 + col6 + col7+col8;
              $(table).find('tbody').append('<tr>' + col0 + col1 + col2 + col3 + col4 + col5 + col6 + col7 + '</tr>');


            }
            
            $("#modalPedidos").modal("hide");  

            calculaPie(); 

          }else{
            Toast.fire({type: 'error',
            title: 'Debe seleccionar un producto, color,talle y la cantidad solicitada',
             })
          }

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
                  document.getElementById("delivery").value=parseFloat(response.costo_entrega).toFixed(2);
                  document.getElementById("entrega_id").value=parseInt(response.entrega_id);
                }else{    
                  document.getElementById("delivery").value='0.00';
                }    
                domicilio_requerido=parseInt(response.pidedirec)
                document.getElementById('domicilio_requerido').value=domicilio_requerido
                calculaPie();
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



function checkStock() {
  indice_talle=document.getElementById('talle').selectedIndex
  indice_color=document.getElementById('color').selectedIndex
  var talle  = document.getElementById('talle').options[indice_talle].value;
  var color  = document.getElementById('color').options[indice_color].value;
  var cantidad = document.getElementById('m_cantidad').value;
  var producto = document.getElementById('m_producto_id').value;
  /* console.log(talle);
  console.log(color); 
  console.log(cantidad);
  console.log(producto);
   */
  $.ajax({
      url: UrlBase+'productos/verStock',
      data: { color: color,
              talle: talle,
              cantidad: cantidad,
              producto: producto 
            },
      type: 'POST',
      dataType: 'json',
      success: function (response) {
        if (response.success == 'OK') {
          document.getElementById('additempedido').removeAttribute("disabled");
      }else{
         document.getElementById('additempedido').setAttribute("disabled","false");
         
         if ( Number(color) > 0   && 
              Number(talle) > 0 && 
              Number(cantidad) > 0 &&
              Number(producto > 0)) {
             Toast.fire({type: 'error',
             title: 'Producto sin stock actualmente',
            })
            
          }
          
      }
  
      }, //success         
      error: function(response) {
        alert('error al verificar stock');
      },
      // código a ejecutar sin importar si la petición falló o no
      complete : function(xhr, status) {} //alert('Petición realizada');
  });//ajax 
  
}
