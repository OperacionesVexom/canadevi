<!--=====================================
VERIFICAR
======================================-->
<?php
	$usuarioVerificado = false;
	
	$item = "emailEncriptado";
	$valor =  $rutas[1];

	$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

	if ($valor == $respuesta["emailEncriptado"]) {
		$id = $respuesta["id"];
		$item2 = "verificacion";
		$valor2 = 1;

		$respuesta2 = ControladorUsuarios::ctrActualizarUsuario($id, $item2, $valor2);

		if ($respuesta2 == "ok") {
			$usuarioVerificado = true;
		}
	}
?>

<div class="container">
	<div class="row contVerificacion">
		<div class="col-xs-12 text-center verificarCorreo">
			<?php
				if ($usuarioVerificado) {
					echo '<h3>Gracias</h3>
						<h2><small>¡Hemos verificado tú correo electrónico, ya puedes ingresar al sistema!</small></h2>
						<br>
						<img src="'.$url.'vistas/img/correos/registro.png">
						<br>
						<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default btnColor btn-lg">Ingresar</button></a>';
				} else {
					echo '<h3>Error</h3>
					<h2><small>¡No se ha podido verificar el correo electrónico,  vuelve a registrarse!</small></h2>
					<br>
					<img src="'.$url.'vistas/img/correos/fallo.png">
					<br>
					<a href="#modalRegistro" data-toggle="modal"><button class="btn btn-default btnColor btn-lg">Crear cuenta</button></a>';
				}
			?>
		</div>
	</div>
</div>