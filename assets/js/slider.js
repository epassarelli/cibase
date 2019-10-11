$(document).ready(function () {
    UrlBase = $('#url').val();
    // Carga de tabla
    listar(UrlBase);
});

function listar(base) {
    var table = $("#sliderAbm").DataTable({
        destroy: true,
        ajax: {
            url: base + "mipanel/slider/getSliders",
            type: "jsonp"
        },
        columns: [
            { data: "id" },
            { data: "titulo" },
            { data: "descripcion" },
            { data: "imagen" },
            { data: "estado" },
            {
                defaultContent:
                    "<button type='button' class='editar btn btn-warning btn-sm'>Edit</button>	<button type='button' class='eliminar btn btn-danger btn-sm' data-toggle='modal' data-target='#modalEliminar' >Delet</button>"
            }
        ],
        language: espanol
    });
    Editar("#sliderAbm tbody", table);
 }

 function Editar(body, table) {
		$(body).on("click", "button.editar", function() {
			// var datos = table.row($(this).parents("tr")).data();
			// $('#efecto').fadeOut('slow')
			// $("#Opcion").val("editar");
			// var idOrisa = $("#Id").val(datos.id),
			// 	nombre = $("#Nombre").val(datos.nombre),
			// 	numero = $("#Numero").val(datos.numero),
			// 	colores = $("#Colores").val(datos.colores),
			// 	numero = $("#Numero").val(datos.numero),
			// 	fecha = $("#Fecha").val(datos.fecha);
			$("#FormSlide").modal("show");
			// console.log(datos);
		});
 }

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
 };