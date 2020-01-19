<?php 


session_start();
if (!$_SESSION["validar"]){
  header("location:index.php?action=ingreso");
  exit();
}

 ?>


<h1>USUARIOS</h1>

<table border="1">
	<thead>
		
     <tr>
     	<th>USUARIOS</th>
     	<th>PASSWORD</th>
     	<th>EMAIL</th>
     	<th></th>
     	<th></th>
     </tr>

	</thead>


	<tbody>
		
    
<?php 

 $VistaUsuario = new mvcController();
 $VistaUsuario -> VistaUsuarioControl();
 $VistaUsuario -> borrarUsuarioControl();

 ?>

	</tbody>


</table>

<?php 

    if(isset($_GET["action"])){
  if($_GET["action"]== "cambio") {
     echo "actualizacion exitoso";
  }
}

 ?>

