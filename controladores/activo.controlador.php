<?php
class ControladorActivos{
	/*==================================
	MOSTRAR ACTIVOS
	===================================*/
	public static function ctrMostrarActivos($item,$valor){

		$tabla = "activos";
		$respuesta = ModeloActivos::mdlMostrarActivos($tabla,$item,$valor);
		return $respuesta;


	}
}