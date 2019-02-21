<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php
		session_start();
		$url = Ruta::ctrRuta();
	?>

	<title>DEMO</title>

	<!-- ======================================
	PLUGINS DE CSS
	======================================= -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

	<!-- ======================================
	PLUGINS DE JAVASCRIPT
	======================================= -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>
	
	<!-- ======================================
	PLUGINS CSS PERSONALIZADOS
	======================================= -->
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/estilos.css">
</head>

<body>
	<?php
		/*=============================================
		HEADER
		=============================================*/
		include "modulos/header.php";

		/*=============================================
		CONTENIDO
		=============================================*/
		$rutas = array();
		if (isset($_GET["ruta"])) {
			$rutas = explode("/", $_GET["ruta"]);

			if ($rutas[0] == "inicio" || $rutas[0] == "verificar" || $rutas[0] == "perfil" || $rutas[0] == "evento" || $rutas[0] == "salir") {
				include "modulos/".$rutas[0].".php";
			} else {
				include "modulos/404.php";
			}
		} else {
			include "modulos/inicio.php";
		}

		/*=============================================
		FOOTER
		=============================================*/
		// include "modulos/footer.php";
	?>

	<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

	<!-- ======================================
	PLUGINS JAVASCRIPT PERSONALIZADOS
	======================================= -->
	<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
	<script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
</body>
</html>