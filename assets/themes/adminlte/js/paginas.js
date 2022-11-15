$(document).ready(function () {

  // Url Dinamico
  url = $('#url').val();

  //Configuramos las alerts
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  // Carga de tabla
  listar(url, Toast); 


  $('.eliminar').on('click',function (e) {     
    let id = this.dataset.id;
    //console.log('Esta por eliminar la rendicion: ' + id);
    //let idConvenio = this.dataset.convenio_id;
    eliminar(id,Toast); 
  });






});


  // Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
  function listar(base,Toast) {
    var table = $("#paginasAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/paginas/getPaginas",
            type: "POST",
            dataType: "json"
        },
        rowCallback : function( row, data ) {
          //console.log(data);
          if ( data.estado == "1" ) {
            $('td:eq(7)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(7)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa fa-toggle-off fa-2x text-green'></i></a></div>" ); 
            }
          
          $('td:eq(8)', row).html( "<div class='text-center'><a href='" + url + "mipanel/paginas/editar/" + data.seccion_id + "' class='activo'><i class='fa fa-pencil fa-2x text-yellow'></a></div>" ); 
          
        },
        columns: [
            { data: "seccion_id" },
            { data: "titulo" },
            { data: "slug" },
            { data: "menu"},
            { data: "orden"},
            { data: "idioma"}, 
            { data: "modulo"},
            { data: "modulo"},
            { data: "modulo"},                
            {
              defaultContent:
                "<a href='javascript:void(0);' class='eliminarPag btn btn-xs'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    // submit(table,Toast) //Accion de Insertar o Editar
    // Edit("#paginasAbm tbody", table); //Tomar datos para la Edicion
    eliminarPag("#paginasAbm tbody", table); //Eliminar un slide
    cambiarEstado("#paginasAbm tbody", table, Toast); //Cambiar estado

  }


//Funcion para cambiar estado
function cambiarEstado(body,table,Toast) { 
  // Mostrar un alert con el dato de la row
  $(body).on("click", "a.cambiarEstado", function () {
    var datos = table.row($(this).parents("tr")).data();

    // Ejecutamos la accion y la enviamos al servidor 
       $.ajax({
        type: "POST",
        url: UrlBase+'mipanel/paginas/cambiarEstado',
        data: { Estado: datos.estado, Id: datos.seccion_id },
        dataType: "json",
        success: function (response) {
          if (response.status == true) {
             
            if(response.estado == "1"){
              Toast.fire({
                type: 'success',
                title: 'Elemento Activado',
              })
            }else{
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
 function eliminarPag(body, table) { 
  //Tomando desde el boton de edicion
  $(body).on("click", "a.eliminarPag", function() {
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
        $.ajax({
            type: "POST",
            url: url+'mipanel/paginas/eliminar',
            data: { Id: datos.seccion_id },
            dataType: "json",
            success: function (response) {
              if (response.status == true) {
               swalButtons.fire(
                  'Eliminado!',
                  'Su fila ha sido eliminada.',
                  'success'
                );
                table.ajax.reload();
              }
              else{
               swalButtons.fire(
                  'No se pudo eliminar',
                  response.message,
                  'warning'
                );                
              }
            }//success
          });//ajax  
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


