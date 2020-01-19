<h1>INGRESO DE USUARIO </h1>

<form method="post" onsubmit="return validarIngreso()">

<label for="usuarioIngreso"><strong>usuario</strong> </label>
<input type="text" placeholder="usuario" name="usuarioIngreso" maxlength="6" id="usuarioIngreso" required>

<label for="passwordIngreso"><strong>contraseña</strong> </label>
<input type="password" placeholder="password" name="passwordIngreso" id="passwordIngreso" required>

<br>
<br>


<input type="submit" value="INGRESAR" id="button" >


</form>

<?php 
 $ingreso = new mvcController();
 $ingreso -> ingresoUsuariosControl();


if(isset($_GET["action"])){
	if ($_GET["action"]== "fallo") {
     echo "error al ingresar";
	}

	if($_GET["action"]== "fallo3intentos"){
		echo "erros has fallado muchas veces cuenta bloqueada, para desbloquaer utliza el captcha";
	}

}


 ?>