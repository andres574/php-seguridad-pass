<?php 

class paginas{
	
	public function enlasesPaginasModelo($enlasesModelo){

		if ($enlasesModelo == "ingreso"||
			$enlasesModelo == "registro"|| 
			$enlasesModelo == "usuarios"|| 
			$enlasesModelo == "editar"|| 
			$enlasesModelo == "salir") {

			$modulo = "vista/modulos/".$enlasesModelo.".php";

	}
	elseif ($enlasesModelo == "index") {
		$modulo = "vista/modulos/registro.php";
	}

	elseif ($enlasesModelo == "ok") {
		$modulo = "vista/modulos/registro.php";
	}
	elseif ($enlasesModelo == "fallo") {
		$modulo = "vista/modulos/ingreso.php";
	}
	elseif ($enlasesModelo == "fallo3intentos") {
		$modulo = "vista/modulos/ingreso.php";
	}

	elseif ($enlasesModelo == "cambio") {
		$modulo = "vista/modulos/usuarios.php";
	}

	else
	{
		$modulo = "vista/modulos/registro.php";
	}


	return $modulo;


}



}






?>