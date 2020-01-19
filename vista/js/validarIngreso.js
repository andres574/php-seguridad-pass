/* =========================================================================
validar ingreso 
=================================================================================*/

function validarIngreso(){

	var usuario =  document.querySelector('#usuarioIngreso').value;
	var password = document.querySelector('#passwordIngreso').value;


	//////////////////////////////////////////////////////////////////////////
// /*VALIDACION DE USUARIO*/
//////////////////////////////////////////////////////////////////////////


 if (usuario != "") {

 	var caracteres = usuario.length;
 	var expresion = /^[a-zA-Z0-9]*$/;

 	if (caracteres > 6) {
 		document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>no escriba mas de 6 caracteres";
 		return false;
 	}

 	 if(!expresion.test(usuario)) {
	document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br> no escriba caracteres especiales";
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

		document.querySelector("label[for='passwordIngreso']").innerHTML += "<br> escriba por favor mas de 6 caracteres.";
 		return false;
	}

	if (!expresion.test(password)) {
		document.querySelector("label[for='passwordIngreso']").innerHTML += "<br> no escriba caracteres especiales";
	     return false;
	}

}

	return true;


}
