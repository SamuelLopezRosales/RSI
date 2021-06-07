<?php
require_once "conexion.php";

class ModeloActivos{
	/*===============================
	MOSTRAR ACTIVOS
	================================*/
	public static function mdlMostrarActivos($tabla,$item,$valor){
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY codigo DESC");
			$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt->close();
		$stmt = null;
	}

	public static function mdlIngresarActivo($tabla, $datos){
	/*===============================
	CREAR ACTIVOS
	================================*/
	$stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(codigo,marca,modelo,num_serie,idCategoria,val_adq) VALUES (:codigo,:marca,:modelo,:num_serie,:idCategoria,:val_adq)");

	$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
	$stmt->bindParam(":marca",$datos["marca"],PDO::PARAM_STR);
	$stmt->bindParam(":modelo",$datos["modelo"],PDO::PARAM_STR);
	$stmt->bindParam(":num_serie",$datos["num_serie"],PDO::PARAM_STR);
	$stmt->bindParam(":idCategoria",$datos["idCategoria"],PDO::PARAM_INT);
	$stmt->bindParam(":val_adq",$datos["val_adq"],PDO::PARAM_STR);

	if($stmt->execute()){
		return "ok";
	}else{
		return "error";
	}
	$stmt->close();
	$stmt=null;


	}


	/*=============================================
	EDITAR ACTIVO
	=============================================*/
	static public function mdlEditarActivo($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET marca = :marca, modelo = :modelo, num_serie = :num_serie, val_adq = :val_adq WHERE codigo = :codigo");
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":num_serie", $datos["num_serie"], PDO::PARAM_STR);
		$stmt->bindParam(":val_adq", $datos["val_adq"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}