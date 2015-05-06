<?php
	final class Eliminar extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mEliminar;
			$this->view=new vEliminar;
		}
		/**
			Funcion que elimina un usuario
			Para eliminar el usuario necesitamos pasar un usuario y su copntraseña si coincide borrada el user.
		**/
		function eliminar(){
		if(isset($_POST['usuario'])){ 
		    $B_usuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);//Guardo en dos variables el nombre de usuari0 i el password passats per el formulari
	        $pas=filter_input(INPUT_POST, 'pas', FILTER_SANITIZE_STRING);

	        $user=$this->model->eliminar($B_usuario,$pas);//Envia al model
         if ($user==TRUE){
          
               header('Location:'.APP_W.'correcto');//Si todo ha ido bien nos mandara a la pagina de correcto!
               //echo $email;
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'error');
             }
  		  }
		}
	}