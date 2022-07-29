$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();
    var table;
    var tableimagenes;


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


     // Reseteamos el form y asignamos el valor de la opcion
    $(".insertarI").click(function() {
      $('.tituloI').html('Agregar Imagen de Productos');   // Titulo del form   
      $("#formImagenes").trigger("reset"); // Reseteams el form
      $("#OpcionI").val("insertar"); // Asignamos la accion
      $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
      $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
      $('#ocultaFileI').show() // Mostramos el input file
      $('#imagenI').val(null) // Reiniciamos el valor del file para validacion
      $('#llave_destacarI').val(0) // Reiniciamos el valor del file para validacion */
      var idproducto2 = $('#idproducto2').val();
      $('#idproducto').val(idproducto2) // pasamos el valor de un modal a otro
                                        // porque lo pierde en el reload del datatable
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

$('#showImagenI').click(function()  {
  $('#FileI').click();  
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

$('#deleteimageniconI').click(function() {
  $('#imI').attr('src',UrlBase+'assets/uploads/imagen-no-disponible.png');
  $('#imagenI').val('');
  $('#FileI').val('');   //esto lo pongo para que sirva el mismo icono en el alta 
  $("#nimI").text('');
  $('#deleteimageniconI').hide()
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
 
 $('#FileI').change(function() {
  var archi = document.getElementById("FileI").value.split('\\');
  var nomarchi = archi[archi.length-1] 
  var ima = UrlBase+'assets/uploads/7/colores/' + nomarchi;
  $("#nimI").text(nomarchi);
   if (archi !== '') {
    $('#deleteimagniconI').show()
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
          if (input.name === 'File1') {
            $('#im3').attr('src', e.target.result);
          }else{
            $('#imI').attr('src', e.target.result);
          }
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
  var tableimagenes;
  var table = $("#productosAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/productos/getProductos",
            type: "jsonp"
        },
        rowCallback : function( row, data ) {
          //console.log(data.estado)
      
         
          
          if ( data.publicar == "1" ) {
            $('td:eq(4)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='publicar'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(4)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='publicar'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 

          }
        },

        columns: [
            { data: "id" },
            { data: "titulo" },
            { data: "precioLista", className: "text-right" },
            { data: "precioOF", className: "text-right" },
            { data: "publicar"},
            {
                defaultContent:
                    "<div class='text-center'>"+
                    "<a href='javascript:void(0);' class='editar   btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a>"+
                    "<a href='javascript:void(0);' class='detalle  btn btn-xs'><i class='fa fa-camera fa-2x text-green'></i></a>"+
                    "<a href='javascript:void(0);' class='eliminar btn btn-xs' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash fa-2x text-red'></i></a>"+
                    "</div>"
            }
        ],
        language: espanol
    });

    submit(table,Toast) //Accion de Insertar o Editar
    Edit("#productosAbm tbody", table); //Tomar datos para la Edicion
    Detalles("#productosAbm tbody", table); //Tomar datos para manejar imagines y colores
    deleteSitios("#productosAbm tbody", table); //Eliminar un slide
    cambioEstado("#productosAbm tbody", table,Toast);  //Cambiar estado en datatable de la publicacion del articulo

/*     deleteProductoImagen("#ImagenesproductosAbm tbody", tableimagenes); //Tomar datos para la Eliminacion  
    editarImagen("#ImagenesproductosAbm tbody", tableimagenes); //Tomar datos para la Edicion
    cambioEstadoI("#ImagenesproductosAbm tbody", tableimagenes,Toast);  //Cambiar estado en datatable de la publicacion del articulo
 */
 }




// Funcion para tomar los datos de la edicion y asignarlos a los imputs
function Detalles(body, table) {
  

   //Tomando desde el boton de edicion
   $(body).on("click", "a.detalle", function() {
     //Guardamos los datos que tomamos del datatable
     
     var datos = table.row($(this).parents("tr")).data();
     
     //var datos = $('#productosAbm').DataTable().row($(this).parents("tr")).data();
     //alert('imagenes de: '+datos.id);
     
     
     // Removemos las posibles clases de validacion que pueda tener el fomr
     // Asignamos titulo al form y al boton
     $('.titulo').html('Administracion de Imgenes: '+datos.titulo)
     $('#idproducto').val(datos.id)
     $('#idproducto2').val(datos.id)
    
         var apicolores  = UrlBase + 'mipanel/productos/getProductoColoresJson/' + datos.id;
        
         
          tableimagenes = $("#ImagenesproductosAbm").DataTable({
          destroy: true,
          responsive: true,
          ajax: {
              url: apicolores,
              type: "jsonp"
          },
          rowCallback : function( row, data ) {
            if ( data.imagen !== null && data.imagen !== '' ) {
              $('td:eq(1)', row).html("<img  src='" + UrlBase + "assets/uploads/7/colores/"+data.imagen + "' class='img-thumbnail' />"); 
            }else{
              $('td:eq(1)', row).html("<img style='high: 50px; width: 50px;' src='" + UrlBase + "assets/uploads/Imagen-no-disponible.png' class='img-thumbnail' />"); 
            }            
            
            if ( data.publicar == "1" ) {
              $('td:eq(3)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='publicarI'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
            }else{
              $('td:eq(3)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='publicarI'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 
  
            }
          },
  
          columns: [
              { data: "id" },
              { data: "imagen" },
              { data: "descripcion" },
              { data: "publicar"},
              {
                  defaultContent:
                      "<div class='text-center'>"+
                      "<a href='javascript:void(0);' class='editarI btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a>"+
                      "<a href='javascript:void(0);' class='eliminarI btn btn-xs' data-toggle='modal' data-target='#modalEliminarI'><i class='fa fa-trash fa-2x text-red'></i></a>"+
                      "</div>"
              }
          ],
          language: espanol
        }); 



       //Abrimos el modal
    
     
     deleteProductoImagen("#ImagenesproductosAbm tbody", tableimagenes); //Tomar datos para la Eliminacion  
     editarImagen("#ImagenesproductosAbm tbody", tableimagenes); //Tomar datos para la Edicion
     cambioEstadoI("#ImagenesproductosAbm tbody", tableimagenes,Toast);  //Cambiar estado en datatable de la publicacion del articulo 
        
     $("#modalImagenes").modal("show");
   });//click
   


}//funcion


// Funcion de Enviar datos al servidor para insertar o editar datos
function submit(table,Toast) {
  
  $("#formSitios").submit(function(e) {
    e.preventDefault(); // evitamos que redireccione el formulario

    
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

  $("#formAbmImagenes").submit(function(e) {
    e.preventDefault(); // evitamos que redireccione el formulario

    // Asignamos el valor a input oculto para la validacion de la imagen
    if ($('#FileI').val().length > 0) {
      $('#imagenI').val($('#FileI').val())
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
            $("#modalAbmImagenes").modal("hide"); 
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
         // table.ajax.reload();
         $('#ImagenesproductosAbm').DataTable().ajax.reload();
         //$("#modalImagenes").focus();          
          

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

// Funcion para eliminar un row de la tabla de productos
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

//Funcion para cambiar estado y publicar o no el articulo
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


//Funcion para cambiar estado y publicar o no la foto del articulo
function cambioEstadoI(body,tableimagenes,Toast) { 
  // Mostrar un alert con el dato de la row
  $(body).on("click", "a.publicarI", function () {
    var datos = $('#ImagenesproductosAbm').DataTable().row($(this).parents("tr")).data();
    //var datos = tableimagenes.row($(this).parents("tr")).data();
       // Ejecutamos la accion y la enviamos al servidor 
       $.ajax({
        type: "POST",
        url: UrlBase+'mipanel/productos/cambioEstadoI',
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

            //table.ajax.reload();
            $('#ImagenesproductosAbm').DataTable().ajax.reload();
          }
        }//success
      });//ajax
  });
}




// Funcion para tomar los datos de la edicion de productos_colores y asignarlos a los imputs
function editarImagen(body,tableimagenes) {
  //Tomando desde el boton de edicion
 
  $(body).on("click", "a.editarI", function() {


   /*  var oTable = $('#ImagenesproductosAbm').DataTable();
    var info = oTable.page.info();
    var count = info.recordsTotal;
    alert('Cantidad: ' + count); */
     //Guardamos los datos que tomamos del datatable
     
     var datos = tableimagenes.row($(this).parents("tr")).data();
     //var datos = $('#ImagenesproductosAbm').DataTable().row($(this).parents("tr")).data();
     //alert('datos '+datos.id);
     
     // Removemos las posibles clases de validacion que pueda tener el fomr
     $('.form-group').removeClass('has-error has-success')
     $('.text-danger, .editFile').remove()
     // Asignamos titulo al form y al boton
     $('.tituloI').html('Edicion de Imagen de Producto')
     // Asignamos las accion que realiza el metodo del servidor
     $("#OpcionI").val("editar");
     //hay que ir a buscar el registro a la tabla porque en el datatable
     //no tenemos todos los campos 
     $.ajax({
       type: "POST",
       url: UrlBase+'mipanel/productos/getProductoColorJson/' + datos.id,
       //data: { Id: datos.id},
       dataType: "json",
       success: function (response) {
           //Asignamos los valores de cada input para que se muestren en el form
          //console.log(response);
           $("#idI").val(response['data'].id)
           $("#imagenI").val(response['data'].imagen)
           $("#idcolor").val(response['data'].idcolor)
           var idproducto2 = $('#idproducto2').val();
           $('#idproducto').val(idproducto2) // pasamos el valor de un modal a otro
                                             // porque lo pierde en el reload del datatable
           $("#imagenI").val(response['data'].imagen)


       },//success
           error: function(xhr, textStatus, error){
           console.log(xhr.statusText);
           console.log(textStatus);
           console.log(error);
       } //error 
     });//ajax  

      //console.log(datos);


     // Ocultamos el input file en la edicion
     $('#ocultaFileI').hide();


      // Mostramos el nombre y la imagen del slide a editar
      if (datos.imagen == '' || datos.imagen == null) {
       $('#showImagenI').addClass('has-error')
       .append('<img src="'+UrlBase+'assets/uploads/imagen-no-disponible.png" width="300" height="225" class="img-thumbnail editFile imI" id="imI"/> <p class="help-block editFile" id="nimI">'+datos.imagen+'</p>').show();
       $('#deleteimageniconI').hide()
       $('#nimI').hide()

     }else{
       $('#deleteimageniconI').show()
       $('#showImagenI').addClass('has-error')
       .append('<img src="'+UrlBase+'assets/uploads/7/colores/'+datos.imagen+'" width="300" height="225" class="img-thumbnail editFile imI" id="imI"/> <p class="help-block editFile" id="nimI">'+datos.imagen+'</p>').show();
       $('#nimI').show()
     }

       //Abrimos el modal
     $("#modalAbmImagenes").modal("show");
   });//click
   

}//funcion




// Funcion para eliminar un registri de la tabla
//productos_colors
function deleteProductoImagen(body, tableimagenes) { 
  //Tomando desde el boton de edicion
  $(body).on("click", "a.eliminarI", function() {
    // Obtenemos los datos del row
    var datos = tableimagenes.row($(this).parents("tr")).data();
        
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
            url: UrlBase+'mipanel/productos/deleteProductoImagen/' + datos.id,
            //data: { Id: datos.id, 
            //        FileName: datos.imagen},
            dataType: "json",
            success: function (response) {
              if (response.success == true) {
               swalButtons.fire(
                  'Eliminado!',
                  'Su archivo ha sido eliminado.',
                  'success'
                );
                //table.ajax.reload();
                $('#ImagenesproductosAbm').DataTable().ajax.reload();
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
