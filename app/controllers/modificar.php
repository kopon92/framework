<?php

	final class Modificar extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mModificar;
			$this->view=new vModificar;
		}
		public $insertInto;
 		public $insertColumns;
		public $insertValues;
		
    /**
      Funcion que actualiza algun campo de un usuario
    **/
		function modifica(){
        $mensaje="";
        $model = new DB;
        $conexion = $model->singleton();
        $n2 = $_POST['nombreact'];  //nombre actual de usuario
        $n = $_POST['nombre'];  //nuevo nombre
        $c = $_POST['cognoms'];
        $e = $_POST['email'];
        $p = $_POST['password'];
        if (empty($n) || empty($c) || empty($e) || empty($p)||empty($n2)) {
            $mensaje = 'Todos los campos tienen que estar llenos.';
          }else{
            $sql = "INSERT INTO usuaris (nom, cognoms, email, password)VALUES ('$n', '$c', '$e', '$p') WHERE nom = '$n2'";
        
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            
            if(!$consulta){
              header('Location: '.APP_W.'error');
            }else{
              header('Location: '.APP_W.'correcto');
            }
          }

        echo $mensaje;
        


    }
    /**
      Funcion que actualiza algun campo de un usuario
    **/
    function modificar(){
        if(isset($_POST['nombreact'])){ 
            $nombre=filter_input(INPUT_POST, 'nombreact', FILTER_SANITIZE_STRING);
            $nusuario=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user=$this->model->modificar($nombre,$nusuario,$email,$password);  //Mandamos al modelo las variables para que las gestione
         echo $user;
         if ($user==1){
               // Pagina correcta
               header('Location:'.APP_W.'correcto');
               //echo $email;
         }
         else{
             // Error
               header('Location:'.APP_W.'error');
             }
          }
        }
	
	}
