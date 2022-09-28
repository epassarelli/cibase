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
      $('.titulo').html('Agregar Presentacion');   // Titulo del form   
      $("#formPresentaciones").trigger("reset"); // Reseteams el form
      $("#Opcion").val("insertar"); // Asignamos la accion
      $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
      $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
      //$('#catpadre_id').val(0) // Reiniciamos el valor del file para validacion

    });

});


/*
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
*/





/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////


// Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
function listar(base,Toast) {

    //var modulo_id = $('#tipocat').val();
    //console.log('modulo_id',modulo_id)

    var table = $("#presentacionesAbm").DataTable({
        destroy: true,
        responsive: true,
        order: [[1, 'asc']],
        ajax: {
            url: base + "mipanel/presentaciones/getPresentaciones",
            type: "json"
        },
          rowCallback : function( row, data ) {
          //console.log(data.estado)

        },

        columns: [
            { data: "presentacion_id" },
            { data: "titulo" },
            { data: "sigla" },
            {
                defaultContent:
                    "<div class='text-center'><a href='javascript:void(0);' class='editar btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a>"+
                    "<a href='javascript:void(0);' class='eliminar btn btn-xs' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    submit(table,Toast) //Accion de Insertar o Editar
    Edit("#presentacionesAbm tbody", table); //Tomar datos para la Edicion
    Detalle("#presentacionesAbm tbody", table); //Tomar datos para la Edicion
    deletePresentaciones("#presentacionesAbm tbody", table); //Eliminar
  
    
   
 }

 



// Funcion de Enviar datos al servidor para insertar o editar datos
function submit(table,Toast) {
  $("#formPresentaciones").submit(function(e) {
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
            $("#modalPresentaciones").modal("hide"); 
          //Eliminamos las clases de los errores
              $(".form-group")
              .removeClass("has-error has-success")
              $('.text-danger').remove()    
          // Mostramos el mensaje de cargado
         
         // Toast.fire({type: 'success', title: 'Cargado con Exito !', })


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
        url: UrlBase+'mipanel/presentaciones/getPresentacionJson',
        data: { Id: datos.presentacion_id},
        dataType: "json",
        success: function (response) {
            //Asignamos los valores de cada input para que se muestren en el form
            $("#presentacion_id").val(response['data'].presentacion_id)
            $("#titulo").val(response['data'].titulo)
            $("#sigla").val(response['data'].sigla)
        },//success
            error: function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        } //error 
      });//ajax  

      //console.log(datos);


         //Abrimos el modal
         $("#modalPresentaciones").modal("show");

    });//click
    


 }//funcion


 // Funcion para eliminar un row
 function deletePresentaciones(body, table) { 
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
              url: UrlBase+'mipanel/presentaciones/deletePresentacion',
              data: { Id: datos.presentacion_id },
              dataType: "json",
              success: function (response) {
                if (response.success == true) {
                 swalButtons.fire('Eliminado!','Su registro ha sido eliminado.', 'success');
                  table.ajax.reload();
                }
              }//success
            });//ajax  
            //console.log('ejecutamos 3'); 
          } else if (
          /* Read more about handling dismissals below */
           result.dismiss === Swal.DismissReason.cancel
        ) {
          swalButtons.fire('Cancelado','Tu registro está seguro','error')
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


 
// Funcion para tomar los datos de la edicion y asignarlos a los imputs
function Detalle(body, table) {
 
  //Tomando desde el boton de edicion
  $(body).on("click", "a.detalle", function() {
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
      url: UrlBase+'mipanel/presentaciones/getPresentacionesJson',
      data: { Id: datos.id},
      dataType: "json",
      success: function (response) {
          //Asignamos los valores de cada input para que se muestren en el form
          $("#presentacion_id").val(response['data'].presentacion_id)
          $("#titulo").val(response['data'].titulo)
          $("#sigla").val(response['data'].sigla)
      },//success
          error: function(xhr, textStatus, error){
          console.log(xhr.statusText);
          console.log(textStatus);
          console.log(error);
      } //error 
    });//ajax  

    //console.log(datos);


       //Abrimos el modal
       $("#modalPresentaciones").modal("show");

  });//click
  


}//funcion
