	<div class="navbar-dark fixed-top">
		<nav class="navbar navbar-expand-md bg-dark container">
			<a class="navbar-brand" href="index.html">
				<!-- <img src="img/logo.png"> -->
				HOLA
			</a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto mr-5">
					<li class="nav-item active">
						<a class="nav-link" href="#inicio">Inicio <span class="sr-only">(current)</span></a>
					</li>
		
					<li class="nav-item">
						<a class="nav-link" href="#">Nosotros</a>
					</li>
		
					<li class="nav-item">
						<a class="nav-link" href="#">Contacto</a>
					</li>
				</ul>

				<span class="navbar-text text-white">
					<ul class="navbar-nav ml-auto mr-5">
						<li class="nav-item">
							<a class="nav-link" href="#modalIngreso" data-toggle="modal">Ingresa</a>
						</li>
			
						<li class="nav-item active">
							<a class="nav-link" href="#">|</a>
						</li>
			
						<li class="nav-item">
							<a class="nav-link" href="#modalRegistro" data-toggle="modal">Regístrate</a>
						</li>
					</ul>
				</span>
			</div>
		</nav>
	</div>

	<!--=====================================
	VENTANA MODAL PARA EL INGRESO
	======================================-->
	<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">
		<div class="modal-content modal-dialog">
			<div class="modal-header backModal">
				<h3 class="backColor">Ingreso</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body modalTitulo">
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Correo Electrónico" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>
						</div>
					</div>
					
					<input type="submit" class="btn btn-default btnColor btn-block btnIngreso" value="ENVIAR">
					<br>
					<center>
						<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>
					</center>
				</form>
			</div>
		</div>
	</div>

	<!--=====================================
	VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
	======================================-->
	<div class="modal fade modalFormulario" id="modalPassword" role="dialog">
		<div class="modal-content modal-dialog">
			<div class="modal-header backModal">
				<h3 class="backColor">Solicitud de nueva contraseña</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body modalTitulo">
				<form method="post">
					<label class="text-muted">Escribe el correo electrónico con el que estás registrado y te enviaremos una nueva contraseña:</label>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-envelope"></i>
							</span>
							<input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>
						</div>
					</div>					
					<input type="submit" class="btn btn-default btnColor btn-block" value="ENVIAR">
				</form>
			</div>
		</div>
	</div>

	<!--=====================================
	VENTANA MODAL PARA EL REGISTRO
	======================================-->
	<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">
		<div class="modal-content modal-dialog">
			<div class="modal-header backModal">
				<h3 class="backColor">Registro</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body modalTitulo">
				<form method="post" onsubmit="return registroUsuario()">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="regNombre" name="regNombre" placeholder="Nombre(s)" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="regApPat" name="regApPat" placeholder="Apellido paterno" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="regAPMat" name="regAPMat" placeholder="Apellido materno" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="tel" class="form-control" id="regTelefono" name="regTelefono" placeholder="Teléfono" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>
						</div>
					</div>

					<?php
						$registro = new ControladorUsuarios();
						$registro -> ctrRegistroUsuario();
					?>
					
					<input type="submit" class="btn btn-default btnColor btn-block btnRegistro" value="ENVIAR">
				</form>
			</div>
		</div>
	</div>