	<!--=====================================
	IMAGEN PRINCIPAL
	======================================-->
	<div class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="vistas/img/1.jpg" alt="Imagen principal">
				
				<div class="carousel-caption d-none d-md-block">
					<h5>Nombre información</h5>
					<p>Descripción información | Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium nam, commodi non quo perferendis dolorem voluptas eaque quis. Cum qui facilis velit similique quasi, perspiciatis.</p>
				</div>
			</div>
		</div>
	</div>

	<!--=====================================
	INFORMACIÓN DE LA PLATAFORMA
	======================================-->
	<div class="container info-gral">
		<div class="card text-center info-servicio" style="width: 10rem;">
			<img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/informacion-png-2.png">
			<p><b>Información</b></p>
		</div>

		<div class="card text-center info-servicio" style="width: 10rem;">
			<img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/informacion-png-2.png">
			<p><b>Información</b></p>
		</div>

		<div class="card text-center info-servicio" style="width: 10rem;">
			<img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/informacion-png-2.png">
			<p><b>Información</b></p>
		</div>

		<div class="card text-center info-servicio" style="width: 10rem;">
			<img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/informacion-png-2.png">
			<p><b>Información</b></p>
		</div>
	</div>

	<!--=====================================
	EVENTOS
	======================================-->
	<section class="container eventos">
		<h2 class="encabezado text-center text-uppercase">Eventos</h2>

		<div class="row py-5">
			<div class="col-md-6 col-lg-3">
				<div class="card">
					<img src="https://www.audiovisualstudio.es/wp-content/uploads/2017/08/LED.jpg" class="card-img-top">
					<div class="card-body">
						<h3 class="card-tittle text-center">Evento 1</h3>
						<p class="card-text text-justify">Descripción del evento con un máximo de 100 caracteres.</p>
						<p class="text-right"><a href="#" class="btn btnColor btnEvento">Más información</a></p>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-3">
				<div class="card">
					<img src="https://cdn0.bodas.com.mx/emp/fotos/4/1/7/6/17389240-1314185025307846-2314476597198891516-o_5_104176.jpg" class="card-img-top">
					<div class="card-body">
						<h3 class="card-tittle text-center">Evento 1</h3>
						<p class="card-text text-justify">Descripción del evento con un máximo de 100 caracteres.</p>
						<p class="text-right"><a href="#" class="btn btnColor btnEvento">Más información</a></p>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-3">
				<div class="card">
					<img src="http://www.windsoreventos.com/web011/galeria/EMBASSY.jpg" class="card-img-top">
					<div class="card-body">
						<h3 class="card-tittle text-center">Evento 1</h3>
						<p class="card-text text-justify">Descripción del evento con un máximo de 100 caracteres.</p>
						<p class="text-right"><a href="#" class="btn btnColor btnEvento">Más información</a></p>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-3">
				<div class="card">
					<img src="https://cdn0.matrimonio.com.co/emp/fotos/6/7/8/6/tn-dsc-1442a_10_106786.jpg" class="card-img-top">
					<div class="card-body">
						<h3 class="card-tittle text-center">Evento 1</h3>
						<p class="card-text text-justify">Descripción del evento con un máximo de 100 caracteres.</p>
						<p class="text-right"><a href="#" class="btn btnColor btnEvento">Más información</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>

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
					
					<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="ENVIAR">
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
					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">
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
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="regNombre" name="regNombre" placeholder="Nombre" required>
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
							<input type="tel" class="form-control" id="regTel" name="regTel" placeholder="Teléfono empresa" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="tel" class="form-control" id="regCelular" name="regCelular" placeholder="Teléfono celular" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<select class="form-control input-lg" id="regEmpresa" name="regEmpresa">
								<option value="">Seleciona empresa</option>
								<option value="na">No aplica</option>
								<option value="nvaEmpresa">Mi empresa no está registrada</option>
								<option value="empresa1">Empresa1</option>
								<option value="empresa2">Empresa2</option>
								<option value="empresa3">Empresa3</option>
								<option value="empresa4">Empresa4</option>
								<option value="empresa5">Empresa5</option>
								<option value="Vendedor"></option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>
						</div>
					</div>
					
					<input type="submit" class="btn btn-default backColor btn-block btnRegistro" value="ENVIAR">
				</form>
			</div>
		</div>
	</div>

	<!--=====================================
	VENTANA MODAL PARA EL REGUSTRO DE EMPRESA
	======================================-->
	<div class="modal fade modalFormulario" id="modalEmpresa" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header backModal">
					<h4 class="modal-title">Registro empresa</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form role="form" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" id="regNombreEmp" name="regNombreEmp" placeholder="Nombre empresa" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" id="regNombreContEmp" name="regNombreContEmp" placeholder="Nombre contacto empresa" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<input type="tel" class="form-control" id="regTelEmp" name="regTelEmp" placeholder="Teléfono empresa" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<input type="email" class="form-control" id="regEmailEmp" name="regEmailEmp" placeholder="Correo Electrónico empresa" required>
							</div>
						</div>

						<div class="form-group">
						<div class="panel"><small>Subir logo empresa</small></div>
						<hr>
						<input type="file" id="nvoLogoEmp" name="nvoLogoEmp">
						<p class="text-muted">Peso máximo de la imagen 2MB</p>
						<img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Logo_TV_2015.png" class="img-thumbnail previsualizar" width="100px">
						</div>

						<input type="submit" class="btn btn-default backColor btn-block btnEmpresa" value="Registrar">
					</form>
				</div>
			</div>
		</div>
	</div>