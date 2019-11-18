$(document).ready(function() {

// Url Dinamico
	UrlBase = $('#url').val();
//Declaramos Variables


// Listar datos
	get_All(UrlBase)
// Funcion de editar la informacion
	editar(UrlBase)
	
});


//Funcion para asignar los valores a los imputs
function get_All(UrlBase) {
	$.ajax({  
        url: UrlBase+'mipanel/empresa/listar',
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

//Funcion para modificar la informacion en la base
function editar(UrlBase) {
	$('#formEmpresa').submit(function(e) {
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
	$('#Nombre').val(response.razonsocial)
	$('#Pais').val(response.pais)
	$('#Provincia').val(response.provincia)
	$('#Localidad').val(response.localidad)
	$('#CodigoP').val(response.cpostal)
	$('#Direccion').val(response.direcion)
	$('#Coordenadas').val(response.cordenadas)
	$('#Telefono1').val(response.telefono)
	$('#Correo').val(response.correo)
	$('#Facebook').val(response.facebook)
	$('#Instagram').val(response.instagram)
}