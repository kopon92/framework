<?php
	final class Anadir extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mAnadir;
			$this->view=new vAnadir;
		}
    /**
      Funcion que añade un usuario nuevo
    **/
		function linia_nueva(){
			if (isset($_POST["create"])) {
    	  $mensaje = "";
          $nombre = htmlspecialchars($_POST['nombre']); //Coje el nombre de usuario
          $apellidos = htmlspecialchars($_POST['cognoms']);//Apellidos
          $email = htmlspecialchars($_POST['email']);//Email
          $password = htmlspecialchars($_POST['password']);//password

          if ($nombre == '') {
            $mensaje = 'El nombre tiene que contener algun caracter.';
          }elseif (strlen($nombre) > 30) {
            $mensaje = 'Nombre muy largo.';
          }

          if ($apellidos == '') {
            $mensaje = 'Los apellidos tienen que contener algun caracter.';
          }elseif (strlen($nombre) > 50) {
            $mensaje = 'Apellidos muy largos.';
          }
          
          if ($email == '') {
            $mensaje = 'El email tiene que contener algun caracter.';
          }elseif (strlen($nombre) > 30) {
            $mensaje = 'Email muy largo.';
          }

          if ($password == '') {
            $mensaje = 'El password tiene que contener algun caracter.';
          }elseif (strlen($nombre) > 30) {
            $mensaje = 'password muy largo.';
          }
      }else{
        $model = new crear;
        $model->insertInto = 'usuaris';
        $model->insertColumns = 'nombre, apellidos, email, password';
        $model->insertValues = "'$nombre', '$apellidos', '$email', '$password'";
        $model->crear();
        $mensaje = $model->mensaje;
      }	
		}
	}