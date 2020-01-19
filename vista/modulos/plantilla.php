<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="vista/css/estilo.css" type="text/css">
	<title>registro de usuarios</title>
</head>
<body>
	<header>
     <h1>empresa perez</h1>
     <img src="vista/css/reg.png" >

	</header>

	<?php 
      include "navegador.php";
	 ?>


	 <section>
	 	
	 	 <?php 
            
            $mvc = new mvcController();
            $mvc -> enlasesPaginasControl();

	 	  ?>

	 </section>

	 <script src="vista/js/validarRegistro.js"></script>
	 <script src="vista/js/validarIngreso.js"></script>
	  <script src="vista/js/validarActualizacion.js"></script>
	
</body>
</html>