$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();
    indice = 0;



//Configuramos las alerts
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


   // Reseteamos el form y asignamos el valor de la opcion
    $(".insertar").click(function() {
      $('.titulo').html('Agregar ');   // Titulo del form   
      $("#formParametros").trigger("reset"); // Reseteams el form
      $("#Opcion").val("insertar"); // Asignamos la accion
      $('.form-group').removeClass('has-error has-success'); // Eliminamos posibles calses de validacion
      $('.text-dangerm, .editFile').remove() // Eliminamos texto de validacion o imagen de edicion
      $("#valor").val('')
    });

});


/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////



// Funcion para tomar los datos de la edicion y asignarlos a los imputs
 function Editar(e) {
  
     //Tomando desde el boton de edicion
      //Guardamos los datos que tomamos del datatable
      //var datos = $('#detallepedidos').row($(this).parents("tr")).data();
      // Removemos las posibles clases de validacion que pueda tener el fomr
      //$('.form-group').removeClass('has-error has-success')
      //$('.text-danger, .editFile').remove()
			// Asignamos titulo al form y al boton
      //$('.titulo').html('Edicion Item ')
      // Asignamos las accion que realiza el metodo del servidor
      //$("#Opcion").val("editar");
      //hay que ir a buscar el registro a la tabla porque en el datatable
      //no tenemos todos los campos 
      //Abrimos el modal
      //$("table tbody tr ").click(function() {
         //var total = $(this).find("td:first-child").text();
         //console.log(total)
         
       

         var idproducto = e.parents("tr").find("td:eq(7)").text()
         var preciounit = e.parents("tr").find("td:eq(2)").text()
         var cantidad   = e.parents("tr").find("td:eq(3)").text()
         var total      = e.parents("tr").find("td:eq(4)").text()


         document.getElementById('producto_id').value=parseInt(idproducto,10)
         document.getElementById('preciounit').value=parseFloat(preciounit,10)
         document.getElementById('cantidad').value=parseFloat(cantidad,10)
         document.getElementById('total').value=parseFloat(total,10)
         
          //indice es el numero de fila de la table
         indice = e.parents("tr").index();
         $("#modalPedidos").modal("show");  
             
      //});
  
  }

  


function cambiaProducto() {
   id=document.getElementById('producto_id').value;
  console.log('ID',id);
  $.ajax({
    type: "POST",
    url: UrlBase+'mipanel/productos/getProductoJson',
    data: { Id: id},
    dataType: "json",
    success: function (response) {
        //Asignamos los valores de cada input para que se muestren en el form
        $("#preciounit").val(response['data'].precioventa)
        
        uni = parseFloat($("#preciounit").val())
        can = parseFloat($("#cantidad").val())
        tot = parseFloat(uni*can)

        $("#preciounit").val(uni.toFixed(2))
        $("#cantidad").val(can.toFixed(2))
        $("#total").val(tot.toFixed(2))
        

      
  
      },//success
        error: function(xhr, textStatus, error){
        console.log(xhr.statusText);
        console.log(textStatus);
        console.log(error);
    } //error 
  });//ajax  



}


function aceptar() {
   
  producto_id=parseInt(document.getElementById('producto_id').value,10)
  preciounit=parseFloat(document.getElementById('preciounit').value,10)
  cantidad=parseFloat(document.getElementById('cantidad').value,10)
  total=parseFloat(document.getElementById('total').value,10)

  console.log('acepto indice', indice)


  miTabla = document.getElementsByTagName("table")[0];
  mibody = miTabla.getElementsByTagName("tbody")[0];
  miFila = mibody.getElementsByTagName("tr")[indice];
  miCelda = miFila.getElementsByTagName("td")[0];
  miDato = miCelda.firstChild.nodeValue;

  console.log(miFila)
  




  $("#modalPedidos").modal("hide");  

}

 // Funcion para eliminar un row
 
 function deletePedido(body, table) { 
    //Tomando desde el boton de edicion
		$(body).on("click", "a.eliminar", function() {
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
          //console.log('ejecutamos');  
          $.ajax({
              type: "POST",
              url: UrlBase+'mipanel/parametros/deletePedido',
              data: { Id: datos.id},
              dataType: "json",
              success: function (response) {
                if (response.success == true) {
                 swalButtons.fire(
                    'Eliminado!',
                    'Su archivo ha sido eliminado.',
                    'success'
                  );
                  table.ajax.reload();
                }
              }//success
            });//ajax  
            //console.log('ejecutamos 3'); 
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
 
