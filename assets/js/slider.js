$(document).ready(function () {
    
  // Url Dinamico
    UrlBase = $('#url').val();

  // Carga de tabla
    listar(UrlBase);

  // Reseteamos el form y asignamos el valor de la opcion
    $(".insertar").click(function() {
      $('.titulo').html('Insertar');   // Titulo del form   
      $("#formSlider").trigger("reset"); // Reseteams el form
      $("#Opcion").val("insertar"); // Asignamos la accion
      $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
      $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
      $('#ocultaFile').show() // Mostramos el input file
      $('#Imagen').val(null) // Reiniciamos el valor del file para validacion
    });

});

/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////

// Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
function listar(base) {
    var table = $("#sliderAbm").DataTable({
        destroy: true,
        ajax: {
            url: base + "mipanel/slider/getSliders",
            type: "jsonp"
        },
        rowCallback : function( row, data ) {
          console.log(data.estado)
          if ( data.estado == "1" ) {
            $('td:eq(4)', row).html( "<button type='button' class='activo btn btn-success btn-sm' id='vergaa'>Estado</button>" );
          }else{
            $('td:eq(4)', row).html( "<button type='button' class='activo btn btn-sm' id='vergaa'>Estado</button>" );
          }
        },
        columns: [
            { data: "id" },
            { data: "titulo" },
            { data: "descripcion" },
            { data: "imagen" },
            {
              data: "estado"
            },
            {
                defaultContent:
                    "<button type='button' class='editar btn btn-warning btn-sm'>Edit</button>	<button type='button' class='eliminar btn btn-danger btn-sm' data-toggle='modal' data-target='#modalEliminar' >Delet</button>"
            }
        ],
        language: espanol
    });

    submit(table) //Accion de Insertar o Editar
    Edit("#sliderAbm tbody", table); //Tomar datos para la Edicion
    deleteSlide("#sliderAbm tbody", table); //Eliminar un slide
    cambioEstado("#sliderAbm tbody", table); //Cambiar estado

 }

// Funcion de Enviar datos al servidor para insertar o editar datos
 function submit(table) {
    $("#formSlider").submit(function(e) {
      e.preventDefault(); // evitamos que redireccione el formulario

      // Asignamos el valor a input oculto para la validacion de la imagen
      if ($('#File').val().length > 0) {
        $('#Imagen').val($('#File').val())
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
            
            //Mostramos mensaje
                $("#sent")
                .append(
                    '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>    Guardado ! </div>'
                )
                .hide()
                .fadeIn(1000);
            //Eliminamos las clases de los errores
                $(".form-group")
                .removeClass("has-error has-success")
                $('.text-danger').remove()
            //Ocultamos el mensaje
                setTimeout(function() {
                $("#sent").fadeOut(1000);
                $("div.alert.alert-success").remove();
                //Ocultamos modal
                $("#modalSlide").modal("hide");
                }, 2000);
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
        });  //Ajax   
    });//submit

  }//funcion

// Funcion para tomar los datos de la edicion y asignarlos a los imputs
 function Edit(body, table) {
   //Tomando desde el boton de edicion
		$(body).on("click", "button.editar", function() {
      //Guardamos los datos que tomamos del datatable
      var datos = table.row($(this).parents("tr")).data();
      // Removemos las posibles clases de validacion que pueda tener el fomr
      $('.form-group').removeClass('has-error has-success')
      $('.text-danger, .editFile').remove()
			// Asignamos titulo al form y al boton
      $('.titulo').html('Editar')
      // Asignamos las accion que realiza el metodo del servidor
      $("#Opcion").val("editar");
      //Asignamos los valores de cada input para que se muestren en el form
			var id = $("#Id").val(datos.id),
				  titulo = $("#Titulo").val(datos.titulo),
				  descripcion = $("#Descripcion").val(datos.descripcion),
          imagen = $("#Imagen").val(datos.imagen);
      // Ocultamos el input file en la edicion
      $('#ocultaFile').hide();
      // Mostramos el nombre y la imagen del slide a editar
      $('#showImagen').addClass('has-error')
      .append('<img src="'+UrlBase+'assets/images/slider/'+datos.imagen+'" width="300" height="225" class="img-thumbnail editFile" /> <p class="help-block editFile">'+datos.imagen+'</p>').show();
      //Abrimos el modal
			$("#modalSlide").modal("show");
    });//click
    
 }//funcion

 // Funcion para eliminar un row
 function deleteSlide(body, table) { 
    //Tomando desde el boton de edicion
		$(body).on("click", "button.eliminar", function() {
      // Obtenemos los datos del row
      var datos = table.row($(this).parents("tr")).data();
      // Abrimos modal de confirmacion
      $("#modalConfirm").modal("show");
      //Al confirmar eliminamos de la base de datos 
      $('#confirmar').click(function (e) { 
        // Ejecutamos la accion y la enviamos al servidor 
        $.ajax({
          type: "POST",
          url: UrlBase+'mipanel/slider/deleteSlide',
          data: { Id: datos.id },
          dataType: "json",
          success: function (response) {
            console.log(response)
            if (response.success == true) {
              $("#modalConfirm").modal("hide");
              table.ajax.reload();
            }
          }//success
        });//ajax  
      });//confirmacion

    });//eliminar
  }//funcion

//Funcion para cambiar estado
 function cambioEstado(body,table) { 
    // Mostrar un alert con el dato de la row
    $(body).on("click", "button.activo", function () {
      var me = $(this);
      var datos = table.row($(this).parents("tr")).data();
        
         // Ejecutamos la accion y la enviamos al servidor 
         $.ajax({
          type: "POST",
          url: UrlBase+'mipanel/slider/cambioEstado',
          data: { Estado: datos.estado, Id: datos.id },
          dataType: "json",
          success: function (response) {
            console.log(response)
            if (response.success == true) {
               
              if(response.estado == "1"){
                // alert('Activo');
                me.addClass('btn-success');
              }else{
                // alert('inactivo');
                me.removeClass('btn-success');
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
 };

 