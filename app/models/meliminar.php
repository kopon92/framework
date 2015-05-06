<?php
	class mEliminar extends Model{

    /**
      Funcion para eliminar usuario
    **/
 function eliminar($B_usuario,$pas){

  try{
$sql = "DELETE FROM usuaris WHERE nom ='".$B_usuario."' AND password ='".$pas."';";//Hacemos la consulta con las dos variables pasadas en el controlador
/* Ejecutar la sentencia */
   $query=$this->db->prepare($sql);
     $query->bindParam(1,$B_usuario);
     $query->bindParam(2,$pas);

     $query->execute();

     if($query->rowCount()==1){
           return TRUE;
     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
     }
  }	

		
	}