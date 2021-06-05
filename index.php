<?php
	require "controladores/plantilla.controlador.php";
	require "controladores/categoria.controlador.php";

	require "modelos/categoria.modelo.php";

	$plantilla = new PlantillaControlador();
	$plantilla->ctrPlantilla();