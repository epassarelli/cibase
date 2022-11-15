$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();

  // Configuramos las alerts
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
    $('.titulo').html('Insertar');   // Titulo del form   
    $("#formPaginas").trigger("reset"); // Reseteams el form
    $("#Opcion").val("insertar"); // Asignamos la accion
    $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
    $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
    $('#ocultaFile').show() // Mostramos el input file
    $('#ocultaFile1').show() // Mostramos el input file
    $('#ocultaFile2').show() // Mostramos el input file
    $('#Logo').val(null) // Reiniciamos el valor del file para validacion
    $('#Icon').val(null) // Reiniciamos el valor del file para validacion
    $('#Qr').val(null) // Reiniciamos el valor del file para validacion
    $('#Landing').val(0) // Reiniciamos el valor del file para validacion
  });

});




//cambio estado llave landing formulario alta y edicion 
$('#llave_landing').click(function()  {
  var valor_llave =  $('#Landing').val();
  if (valor_llave==0) {
    $('#Landing').val(1);
    $('.llave_landing').removeClass('fa-toggle-off')
    $('.llave_landing').addClass('fa-toggle-on')
  }else{
    $('#Landing').val(0);
    $('.llave_landing').removeClass('fa-toggle-on')
    $('.llave_landing').addClass('fa-toggle-off')
  }
});







/////////////////////////////////////////////
////////// Funciones de la tabla ////////////
/////////////////////////////////////////////

// var datos = table.row($(this).parents("tr")).data();


// Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
function listar(base,Toast) {
    var table = $("#componentesAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/componentes/getComponentes",
            type: "POST",
            dataType: "json"
        },
        rowCallback : function( row, data ) {
          //console.log(data);
          //console.log(data.estado)
          // $('td:eq(1)', row).html("<img src='" + base + "assets/uploads/"+ data.sitio_id + "/" + data.logo + "'width='60' height='30' />"); 

          // if ( data.menu == "1" ) {
          //   $('td:eq(4)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='activo'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          // }else{
          //   $('td:eq(4)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='activo'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" );
          // }

          if ( data.estado == "1" ) {
            $('td:eq(6)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(6)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 
          }
          
          $('td:eq(7)', row).html( "<div class='text-center'><a href='" + UrlBase + "mipanel/componentes/editar/" + data.componente_id + "' class='activo'><i class='fa fa-pencil fa-2x text-yellow'></a></div>" ); 

          // alert("<img src='" + base + "assets/uploads/"+ data.sitio_id +"/"+data.logo + "' class='rounded mx-auto d-block' />")  
          // $('td:eq(6)', row).html("<img src='" + base + "assets/images/banderas/" + data.flag + "'width='24' height='16' />"); 
          
        },
        columns: [
            { data: "componente_id" },
            { data: "texto1" },
            { data: "texto2" },
            { data: "bloque_id" },
            { data: "seccion_id" },
            // { data: "sitio_id"},
            { data: "estado"},
            { data: "estado"},
            { data: "estado"},
            {
              defaultContent:
                "<a href='javascript:void(0);' class='eliminarCom btn btn-xs'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    // submit(table,Toast) //Accion de Insertar o Editar
    // Edit("#componentesAbm tbody", table); //Tomar datos para la Edicion
    eliminarCom("#componentesAbm tbody", table); //Eliminar un slide
    cambiarEstado("#componentesAbm tbody", table, Toast); //Cambiar estado

 }

//Funcion para cambiar estado
 function cambiarEstado(body,table,Toast) { 
    // Mostrar un alert con el dato de la row
    $(body).on("click", "a.cambiarEstado", function () {
      
      var datos = table.row($(this).parents("tr")).data();
      console.log(datos);
         // Ejecutamos la accion y la enviamos al servidor 
         $.ajax({
          type: "POST",
          url: UrlBase+'mipanel/componentes/cambiarEstado',
          data: { Estado: datos.estado, Id: datos.componente_id },
          dataType: "json",
          success: function (response) {
            if (response.status == true) {
               
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
          } //success         
        });//ajax
    });
  }


 // Funcion para eliminar un row
 function eliminarCom(body, table) { 
    //Tomando desde el boton de edicion
		$(body).on("click", "a.eliminarCom", function() {
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
          console.log('ejecutamos');  
          $.ajax({
              type: "POST",
              url: UrlBase+'mipanel/componentes/eliminar',
              data: { Id: datos.componente_id },
              dataType: "json",
              success: function (response) {
                if (response.status == true) {
                 swalButtons.fire(
                    'Eliminado!',
                    'Su bloque ha sido eliminado.',
                    'success'
                  )
                 }
                  else{
                        swalButtons.fire(
                            'No se pudo eliminar',
                            response.message,
                            'warning'
                          );                
                      }
                  table.ajax.reload();
                }
              //}//success
            });//ajax  
            //console.log('ejecutamos 3'); 
          } else if (
          /* Read more about handling dismissals below */
           result.dismiss === Swal.DismissReason.cancel
        ) {
          swalButtons.fire(
            'Cancelado',
            'Tu bloque está seguro',
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
