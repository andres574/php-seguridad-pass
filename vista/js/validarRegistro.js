/* =========================================================================
validar registro 
=================================================================================*/

function validarRegistros(){

var usuario = document.querySelector("#usuarioRegistro").value;
console.log('usuario',usuario);
var password = document.querySelector("#passwordRegistro").value;
console.log('password',password);
var email = document.querySelector("#emailRegistro").value;
console.log('email',email);
var terminos = document.querySelector("#terminos").checked;


//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE USUARIO*/
//////////////////////////////////////////////////////////////////////////

 if (usuario != "") {

 	var caracteres = usuario.length;
 	var expresion = /^[a-zA-Z0-9]*$/;

 	if (caracteres > 6) {
 		document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>no escriba mas de 6 caracteres";
 		return false;
 	}

 	 if(!expresion.test(usuario)) {
	document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br> no escriba caracteres especiales";
	return false;
	}
 }


//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE PASSWORD*/
//////////////////////////////////////////////////////////////////////////

if (password != "") {

 	var caracteres = password.length;
	var expresion = /^[a-zA-Z0-9]*$/;

	if (caracteres < 6 ) {

		document.querySelector("label[for='passwordRegistro']").innerHTML += "<br> escriba por favor mas de 6 caracteres.";
 		return false;
	}

	if (!expresion.test(password)) {
		document.querySelector("label[for='passwordRegistro']").innerHTML += "<br> no escriba caracteres especiales";
	     return false;
	}

}

//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE email*/
//////////////////////////////////////////////////////////////////////////
if (email != "") {

var expresion =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

if(!expresion.test(email)) {
		document.querySelector("label[for='emailRegistro']").innerHTML += "<br> escriba correctamente el email";
 		return false;
 	}

}

//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE terminos y condiciones*/
//////////////////////////////////////////////////////////////////////////

if (!terminos) {
	document.querySelector("form").innerHTML += "<br> acepte terminos y condiciones";

	// ponemos despues del value el igual a ?????????/ para que no se borre el los datos si el cliente no acepto los terminos

	var usuario = document.querySelector("#usuarioRegistro").value = usuario;

    var password = document.querySelector("#passwordRegistro").value = password;

    var email = document.querySelector("#emailRegistro").value = email;

	return false;
}

return true;

}
// /* ================ fin del registro ==============================*/
