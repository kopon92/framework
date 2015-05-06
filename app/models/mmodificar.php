<?php 

	class mModificar extends Model{
  
		function __construct(){
			parent::__construct();
		}
    /**
      Modifica usuario
    **/
 function modificar($nombre,$nusuario,$email,$password){
  try{
   
$sql = "UPDATE usuaris SET ";//Realizamos un update con las variables pasadas en el  controlador
$vector = array($nusuario,$email,$password);          
$vector2 = array('nom','email','password');
$max    = sizeof($vector);
            for ($i = 1; $i <= $max; $i++) {//Con este bucle vamos poniendo los campos que queremos modificar con sus comillas
                if ($i != $max) {
                    $sql .=  $vector2[$i - 1] . "="."'";
                    $sql .=  $vector[$i - 1] ."'".",";

                } else {
                    $sql .=  $vector2[$i - 1] . "="."'";
                    $sql .=  $vector[$i - 1] . "' WHERE nom='".$nombre."';";//Modificamos con el usuario pasado en la variable nombre
                }
            }

$sentencia2 = $this->db->prepare($sql);
$sentencia2->execute();


    //$sql = "UPDATE usuaris SET nom =".$nusuario.", email=".$email.", ";




if($sentencia2->rowCount() == 1){
//Session::set('usuario',$email);
/*
$_SESSION['usuario']=$_REQUEST[$email];
$_SESSION['clave']=$_REQUEST[$password];
*/
           return 1;

     }
     else {
         //Session::set('islogged',FALSE);
          return 2;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
     }
  }
}