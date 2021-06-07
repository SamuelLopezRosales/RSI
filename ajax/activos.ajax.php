<?php
require_once "../controladores/activo.controlador.php";
require_once "../modelos/activo.modelo.php";

class AjaxActivos{
	/*===============================================
	GENERAR CÓDIGO A PARTIR DE LA CATEGORIA
	================================================*/
	public $idCategoria;
	public $codigo;

	public function ajaxCrearCodigoActivo(){
		$item = "idCategoria";
		$valor = $this->idCategoria;
		$respuesta = ControladorActivos::ctrMostrarActivos($item,$valor);
		echo json_encode($respuesta);
	}

	public function ajaxEditarActivo(){
		$item = "codigo";
		$valor = $this->codigo;
		$respuesta = ControladorActivos::ctrMostrarActivos($item,$valor);
		echo json_encode($respuesta);
	}
}

if(isset($_POST["idCategoria"])){
	$codigoActivos = new AjaxActivos();
	$codigoActivos->idCategoria = $_POST["idCategoria"];
	$codigoActivos->ajaxCrearCodigoActivo();
}

if(isset($_POST["codigo"])){
	$editarActivo = new AjaxActivos();
	$editarActivo->codigo = $_POST["codigo"];
	$editarActivo->ajaxEditarActivo();
}