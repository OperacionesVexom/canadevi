<?php
	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/usuarios.controlador.php";

	require_once "modelos/usuarios.modelo.php";

	require_once "modelos/rutas.php";

	require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

	$plantilla = new ControladorPlantilla();
	$plantilla -> ctrPlantilla();