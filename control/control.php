<?php 
class mvcController{


#llamada de pagina 
	public function pagina(){

     include "vista/modulos/plantilla.php";

	}


	# INTERACCION DEL USUARIO
	public function enlasesPaginasControl(){

		if(isset( $_GET["action"])){
			$enlasesControlador = $_GET["action"];
		}

		else{
			$enlasesControlador = "index";
		}
		

		$respuesta = paginas::enlasesPaginasModelo($enlasesControlador);

		include $respuesta;
	}


	#REGISTRO DE LOS USUARIOS 
	#------------------------------------------------------------------------------------
	public function registroUsuariosControl(){

		if (isset($_POST["usuarioRegistro"])) {
			#preg_match = realiza una comparacion con la expresion regular 
        
       

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioRegistro"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordRegistro"]) && preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$_POST["emailRegistro"]) ) {

                 // cryp para increptar las password 
				$encriptar = crypt($_POST["passwordRegistro"], '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi');
	
			


	   $datosControl = array("usuario"=>$_POST["usuarioRegistro"],"password"=>$encriptar,"email"=>$_POST["emailRegistro"]);

        $respuesta = Datos::registroUsuarioModelo($datosControl,"usuarios");


       
         if($respuesta == "exito"){
         	header("location:ok");
         }

         else{
         	header("location:index.php");
         }

		}
 
      
	}

}
	
#INGRESO DE USUARIOS 
	#----------------------------------------------------------------------------------------------

public function ingresoUsuariosControl(){

		if (isset($_POST["usuarioIngreso"])) {

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordIngreso"])) {

                 // cryp para increptar las password 
				$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi');
	

	   $datosControl = array("usuario"=>$_POST["usuarioIngreso"],"password"=>$encriptar);

        $respuesta = Datos::ingresoUsuarioModelo($datosControl,"usuarios");


// comensamos a controlar los intentos de ingreso de los usuarios 
        $intentos = $respuesta["intentos"];
        $usuario = $_POST["usuarioIngreso"];
        $maximoIntentos = 3;

        if($intentos < $maximoIntentos){
        
       if( $respuesta["usuario"]== $_POST["usuarioIngreso"] && $respuesta["password"]== $encriptar){

       	$intentos = 0;

          	$datosControl = array("usuarioActual"=>$usuario,"actualizarintentos" =>$intentos);
          	$respuestaActualizarintentos = Datos::intentosUsuarioModelo($datosControl,"usuarios");



       	session_start();
       	$_SESSION["validar"]= true;

          header("location:usuarios");

       }

       else{

       	++$intentos;

       	$datosControl = array("usuarioActual"=>$usuario,"actualizarintentos" =>$intentos);

       	$respuestaActualizarintentos = Datos::intentosUsuarioModelo($datosControl,"usuarios");



       	header("location:fallo");


         }
          }

          else{
          	$intentos = 0;

          	$datosControl = array("usuarioActual"=>$usuario,"actualizarintentos" =>$intentos);
          	$respuestaActualizarintentos = Datos::intentosUsuarioModelo($datosControl,"usuarios");

          	header("location:fallo3intentos");


          }
		}
        }
      

	}

	#VISTA DE USUARIOS 
	#---------------------------------------

	public function VistaUsuarioControl(){

		$respuesta = Datos::VistaUsuarioModelo("usuarios");

		foreach ($respuesta as $row => $item) {
				echo'<tr>
      	<td>'.$item["usuario"].'</td>
      	<td>'.$item["password"].'</td>
      	<td>'.$item["email"].'</td>
      	<td><a href= "index.php?action=editar&id='.$item["id"].'"><button id="button2">Editar</button></a></td>
      	<td><a href= "index.php?action=usuarios&idBorrar='.$item["id"].'"><button id="button2">Borrar</button></a></td>
      </tr>';
		}

	

	}

	public function editarUsuarioControl(){

		$datosControl = $_GET["id"];
		$respuesta = Datos::editarUsuarioModelo($datosControl,"usuarios");

		echo '<input type = "hidden" value="'.$respuesta["id"].'" name ="idEditar">
		
		 <label for="usuarioAct"><strong>usuario</strong> </label>
		 <input type="text" value ="'.$respuesta["usuario"].'" name="usuarioEditar" id="usuarioAct" required >

		 <label for="passwordAct"><strong>password</strong> </label>
      <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" id="passwordAct" required>

      <label for="emailAct"><strong>email</strong> </label>
      <input type="email" value="'.$respuesta["email"].'" name="emailEditar" id="emailAct" required>
      <br>
      <br>


      <input type="submit" value="ACTUALIZAR" id="button">';
	}


	public function actualizarUsuarioControl(){

		if(isset($_POST["usuarioEditar"])){

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioEditar"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordEditar"]) && preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$_POST["emailEditar"]) ) {


				$encriptar = crypt($_POST["passwordEditar"], '$2a$07$usesomesillystringfore2uDLvp1Ii2e./U9C8sBjqp8I90dH6hi');
	
			

			$datosControl = array("id"=>$_POST["idEditar"],"usuario" =>$_POST["usuarioEditar"],"password" =>$encriptar,"email" =>$_POST["emailEditar"]);


        $respuesta = Datos::actualizarUsuarioModelo($datosControl,"usuarios");


       
         if($respuesta == "exito"){
         	header("location:cambio");
         }

         else{
         	echo "error";
         }
		
       }

		}
	}

	public function borrarUsuarioControl(){

		if (isset($_GET["idBorrar"])) {
			$datosControl = $_GET["idBorrar"];

			$respuesta = Datos::borrarUsuariomodelo($datosControl,"usuarios");

			if ($respuesta == "borrado") {
				header("location:usuarios");
			}

			// else{
			// 	echo "error";
			// }
		}

	}


}

 ?>