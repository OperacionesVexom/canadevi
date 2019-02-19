/*=============================================
CAPTURA DE RUTA
=============================================*/
var rutaActual = location.href;

$(".btnIngreso, .facebook, .google").click(function() {
	localStorage.setItem("rutaActual", rutaActual);
})

/*=============================================
FORMATEAR LOS IPUNT
=============================================*/
$("input").focus(function() {
	$(".alert").remove();
})

/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/
var validarEmailRepetido = false;

$("#regEmail").change(function() {
	var email = $("#regEmail").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({
		url:rutaOculta+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta) {
			if (respuesta == "false") {
				$(".alert").remove();
				validarEmailRepetido = false;
			} else {
				var modo = JSON.parse(respuesta).modo;
				
				if (modo == "directo") {
					modo = "este formulario";
				}

				$("#regEmail").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos.</div>')
					validarEmailRepetido = true;
			}
		}
	})
})

/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
function registroUsuario() {
	/*=============================================
	VALIDAR EL NOMBRE
	=============================================*/
	var nombre = $("#regNombre").val();

	if(nombre != "") {
		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)) {
			$("#regNombre").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;
		}
	} else {
		$("#regNombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR EL APELLIDO PATERNO
	=============================================*/
	var nombre = $("#regApPat").val();

	if(nombre != "") {
		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)) {
			$("#regApPat").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;
		}
	} else {
		$("#regApPat").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR EL APELLIDO MATERNO
	=============================================*/
	var nombre = $("#regAPMat").val();

	if(nombre != "") {
		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)) {
			$("#regAPMat").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;
		}
	} else {
		$("#regAPMat").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR EL EMAIL
	=============================================*/
	var email = $("#regEmail").val();

	if(email != "") {
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)) {
			$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

			return false;
		}

		if(validarEmailRepetido) {
			$("#regEmail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

			return false;
		}
	} else {
		$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR EL TELÉFONO
	=============================================*/
	var email = $("#regTelefono").val();

	if(email != "") {
		var expresion = /^[0-9]{5,10}$/;

		if(!expresion.test(email)) {
			$("#regTelefono").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el teléfono, mínimo 5 números máximo 10.</div>')

			return false;
		}
	} else {
		$("#regTelefono").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR CONTRASEÑA
	=============================================*/
	var password = $("#regPassword").val();

	if(password != "") {
		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(password)) {
			$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;
		}
	} else {
		$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}
}