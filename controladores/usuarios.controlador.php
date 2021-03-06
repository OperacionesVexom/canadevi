<?php
	class ControladorUsuarios {
		/*=============================================
		REGISTRO DE USUARIO
		=============================================*/
		public function ctrRegistroUsuario() {
			if(isset($_POST["regNombre"])) {
				if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regNombre"]) &&
					preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApPat"]) &&
					preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regAPMat"]) &&
					preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
					preg_match('/^[0-9]+$/', $_POST["regTelefono"]) &&
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])) {

					$encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					$encriptarEmail = md5($_POST["regEmail"]);

					$datos = array("nombre"=>$_POST["regNombre"],
										"apellidoPaterno"=>$_POST["regApPat"],
										"apellidoMaterno"=>$_POST["regAPMat"],
										"telefono"=>$_POST["regTelefono"],
							   		"password"=> $encriptar,
							   		"email"=> $_POST["regEmail"],
							   		"foto"=>"",
							   		"verificacion"=> 0,
							   		"emailEncriptado"=>$encriptarEmail);

					$tabla = "usuarios";
					$url = Ruta::ctrRuta();
					$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

					if($respuesta == "ok") {
						/*=============================================
						VERIFICACIÓN CORREO ELECTRÓNICO
						=============================================*/
						date_default_timezone_set("America/Mexico_City");

						$url = Ruta::ctrRuta();
						$mail = new PHPMailer;
						$mail->CharSet = 'UTF-8';
						$mail->isMail();
						$mail->setFrom('contacto@prueba.com', 'Correo de prueba');
						$mail->addReplyTo('contacto@prueba.com', 'Correo de prueba');
						$mail->Subject = "Por favor verifique su dirección de correo electrónico";
						$mail->addAddress($_POST["regEmail"]);
						$mail->msgHTML('
							<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<meta name="viewport" content="width=device-width" />
								<title>Confirmar correo</title>
								<style type="text/css">
									/* -------------------------------------
									GLOBAL
									------------------------------------- */
									* {
										margin:0;
										padding:0;
										font-family: Helvetica, Arial, sans-serif;
									}
									img {
										max-width: 100%;
										outline: none;
										text-decoration: none;
										-ms-interpolation-mode: bicubic;
									}
									.image-fix {
										display:block;
									}
									.collapse {
										margin:0;
										padding:0;
									}
									body {
										-webkit-font-smoothing:antialiased;
										-webkit-text-size-adjust:none;
										width: 100%!important;
										height: 100%;
										text-align: center;
										color: #747474;
										background-color: #ffffff;
									}
									h1,h2,h3,h4,h5,h6 {
										font-family: Helvetica, Arial, sans-serif;
										line-height: 1.1;
									}
									h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
										font-size: 60%;
										line-height: 0;
										text-transform: none;
									}
									h1 {
										font-weight:200;
										font-size: 44px;
									}
									h2 {
										font-weight:200;
										font-size: 32px;
										margin-bottom: 14px;
									}
									h3 {
										font-weight:500;
										font-size: 27px;
									}
									h4 {
										font-weight:500;
										font-size: 23px;
									}
									h5 {
										font-weight:900;
										font-size: 17px;
									}
									h6 {
										font-weight:900;
										font-size: 14px;
										text-transform: uppercase;
									}
									.collapse {
										margin: 0 !important;
									}
									td, div {
										font-family: Helvetica, Arial, sans-serif;
										text-align: center;
									}
									p, ul {
										margin-bottom: 10px;
										font-weight: normal;
										font-size:14px;
										line-height:1.6;
									}
									p.lead {
										font-size:17px;
									}
									p.last {
										margin-bottom:0px;
									}
									ul li {
										margin-left:5px;
										list-style-position: inside;
									}
									a {
										color: #747474;
										text-decoration: none;
									}
									a img {
										border: none;
									}

									/* -------------------------------------
									ELEMENTOS
									------------------------------------- */
									table.head-wrap {
										width: 100%;
										margin: 0 auto;
										background-color: #f9f8f8;
										border-bottom: 1px solid #d8d8d8;
									}
									.head-wrap * {
										margin: 0;
										padding: 0;
									}
									.header-background {
										background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
									}
									.header {
										height: 42px;
									}
									.header .content {
										padding: 0;
									}
									.header .brand {
										font-size: 16px;
										line-height: 42px;
										font-weight: bold;
									}
									.header .brand a {
										color: #464646;
									}
									table.body-wrap {
										width: 505px;
										margin: 0 auto;
										background-color: #ffffff;
									}
									.soapbox .soapbox-title {
										font-size: 30px;
										color: #464646;
										padding-top: 25px;
										padding-bottom: 28px;
									}
									.content .status {
										width: 90%;
									}
									.status {
										border-collapse: collapse;
										margin-left: 15px;
										color: #656565;
									}
									.status .status-cell {
										border: 1px solid #b3b3b3;
										height: 50px;
										font-size: 16px;
										line-height: 23px;
									}
									.status .status-cell.success,
									.status .status-cell.active {
										height: 65px;
									}
									.status .status-cell.success {
										background: #f2ffeb;
										color: #51da42;
										font-size: 15px;
									}
									.status .status-cell.active {
										background: #fffde0;
										width: 135px;
									}
									.status .status-image {
										vertical-align: text-bottom;
									}
									.body .body-padded,
									.body .body-padding {
										padding-top: 34px;
									}
									.body .body-padding {
										width: 41px;
									}
									.body-padded,
									.body-title {
										text-align: left;
									}
									.body .body-title {
										font-weight: bold;
										font-size: 17px;
										color: #464646;
									}
									.body .body-text .body-text-cell {
										text-align: left;
										font-size: 14px;
										line-height: 1.6;
										padding: 9px 0 17px;
									}
									.body .body-signature-block .body-signature-cell {
										padding: 25px 0 30px;
										text-align: left;
									}
									.body .body-signature {
										font-family: "Comic Sans MS", Textile, cursive;
										font-weight: bold;
									}
									.footer-wrap {
										width: 100%;
										margin: 0 auto;
										clear: both !important;
										background-color: #e5e5e5;
										border-top: 1px solid #b3b3b3;
										font-size: 12px;
										color: #656565;
										line-height: 30px;
									}
									.footer-wrap td {
										padding: 14px 0;
									}
									.footer-wrap td .content {
										padding: 0;
									}
									.footer-wrap td .footer-lead {
										font-size: 14px;
									}
									.footer-wrap td .footer-lead a {
										font-size: 14px;
										font-weight: bold;
										color: #535353;
									}
									.footer-wrap td a {
										font-size: 12px;
										color: #656565;
									}
									.footer-wrap td a.last {
										margin-right: 0;
									}
									.footer-wrap .footer-group {
										display: inline-block;
									}

									/* ---------------------------------------------------
									RESPONSIVE
									------------------------------------------------------ */
									.container {
										display: block !important;
										max-width: 505px !important;
										clear: both !important;
									}
									.content {
										padding: 0;
										max-width: 505px;
										margin: 0 auto;
										display: block;
									}
									.content table {
										width: 100%;
									}
									.clear {
										display: block;
										clear: both;
									}
									table.full-width-gmail-android {
										width: 100% !important;
									}
								</style>
								<style type="text/css" media="only screen">
									/* -------------------------------------------
									TELEFONO
									-------------------------------------------- */
									@media only screen {
										table[class="head-wrap"],
										table[class="body-wrap"],
										table[class*="footer-wrap"] {
											width: 100% !important;
										}

										td[class*="container"] {
											margin: 0 auto !important;
										}
									}

									@media only screen and (max-width: 505px) {
										*[class*="w320"] {
											width: 320px !important;
										}

										table[class="status"] td[class*="status-cell"],
										table[class="status"] td[class*="status-cell"].active {
											display: block !important;
											width: auto !important;
											height: auto !important;
											padding: 15px !important;
											font-size: 18px !important;
										}
									}
								</style>
							</head>

							<body bgcolor="#ffffff">
								<div align="center">
									<table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
										<tr>
											<td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
												<!--[if gte mso 9]>
													<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
													<v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
													<v:textbox inset="0,0,0,0">
												<![endif]-->
												<div height="8">
												</div>
												<!--[if gte mso 9]>
													</v:textbox>
													</v:rect>
												<![endif]-->
											</td>
										</tr>
										<tr class="header-background">
											<td class="header container" align="center">
												<div class="content">
													<span class="brand">
														<a href="#">
															CANADEVI
														</a>
													</span>
												</div>
											</td>
										</tr>
									</table>

									<table class="body-wrap w320">
										<tr>
											<td></td>
											<td class="container">
												<div class="content">
													<table cellspacing="0">
														<tr>
															<td>
																<table class="soapbox">
																	<tr>
																		<td class="soapbox-title">&iexcl;Casi terminamos&#33;</td>
																	</tr>
																</table>
																<table class="status" bgcolor="#fffeea" cellspacing="0">
																	<tr>
																		<td class="status-cell success">
																			<img class="status-image" src="https://www.filepicker.io/api/file/gd9yTMfATWV8fPJlmyRC" alt="✓">&nbsp;<b>Entrar a p&aacute;gina</b>
																		</td>
																		<td class="status-cell success">
																			<img class="status-image" src="https://www.filepicker.io/api/file/gd9yTMfATWV8fPJlmyRC" alt="✓">&nbsp;<b>Realizar registro</b>
																		</td>
																		<td class="status-cell active">
																			<div><b>Confirmar&nbsp;correo</b></div>
																		</td>
																	</tr>
																</table>
																<table class="body">
																	<tr>
																		<td class="body-padding"></td>
																		<td class="body-padded">
																			<div class="body-title">2 de 3 pasos han sido completados</div>
																			<table class="body-text">
																				<tr>
																					<td class="body-text-cell">
																						Est&aacute;s a un paso de obtener todos los beneficios dentro de nuestro portal.
																							<br>Si usted no registr&oacute; esta cuenta, puede ignorar este correo electr&oacute;nico y la cuenta se eliminar&aacute;.
																					</td>
																				</tr>
																			</table>
																			<div><!--[if mso]>
																				<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:210px;" arcsize="10%" strokecolor="#407429" fill="t">
																				<v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
																				<w:anchorlock/>
																				<center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Add more info here</center>
																				</v:roundrect>
																				<![endif]--><a href="'.$url.'verificar/'.$encriptarEmail.'" style="background-color:#44c8e2;border:1px solid #44c8e2;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:210px;-webkit-text-size-adjust:none;mso-hide:all;">Verificar correo</a>
																			</div>

																			<table class="body-signature-block">
																				<tr>
																					<td class="body-signature-cell">
																						<p>Muchas Gracias</p>
																					</td>
																				</tr>
																			</table>
																		</td>
																		<td class="body-padding"></td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</div>
											</td>
											<td></td>
										</tr>
									</table>
								</div>
							</body>
							</html>
						');

						$envio = $mail->Send();

						if (!$envio) {
							echo '<script>
										swal({
									  		title: "¡ERROR!",
									  		text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'!",
									  		type:"error",
									  		confirmButtonText: "Cerrar",
									  		closeOnConfirm: false
										},
										function(isConfirm) {
											if(isConfirm) {
												history.back();
											}
										});
									</script>';
						} else {
							echo '<script>
										swal({
									  		title: "¡OK!",
									  		text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
									  		type:"success",
									  		confirmButtonText: "Cerrar",
									  		closeOnConfirm: false
										},
										function(isConfirm) {
											if(isConfirm) {
												history.back();
											}
										});
									</script>';
						}
					}
				} else {
					echo '<script>
								swal({
								  	title: "¡ERROR!",
								  	text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
								  	type:"error",
								  	confirmButtonText: "Cerrar",
								  	closeOnConfirm: false
								},
								function(isConfirm) {
									if(isConfirm){
										history.back();
									}
								});
							</script>';
				}
			}
		}

		/*=============================================
		MOSTRAR USUARIO
		=============================================*/
		static public function ctrMostrarUsuario($item, $valor) {
			$tabla = "usuarios";
			$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

			return $respuesta;
		}

		/*=============================================
		ACTUALIZAR USUARIO
		=============================================*/
		static public function ctrActualizarUsuario($id, $item, $valor) {
			$tabla = "usuarios";
			$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

			return $respuesta;
		}

		/*=============================================
		INGRESO DE USUARIO
		=============================================*/
		public function ctrIngresoUsuario() {
			if (isset($_POST["ingEmail"])) {
				if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
				   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

					$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla = "usuarios";
					$item = "email";
					$valor = $_POST["ingEmail"];

					$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

					if ($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar) {
						if ($respuesta["verificacion"] == 0) {
							echo'<script>
										swal({
											title: "¡CORREO ELECTRÓNICO NO VERIFICADO!",
											text: "¡Por favor revisa la bandeja de entrada o la carpeta de SPAM de tú correo para verififcar la dirección de correo '.$respuesta["email"].'!",
											type: "error",
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										},
										function(isConfirm) {
											if (isConfirm) {	   
												history.back();
											}
										});
									</script>';
						} else {
							$_SESSION["validarSesion"] = "ok";
							$_SESSION["id"] = $respuesta["id"];
							$_SESSION["nombre"] = $respuesta["nombre"];
							$_SESSION["apellidoPaterno"] = $respuesta["apellidoPaterno"];
							$_SESSION["apellidoMaterno"] = $respuesta["apellidoMaterno"];
							$_SESSION["telefono"] = $respuesta["telefono"];
							$_SESSION["email"] = $respuesta["email"];
							$_SESSION["password"] = $respuesta["password"];
							$_SESSION["foto"] = $respuesta["foto"];

							echo '<script>
										window.location = localStorage.getItem("rutaActual");
									</script>';
						}
					} else {
						echo'<script>
									swal({
										title: "¡ERROR AL INGRESAR!",
										text: "¡Por favor revisa que el correo electrónico exista o la contraseña coincida con la registrada!",
										type: "error",
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
									},
									function(isConfirm) {
										if (isConfirm) {	   
											window.location = localStorage.getItem("rutaActual");
										} 
									});
								</script>';
					}
				} else {
					echo '<script>
								swal({
									title: "¡ERROR AL INGRESAR!",
									text: "¡No se permiten caracteres especiales!",
									type:"error",
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
								},
								function(isConfirm) {
									if(isConfirm) {
										history.back();
									}
								});
							</script>';
				}
			}
		}

		/*=============================================
		OLVIDO DE CONTRASEÑA
		=============================================*/
		static public function ctrOlvidoPassword() {
			if (isset($_POST["passEmail"])) {
				if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])) {
					/*=============================================
					GENERAR CONTRASEÑA ALEATORIA
					=============================================*/
					function generarPassword($longitud) {
						$key = "";
						$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

						$max = strlen($pattern)-1;

						for ($i = 0; $i < $longitud; $i++) {
							$key .= $pattern{mt_rand(0,$max)};
						}
						return $key;
					}
					$nuevaPassword = generarPassword(11);

					$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla = "usuarios";
					$item1 = "email";
					$valor1 = $_POST["passEmail"];

					$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

					if ($respuesta1) {
						$id = $respuesta1["id"];
						$item2 = "password";
						$valor2 = $encriptar;

						$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

						if ($respuesta2  == "ok") {
							/*=============================================
							CAMBIO DE CONTRASEÑA
							=============================================*/
							date_default_timezone_set("America/Mexico_City");
							$url = Ruta::ctrRuta();
							$mail = new PHPMailer;
							$mail->CharSet = 'UTF-8';
							$mail->isMail();

							$mail->setFrom('contacto@prueba.com', 'Correo de prueba');
							$mail->addReplyTo('contacto@prueba.com', 'Correo de prueba');

							$mail->Subject = "Solicitud de nueva contraseña";
							$mail->addAddress($_POST["passEmail"]);

							$mail->msgHTML('
								<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
									<meta name="viewport" content="width=device-width" />
									<title>Recuperar contraseña</title>
									<style type="text/css">
										/* -------------------------------------
										GLOBAL
										------------------------------------- */
										* {
											margin:0;
											padding:0;
											font-family: Helvetica, Arial, sans-serif;
										}
										img {
											max-width: 100%;
											outline: none;
											text-decoration: none;
											-ms-interpolation-mode: bicubic;
										}
										.image-fix {
											display:block;
										}
										.collapse {
											margin:0;
											padding:0;
										}
										body {
											-webkit-font-smoothing:antialiased;
											-webkit-text-size-adjust:none;
											width: 100%!important;
											height: 100%;
											text-align: center;
											color: #747474;
											background-color: #ffffff;
										}
										h1,h2,h3,h4,h5,h6 {
											font-family: Helvetica, Arial, sans-serif;
											line-height: 1.1;
										}
										h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
											font-size: 60%;
											line-height: 0;
											text-transform: none;
										}
										h1 {
											font-weight:200;
											font-size: 44px;
										}
										h2 {
											font-weight:200;
											font-size: 32px;
											margin-bottom: 14px;
										}
										h3 {
											font-weight:500;
											font-size: 27px;
										}
										h4 {
											font-weight:500;
											font-size: 23px;
										}
										h5 {
											font-weight:900;
											font-size: 17px;
										}
										h6 {
											font-weight:900;
											font-size: 14px;
											text-transform: uppercase;
										}
										.collapse {
											margin: 0 !important;
										}
										td, div {
											font-family: Helvetica, Arial, sans-serif;
											text-align: center;
										}
										p, ul {
											margin-bottom: 10px;
											font-weight: normal;
											font-size:14px;
											line-height:1.6;
										}
										p.lead {
											font-size:17px;
										}
										p.last {
											margin-bottom:0px;
										}
										ul li {
											margin-left:5px;
											list-style-position: inside;
										}
										a {
											color: #747474;
											text-decoration: none;
										}
										a img {
											border: none;
										}

										/* -------------------------------------
										ELEMENTS
										------------------------------------- */
										table.head-wrap {
											width: 100%;
											margin: 0 auto;
											background-color: #f9f8f8;
											border-bottom: 1px solid #d8d8d8;
										}
										.head-wrap * {
											margin: 0;
											padding: 0;
										}
										.header-background {
											background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
										}
										.header {
											height: 42px;
										}
										.header .content {
											padding: 0;
										}
										.header .brand {
											font-size: 16px;
											line-height: 42px;
											font-weight: bold;
										}
										.header .brand a {
											color: #464646;
										}
										table.body-wrap {
											width: 505px;
											margin: 0 auto;
											background-color: #ffffff;
										}
										.soapbox .soapbox-title {
											font-size: 30px;
											color: #464646;
											padding-top: 25px;
											padding-bottom: 28px;
										}
										.content .status-container.single .status-padding {
											width: 80px;
										}
										.content .status {
											width: 90%;
										}
										.content .status-container.single .status {
											width: 300px;
										}
										.status {
											border-collapse: collapse;
											margin-left: 15px;
											color: #656565;
										}
										.status .status-cell {
											border: 1px solid #b3b3b3;
											height: 50px;
											font-size: 16px;
											line-height: 23px;
										}
										.status .status-cell.success,
										.status .status-cell.active {
											height: 65px;
										}
										.status .status-cell.success {
											background: #f2ffeb;
											color: #51da42;
											font-size: 15px;
										}
										.status .status-cell.active {
											background: #fffde0;
											width: 135px;
										}
										.status .status-image {
											vertical-align: text-bottom;
										}
										.body .body-padded,
										.body .body-padding {
											padding-top: 34px;
										}
										.body .body-padding {
											width: 41px;
										}
										.body-padded,
										.body-title {
											text-align: left;
										}
										.body .body-title {
											font-weight: bold;
											font-size: 17px;
											color: #464646;
										}
										.body .body-text .body-text-cell {
											text-align: left;
											font-size: 14px;
											line-height: 1.6;
											padding: 9px 0 17px;
										}
										.body .body-signature-block .body-signature-cell {
											padding: 25px 0 30px;
											text-align: left;
										}
										.body .body-signature {
											font-family: "Comic Sans MS", Textile, cursive;
											font-weight: bold;
										}
										.footer-wrap {
											width: 100%;
											margin: 0 auto;
											clear: both !important;
											background-color: #e5e5e5;
											border-top: 1px solid #b3b3b3;
											font-size: 12px;
											color: #656565;
											line-height: 30px;
										}
										.footer-wrap td {
											padding: 14px 0;
										}
										.footer-wrap td .content {
											padding: 0;
										}
										.footer-wrap td .footer-lead {
											font-size: 14px;
										}
										.footer-wrap td .footer-lead a {
											font-size: 14px;
											font-weight: bold;
											color: #535353;
										}
										.footer-wrap td a {
											font-size: 12px;
											color: #656565;
										}
										.footer-wrap td a.last {
											margin-right: 0;
										}
										.footer-wrap .footer-group {
											display: inline-block;
										}

										/* ---------------------------------------------------
										RESPONSIVENESS
										------------------------------------------------------ */
										.container {
											display: block !important;
											max-width: 505px !important;
											clear: both !important;
										}
										.content {
											padding: 0;
											max-width: 505px;
											margin: 0 auto;
											display: block;
										}
										.content table {
											width: 100%;
										}
										.clear {
											display: block;
											clear: both;
										}
										table.full-width-gmail-android {
											width: 100% !important;
										}
									</style>
									
									<style type="text/css" media="only screen">
										/* -------------------------------------------
										PHONE
										-------------------------------------------- */
										@media only screen {
											table[class="head-wrap"],
											table[class="body-wrap"],
											table[class*="footer-wrap"] {
												width: 100% !important;
											}

											td[class*="container"] {
												margin: 0 auto !important;
											}
										}

										@media only screen and (max-width: 505px) {
											*[class*="w320"] {
												width: 320px !important;
											}

											table[class="status"] td[class*="status-cell"],
											table[class="status"] td[class*="status-cell"].active {
												display: block !important;
												width: auto !important;
												height: auto !important;
												padding: 15px !important;
												font-size: 18px !important;
											}
										}
									</style>
								</head>

								<body bgcolor="#ffffff">
									<div align="center">
										<table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
													<!--[if gte mso 9]>
														<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
														<v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
														<v:textbox inset="0,0,0,0">
													<![endif]-->
													<div height="8">
													</div>
													<!--[if gte mso 9]>
														</v:textbox>
														</v:rect>
													<![endif]-->
												</td>
											</tr>
											<tr class="header-background">
												<td class="header container" align="center">
													<div class="content">
														<span class="brand">
															<a href="#">
																CANADEVI
															</a>
														</span>
													</div>
												</td>
											</tr>
										</table>

										<table class="body-wrap w320">
											<tr>
												<td></td>
												<td class="container">
													<div class="content">
														<table cellspacing="0">
															<tr>
																<td>
																	<table class="soapbox">
																		<tr>
																			<td class="soapbox-title">Solicitud de nueva contrase&ntilde;a</td>
																		</tr>
																	</table>
																	<table class="status-container single">
																		<tr>
																			<td class="status-padding"></td>
																			<td>
																				<table class="status" bgcolor="#fffeea" cellspacing="0">
																					<tr>
																						<td class="status-cell">
																							Nueva contrase&ntilde;a: <b>'.$nuevaPassword.'</b>
																						</td>
																					</tr>
																				</table>
																			</td>
																			<td class="status-padding"></td>
																		</tr>
																	</table>
																	<table class="body">
																		<tr>
																			<td class="body-padding"></td>
																			<td class="body-padded">
																				<div class="body-title">&iquest;Porque recibo este correo&#63;</div>
																				<table class="body-text">
																					<tr>
																						<td class="body-text-cell">
																							Hemos recibido la solicitud de cambio de contrase&ntilde;a en nuestro portal, es por eso que te enviamos la que generamos. Al menos en esta ocasi&oacute;n debes ingresar con ella y la puedes cambiar accediendo a tu perfil.
																						</td>
																					</tr>
																				</table>

																				<div>
																					<!--[if mso]>
																						<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:210px;" arcsize="10%" strokecolor="#407429" fill="t">
																						<v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#44c8e2" />
																						<w:anchorlock/>
																						<center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Add more info here</center>
																						</v:roundrect>
																					<![endif]-->
																					<a href="'.$url.'" style="background-color:#44c8e2;border:1px solid #44c8e2;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:210px;-webkit-text-size-adjust:none;mso-hide:all;">Ingresar al sitio</a>
																				</div>

																				<table class="body-signature-block">
																					<tr>
																						<td class="body-signature-cell">
																						</td>
																					</tr>
																				</table>
																			</td>
																			<td class="body-padding"></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</div>
												</td>
												<td></td>
											</tr>
										</table>
									</div>
								</body>
								</html>
							');

							$envio = $mail->Send();

							if (!$envio) {
								echo '<script>
											swal({
												title: "¡ERROR!",
												text: "¡Ha ocurrido un problema enviando cambio de contraseña a '.$_POST["passEmail"].$mail->ErrorInfo.'!",
												type:"error",
												confirmButtonText: "Cerrar",
												closeOnConfirm: false
											},
											function(isConfirm) {
												if(isConfirm) {
													history.back();
												}
											});
										</script>';
							} else {
								echo '<script>
											swal({
												title: "¡CORREO ENVIADO!",
												text: "¡Por favor revisa la bandeja de entrada o la carpeta de SPAM de tú correo electrónico '.$_POST["passEmail"].' el cual tiene tu nueva contraseña!",
												type:"success",
												confirmButtonText: "Cerrar",
												closeOnConfirm: false
											},
											function(isConfirm) {
												if(isConfirm) {
													history.back();
												}
											});
										</script>';
							}
						}
					} else {
						echo '<script> 
									swal({
										title: "¡CORREO INEXISTENTE!",
										text: "¡El correo electrónico no existe en el sistema!",
										type:"error",
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
									},
									function(isConfirm) {
										if(isConfirm) {
											history.back();
										}
									});
								</script>';
					}
				} else {
					echo '<script> 
								swal({
									title: "¡CORREO INVÁLIDO!",
									text: "¡Error al enviar el correo electrónico, está mal escrito!",
									type:"error",
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
								},
								function(isConfirm) {
									if(isConfirm) {
										history.back();
									}
								});
							</script>';
				}
			}
		}
	}