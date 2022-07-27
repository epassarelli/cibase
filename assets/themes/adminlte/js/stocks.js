$(document).ready(function () {

  // Url Dinamico
    UrlBase = $('#url').val();
    //var  tableimagenes;
    
    
//Configuramos las alerts
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

   
    const swalButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })




    // Carga de tabla
    listar(UrlBase,Toast);
    listar2(UrlBase,Toast); //esto lo definimos para agregar la columna accion a cada registro ingresado
    EliminaI("#stocksMoves"); //Tomar datos para la Edicion
    VerHistoria("#stocksAbm"); //tomar datos para mostrar historia en listdo de stocks
    
    
       





// Reseteamos el form y asignamos el valor de la opcion
$(".insertar").click(function() {
  producto_id        =    $('#producto_id').val();
  producto_titulo    =    $('#producto_id').find('option:selected').text();
  talle_id           =    $('#talle_id').val();
  talle_descripcion  =    $('#talle_id').find('option:selected').text();
  color_id           =    $('#color_id').val();
  color_descripcion  =    $('#color_id').find('option:selected').text();
  cantidad           =    $('#cantidad').val();
  tipo_moves_id      =    $('#tipo_moves_id').val();
  tipo_descripcion   =    $('#tipo_moves_id').find('option:selected').text();
  
  
  if (producto_id==0 || talle_id==0 || color_id==0 || cantidad==0 || tipo_moves_id==0) {
    //Configuracion de botones del alert con clase de bootstrap
    swalButtons.fire('Cancelado','Debe seleccionar un producto, taller, color,cantidad y tipo de movimiento para ingresar el prodcuto','error');
  }else{
    var t = $('#stocksMoves').DataTable();
    t.row.add([producto_id,producto_titulo,color_id,color_descripcion,talle_id,talle_descripcion,cantidad]).draw(true);
    $('#cantidad').val(0);
    //swalButtons.fire('Ingresado','Su archivo ha sido subido.','success');
  }
});



// Grabamos el ingreso de articulos
$(".grabar").click(function() {
//    var datos =  $('#stocksMoves').DataTable().data();
    var tabledatos = $('#stocksMoves').DataTable().rows().data().toArray();
    var tipo =   $('#tipo_moves_id').val();
    //console.log(JSON.stringify(tabledatos));
    $.ajax({
      type: "POST",
      url: UrlBase+'mipanel/stocks/grabaIngreso',
      data: { datos: tabledatos, tipo: tipo},
      dataType: "json",
      success: function (response) {
        if (response.success == true) {
          $('#cantidad').val(0);
          $('#producto_id').val(0);
          $('#talle_id').val(0);
          $('#color_id').val(0);
          $('#tipo_moves_id').val(0);
          $('#stocksMoves').DataTable().clear().draw(true);
          
            // alert('Activo');
            Toast.fire({
              type: 'success',
              title: 'Productos Grabados',
            })
          }else{
            // alert('inactivo');
            Toast.fire({
              type: 'error',
              title: 'No se pudieron grabar los productos',
            })
          }
        }
    });//ajax

    //swalButtons.fire('Finalizacion','Su ingreso de articulos se ejecuto exitosamente','success');

});


});





/////////////////////////////////////////////
///////////Funciones de la tabla////////////
////////////////////////////////////////////


// Listamos los datos de la tabla stocks para ver la existencia
function listar(base,Toast) {


    //var modulo_id = $('#tipocat').val();
    
    var table = $("#stocksAbm").DataTable({
        destroy: true,
        responsive: true,
        ajax: {
            url: base + "mipanel/stocks/getStocks",
            type: "json"
        },
          rowCallback : function( row, data ) {
         

        },

        columns: [
            { data: "idproducto" },
            { data: "titulo" },
            { data: "idtalle" },
            { data: "talle" },
            { data: "idcolor" },
            { data: "color" },
            { data: "cantidad" },

            {
                defaultContent:
                    "<div class='text-center'><a href='javascript:void(0);' class='historia btn btn-xs'> <i class='fa fa-clone fa-2x text-yellow'></i></a></div>"
            }
        ],
        language: espanol
    });
    //cambioEstado("#coloresAbm tbody", table,Toast); //Cambiar estado en datatable
   
 }


 
// Configuramos datatable de ingreso/egreso de unidades al stock 
function listar2(base,Toast) {

  var tableimagenes = $("#stocksMoves").DataTable({
      destroy: true,
      responsive: true,
      columnDefs: [
          {
              targets: -1,
              data: null,
              defaultContent: "<a href='javascript:void(0);' class='eliminar btn btn-xs'><i class='fa fa-trash fa-2x text-red'></i></a>",
              
            },
      ],
      language: espanol
    });



  //cambioEstado("#coloresAbm tbody", table,Toast); //Cambiar estado en datatable
  
 
}


// Funcion para tomar los datos de la edicion de productos_colores y asignarlos a los imputs
function EliminaI(body) {
   $(body).on("click", "a.eliminar", function() {
     var t = $('#stocksMoves').DataTable();
     t.row( $(this).parents('tr') ).remove().draw(true); 
   });//click
}//funcion



function VerHistoria(body) {
  $(body).on("click", "a.historia", function() {
    var t = $('#stocksAbm').DataTable();
    var datos = t.row( $(this).parents('tr') ).data(); 
 
    var apicolores  = UrlBase + 'mipanel/stocks/getStocksHistoria/' + datos.idproducto+'/'+datos.idtalle+'/'+datos.idcolor;
         
          tablehistoria  = $("#stocksHistoria").DataTable({
          destroy: true,
          responsive: true,
          ajax: {
              url: apicolores,
              type: "jsonp"
          },
          rowCallback : function( row, data ) {
          },
          columns: [
     /*          { data: "idproducto" },
              { data: "titulo" }, */
              { data: "idtalle" },
              { data: "talle" },
              { data: "idcolor" },
              { data: "color" },
              { data: "cantidad" },
              { data: "fecha" },
              { data: "usuario" },
              { data: "tipo" }
          ],
          language: espanol
        }); 

    $('.titulo').html('Historia de Movimientos: (' + datos.idproducto+')  '+datos.titulo);   // Titulo del form   
    $('#modalHistoria').modal('show');

  });//click
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







