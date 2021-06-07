<?php
require_once "../controladores/categoria.controlador.php";
require_once "../modelos/categoria.modelo.php";

require_once "../controladores/activo.controlador.php";
require_once "../modelos/activo.modelo.php";

class TablaActivos{
		public function mostrarTablaActivos(){
		$item = null;
    	$valor = null;
    	$orden = "id";
  		$activos = ControladorActivos::ctrMostrarActivos($item, $valor, $orden);
  		// si no hay ningun activo retorno un json vacio
  		if(count($activos) == 0){
  			echo '{"data": []}';
		  	return;
  		}
  		$datosJson = '{
		  "data": [';
		  for($i = 0; $i < count($activos); $i++){
		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/
		  	$item = "idCategoria";
		  	$valor = $activos[$i]["idCategoria"];
		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/
		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarActivo' codigo='".$activos[$i]["codigo"]."' data-toggle='modal' data-target='#modalEditarActivo'><i class='fa fa-pencil'></i></button></div>";

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$activos[$i]["codigo"].'",
			      "'.$activos[$i]["marca"].'",
			      "'.$activos[$i]["modelo"].'",
			      "'.$activos[$i]["num_serie"].'",
			      "'.$categorias["categoria"].'",
			      "'.$activos[$i]["val_adq"].'",
			      "'.$activos[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   ']

		 }';

		echo $datosJson;


	}
}

/*===================================================
ACTIVAR TABLA ACTIVOS
======================================================*/
$activarTablaActivos = new TablaActivos();
$activarTablaActivos->mostrarTablaActivos();