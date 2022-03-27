$(document).ready(function () {
    
  // url dinamica
  var url = $('#url').val();
  
  $('.iconoTipo').hide()

  //////////////////////////////////////////////////
  ///////// Funcionalidad de File  ////////////
  /////////////////////////////////////////////////

  // $('.fileIcon').hide();

  // Mostrando portada segun se el caso: Editar/Insertar
  if ($('#NamePortada').val()) {
      $('#subirPortada').hide()
      $('#botonDelete').show()
      //adjuntoPDF.required = false;
  }else{
      $('#subirPortada').show()
      $('#botonDelete').hide()
  }

  // Mostrando publicacion segun se el caso: Editar/Insertar
  if ($('#NamePublicacion').val()) {
      $('#subirPublicacion').hide()
      $('#borrarPublicacion').show()
      //adjuntoPDF.required = false;
  }else{
      $('#subirPublicacion').show()
      $('#borrarPublicacion').hide()
  }

      // Funcionalidad al seleccionar el adjunto
      $(document).on('change', '#adjuntoPDF',function() {
        
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
                  text: `El archivo ${fic[fic.length-1]} es invalido !`,
                  footer: '<div class="txt-alimentos">Solo se permiten archivos .PDF</div>'
                })
                $('.fileIcon').fadeOut('slow');
          }else{
              if (name) {
                  $('.fileIcon').fadeIn('slow');
                  $('.titleAd').text(' '+fic[fic.length-1]);
              
              }else{
                  $('.fileIcon').fadeOut('slow');
              }
          }
  
          
      });

    
    
      //Funcionalidad de boton eliminar
    $(document).on('click','.Eliminar',function () {

        var nameFile = $('#NamePortada').val(),
            id = $('#id').val();
            //adjuntoPDF.required = true;
            campo = this.dataset.campo;
            nameFile = this.dataset.file;
            console.log(id + ' - ' + nameFile + ' - ' + campo);
        $.ajax({
            type: "POST",
            url: url+"mipanel/publicaciones/deleteFile",
            data: {nombreArchivo : nameFile, id: id, campo: campo},
            success: function (response) {
                // console.log(response);
                if (response) {
                    $('.botonDelete').hide()
                    $('.botonFile').fadeIn('slow')
                    $('#NamePortada').val(null)
                    $('.close').trigger('click');                    
                    adjuntoPDF.required = true;
                }
            }
        });
        
    });




});
