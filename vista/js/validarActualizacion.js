

function validarActualizacion(){

var usuario = document.querySelector('#usuarioAct').value;

var password = document.querySelector('#passwordAct').value;

var email = document.querySelector('#emailAct').value;


//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE USUARIO*/
//////////////////////////////////////////////////////////////////////////

 if (usuario != "") {

 	var caracteres = usuario.length;
 	var expresion = /^[a-zA-Z0-9]*$/;

 	if (caracteres > 6) {
 		document.querySelector("label[for='usuarioAct']").innerHTML += "<br>no escriba mas de 6 caracteres";
 		return false;
 	}

 	 if(!expresion.test(usuario)) {
	document.querySelector("label[for='usuarioAct']").innerHTML += "<br> no escriba caracteres especiales";
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

		document.querySelector("label[for='passwordAct']").innerHTML += "<br> escriba por favor mas de 6 caracteres.";
 		return false;
	}

	if (!expresion.test(password)) {
		document.querySelector("label[for='passwordAct']").innerHTML += "<br> no escriba caracteres especiales";
	     return false;
	}

}

//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE email*/
//////////////////////////////////////////////////////////////////////////
if (email != "") {

var expresion =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

if(!expresion.test(email)) {
		document.querySelector("label[for='emailAct']").innerHTML += "<br> escriba correctamente el email";
 		return false;
 	}

}


return true;

}