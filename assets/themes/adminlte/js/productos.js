$(document).ready(function () {

  // Url Dinamico
  //  UrlBase = $('#url').val();

//Configuramos las alerts
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


  // Carga de tabla
    listar(UrlBase,Toast);




    // Reseteamos el form y asignamos el valor de la opcion
    $(".insertar").click(function() {
      $('.titulo').html('Agregar Productos');   // Titulo del form   
      $("#formSitios").trigger("reset"); // Reseteams el form
      $("#Opcion").val("insertar"); // Asignamos la accion
      $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
      $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
      $('#ocultaFile').show() // Mostramos el input file
      $('#ocultaFile1').show() // Mostramos el input file
      $('#ocultaFile2').show() // Mostramos el input file
      $('#imagen').val(null) // Reiniciamos el valor del file para validacion
      $('#imagen2').val(null) // Reiniciamos el valor del file para validacion
      $('#imagen3').val(null) // Reiniciamos el valor del file para validacion
      $('#llave_destacar').val(0) // Reiniciamos el valor del file para validacion
    });

});




//cambio estado llave landing formulario alta y edicion 
$('#llave_destacar').click(function()  {
  var valor_llave =  $('#destacar_id').val();
  if (valor_llave==0) {
    $('#destacar_id').val(1);
    $('.llave_destacar').removeClass('fa-toggle-off')
    $('.llave_destacar').addClass('fa-toggle-on')
  }else{
    $('#destacar_id').val(0);
    $('.llave_destacar').removeClass('fa-toggle-on')
    $('.llave_destacar').addClass('fa-toggle-off')
  }
});


// En edicion hace click sobre la imagen la cambia
$('#showImagen').click(function()  {
   $('#File').click();  
});

$('#showImagen2').click(function()  {
  $('#File1').click();  
});

$('#showImagen3').click(function()  {
  $('#File2').click();  
 
});


$('#deleteimagenicon').click(function() {
    $('#im1').attr('src',UrlBase+'assets/uploads/imagen-no-disponible.png');
    $('#imagen').val('');
    $('#File').val('');   //esto lo pongo para que sirva el mismo icono en el alta 
    $("#nim1").text('');
    $('#deletelogoicon').hide()
});

$('#deleteimagen2icon').click(function() {
  $('#im2').attr('src',UrlBase+'assets/uploads/imagen-no-disponible.png');
  $('#imagen2').val('');
  $('#File1').val('');   //esto lo pongo para que sirva el mismo icono en el alta 
  $("#nim2").text('');
  $('#deleteimagen2icon').hide()
});


$('#deleteimagen3icon').click(function() {
  $('#im3').attr('src',UrlBase+'assets/uploads/imagen-no-disponible.png');
  $('#imagen3').val('');
  $('#File2').val('');   //esto lo pongo para que sirva el mismo icono en el alta 
  $("#nim3").text('');
  $('#deleteimagen3icon').hide()
});



$('#File').change(function() {
  var archi = document.getElementById("File").value.split('\\'); //quito la ruta
  var nomarchi = archi[archi.length-1] 
  var sitio = $('#sitio_id').value;
  var ima = UrlBase+'assets/uploads/'+ sitio +'/productos/' + nomarchi;
  $("#nim1").text(nomarchi);
   if (archi !== '') {
    $('#deleteimagenicon').show()
   }
   readURL(this);
 });
 


$('#File1').change(function() {
  var archi = document.getElementById("File1").value.split('\\');
  var nomarchi = archi[archi.length-1] 
  var sitio = $('#sitio_id').value;
  var ima = UrlBase+'assets/uploads/'+ sitio +'/productos/' + nomarchi;
  
   $("#nim2").text(nomarchi);
   if (archi !== '') {
    $('#deleteimagen2icon').show()
   }
   readURL(this);
 });
 

 $('#File2').change(function() {
  var archi = document.getElementById("File2").value.split('\\');
  var nomarchi = archi[archi.length-1] 
  var sitio = $('#sitio_id').value;
  var ima = UrlBase+'assets/uploads/'+ sitio +'/productos/' + nomarchi;
  $("#nim3").text(nomarchi);
   if (archi !== '') {
    $('#deleteimagn3icon').show()
   }
   readURL(this);
 });
 


function readURL(input) {
  if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
    var reader = new FileReader(); //Leemos el contenido
    reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
      if (input.name === 'File') {
          $('#im1').attr('src', e.target.result);
      }else{
        if (input.name === 'File1') {
            $('#im2').attr('src', e.target.result);
        }else{
          $('#im3').attr('src', e.target.result);
        }
      } 
    }
    reader.readAsDataURL(input.files[0]);
  }
}





/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////


// Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
function listar(base,Toast) {
    var table = $("#productosAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/productos/getProductos",
            type: "jsonp"
        },
        rowCallback : function( row, data ) {
          //console.log(data.estado)
      
          
          if ( data.imagen !== null && data.imagen !== '' ) {
            $('td:eq(2)', row).html("<img src='" + base + "assets/uploads/"+ data.sitio_id +"/productos/"+data.imagen + "' class='img-thumbnail' />"); 
          }else{
            $('td:eq(2)', row).html("<img src='" + base + "assets/uploads/Imagen-no-disponible.png' class='img-thumbnail' />"); 
          }            
          if ( data.imagen2 !== null && data.imagen2 !== '') {
                    $('td:eq(3)', row).html("<img src='" + base + "assets/uploads/"+ data.sitio_id +"/productos/"+data.imagen2 + "' class='img-thumbnail' />"); 
          }else{
                    $('td:eq(3)', row).html("<img src='" + base + "assets/uploads/Imagen-no-disponible.png' class='img-thumbnail' />"); 
          }            
          if ( data.imagen3 !== null && data.imagen3 !== '') {
                 $('td:eq(4)', row).html("<img src='" + base + "assets/uploads/"+ data.sitio_id +"/productos/"+data.imagen3 + "' class='img-thumbnail' />"); 
          }else{
                 $('td:eq(4)', row).html("<img src='" + base + "assets/uploads/Imagen-no-disponible.png' class='img-thumbnail' />"); 
          }            
          
          if ( data.publicar == "1" ) {
            $('td:eq(7)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='publicar'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(7)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='publicar'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 

          }
        },

        columns: [
            { data: "id" },
            { data: "titulo" },
            { data: "imagen" },
            { data: "imagen2" },
            { data: "imagen3" },
            { data: "precioLista", className: "text-right" },
            { data: "precioOF", className: "text-right" },
            { data: "publicar"},
            {
                defaultContent:
                    "<div class='text-center'><a href='javascript:void(0);' class='editar btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a> <a href='javascript:void(0);' class='eliminar btn btn-xs' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    submit(table,Toast) //Accion de Insertar o Editar
    Edit("#productosAbm tbody", table); //Tomar datos para la Edicion
    deleteSitios("#productosAbm tbody", table); //Eliminar un slide
    
    //Cambiar estado en datatable
    cambioEstado("#productosAbm tbody", table,Toast); 

 }



// Funcion de Enviar datos al servidor para insertar o editar datos
function submit(table,Toast) {
  $("#formSitios").submit(function(e) {
    e.preventDefault(); // evitamos que redireccione el formulario

    // Asignamos el valor a input oculto para la validacion de la imagen
    if ($('#File').val().length > 0) {
      $('#imagen').val($('#File').val())
    }
    
    if ($('#File1').val().length > 0) {
      $('#imagen2').val($('#File1').val())
    }

    if ($('#File2').val().length > 0) {
      $('#imagen3').val($('#File2').val())
    }

    
   // Variable del fomr
    var me = $(this);

    // Envio asincrono
    $.ajax({  
      url: me.attr("action"),
      method:"POST",  
      //ESte tipo se usa cuando se envian archivos
      data:new FormData(this),  //El otro metodo es con me.serialize() pero sin archivos
      contentType: false,  
      cache: false,  
      processData:false,  
      //respuesta del envio
      success: function(response) {
        //Convertimos en Json el String, en el caso de me.serialize() no hace falta
        response = JSON.parse(response)

        if (response.success == true) {
          
          //Cerramos el modal
            $("#modalSitios").modal("hide"); 
          //Eliminamos las clases de los errores
              $(".form-group")
              .removeClass("has-error has-success")
              $('.text-danger').remove()    
          // Mostramos el mensaje de cargado
          Toast.fire({
            type: 'success',
            title: 'Cargado con Exito !',
          })
          //Reseteamos form
          me[0].reset();
          //Recargamos la tabla
          table.ajax.reload();

        } else {
         
          //Recorremos los mensajes y los asignamos a cada input
          $.each(response.messages, function(key, value) {
            
              //Declaramos los id
            var element = $("#" + key);
            //Asignamos las clases a los inputs
            /*Seleccionamos los grupos de imputs que llevaran las clases de error */
            element.closest('div.form-group') 
            /*Removemos clase de error por si tuvo uno */
            .removeClass('has-error') 
            /* Asignamos la clase dependiendo de lo ingresado */
            .addClass(value.length > 0 ? 'has-error' : 'has-success')
            // Evitamos que se repita el mensaje de error al pulsar el submit
            .find('.text-danger').remove();

            //Mostramos los mensajes de error
            element.after(value);
            
 
            }); // Each
          }// else
        }  // success
      });  //Ajax   l
  });//submit

}//funcion



// Funcion para tomar los datos de la edicion y asignarlos a los imputs
 function Edit(body, table) {
   //Tomando desde el boton de edicion
		$(body).on("click", "a.editar", function() {
      //Guardamos los datos que tomamos del datatable
      var datos = table.row($(this).parents("tr")).data();
      // Removemos las posibles clases de validacion que pueda tener el fomr
      $('.form-group').removeClass('has-error has-success')
      $('.text-danger, .editFile').remove()
			// Asignamos titulo al form y al boton
      $('.titulo').html('Editar')
      // Asignamos las accion que realiza el metodo del servidor
      $("#Opcion").val("editar");
      //hay que ir a buscar el registro a la tabla porque en el datatable
      //no tenemos todos los campos 
      $.ajax({
        type: "POST",
        url: UrlBase+'mipanel/productos/getProductoJson',
        data: { Id: datos.id},
        dataType: "json",
        success: function (response) {
            //Asignamos los valores de cada input para que se muestren en el form
            $("#id").val(response['data'].id)
            $("#sitio_id").val(response['data'].sitio_id)
            $("#titulo").val(response['data'].titulo)
            $("#link").val(response['data'].link)
            $("#descLarga").val(response['data'].descLarga)
            $("#descCorta").val(response['data'].descCorta)
            $("#codigo").val(response['data'].codigo)
            $("#imagen").val(response['data'].imagen)
            $("#imagen2").val(response['data'].imagen2)
            $("#imagen3").val(response['data'].imagen3)
            $("#precioLista").val(response['data'].precioLista)
            $("#precioOF").val(response['data'].precioOF)
            $("#OfDesde").val(response['data'].OfDesde)
            $("#OfHasta").val(response['data'].OfHasta)
            $("#impuesto_id").val(response['data'].impuesto_id)
            $("#presentacion_id").val(response['data'].presentacion_id)
            $("#destacar_id").val(response['data'].destacar_id)
            $("#etiquetas").val(response['data'].etiquetas)
            $("#peso").val(response['data'].peso)
            $("#tamano").val(response['data'].tamano)
            $("#orden").val(response['data'].orden)
            $("#unidadvta").val(response['data'].unidadvta)
            $("#categoria_id").val(response['data'].categoria_id)

        },//success
            error: function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        } //error 
      });//ajax  

      //console.log(datos);


      // Ocultamos el input file en la edicion
      $('#ocultaFile').hide();
      $('#ocultaFile1').hide();
      $('#ocultaFile2').hide();


       // Mostramos el nombre y la imagen del slide a editar
       if (datos.imagen == '' || datos.imagen == null) {
        $('#showImagen').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/imagen-no-disponible.png" width="300" height="225" class="img-thumbnail editFile im1" id="im1"/> <p class="help-block editFile" id="nim1">'+datos.imagen+'</p>').show();
        $('#deleteimagenicon').hide()
        $('#nim1').hide()

      }else{
        $('#deleteimagenicon').show()
        $('#showImagen').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/'+datos.sitio_id+'/productos/'+datos.imagen+'" width="300" height="225" class="img-thumbnail editFile im1" id="im1"/> <p class="help-block editFile" id="nim1">'+datos.imagen+'</p>').show();
        $('#nim1').show()
      }


      if (datos.imagen2 == '' || datos.imagen2 == null) {
        $('#showImagen2').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/imagen-no-disponible.png" width="300" height="225" class="img-thumbnail editFile im2" id="im2"/> <p class="help-block editFile" id="nim2">'+datos.imagen2+'</p>').show();
        $('#deleteimagen2icon').hide()
        $('#nim2').hide()
    }else {
        $('#showImagen2').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/'+datos.sitio_id + '/productos/' + datos.imagen2+'" width="300" height="225" class="img-thumbnail editFile im2" id="im2"/> <p class="help-block editFile" id="nim2">'+datos.imagen2+'</p>').show();
        $('#deleteimagen2icon').show()
        $('#nim2').show()
      }  
      
      if (datos.imagen3 == '' || datos.imagen3 == null) {
        $('#showImagen3').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/imagen-no-disponible.png" width="300" height="225" class="img-thumbnail editFile im3" id="im3"/> <p class="help-block editFile" id="nim3">'+datos.imagen3+'</p>').show();
        $('#deleteimagen3icon').hide()
        $('#nim3').hide()
      }else{
      $('#showImagen3').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/'+datos.sitio_id + '/productos/'+datos.imagen3+'" width="300" height="225" class="img-thumbnail editFile im3" id="im3"/> <p class="help-block editFile" id="nim3">'+datos.imagen3+'</p>').show();
        $('#deleteimagen3icon').show()
        $('#nim3').show()

      }
     // dibujamos la posicion de la llave 
      if (datos.destacar_id==1) {
          $('.llave_destacar_id').removeClass('fa-toggle-off');
          $('.llave_destacar_id').addClass('fa-toggle-on');
        }else{
          $('.llave_destacar_id').removeClass('fa-toggle-on');
          $('.llave_destacar_id').addClass('fa-toggle-off');
        }
    
        //Abrimos el modal
      $("#modalSitios").modal("show");
    });//click
    

 }//funcion


 // Funcion para eliminar un row
 function deleteSitios(body, table) { 
    //Tomando desde el boton de edicion
		$(body).on("click", "a.eliminar", function() {
      // Obtenemos los datos del row
      var datos = table.row($(this).parents("tr")).data();
          
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
              url: UrlBase+'mipanel/productos/deleteProducto',
              data: { Id: datos.id, 
                      FileName: datos.imagen, 
                      FileName2: datos.imagen2,
                      FileName3: datos.imagen3},
              dataType: "json",
              success: function (response) {
                if (response.success == true) {
                 swalButtons.fire(
                    'Eliminado!',
                    'Su archivo ha sido eliminado.',
                    'success'
                  );
                  table.ajax.reload();
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
            'Tu archivo está seguro',
            'error'
          )
        }
      })

    });//eliminar
  }//funcion

//Funcion para cambiar estado
 function cambioEstado(body,table,Toast) { 
    // Mostrar un alert con el dato de la row
    $(body).on("click", "a.publicar", function () {
      var me = $(this);
      var datos = table.row($(this).parents("tr")).data();
         // Ejecutamos la accion y la enviamos al servidor 
         $.ajax({
          type: "POST",
          url: UrlBase+'mipanel/productos/cambioEstado',
          data: { Publicar: datos.publicar, Id: datos.id },
          dataType: "json",
          success: function (response) {
            if (response.success == true) {
               
              if(response.publicar == "1"){
                // alert('Activo');
                Toast.fire({
                  type: 'success',
                  title: 'Elemento Activado',
                })
              }else{
                // alert('inactivo');
                Toast.fire({
                  type: 'error',
                  title: 'Elemento Desactivado',
                })
              }

              table.ajax.reload();
            }
          }//success
        });//ajax
    });
  }

 // Declaramos el idioma del Datatable
 let espanol = {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ resultados",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando resultados _START_-_END_ de  _TOTAL_",
    sInfoEmpty: "Mostrando resultados del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sSearch: "Buscar:",
    sLoadingRecords: "Cargando...",
    oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior"
    }
 }
