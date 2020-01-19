
<?php 


session_start();
if (!$_SESSION["validar"]){
  header("location:index.php?action=ingreso");
  exit();
}

 ?>


<h1>EDITAR USUARIOS</h1>

	<form method="post" onsubmit="return validarActualizacion()">
		
     	<?php 

     $editarUsuario = new mvcController();
     $editarUsuario -> editarUsuarioControl();
     $editarUsuario -> actualizarUsuarioControl();

 

	 ?>

	</form>


