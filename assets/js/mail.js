

//Configuramos las alerts
  const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 3000
    });

$(document).ready(function() {
	submit(Toast)
});

function submit(Toast) {
    $('#formMail').submit(function (e) {
        e.preventDefault();

        var me = $(this)

        $.ajax({
            type: "POST",
            url: me.attr('action'),
            data: me.serialize(),
            dataType: "json",
            success: function (response) {
                if (response.success == true) {
                    
					// Mostramos el mensaje de cargado
		            Toast.fire({
		              type: 'success',
		              title: 'Gracias por ponerte en contacto con nosotros',
		            })
		            //Reseteamos form
		            me[0].reset();

                }else{
                  
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
		              // element.after(value);
		   
		              }); // Each
                }//else
            }
        });
    });
 }