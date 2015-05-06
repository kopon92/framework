<?php
    /**
        Registro del usuario
    **/
	final class Registro extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mRegistro;
			$this->view=new vRegistro;
		}
		public $insertInto;
 		public $insertColumns;
		public $insertValues;
		
		function nuevo_user(){    //Funcion para crear un usuario nuevo
        $mensaje="";
        $model = new DB;
        $conexion = $model->singleton();
        $n = $_POST['nombre'];
        $c = $_POST['cognoms'];
        $e = $_POST['email'];
        $p = $_POST['password'];
       

        if (empty($n) || empty($c) || empty($e) || empty($p)) {
            $mensaje = 'Todos los campos tienen que estar llenos.';
          }else{
            $sql = "INSERT INTO usuaris (nom, cognoms, email, password)VALUES ('$n', '$c', '$e', '$p')";
        
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
	
	}
