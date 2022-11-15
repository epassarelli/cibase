$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();
    
    

    
   
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
      $('.titulo').html('Agregar Categorias');   // Titulo del form   
      $("#formCategorias").trigger("reset"); // Reseteams el form
      $("#Opcion").val("insertar"); // Asignamos la accion
      $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
      $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
      $('#ocultaFile').show() // Mostramos el input file
      $('#imagen').val(null) // Reiniciamos el valor del file para validacion
      $('#llave_menu').val(0) // Reiniciamos el valor del file para validacion
      $('#catpadre_id').val(0) // Reiniciamos el valor del file para validacion

    });

});

//cambio estado llave landing formulario alta y edicion 
$('#llave_menu').click(function()  {
  var valor_llave =  $('#menu').val();
  if (valor_llave==0) {
    $('#menu').val(1);
    $('.llave_menu').removeClass('fa-toggle-off')
    $('.llave_menu').addClass('fa-toggle-on')
  }else{
    $('#menu').val(0);
    $('.llave_menu').removeClass('fa-toggle-on')
    $('.llave_menu').addClass('fa-toggle-off')
  }
});



// En edicion hace click sobre la imagen la cambia
$('#showImagen').click(function()  {
   $('#File').click();  
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

    var modulo_id = $('#tipocat').val();
    //console.log('modulo_id',modulo_id)

    var table = $("#categoriasAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            //url: base + "mipanel/categorias/getCategorias?modulo_id=" + modulo_id,
            url: base + "mipanel/categorias/getCategorias/" + modulo_id,
            type: "POST",
            dataType: "json"
          },
          rowCallback : function( row, data ) {
          //console.log(data.estado)
      
          
          if ( data.imagen !== null && data.imagen !== '' ) {
            $('td:eq(4)', row).html("<img src='" + base + "assets/uploads/"+ data.sitio_id +"/categorias/"+data.imagen + "' class='img-thumbnail' />"); 
          }else{
            $('td:eq(4)', row).html("<img src='" + base + "assets/uploads/Imagen-no-disponible.png' class='img-thumbnail' />"); 
          }            
          
          if ( data.estado == "1" ) {
            $('td:eq(5)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='estado'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(5)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='estado'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 

          }
        },

        columns: [
            { data: "categoria_id" },
            { data: "categoria" },
            { data: "description" },
            { data: "slug" },
            { data: "imagen" },
            { data: "estado"},
            {
                defaultContent:
                    "<div class='text-center'><a href='javascript:void(0);' class='editar btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a> <a href='javascript:void(0);' class='eliminar btn btn-xs' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    submit(table,Toast) //Accion de Insertar o Editar
    Edit("#categoriasAbm tbody", table); //Tomar datos para la Edicion
    deleteCategorias("#categoriasAbm tbody", table); //Eliminar un slide
    
    //Cambiar estado en datatable
    cambioEstado("#categoriasAbm tbody", table,Toast); 

 }



// Funcion de Enviar datos al servidor para insertar o editar datos
function submit(table,Toast) {
  $("#formCategorias").submit(function(e) {
    e.preventDefault(); // evitamos que redireccione el formulario

    // Asignamos el valor a input oculto para la validacion de la imagen
    if ($('#File').val().length > 0) {
      $('#imagen').val($('#File').val())
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
            $("#modalCategorias").modal("hide"); 
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
      //console.log('datos: '+datos.categoria_id);
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
        url: UrlBase+'mipanel/categorias/getCategoriaJson',
        data: { Id: datos.categoria_id},
        dataType: "json",
        success: function (response) {
            //Asignamos los valores de cada input para que se muestren en el form
            $("#categoria_id").val(response['data'].categoria_id)
            $("#catpadre_id").val(response['data'].catpadre_id)
            $("#sitio_id").val(response['data'].sitio_id)
            $("#idioma_id").val(response['data'].idioma_id)
            $("#categoria").val(response['data'].categoria)
            $("#description").val(response['data'].description)
            $("#slug").val(response['data'].slug)
            $("#imagen").val(response['data'].imagen)
            $("#menu").val(response['data'].menu)
            $("#orden").val(response['data'].orden)
            $("#keywords").val(response['data'].keywords)
            $("#modulo_id").val(response['data'].modulo_id)
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
    

       // Mostramos el nombre y la imagen del slide a editar
       if (datos.imagen == '' || datos.imagen == null) {
        $('#showImagen').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/imagen-no-disponible.png" width="300" height="225" class="img-thumbnail editFile im1" id="im1"/> <p class="help-block editFile" id="nim1">'+datos.imagen+'</p>').show();
        $('#deleteimagenicon').hide()
        $('#nim1').hide()

      }else{
        $('#deleteimagenicon').show()
        $('#showImagen').addClass('has-error')
        .append('<img src="'+UrlBase+'assets/uploads/'+datos.sitio_id+'/categorias/'+datos.imagen+'" width="300" height="225" class="img-thumbnail editFile im1" id="im1"/> <p class="help-block editFile" id="nim1">'+datos.imagen+'</p>').show();
        $('#nim1').show()
      }

         //Abrimos el modal
         $("#modalCategorias").modal("show");

    });//click
    


 }//funcion


 // Funcion para eliminar un row
 function deleteCategorias(body, table) { 
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
              url: UrlBase+'mipanel/categorias/deleteCategoria',
              data: { Id: datos.categoria_id, 
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
    $(body).on("click", "a.estado", function () {
      var me = $(this);
      var datos = table.row($(this).parents("tr")).data();
         // Ejecutamos la accion y la enviamos al servidor 
         $.ajax({
          type: "POST",
          url: UrlBase+'mipanel/categorias/cambioEstado',
          data: { Estado: datos.estado, Id: datos.categoria_id },
          dataType: "json",
          success: function (response) {
            if (response.success == true) {
               
              if(response.estado == "1"){
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
