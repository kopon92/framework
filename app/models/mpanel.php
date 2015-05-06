<?php
	class mPanel extends Model{
		
	}
	function modificar($nusuario,$email,$password){
  try{
   
$sql = "UPDATE usuaris SET ";
$vector = array($nusuario,$email,$password);          
$vector2 = array('nom','email','password');
$max    = sizeof($vector);
            for ($i = 1; $i <= $max; $i++) {
                if ($i != $max) {
                    $sql .=  $vector2[$i - 1] . "="."'";
                    $sql .=  $vector[$i - 1] ."'".",";

                } else {
                    $sql .=  $vector2[$i - 1] . "="."'";
                    $sql .=  $vector[$i - 1] . "' WHERE nom='".$_SESSION['nom']."';";
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