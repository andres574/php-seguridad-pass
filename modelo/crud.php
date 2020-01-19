<?php 
require_once "modelo/conexion.php";

class Datos extends conexion{

#REGISTRO DE LOS USUARIOS 
	public function registroUsuarioModelo($datosModelo, $tabla){

   $statement = conexion::conectar()->prepare("INSERT INTO $tabla(usuario,password,email) VALUES (:usuario,:password,:email)");


   $statement ->bindParam(":usuario",$datosModelo["usuario"], PDO::PARAM_STR);
   $statement ->bindParam(":password",$datosModelo["password"], PDO::PARAM_STR);
   $statement ->bindParam(":email",$datosModelo["email"], PDO::PARAM_STR);


   if($statement ->execute()){
     return "exito";
   }

   else
   {
    return "error";
  }
  $statement ->close();

}


# INGRESO DEL USUARIO 
public function ingresoUsuarioModelo($datosModelo, $tabla){

  $statement = conexion::conectar()->prepare("SELECT id, usuario, password, intentos FROM $tabla WHERE usuario = :usuario");

  $statement ->bindParam(":usuario",$datosModelo["usuario"], PDO::PARAM_STR);

  $statement -> execute();

  return $statement -> fetch();

  $statement ->close();

// INTENTOS USUARIOS 
  # --------------------------------


}

public function intentosUsuarioModelo($datosModelo, $tabla){
     $statement = conexion::conectar()->prepare("UPDATE $tabla SET intentos =:intentos WHERE usuario = :usuario");

        $statement ->bindParam(":intentos",$datosModelo["actualizarintentos"], PDO::PARAM_INT);
   $statement ->bindParam(":usuario",$datosModelo["usuarioActual"], PDO::PARAM_STR);

     
   if($statement ->execute()){
     return "exito";
   }

   else
   {
    return "error";
  }
  $statement ->close();

}


#VISUALIZACION DE LOS USUARIOS REGISTRADOS 

public function VistaUsuarioModelo($tabla){

  $statement = conexion::conectar()->prepare("SELECT id, usuario, password,email FROM $tabla");

  $statement -> execute();
  # el fetchAll obtiene todas las filas de un conjuno de resultados 
  return $statement ->fetchAll();
  $statement ->close();
}


////////////////////////////////////////////////////////////////////////

  public function editarUsuarioModelo($datosModelo, $tabla){

  $statement = conexion::conectar()->prepare("SELECT id, usuario, password,email FROM $tabla WHERE id = :id");

  $statement ->bindParam(":id", $datosModelo, PDO::PARAM_INT);

  $statement -> execute();
  # el fetchAll obtiene todas las filas de un conjuno de resultados 
  return $statement ->fetch();
  $statement ->close();
}


public function actualizarUsuarioModelo($datosModelo, $tabla){

 $statement = conexion::conectar()->prepare("UPDATE $tabla SET usuario =:usuario,password=:password,email=:email WHERE id = :id");


   $statement ->bindParam(":usuario",$datosModelo["usuario"], PDO::PARAM_STR);
   $statement ->bindParam(":password",$datosModelo["password"], PDO::PARAM_STR);
   $statement ->bindParam(":email",$datosModelo["email"], PDO::PARAM_STR);   $statement ->bindParam(":email",$datosModelo["email"], PDO::PARAM_STR);
      $statement ->bindParam(":id",$datosModelo["id"], PDO::PARAM_INT);


   if($statement ->execute()){
     return "exito";
   }

   else
   {
    return "error";
  }
  $statement ->close();

}




public function borrarUsuariomodelo($datosModelo, $tabla){

  $statement = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

    $statement ->bindParam(":id",$datosModelo, PDO::PARAM_INT);

     if($statement ->execute()){
     return "borrado";
   }

   else
   {
    return "error";
  }


}


}

?>