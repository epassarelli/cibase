$(document).ready(function() {

// Url Dinamico
	UrlBase = $('#url').val();
//Declaramos Variables
var fileS1 = $('#FileQs'), fileS2 = $('#FileM'), fileS3 = $('#FileV'), 
	imgS1 = $('#imagen1F'), imgS2 = $('#imagen2F'), imgS3 = $('#imagen3F'),
	inpIS1 = $('.FileQs'), inpIS2 = $('.FileM'), inpIS3 = $('.FileV'),
	inpIt1 = $('#FileQs'), inpIt2 = $('#FileM'), inpIt3 = $('#FileV'),
	fileId1 = '#FileQs', fileId2 = '#FileM', fileId3 = '#FileV',
	inptDelete1 = $('#Fileqs'), inptDelete2 = $('#Filem'), inptDelete3 = $('#Filev'),
	UrlBase = $('#url').val();
// Ocultamos los imputs files
    $('.file').hide()
// Simulamos los open file desde las imagenes
    fileOpen(imgS1, fileS1)
    fileOpen(imgS2, fileS2)
    fileOpen(imgS3, fileS3)
// Mostramos las imagenes seleccionadas
	filePreview(fileId1,imgS1,UrlBase,inpIS1,fileS1,UrlBase,inptDelete1);
	filePreview(fileId2,imgS2,UrlBase,inpIS2,fileS2,UrlBase,inptDelete2);
	filePreview(fileId3,imgS3,UrlBase,inpIS3,fileS3,UrlBase,inptDelete3);
// Listar datos
	get_All(UrlBase)
// Funcion de editar la informacion
	editar(UrlBase)
	
});

// Simulando el open del file desde la imagen
function fileOpen(idI, idF) {
	idI.on('click', function() {
		idF.click()
	});//cierre de Click
}// Fin fileOpen

//Funcion para mostrar imagen seleccionada en otra de referencia
function filePreview(input, idI, UrlBase,inpIS,inpIt,UrlBase,nameDelete) {
	//Cuando cambie el valor del fichero
	$(input).change(function () {
		// obtener nombre del mismo
		var fileAdd = nombre(inpIt.val())
		//Obtenemos el nombre anterior para borrarlo en el server
		var fileDelete = nameDelete.val()
	    if (this.files && this.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
				idI.prop('src',e.target.result).fadeIn();
        		inpIS.val(fileAdd)
        		deleteImg(UrlBase, fileDelete)
	        }
	        reader.readAsDataURL(this.files[0]);
	    }else{
        		deleteImg(UrlBase, fileDelete)
				idI.prop('src',UrlBase+"assets/images/400x300.jpg").fadeIn();
        		inpIS.val('')
        		// deleteImg(UrlBase, fileName)

		}// fin condicional

	});//cierre Change
}// Fin filePreview

//Funcion para obtener nombre del fichero
function nombre(fic) {
  fic = fic.split('\\');
   return fic[fic.length-1];
}// fin nombre

//Funcion para asignar los valores a los imputs
function get_All(UrlBase) {
	$.ajax({  
        url: UrlBase+'mipanel/nosotros/listar',
        method:"POST", 
        type: "JSON", 
        //respuesta del envio
        success: function(response) {
          //Convertimos en Json el String
        response = JSON.parse(response)
        	// asignamos los valores a los imputs
        	data(UrlBase,response)
          }  // success
        });  //Ajax  
}// Fin get_Alll

// Funcion para borrar la imagen del directorio
function deleteImg(UrlBase, fileName) {
	$.ajax({  
        url: UrlBase+'mipanel/nosotros/deleteImg',
        method:"POST", 
        type: "JSON", 
        data: { FileName : fileName},
        //respuesta del envio
        success: function(response) {
          //Convertimos en Json el String
        response = JSON.parse(response)

          if (response.success == true) {
          	// Mostramos el mensaje de cargado
            Swal.fire({
              type: 'error',
              title: 'Imagen Eliminada !',
              text: 'La imagen fue eliminada del directorio del servidor.'
            })
          	// console.log('Imagen Eliminada')
          }else{
          	// console.log('No se encontro imagen')
          }

          }  // success
        });  //Ajax  
}// Fin deleteImg

//Funcion para modificar la informacion en la base
function editar(UrlBase) {
	$('#formNosotros').submit(function(e) {
      e.preventDefault(); // evitamos que redireccione el formulario
		
		var me = $(this);

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
            
            //Eliminamos las clases de los errores
                $(".form-group")
                .removeClass("has-error has-success")
                $('.text-danger').remove()    
            // Mostramos el mensaje de cargado
            Swal.fire({
              type: 'success',
              title: 'Cargado con Exito !',
            })
            
            // Cargamos los datos en los inputs
            get_All(UrlBase)

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
	}); //submit
}// Fin Editar

//Funcion para asignar los datos a los imputs
function data(UrlBase,response) {
	//asignamos los valores a los imputs
	$('#Fileqs').val(response.quienesfoto)
	$('#TituloQs').val(response.quienestitulo)
	$('#SubtituloQs').val(response.quienessubtitulo)
	$('#TextoQs').val(response.quienestexto)
	$('#Filem').val(response.nosotrosfoto)
	$('#TituloM').val(response.nosotrostitulo)
	$('#SubtituloM').val(response.nosotrossubtitulo)
	$('#TextoM').val(response.nosotrostexto)
	$('#Filev').val(response.visionfoto)
	$('#TituloV').val(response.visiontitulo)
	$('#SubtituloV').val(response.visionsubtitulo)
	$('#TextoV').val(response.visiontexto)
	//colocamos las imagenes
	$('#imagen1F').prop('src',UrlBase+"assets/images/nosotros/"+response.quienesfoto).fadeIn();
	$('#imagen2F').prop('src',UrlBase+"assets/images/nosotros/"+response.nosotrosfoto).fadeIn();
	$('#imagen3F').prop('src',UrlBase+"assets/images/nosotros/"+response.visionfoto).fadeIn();
}