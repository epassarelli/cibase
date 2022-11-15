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

});




/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////


// Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
function listar(base,Toast) {
    var table = $("#bloquesAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/bloques/getBloques",
            type: "post",
            dataType: "json"
         },
        rowCallback : function( row, data ) {
          //console.log(data.estado)
          //$('td:eq(1)', row).html("<img src='" + base + "assets/uploads/"+ data.sitio_id + "/" + data.logo + "'width='60' height='30' />"); 
          // if ( data.menu == "1" ) {
          //   $('td:eq(4)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='activo'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          // }else{
          //   $('td:eq(4)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='activo'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 
          // }
          $('td:eq(4)', row).html("<img src='" + base + "assets/images/formatos/" + data.imagen + "'width='240' height='100' alt='" + data.imagen + "' />"); 

          if ( data.estado == "1" ) {
            $('td:eq(5)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(5)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa fa-toggle-off fa-2x text-green'></i></a></div>" ); 

          }

          
        },
        columns: [
            { data: "bloque_id" },
            { data: "sitio" },
            { data: "titulo" },
            { data: "texto1" },                       
            { data: "formato_id"},
            { data: "estado" },
            {
                defaultContent:
                    "<div class='text-center'><a href='javascript:void(0);' class='editar btn btn-xs'><i class='fa fa-pencil fa-2x text-yellow'></i></a> <a href='javascript:void(0);' class='eliminarBlo btn btn-xs'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    //submit(table,Toast) //Accion de Insertar o Editar
    //Edit("#bloquesAbm tbody", table); //Tomar datos para la Edicion
    eliminarBlo("#bloquesAbm tbody", table); //Eliminar un slide
    cambiarEstado("#bloquesAbm tbody", table, Toast); //Cambiar estado

 }


 // Funcion para eliminar un row
 function eliminarBlo(body, table) { 
    //Tomando desde el boton de edicion
		$(body).on("click", "a.eliminarBlo", function() {
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
              url: UrlBase+'mipanel/bloques/eliminar',
              data: { Id: datos.bloque_id },
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
                  //table.ajax.reload();
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


//Funcion para cambiar estado
 function cambiarEstado(body,table,Toast) { 
    // Mostrar un alert con el dato de la row
    $(body).on("click", "a.cambiarEstado", function () {
      
      var datos = table.row($(this).parents("tr")).data();

         // Ejecutamos la accion y la enviamos al servidor 
         $.ajax({
          type: "POST",
          url: UrlBase+'mipanel/bloques/cambiarEstado',
          data: { Estado: datos.estado, Id: datos.bloque_id },
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
