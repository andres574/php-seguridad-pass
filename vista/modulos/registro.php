<h1>REGISTRO DE NUESTROS USUARIOS </h1>

<form method="post" onsubmit="return validarRegistros()">
	
<label for="usuarioRegistro"><strong>usuario</strong> </label>
<input type="text" placeholder="maximo 6 caracteres" name="usuarioRegistro" maxlength="6" id="usuarioRegistro" required>


<label for="passwordRegistro"><strong>contraseña</strong> </label>
<input type="password" placeholder="caracteres, debe incluir numeros y mayusculas"name="passwordRegistro"  id="passwordRegistro" required>

<label for="emailRegistro"><strong>correo </strong> </label>
<input type="text" placeholder="escriba correctamente su correo electronico"  name="emailRegistro" id="emailRegistro" required >

<p><input type="checkbox" id="terminos"><a href="https://www.xvideos.com/">Acepta terminos y condiciones</a></p>
<br>
<br>

<input type="submit" value="registrar" id="button">



</form>

<?php 
 $registro = new mvcController();
 $registro -> registroUsuariosControl();

if(isset($_GET["action"])){
	if ($_GET["action"]== "ok") {
     echo "registro exitoso";
	}
}

 ?>