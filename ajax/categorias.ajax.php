<?php

require_once "../controladores/categoria.controlador.php";
require_once "../modelos/categoria.modelo.php";
class AjaxCategorias{
	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/
	public $idCategoria;
	public function ajaxEditarCategoria(){
		$item = "idCategoria";
		$valor = $this->idCategoria;
		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
		echo json_encode($respuesta);
	}
}
/*=============================================
EDITAR CATEGORÍA
=============================================*/
if(isset($_POST["idCategoria"])){
	$categoria = new AjaxCategorias();
	$categoria -> idCategoria = $_POST["idCategoria"];
	$categoria -> ajaxEditarCategoria();
}