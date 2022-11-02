	
$(document).ready(function(){
    $("#provincia").on('change', function () {
        $("#provincia option:selected").each(function () {
            provinciaid=$(this).val();
            //$.post("modelos.php", { elegido: elegido }, function(data){
            //    $("#localidad").html(data);
            //});			
			// Ejecutamos la accion y la enviamos al servidor 
			$.ajax({
                        url: UrlBase+'mipanel/localidades/getLocalidadesJson',
                        data: { provincia: provinciaid },
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {

                                $('#localidad').empty();
                                var $select = $('#localidad');
                                $select.append('<option value="0">Selecciona una Localidad</option>');
                                $.each(response, function(id, registro) {
                                    $select.append('<option value=' + registro.id + '>' + registro.nombre + '</option>');
                                });
                       
                       
                            }, //success         
                        error: function(response) {
                            Toast.fire({type: 'success',
                            title: 'Error lista de localidades',
                          })                        },
                        // código a ejecutar sin importar si la petición falló o no
                        complete : function(xhr, status) {
                            //alert('Petición realizada');
                        }
                                
            });//ajax

        });
   });
});
