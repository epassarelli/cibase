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

  // Funcion para eliminar un row
  function eliminar(id,Toast) { 
    //Configuracion de botones del alert con clase de bootstrap
    const swalButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success btn-sm',
        cancelButton: 'btn btn-danger btn-sm'
      },
      buttonsStyling: false
    })

    // Abrimos alerta de confirmacion
    swalButtons.fire({
      title: '¿Estas Seguro?',
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
            url: UrlBase + 'mipanel/paginas/eliminar',
            data: { id : id },
            dataType: "json",
            success: function(response) {
              //alert(JSON.stringify(response));

              if (response.status) {
                console.log('Se puede eliminar');
                swalButtons.fire({
                  title: 'Eliminado',
                  text: 'La página ha sido eliminada',
                  type: 'success',
                  confirmButtonText: 'Aceptar',
                  allowOutsideClick: false
                })
                .then((result) => {
                  $(location).prop('href', window.location.href)
                });
                //tableOP.ajax.reload();
                //window.location.replace(url + "convenios");
              }
              else{
                console.log('Message: ' + response.message);
                //console.log('No se puede eliminar');
                swalButtons.fire({
                  title: 'Atención',
                  text: 'La página no puede ser eliminada',
                  type: 'warning'
                  // confirmButtonText: 'Aceptar',
                  // allowOutsideClick: false,
                });
              }

            }, //success
            error: function(response){
                //imprime a consola el response con detalles del error
                console.log('Error: ' + response.message);
            }              
          });//ajax  
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalButtons.fire(
          'Cancelado',
          'Tu página está segura',
          'error'
        )
      }
    })
  }//funcion


  // Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
  function listar(base,Toast) {
    var table = $("#paginasABM").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/paginas/getPaginas",
            type: "jsonp"
        },
        rowCallback : function( row, data ) {
          console.log(data);
          if ( data.estado == "1" ) {
            $('td:eq(3)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>" ); 
          }else{
            $('td:eq(3)', row).html( "<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>" ); 
            }
          
          $('td:eq(4)', row).html( "<div class='text-center'><a href='" + url + "mipanel/paginas/editar/" + data.seccion_id + "' class='activo'><i class='fa fa-pencil fa-2x text-yellow'></a></div>" ); 
          
        },
        columns: [
            { data: "seccion_id" },
            { data: "idioma" },
            { data: "titulo" },
            { data: "menu"},
            { data: "modulo"},
            { data: "orden"},
            { data: "orden"},
            { data: "orden"},        
            {
              defaultContent:
                "<a href='javascript:void(0);' class='eliminarPag btn btn-xs'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
            }
        ],
        language: espanol
    });

    // submit(table,Toast) //Accion de Insertar o Editar
    // Edit("#paginasAbm tbody", table); //Tomar datos para la Edicion
    // eliminarPag("#paginasAbm tbody", table); //Eliminar un slide
    // cambiarEstado("#paginasAbm tbody", table, Toast); //Cambiar estado

  }

});


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


