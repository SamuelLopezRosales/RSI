/*=====================================================
CARGAR LA TABLA DINAMICA
======================================================*/
//console.log("Hola samuel");
/*$.ajax({
	url: "ajax/datatable-activos.ajax.php",
	success: function(respuesta){
		console.log("Respuesta",respuesta);
	}
});*/



$('.tablaActivos').DataTable( {
    "ajax": "ajax/datatable-activos.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );



// FUNCION PARA GENERAR NUMEROS ALEATORIOS //
function generarAleatorio(minimo,maximo){
	return Math.floor(Math.random()*(maximo-minimo+1) + minimo);
}
/*==================================================================
ASIGNAR CODIGO A EL ACTIVO
===================================================================*/
$("#nuevaCategoria").change(function(){
	var idCategoria = $(this).val();
	var concatenacion="";
	for(i=0; i<9; i++){
	// gnerar aleatorio del uno al 10
	 aleatorio = generarAleatorio(1,9);
	 aleatorio = String(aleatorio);
	 concatenacion = concatenacion + aleatorio.toString();
	}
	var nuevoCodigo ="RSI"+concatenacion;
	$("#nuevoCodigo").val(nuevoCodigo);
	/*var datos = new FormData();
	datos.append("idCategoria",idCategoria);
	$.ajax({
		url:"ajax/activos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta",respuesta);
			if(!respuesta){
			}else{
				var nuevoCodigo = respuesta["codigo"]; //+ 1
				$("#nuevoCodigo").val(nuevoCodigo);
			}
		}
	});*/
});


/*=====================================================
Editar activo
=====================================================*/
$(".tablaActivos tbody").on("click","button.btnEditarActivo",function(){
	var codigo = $(this).attr("codigo");
	var datos = new FormData();
	datos.append("codigo",codigo);

	$.ajax({
		url:"ajax/activos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta",respuesta);

			var datosCategoria = new FormData();
			datosCategoria.append("idCategoria",respuesta["idCategoria"]);

			$.ajax({
				url: "ajax/categorias.ajax.php",
				method: "POST",
				data: datosCategoria,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success:function(respuesta){
					$("#editarCategoria").val(respuesta["idCategoria"]);
					$("#editarCategoria").html(respuesta["categoria"]);
				}
			});

			$("#editarCodigo").val(respuesta["codigo"]);
			$("#editarMarca").val(respuesta["marca"]);
			$("#editarModelo").val(respuesta["modelo"]);
			$("#editarNumSerie").val(respuesta["num_serie"]);
			$("#editarValAdqui").val(respuesta["val_adq"]);

		}
	});
});