$(document).ready(function () {
    
  // url dinamica
  var url = $('#url').val();
  
  $('.iconoTipo').hide()

  //////////////////////////////////////////////////
  ///////// Funcionalidad de File  ////////////
  /////////////////////////////////////////////////

  $('.fileIconPublicacion').hide();
  $('.fileIconPortada').hide();

  console.log('NamePortada: ' + $('#NamePortada').val());
  console.log('NamePublicacion: ' + $('#NamePublicacion').val());

  // Mostrando portada segun se el caso: Editar/Insertar
  if ($('#NamePortada').val()) {
    $('#subirPortada').hide()
    $('#borrarPortada').show()
  }else{
      $('#subirPortada').show()
      $('#borrarPortada').hide()
  }

  // Mostrando publicacion segun se el caso: Editar/Insertar
  if ($('#NamePublicacion').val()) {
    $('#subirPublicacion').hide()
    $('#borrarPublicacion').show()
  }else{
      $('#subirPublicacion').show()
      $('#borrarPublicacion').hide()
  }




  // Funcionalidad al seleccionar el adjunto
  $(document).on('change', '#publicacion',function() {
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
          $('.fileIconPublicacion').fadeOut('slow');
      }else{
          if (name) {
            $('.fileIconPublicacion').fadeIn('slow');
            $('.titleAdPublicacion').text(' '+fic[fic.length-1]);
          
          }else{
             $('.fileIconPublicacion').fadeOut('slow');
          }
      }      
  });



  // Funcionalidad al seleccionar el adjunto
  $(document).on('change', '#portada',function() {
    
      name = $(this).val();
      fic = name.split('\\');
      var allowedExtensions = /(.jpg)$/i;
      console.log(fic);
      // Validamos el tipo de archivo
      if (!allowedExtensions.exec(name)) {
          $(this).val('');
          Swal.fire({
              type:  'error',
              title: 'Oops...',
              text:  `El archivo ${fic[fic.length-1]} es invalido !`,
              footer: '<div class="txt-alimentos">Solo se permiten archivos .jpg</div>'
            })
            $('.fileIconPortada').fadeOut('slow');
      }else{
          if (name) {
              $('.fileIconPortada').fadeIn('slow');
              $('.titleAdPortada').text(' '+fic[fic.length-1]);
          
          }else{
              $('.fileIconPortada').fadeOut('slow');
          }
      }    
  });


  
  //Funcionalidad de boton eliminar
  $(document).on('click','.eliminar',function () {
    // id = $('#id').val();
    campo = this.dataset.campo;
    // nameFile = this.dataset.file;
    // console.log(id + ' - ' + nameFile + ' - ' + campo);
    if(campo == 'publicacion'){
      console.log('tengo que resetear publicacion');
      document.getElementById("NamePublicacion").value = "";
      $('#subirPublicacion').show();
      $('#borrarPublicacion').hide();
    }else{
      console.log('tengo que resetear portada');
      document.getElementById("NamePortada").value = "";
      $('#subirPortada').show();
      $('#borrarPortada').hide();
    }      
  });

    
});