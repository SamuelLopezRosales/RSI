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

	/*==================================
	CREAR ACTIVO
	===================================*/
	static public function ctrCrearActivo(){
		if(isset($_POST["nuevoCodigo"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMarca"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoModelo"])){
				$tabla = "activos";
				$datos = array("codigo"=>$_POST["nuevoCodigo"],
								"marca"=>$_POST["nuevaMarca"],
								"modelo"=>$_POST["nuevoModelo"],
								"num_serie"=>$_POST["nuevoNumSerie"],
								"idCategoria"=>$_POST["nuevaCategoria"],
								"val_adq"=>$_POST["nuevoValAdqui"]
							);
				$respuesta = ModeloActivos::mdlIngresarActivo($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El activo se h creado exitosamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "activos";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡No se pueden ingresar datos con caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "activos";
							}
						})
			  	</script>';
			}
		}
	}








	/*=============================================
	EDITAR ACTIVO
	=============================================*/

	static public function ctrEditarActivo(){
		if(isset($_POST["editarCodigo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMarca"])){
				$tabla = "activos";
				$datos = array("codigo" => $_POST["editarCodigo"],
							   "marca" => $_POST["editarMarca"],
							   "modelo" => $_POST["editarModelo"],
							   "num_serie" => $_POST["editarNumSerie"],
							   "idCategoria" => $_POST["editarCategoria"],
							   "val_adq" => $_POST["editarValAdqui"]);
				$respuesta = ModeloActivos::mdlEditarActivo($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "El activo ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "activos";

										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El activo no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {
							window.location = "activos";
							}
						})
			  	</script>';
			}
		}

	}

}





