<?php
	require "controladores/plantilla.controlador.php";
	require "controladores/categoria.controlador.php";
	require "controladores/activo.controlador.php";

	require "modelos/categoria.modelo.php";
	require "modelos/activo.modelo.php";

	$plantilla = new PlantillaControlador();
	$plantilla->ctrPlantilla();