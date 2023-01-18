$(document).ready(function () {

  // Url dinamica
  url = $('#url').val();

  // Configuramos las alerts
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  // Carga de tabla
  listar(url, Toast);








  //$('.eliminarPub').on('click',function (e) {   
  // $(document).on('click','.eliminarPub',function () {   
  //   let id = this.dataset.id;
  //   eliminar(id,Toast); 
  // });

  //$('.cambiarEstado').on('click',function (e) { 
  // $(document).on('click','.cambiarEstado',function () {    
  //   cambiarEstado(id,Toast); 
  // });





  $('.iconoTipo').hide()

  //////////////////////////////////////////////////
  ///////// Funcionalidad de File  ////////////
  /////////////////////////////////////////////////

  $('.fileIconPublicacion').hide();
  $('.fileIconPortada').hide();

  //console.log('NamePortada: ' + $('#NamePortada').val());
  //console.log('NamePublicacion: ' + $('#NamePublicacion').val());

  // Mostrando portada segun se el caso: Editar/Insertar
  if ($('#NamePortada').val()) {
    $('#subirPortada').hide()
    $('#borrarPortada').show()
  } else {
    $('#subirPortada').show()
    $('#borrarPortada').hide()
  }

  // Mostrando publicacion segun se el caso: Editar/Insertar
  if ($('#NamePublicacion').val()) {
    $('#subirPublicacion').hide()
    $('#borrarPublicacion').show()
  } else {
    $('#subirPublicacion').show()
    $('#borrarPublicacion').hide()
  }







  // Funcionalidad al seleccionar el adjunto
  $(document).on('change', '#publicacion', function () {
    name = $(this).val();
    fic = name.split('\\');
    var allowedExtensions = /(.pdf)$/i;
    console.log(fic);
    // Validamos el tipo de archivo
    if (!allowedExtensions.exec(name)) {
      $(this).val('');
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: `El archivo ${fic[fic.length - 1]} es invalido !`,
        footer: '<div class="txt-alimentos">Solo se permiten archivos .PDF</div>'
      })
      $('.fileIconPublicacion').fadeOut('slow');
    } else {
      if (name) {
        $('.fileIconPublicacion').fadeIn('slow');
        $('.titleAdPublicacion').text(' ' + fic[fic.length - 1]);

      } else {
        $('.fileIconPublicacion').fadeOut('slow');
      }
    }
  });



  // Funcionalidad al seleccionar el adjunto
  $(document).on('change', '#portada', function () {

    name = $(this).val();
    fic = name.split('\\');
    var allowedExtensions = /(.jpg)$/i;
    console.log(fic);
    // Validamos el tipo de archivo
    if (!allowedExtensions.exec(name)) {
      $(this).val('');
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: `El archivo ${fic[fic.length - 1]} es invalido !`,
        footer: '<div class="txt-alimentos">Solo se permiten archivos .jpg</div>'
      })
      $('.fileIconPortada').fadeOut('slow');
    } else {
      if (name) {
        $('.fileIconPortada').fadeIn('slow');
        $('.titleAdPortada').text(' ' + fic[fic.length - 1]);

      } else {
        $('.fileIconPortada').fadeOut('slow');
      }
    }
  });


  //Funcionalidad de boton eliminar
  $(document).on('click', '.eliminar', function () {
    // id = $('#id').val();
    campo = this.dataset.campo;
    // nameFile = this.dataset.file;
    // console.log(id + ' - ' + nameFile + ' - ' + campo);
    if (campo == 'publicacion') {
      console.log('tengo que resetear publicacion');
      document.getElementById("NamePublicacion").value = "";
      $('#subirPublicacion').show();
      $('#borrarPublicacion').hide();
    } else {
      console.log('tengo que resetear portada');
      document.getElementById("NamePortada").value = "";
      $('#subirPortada').show();
      $('#borrarPortada').hide();
    }
  });




  // Funcion para eliminar un row
  function eliminarQWE(id, Toast) {
    //Configuracion de botones del alert con clase de bootstrap
    console.log('Eliminar pub: ' + id);
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
          url: UrlBase + 'mipanel/publicaciones/eliminar',
          data: { id: id },
          dataType: "json",
          success: function (response) {
            //alert(JSON.stringify(response));

            if (response.status) {
              console.log('Se puede eliminar');
              swalButtons.fire({
                title: 'Eliminado',
                text: 'La publicación ha sido eliminada',
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
            else {
              console.log('Message: ' + response.message);
              //console.log('No se puede eliminar');
              swalButtons.fire({
                title: 'Atención',
                text: 'La publicación no puede ser eliminada',
                type: 'warning'
                // confirmButtonText: 'Aceptar',
                // allowOutsideClick: false,
              });
            }

          }, //success
          error: function (response) {
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
          'Tu publicación está segura',
          'error'
        )
      }
    })
  }//funcion



  //Funcion para cambiar estado
  // function cambiarEstado(body,table,Toast) { 
  //   // Mostrar un alert con el dato de la row
  //   $(body).on("click", "a.cambiarEstado", function () {
  //     //var me = $(this);
  //     var datos = table.row($(this).parents("tr")).data();

  //     //console.log(me);
  //     //console.log(datos);

  //     // Ejecutamos la accion y la enviamos al servidor 
  //        $.ajax({
  //         type: "POST",
  //         url: UrlBase+'mipanel/publicaciones/cambiarEstado',
  //         data: { Estado: datos.estado, Id: datos.publicacion_id },
  //         dataType: "json",
  //         success: function (response) {
  //           if (response.success == true) {

  //             if(response.estado == "1"){
  //               // alert('Activo');
  //               Toast.fire({
  //                 type: 'success',
  //                 title: 'Elemento Activado',
  //               })
  //             }else{
  //               // alert('inactivo');
  //               Toast.fire({
  //                 type: 'error',
  //                 title: 'Elemento Desactivado',
  //               })
  //             }

  //             table.ajax.reload();
  //           }
  //         } //success         
  //       });//ajax
  //   });
  // }


  // 
  // Evento de la funcion principal para cargar trozo de codigo que sea generico como eliminar, cambiar estado, etc etc
  // 
  // buttom.addEventListener('click', async function(){
  //   const module = await import('./assets/js/miScriptGenerico.js')
  //   module.eliminar()
  //   module.cambiarEstado()
  // })
  //
  //


  // export function hello() {
  //   console.log('Hola mundo');
  // }

  // `La ${variable} no puede ser eliminada`



});






// Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
function listar(base, Toast) {
  var table = $("#publicacionesAbm").DataTable({
    destroy: true,
    responsive: true,
    ajax: {
      url: base + "mipanel/publicaciones/getPublicaciones",
      type: "post",
      dataType: "json",
    },
    rowCallback: function (row, data) {

      if (data.estado == "1") {
        $('td:eq(3)', row).html("<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa  fa-toggle-on fa-2x text-green'></i></a></div>");
      } else {
        $('td:eq(3)', row).html("<div class='text-center'><a href='javascript:void(0);' class='cambiarEstado'><i class='fa  fa-toggle-off fa-2x text-green'></i></a></div>");

      }

      $('td:eq(4)', row).html("<div class='text-center'><a href='" + url + "mipanel/publicaciones/editar/" + data.publicacion_id + "' class='activo'><i class='fa fa-pencil fa-2x text-yellow'></a></div>");

    },
    columns: [
      { data: "publicacion_id" },
      { data: "categoria" },
      { data: "titulo" },
      { data: "estado" },
      { data: "estado" },
      {
        defaultContent:
          "<a href='javascript:void(0);' class='eliminarPub btn btn-xs'><i class='fa fa-trash fa-2x text-red'></i></a></div>"
      }
    ],
    language: espanol
  });

  // submit(table,Toast) //Accion de Insertar o Editar
  // Edit("#publicacionesAbm tbody", table); //Tomar datos para la Edicion
  eliminarPub("#publicacionesAbm tbody", table); //Eliminar un slide
  cambiarEstado("#publicacionesAbm tbody", table, Toast); //Cambiar estado

}



// Funcion para eliminar un row
function eliminarPub(body, table) {
  //Tomando desde el boton de edicion
  $(body).on("click", "a.eliminarPub", function () {
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
          url: UrlBase + 'mipanel/publicaciones/eliminar',
          data: { Id: datos.publicacion_id },
          dataType: "json",
          success: function (response) {
            if (response.status == true) {
              swalButtons.fire(
                'Eliminado!',
                'Su archivo ha sido eliminado.',
                'success'
              );
              table.ajax.reload();
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




//Funcion para cambiar estado
function cambiarEstado(body, table, Toast) {
  // Mostrar un alert con el dato de la row
  $(body).on("click", "a.cambiarEstado", function () {
    var datos = table.row($(this).parents("tr")).data();

    // Ejecutamos la accion y la enviamos al servidor 
    $.ajax({
      type: "POST",
      url: UrlBase + 'mipanel/publicaciones/cambiarEstado',
      data: { Estado: datos.estado, Id: datos.publicacion_id },
      dataType: "json",
      success: function (response) {
        if (response.status == true) {

          if (response.estado == "1") {
            Toast.fire({
              type: 'success',
              title: 'Elemento Activado',
            })
          } else {
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